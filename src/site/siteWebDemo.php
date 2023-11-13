<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="siteWebDemo.css">
</head>
<body>

<h1>Questionnaire</h1>

<form action="" method="post">
    <!-- Partie Utilisateur -->
    <h2>Informations Utilisateur</h2>
    <!-- Conteneur principal pour aligner en colonne -->
    <div class="info-utilisateur-container">
        <!-- Nom -->
        <label for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" class="info-utilisateur" type="texte" required>
        <br>
        <!-- Prenom -->
        <label for="prenom">Prénom: </label>
        <input type="text" id="prenom" name="prenom" class="info-utilisateur" type="texte" required>
        <br>
        <!-- date de naissance -->
        <label for="dateNaiss">Date de naissance (jj/mm/aaaa): </label>
        <input type="text" id="dateNaiss" name="dateNaiss" class="info-utilisateur" type="texte" required>
        <br>
        <!-- mail -->
        <label for="mail">Mail: </label>
        <input type="email" id="mail" name="mail" class="info-utilisateur" type="texte" required>
        <br>
        <!-- adresse -->
        <label for="adresse">Adresse (Ville, numeroRue nomRue): </label>
        <input type="text" id="adresse" name="adresse" class="info-utilisateur" type="texte" required>
        <br>
        <!-- niveau d'etude -->
        <label for="etude">Niveau d'étude: </label>
        <input type="text" id="etude" name="etude" class="info-utilisateur" type="texte" required>
        <br>
        <!-- moyen de transport -->
        <label for="choixMoyenTransport">Choisissez le moyen de transport: </label>
        <select id="choixMoyenTransport" name="choixMoyenTransport" class="info-utilisateur" required>
            <option value="0">Pied</option>
            <option value="1">Vélo</option>
            <option value="2">Moto</option>
            <option value="3">Voiture</option>
        </select>
    </div>
    <!-- Partie Préférences -->
    <h2>Préférences</h2>


        <!-- Question 1 -->
        <div>
            <label for="reponseMusique">Question 1: Cochez les styles de musique que vous voulez voir. Sélectionnez les par ordre de préférence (ex: 1432)</label><br>
            <input type="text" id="reponseMusique" name="reponseMusique" placeholder="Votre réponse" class="info-preference">
        </div>

        <!-- Question 2 -->
        <div>
            <label for="reponseSport">Question 2: Cochez les sports que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
            <input type="text" id="reponseSport" name="reponseSport" placeholder="Votre réponse" class="info-preference">
        </div>

        <!-- Question 3 -->
        <div>
            <label for="reponseActivitesCulturelles">Question 3: Cochez les activités culturelles que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
            <input type="text" id="reponseActivitesCulturelles" name="reponseActivitesCulturelles" placeholder="Votre réponse" class="info-preference">
        </div>

        <!-- Question 4 -->
        <div>
            <label for="reponseActivitesOrganisees">Question 4: Cochez les activités organisées que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
            <input type="text" id="reponseActivitesOrganisees" name="reponseActivitesOrganisees" placeholder="Votre réponse" class="info-preference">
        </div>

        <!-- Question 5 -->
        <div>
            <label for="reponseRestaurants">Question 5: Cochez les types de restaurants que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
            <input type="text" id="reponseRestaurants" name="reponseRestaurants" placeholder="Votre réponse" class="info-preference">
        </div>

        <!-- Question 6 -->
        <div>
            <label for="reponseSorties">Question 6: Cochez les activités culturelles que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
            <input type="text" id="reponseSorties" name="reponseSorties" placeholder="Votre réponse" class="info-preference">
        </div>

    <input type="submit" value="Soumettre">
</form>

<?php

        $cheminFichier = "reponseQuestionnaire.txt";
        $fichier = fopen($cheminFichier, 'r+');
        if ($_POST) {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $dateNaiss = $_POST["dateNaiss"];
            $mail = $_POST["mail"];
            $adresse = $_POST["adresse"];
            $etude = $_POST["etude"];
            $reponseMusique = $_POST["reponseMusique"];
            $reponseSport = $_POST["reponseSport"];
            $reponseActivitesCulturelles = $_POST["reponseActivitesCulturelles"];
            $reponseActivitesOrganisees = $_POST["reponseActivitesOrganisees"];
            $reponseRestaurants = $_POST["reponseRestaurants"];
            $reponseSorties = $_POST["reponseSorties"];


            $concat =" $nom|$prenom|$dateNaiss|$mail|$adresse|$etude|$reponseMusique|$reponseSport|$reponseActivitesCulturelles|$reponseActivitesOrganisees|$reponseRestaurants|$reponseSorties". PHP_EOL;

            file_put_contents($cheminFichier, $concat, FILE_APPEND);

            $affichage =  fread($fichier,filesize($cheminFichier));
            $bang = explode(" ", $affichage);
            foreach($bang as $el){
                echo "<br>";
                echo $el;
            }

        }
        
        
    ?>

</body>
</html>
