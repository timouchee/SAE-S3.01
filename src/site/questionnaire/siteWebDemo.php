<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="siteWebDemo.css">
</head>
<body>
<header>
    <div class="div1">
        <div class="div2">           
        
        </div>
            <div class="div3">
                <img src="../vitrine/titre.jpg" alt="Image centrée">
            </div>
        </div>
    </div>
</header>
<div class = "div_du_centre">
    <h1>Questionnaire</h1>

    <form action="" method="post">
        <!-- Partie Utilisateur -->
        <h2>Informations Utilisateur</h2>
        <!-- Conteneur principal pour aligner en colonne -->
        <div class="info-utilisateur-container">
            <!-- Sexe -->
            <label class="label-utilisateur" for="sexe">En tant que: </label>
            <ul>
                <li>
                    <label for="title_1">
                    <input type="radio" id="sexe" name="title" value="M." />
                    Monsieur
                    </label>
                </li>
                <li>
                    <label for="title_2">
                    <input type="radio" id="sexe" name="title" value="Mme." />
                    Madame
                    </label>
                </li>
            </ul>
            <br>
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
            <div class="info-preference-container">
                <label for="reponseMusique">Question 1: Faites glisser les styles de musique que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
                <div id="container1" class="zone-depot" ondrop="drop(event)">
                    <div id="musique1" class="draggable musique" draggable="true" ondragstart="drag(event)">Jazz</div>
                    <div id="musique2" class="draggable musique" draggable="true" ondragstart="drag(event)">Pop</div>
                    <div id="musique3" class="draggable musique" draggable="true" ondragstart="drag(event)">Electro</div>
                    <div id="musique4" class="draggable musique" draggable="true" ondragstart="drag(event)">Rap</div>
                    <div id="musique5" class="draggable musique" draggable="true" ondragstart="drag(event)">Classique</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div id="zoneDepotMusique" class="zone-depot" ondrop="drop(event)">Déposez vos réponses ici</div>
            </div>

            <!-- Question 2 -->
            <div class="info-preference-container">
                <label for="reponseSport">Question 2: Faites glisser les sports que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
                <div id="container2" class="zone-depot" ondrop="drop(event)"> 
                    <div id="sport1" class="draggable sport" draggable="true" ondragstart="drag(event)">Football</div>
                    <div id="sport2" class="draggable sport" draggable="true" ondragstart="drag(event)">Tennis</div>
                    <div id="sport3" class="draggable sport" draggable="true" ondragstart="drag(event)">Pala</div>  
                    <div id="sport4" class="draggable sport" draggable="true" ondragstart="drag(event)">Course</div>
                    <div id="sport5" class="draggable sport" draggable="true" ondragstart="drag(event)">Badminton</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div id="zoneDepotSport" class="zone-depot" ondrop="drop(event)">Déposez vos réponses ici</div>
            </div>

            <!-- Question 3 -->
            <div class="info-preference-container">
                <label for="reponseActivitesCulturelles">Question 3: Faites glisser les activités culturelles que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>

                <div id="container3" class="zone-depot" ondrop="drop(event)">
                    <div id="culture1" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Cinéma</div>
                    <div id="culture2" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Zoo</div>
                    <div id="culture3" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Musée</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div id="zoneDepotActCultur" class="zone-depot" ondrop="drop(event)">Déposez vos réponses ici</div>

            </div>

            <!-- Question 4 -->
            <div class="info-preference-container">
                <label for="reponseActivitesOrganisees">Question 4: Faites glisser les activités organisées que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
                <div id="container4" class="zone-depot" ondrop="drop(event)">
                    <div id="orga1" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Tournoi de jeux vidéos</div>
                    <div id="orga2" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Uno</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div id="zoneDepotActOrga" class="zone-depot" ondrop="drop(event)">Déposez vos réponses ici</div>
            </div>

            <!-- Question 5 -->
            <div class="info-preference-container">
                <label for="reponseRestaurants">Question 5: Faites glisser les types de restaurants que vous voulez voir. Sélectionnez les par ordre de préférence</label><br>
                <div id="container5" class="container" ondrop="drop(event)">
                    <div id="resto1" class="draggable resto" draggable="true" ondragstart="drag(event)">Fast food</div>
                    <div id="resto2" class="draggable resto" draggable="true" ondragstart="drag(event)">Street food</div>
                    <div id="resto3" class="draggable resto" draggable="true" ondragstart="drag(event)">Restaurant traditionnel</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div id="zoneDepotResto" class="zone-depot" ondrop="drop(event)">Déposez vos réponses ici</div>
            </div>
            <input type="submit" value="Soumettre">
</div>
</form>

<?php

        // Fonction pour récupérer et incrémenter l'ID à partir d'un fichier
        function getNextId() {
            $idFile = 'lastId.txt'; // Nom du fichier pour stocker l'ID
            $currentId = file_get_contents($idFile); // Lire l'ID actuel depuis le fichier

            // Incrémenter l'ID
            $nextId = $currentId + 1;

            // Écrire le nouvel ID dans le fichier
            file_put_contents($idFile, $nextId);

            return $nextId;
        }
        $newId = getNextId();

        $cheminFichier = "reponseQuestionnaire.txt";
        $fichier = fopen($cheminFichier, 'r+');
        if ($_POST) {
            $id = $newId;
            $sexe = $_POST["sexe"];
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
            /* $formDonneUtilisateur = array(
                "nom" => $nom,
                "prenom" => $prenom,
                "dateNaiss" => $dateNaiss,
                "mail" => $mail,
                "adresse" => $adresse,
                "etude" => $etude
            ); */
            /* liste des listes de préférences de l'utilisateur */
            /* $formDonnePreference = array(
                "reponseMusique" => $reponseMusique,
                "reponseSport" => $reponseSport,
                "reponseActivitesCulturelles" => $reponseActivitesCulturelles,
                "reponseActivitesOrganisees" => $reponseActivitesOrganisees,
                "reponseRestaurants" => $reponseRestaurants,
                "reponseSorties" => $reponseSorties
            ); */


            $concat ="$id|$sexe|$nom|$prenom|$dateNaiss|$mail|$adresse|$etude|$choixMoyenTransport|$reponseMusique|$reponseSport|$reponseActivitesCulturelles|$reponseActivitesOrganisees|$reponseRestaurants|$reponseSorties". PHP_EOL;

            file_put_contents($cheminFichier, $concat, FILE_APPEND);

            $affichage =  fread($fichier,filesize($cheminFichier));
            $bang = explode(" ", $affichage);
            foreach($bang as $el){
                echo "<br>";
                echo $el;
            }

        }
        
        
    ?>

<script src="siteWebDemo.js"></script>
</body>
</html>


