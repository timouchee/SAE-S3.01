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

        </div>
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

            <!-- Question 3 -->
            <div class="info-preference-container">
                <label for="reponseActivitesCulturelles"><U>Question 3: Faites glisser les activités culturelles que vous voulez voir. Sélectionnez les par ordre de préférence</U></label><br>

                <div id="container3" class="zone-depot" ondrop="drop(event)">
                    <div id="culture1" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Cinéma</div>
                    <div id="culture2" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Theatre</div>
                    <div id="culture3" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Musee</div>
                    <div id="culture4" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Zoo</div>
                    <div id="culture5" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Visite_guidee</div>
                    <div id="culture6" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Galerie_art</div>
                    <div id="culture7" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Mediatheque</div>
                    <div id="culture8" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Corrida</div>
                    <div id="culture9" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Lecture</div>
                    <div id="culture10" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Voyage</div>
                    <div id="culture11" class="draggable actCultur" draggable="true" ondragstart="drag(event)">Numerique</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div class="reponses" > 
                    <div id="zoneDepotActCultur1" class="zone-depot rep" ondrop="drop(event)">1</div>
                    <div id="zoneDepotActCultur2" class="zone-depot rep" ondrop="drop(event)">2</div>
                    <div id="zoneDepotActCultur3" class="zone-depot rep" ondrop="drop(event)">3</div>
                    <div id="zoneDepotActCultur4" class="zone-depot rep" ondrop="drop(event)">4</div>
                    <div id="zoneDepotActCultur5" class="zone-depot rep" ondrop="drop(event)">5</div>
                </div>

            </div>

            <!-- Question 4 -->
            <div class="info-preference-container">
                <label for="reponseActivitesOrganisees"><U>Question 4: Faites glisser les activités organisées que vous voulez voir. Sélectionnez les par ordre de préférence</U></label><br>
                <div id="container4" class="zone-depot" ondrop="drop(event)">
                    <div id="orga1" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Tournoi de jeux vidéos</div>
                    <div id="orga2" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Loup_garoup</div>
                    <div id="orga3" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Uno</div>
                    <div id="orga4" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Cricket</div>
                    <div id="orga5" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Bowling</div>
                    <div id="orga6" class="draggable actOrg" draggable="true" ondragstart="drag(event)">Plage</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div class="reponses" > 
                    <div id="zoneDepotActOrga1" class="zone-depot rep" ondrop="drop(event)">1</div>
                    <div id="zoneDepotActOrga2" class="zone-depot rep" ondrop="drop(event)">2</div>
                    <div id="zoneDepotActOrga3" class="zone-depot rep" ondrop="drop(event)">3</div>
                    <div id="zoneDepotActOrga4" class="zone-depot rep" ondrop="drop(event)">4</div>
                    <div id="zoneDepotActOrga5" class="zone-depot rep" ondrop="drop(event)">5</div>
                </div>
    
            </div>

            <!-- Question 5 -->
            <div class="info-preference-container">
                <label for="reponseRestaurants"><U>Question 5: Faites glisser les types de restaurants que vous voulez voir. Sélectionnez les par ordre de préférence</U></label><br>
                <div id="container5" class="zone-depot" ondrop="drop(event)">
                    <div id="resto1" class="draggable resto" draggable="true" ondragstart="drag(event)">Fast food</div>
                    <div id="resto2" class="draggable resto" draggable="true" ondragstart="drag(event)">Junk_food</div>
                    <div id="resto3" class="draggable resto" draggable="true" ondragstart="drag(event)">Pizzeria</div>
                    <div id="resto4" class="draggable resto" draggable="true" ondragstart="drag(event)">Sushis</div>
                    <div id="resto5" class="draggable resto" draggable="true" ondragstart="drag(event)">Restaurant_traditionnel</div>
                    <div id="resto6" class="draggable resto" draggable="true" ondragstart="drag(event)">Restaurants_du_monde</div>
                    <div id="resto7" class="draggable resto" draggable="true" ondragstart="drag(event)">Restaurants_vegetariens</div>
                </div>
                <!-- Zone de dépôt des réponses glissantes -->
                <div class="reponses" > 
                    <div id="zoneDepotResto1" class="zone-depot rep" ondrop="drop(event)">1</div>
                    <div id="zoneDepotResto2" class="zone-depot rep" ondrop="drop(event)">2</div>
                    <div id="zoneDepotResto3" class="zone-depot rep" ondrop="drop(event)">3</div>
                    <div id="zoneDepotResto4" class="zone-depot rep" ondrop="drop(event)">4</div>
                    <div id="zoneDepotResto5" class="zone-depot rep" ondrop="drop(event)">5</div>
                </div>

            </div>
            <!-- <input type="submit" value="Soumettre"> -->
            <button onClick="submit_le_tout()">soumetre</button>
</div>
<!-- </form> -->


<script src="siteWebDemo.js"></script>
</body>
</html>


