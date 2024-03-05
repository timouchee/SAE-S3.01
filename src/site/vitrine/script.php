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

        // Si les mots de passe correspondent, vous pouvez rediriger l'utilisateur vers une autre page
        if (password_verify($mot_de_passe, $mot_de_passe_hache)) {
            // Mot de passe correct, rediriger l'utilisateur vers une autre page
            header("Location: pageUser.php"); //page d'accueil avec les activité en lien avec l'utilisateur
            exit();
        } else {
            // Mot de passe incorrect, afficher un message d'erreur par exemple
            echo "Identifiant ou mot de passe incorrect";
        }
    }
?>
