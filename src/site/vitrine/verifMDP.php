<?php
    // Vérifie si le formulaire de connexion a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les identifiants saisis par l'utilisateur
        $identifiant = $_POST['identifier'];
        $mot_de_passe = $_POST['password'];

        // Hacher le mot de passe saisi
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Comparer les mots de passe hachés
        // Ici, vous devriez récupérer le mot de passe haché stocké dans la base de données et le comparer avec $mot_de_passe_hache
        // Se connecter à la base de données
        $servername = "lakartxela.iutbayonne.univ-pau.fr"; // Remplacez localhost par l'adresse de votre serveur de base de données
        $username = "nconguisti_bd"; // Remplacez username par votre nom d'utilisateur de base de données
        $password = "nconguisti_bd"; // Remplacez password par votre mot de passe de base de données
        $dbname = "nconguisti_bd"; // Remplacez nom_de_la_base_de_donnees par le nom de votre base de données

        // Créer une connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer la requête SQL pour récupérer le mot de passe haché correspondant à l'identifiant fourni
        $sql = "SELECT mot_de_passe FROM utilisateurs WHERE mail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $identifiant);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // L'utilisateur existe dans la base de données, récupérer le mot de passe haché
            $row = $result->fetch_assoc();
            $mot_de_passe_hache_bd = $row["motdepasse"];
            $ligne = $row;
            //$type_user = $row["type_user"];
            echo $row;

            // Vérifier si le mot de passe saisi correspond au mot de passe haché récupéré de la base de données
            if (password_verify($mot_de_passe, $mot_de_passe_hache_bd)) {
                // Mot de passe correct, rediriger l'utilisateur vers une autre page
                // verif admin / user
                if ($type_user = 'user') {
                    header("Location: controle_site.php?quelle_compte=user");
                    exit();
                }
                if ($type_user = 'admin') {
                    header("Location: controle_site.php?quelle_compte=admin");
                    exit();
                }
                
            } else {
                // Mot de passe incorrect, afficher un message d'erreur par exemple
                header("Location: index.php?pasBon=true");
                exit();
            }
        } else {
            // L'utilisateur n'existe pas dans la base de données
            header("Location: index.php?utilisateurInexistant=true");
            exit();
        }
        
        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
?>
<script src="script.js"></script>