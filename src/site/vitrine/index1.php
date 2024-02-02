<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>BonPlan&Co</title>
</head>
<body>
<!--bandeau du haut-->
<header>

        <div class="div1">
            <div class="div2">
            <div id="mySidenav" class="sidenav">
            <a id="closeBtn" href="#" class="close">&times;</a>
            <ul>
                <li><a href="#">Acceuil</a></li>
                <li><a href="#">Evénements</a></li>
                <li><a href="#">Activités</a></li>
                <li><a href="#">Colocations</a></li>
                <li><a href="#">Covoiturage</a></li>
                <li><a href="#">Offres d'emploie</a></li>
                <li><a href="#">La map</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#">Publier un Bon plan</a></li>
                <li><a href="unendroit">Paramètres</a></li>
            </ul>
            <div><p>Version 5.311</p></div>
            </div>
            
            <a href="#" id="openBtn">
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span> 
            </a> 
        </div>
        <div class="div3">
            <img src="titre.jpg" alt="Image centrée">
            <a href="../newsletter/newslater.php" class="sidebar-button">newsletter</a> <!-- lien vers les newsletter à mettre en bas de la page -->
        </div>
    </div>
</header>

<div>
    <input id="searchbar" type="text" name="search" placeholder="Quels événements cherchez-vous ?">
    <div id="suggestions"></div>
    <script src="barre_recherche_Principale.js"></script>
    <p style="text-align: center;"><strong>Événements recommandés pour vous</strong></p>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="popup-overlay"></div>

<div id="popup-container1">
    <p style="text-align: center;"><strong>Qu’est ce que 
        BonPlan&Co ?</strong></p>
        <!--ajouter texte maquette pop up de compréhension-->
        <p style="text-align: center;">Bon plan & co vous sert à trouver des bons plans à travers tout le BAB !</p>
        <p style="text-align: center;">Utilisez la barre de recherche et cherchez ce que vous voulez !

Vous trouverez des activités, événement et des offres de covoiturage, colocation et d’offres d’emploi</p>
        <div id="popup-buttons" >
            <!--à centrer-->
            <button id="btn-oui" style="text-align: center; align-items: center">J'ai compris</button>
        </div>
    </div>
<!-- ATTENTION div pas pris en compte du au js qui renvoie direct sur la page principale -->
<!-- Boîte de dialogue (popup) (à faire de manière  auto à l'avenir) -->
<div id="popup-container2">
    <p>Êtes-vous connecté ?</p>
    <div id="popup-buttons">
        <input type="text" name="identifiant" id="identifiant" placeholder= "Identifiant">
        
        <input type="password" name="psw" id="psw_user" placeholder= "Mot de passe">
        
        <button id="btn_se_co">Se connecter</button> <!-- lien vers la page principale après vérif et dégage la pop up-->
        <button id="btn_premiere_co">Première connexion</button> <!-- lien vers le formulaire (siteWebDemo_utilisateur.php) -->
    </div>
</div>
    
    
    <div id="activité_body">
        <!-- récupère persona + activité en lien avec persona -->
    </div>
    
    <script src="script1.js"></script>

</body>
</html>