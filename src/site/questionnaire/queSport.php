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
<!-- Question 2 -->
<div class="info-preference-container">
    <label for="reponseSport"><U>Question 2: Faites glisser les sports que vous voulez voir. Sélectionnez les par ordre de préférence</U></label><br>
    <div id="container2" class="zone-depot" ondrop="drop(event)"> 
        <div id="sport1" class="draggable sport" draggable="true" ondragstart="drag(event)">Football</div>
        <div id="sport2" class="draggable sport" draggable="true" ondragstart="drag(event)">Tennis</div>
        <div id="sport3" class="draggable sport" draggable="true" ondragstart="drag(event)">Pala</div>  
        <div id="sport4" class="draggable sport" draggable="true" ondragstart="drag(event)">Equitation</div>
        <div id="sport5" class="draggable sport" draggable="true" ondragstart="drag(event)">Badminton</div>
        <div id="sport6" class="draggable sport" draggable="true" ondragstart="drag(event)">Rugby</div>
        <div id="sport7" class="draggable sport" draggable="true" ondragstart="drag(event)">Tennis_de_table</div>
        <div id="sport8" class="draggable sport" draggable="true" ondragstart="drag(event)">Course_a_pieds</div>
        <div id="sport9" class="draggable sport" draggable="true" ondragstart="drag(event)">Athletisme</div>
        <div id="sport10" class="draggable sport" draggable="true" ondragstart="drag(event)">Basket</div>
        <div id="sport11" class="draggable sport" draggable="true" ondragstart="drag(event)">Handball</div>
        <div id="sport12" class="draggable sport" draggable="true" ondragstart="drag(event)">Esport</div>
    </div>
    <!-- Zone de dépôt des réponses glissantes -->
    <div class="reponses" > 
        <div id="zoneDepotSport1" class="zone-depot rep" ondrop="drop(event)">1</div>
        <div id="zoneDepotSport2" class="zone-depot rep" ondrop="drop(event)">2</div>
        <div id="zoneDepotSport3" class="zone-depot rep" ondrop="drop(event)">3</div>
        <div id="zoneDepotSport4" class="zone-depot rep" ondrop="drop(event)">4</div>
        <div id="zoneDepotSport5" class="zone-depot rep" ondrop="drop(event)">5</div>
    </div>
</div>