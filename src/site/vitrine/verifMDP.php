<?php
// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les identifiants saisis par l'utilisateur
    $identifiant = $_POST['identifier'];
    $mot_de_passe = $_POST['password'];

    // Se connecter à la base de données
    $servername = "lakartxela.iutbayonne.univ-pau.fr";
    $username = "nconguisti_bd"; 
    $password = "nconguisti_bd"; 
    $dbname = "nconguisti_bd"; 

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour récupérer le mot de passe correspondant à l'identifiant fourni
    $sql_utilisateur = "SELECT motdepasse FROM Utilisateur WHERE mail = ?";
    $sql_administrateur = "SELECT motdepasse FROM Administrateur WHERE mail = ?";
    $sql_carte_etudiante = "SELECT codeCarteEtudiante FROM Utilisateur WHERE  mail = ?"
    
    // Exécuter d'abord la requête pour l'utilisateur
    $stmt = $conn->prepare($sql_utilisateur);
    $stmt->bind_param("s", $identifiant);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // L'utilisateur existe dans la table Utilisateur
        $type_user = "user";
    } else {
        // Essayer la table Administrateur
        $stmt = $conn->prepare($sql_administrateur);
        $stmt->bind_param("s", $identifiant);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // L'utilisateur existe dans la table Administrateur
            $type_user = "admin";
        } else {
            // L'utilisateur n'existe pas dans les deux tables
            header("Location: index.php?utilisateurInexistant=true"); // Rediriger avec un message d'erreur
            exit();
        }
    }

    // Vérifier le mot de passe pour l'utilisateur trouvé
    $row = $result->fetch_assoc();
    $mot_de_passe_bd = $row["motdepasse"];
    if ($mot_de_passe_bd == $mot_de_passe) {
        // Mot de passe correct, rediriger l'utilisateur en fonction de son type
        if ($type_user == "user") {
            header("Location: controle_site.php?quelle_compte=user&quelle_page=default");
            $stmt = $conn->prepare($sql_carte_etudiante);
            $stmt->bind_param("s", $identifiant);
            $stmt->execute();
            $result = $stmt->get_result();
            $_POST($result[0]);
            exit();
        } elseif ($type_user == "admin") {
            header("Location: controle_site.php?quelle_compte=admin&quelle_page=default");
            exit();
        }
    } else {
        // Mot de passe incorrect
        header("Location: index.php?pasBon=true"); // Rediriger avec un message d'erreur
        exit();
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>

