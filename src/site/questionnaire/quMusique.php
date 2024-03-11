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
<form action="quSport.php" method="post">
    <?php

        //print_r($_POST);
        echo "<span id='shadow_post'>";
        echo "<input type='text' id='title' value=".$_POST['title']." hidden>";
        echo "<input type='text' id='nom' value=".$_POST['nom']." hidden>";
        echo "<input type='text' id='prenom' value=".$_POST['prenom']." hidden>";
        echo "<input type='text' id='dateNaiss' value=".$_POST['dateNaiss']." hidden>";
        echo "<input type='text' id='mail' value=".$_POST['mail']." hidden>";
        echo "<input type='text' id='adresse' value=".$_POST['adresse']." hidden>";
        echo "<input type='text' id='etude' value=".$_POST['etude']." hidden>";
        echo "<input type='text' id='choixMoyenTransport' value=".$_POST['choixMoyenTransport']." hidden>";
        echo "</span>";
    ?>

        <!-- Partie Préférences -->
    <h2>Préférences</h2>
    <label for ="ordreimportance">L'ordre d'importance des musique va de 1 étant le plus haut et 5 le moins.</label><br>
    <!-- Question 1 -->
    <div class="info-preference-container">
    <label for="reponseMusique"><U>Question 1: Faites glisser les styles de musique que vous voulez voir. Sélectionnez les par ordre de préférence</U></label><br>
    <div id="container1" class="zone-depot" ondrop="drop(event)">
        <div id="musique1" class="draggable musique" draggable="true" data-id="element1" ondragstart="drag(event)">Jazz</div>
        <div id="musique2" class="draggable musique" draggable="true" data-id="element2" ondragstart="drag(event)">Pop</div>
        <div id="musique3" class="draggable musique" draggable="true" data-id="element3" ondragstart="drag(event)">Electro</div>
        <div id="musique4" class="draggable musique" draggable="true" data-id="element4" ondragstart="drag(event)">Rap</div>
        <div id="musique5" class="draggable musique" draggable="true" data-id="element5" ondragstart="drag(event)">Classique</div>
        <div id="musique6" class="draggable musique" draggable="true" data-id="element5" ondragstart="drag(event)">Rock</div>
        <div id="musique7" class="draggable musique" draggable="true" data-id="element5" ondragstart="drag(event)">Musiques_film</div>
        <div id="musique8" class="draggable musique" draggable="true" data-id="element5" ondragstart="drag(event)">Musiques_manga</div>
    </div>
    <!-- Zone de dépôt des réponses glissantes -->
    <div class="reponses">
        <div id="zoneDepotMusique1" class="zone-depot rep" ondrop="drop(event)">1</div>
        <div id="zoneDepotMusique2" class="zone-depot rep" ondrop="drop(event)">2</div>
        <div id="zoneDepotMusique3" class="zone-depot rep" ondrop="drop(event)">3</div>
        <div id="zoneDepotMusique4" class="zone-depot rep" ondrop="drop(event)">4</div>
        <div id="zoneDepotMusique5" class="zone-depot rep" ondrop="drop(event)">5</div>
    </div>
    <button type="submit">Soumettre</button>
</form>