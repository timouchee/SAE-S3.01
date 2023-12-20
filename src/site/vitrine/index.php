<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BonPlan&Co</title>
</head>
<body>
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
            <a href="../newslater/newslater.php" class="sidebar-button">newslater</a>
        </div>
    </div>
    
    
        
        </div>




    </header>

    <div>
        <input id="searchbar" type="text" name="search" placeholder="Quels événements cherchez-vous ?">
        <p style="text-align: center;">Événements recommandés pour vous</p>
    </div>

    <div id="popup-overlay"></div>

    <!-- Boîte de dialogue (popup) -->
    <div id="popup-container">
        <p>Êtes-vous connecté ?</p>
        <div id="popup-buttons">
            <button id="btn-oui">Oui</button>
            <button id="btn-non">Non</button>
        </div>
    </div>


    <div id="activité_body">

    </div>


      


    <script src="script.js"></script>

</body>
</html>