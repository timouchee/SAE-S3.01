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
        <label class="label-utilisateur" for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" class="info-utilisateur" type="texte" required>
        <br>
        <!-- Prenom -->
        <label class="label-utilisateur" for="prenom">Prénom: </label>
        <input type="text" id="prenom" name="prenom" class="info-utilisateur" required>
        <br>
        <!-- date de naissance -->
        <label class="label-utilisateur" for="dateNaiss">Date de naissance (jj/mm/aaaa): </label>
        <input type="text" id="dateNaiss" name="dateNaiss" class="info-utilisateur" required>
        <br>
        <!-- mail -->
        <label class="label-utilisateur" for="mail">Mail: </label>
        <input type="email" id="mail" name="mail" class="info-utilisateur" required>
        <br>
        <!-- adresse -->
        <label class="label-utilisateur" for="adresse">Adresse (Ville, numeroRue nomRue): </label>
        <input type="text" id="adresse" name="adresse" class="info-utilisateur" required>
        <br>
        <!-- niveau d'etude -->
        <label class="label-utilisateur" for="etude">Niveau d'étude: </label>
        <input type="text" id="etude" name="etude" class="info-utilisateur" required>
        <br>
        <!-- moyen de transport -->
        <label for="choixMoyenTransport">Choisissez le moyen de transport: </label>
        <select id="choixMoyenTransport" name="choixMoyenTransport" class="info-utilisateur-select" required>
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
            $choixMoyenTransport = $_POST["choixMoyenTransport"];
            $reponseMusique = $_POST["reponseMusique"];
            $reponseSport = $_POST["reponseSport"];
            $reponseActivitesCulturelles = $_POST["reponseActivitesCulturelles"];
            $reponseActivitesOrganisees = $_POST["reponseActivitesOrganisees"];
            $reponseRestaurants = $_POST["reponseRestaurants"];
            $reponseSorties = $_POST["reponseSorties"];

            /* liste des info utilisateurs renseignées par l'utilisateur */
            $formDonneUtilisateur = array(
                "nom" => $nom,
                "prenom" => $prenom,
                "dateNaiss" => $dateNaiss,
                "mail" => $mail,
                "adresse" => $adresse,
                "etude" => $etude
            );
            /* liste des listes de préférences de l'utilisateur */
            $formDonnePreference = array(
                "reponseMusique" => $reponseMusique,
                "reponseSport" => $reponseSport,
                "reponseActivitesCulturelles" => $reponseActivitesCulturelles,
                "reponseActivitesOrganisees" => $reponseActivitesOrganisees,
                "reponseRestaurants" => $reponseRestaurants,
                "reponseSorties" => $reponseSorties
            );


            $concat ="$nom|$prenom|$dateNaiss|$mail|$adresse|$etude|$choixMoyenTransport|$reponseMusique|$reponseSport|$reponseActivitesCulturelles|$reponseActivitesOrganisees|$reponseRestaurants|$reponseSorties". PHP_EOL;

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


