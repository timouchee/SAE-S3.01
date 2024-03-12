<?php if((isset($_GET["quelle_compte"]) && $_GET["quelle_compte"]=='user') || isset($_GET["publie_quoi"]))
{ 
  $connecter = true;
  ?>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <script src="script.js"></script>
  </head>
<?php } ?>
<!-- HEADER COMMUN-->


<!--navbar + dropdown >> mettre en place if else avec verif connection-->
  <nav class="navbar fixed-top" data-bs-theme="dark" style="background-color: rgba(0,2,3,255);">
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../vitrine/index.php"><img src="images/logo.jpg" alt="img logo"></a>
        <?php 
        if(isset($connecter)&&$connecter == true)
        {
          //connecter
          echo "<a href='deconnexion.php'  ><img src='images/icone_conected.png' height='40' width='40'> </a>";
          
        } 
        else
        {
          //pas connecter
          echo "<a data-bs-toggle='modal' data-bs-target='#popUpConnection' ><img src='images/icone-non-connect.png' height='40' width='40'> </a>";
        }  
          
          
          ?>

        

        
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: rgba(0,2,3,255);">
          <div class="offcanvas-header" style="flex-direction: row-reverse;">
            <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="titre.jpg" alt="img logo"></h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div> 
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../newsletter/newslater.php">Newsletter</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <strong>BonPlan</strong>
                </a>
                <?php if(isset($_GET["quelle_compte"]) && $_GET["quelle_compte"]=='user'){ ?>
                  <!-- envoie vers les bons liens -->
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Activités</a></li>
                      <li><a class="dropdown-item" href="#">Evénements</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li><a class="dropdown-item" href="#">Colocation</a></li>
                      <li><a class="dropdown-item" href="#">Covoiturage</a></li>
                      <li><a class="dropdown-item" href="#">Offre d'emploi</a></li>
                    </ul>
                    </li>
                    <li><hr class="nav-divider" style= "color:white;"/></li>
                    <li class="nav-item">
                      <a class="nav-link disabled" aria-disabled="true">Map</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="switch_publier_bon_plan.php?publie_quoi=default">Publier un Bon Plan</a>  <!--lien ver controleur + publier.php-->
                    </li>
                    <li><hr class="nav-divider" style= "color:white;"/></li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Historique</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Paramètres</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Se connecter</a>
                    </li> 
                <?php } else { ?>
                  <!-- envoie la pop up de connection -->
                  <ul class="dropdown-menu">                        
                      <li class="nav-item"><a class="dropdown-item nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Activités</a></li>
                      <li class="nav-item"><a class="dropdown-item nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Evénements</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li class="nav-item"><a class="dropdown-item nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Colocation</a></li>
                      <li class="nav-item"><a class="dropdown-item nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Covoiturage</a></li>
                      <li class="nav-item"><a class="dropdown-item nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Offre d'emploi</a></li>
                  </ul>
                  </li>
                  <li><hr class="nav-divider" style= "color:white;"/></li>
                  <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Map</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Publier un Bon Plan</a>
                  </li>
                  <li><hr class="nav-divider" style= "color:white;"/></li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Historique</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" data-bs-toggle="modal" data-bs-target="#popUpConnection">Paramètres</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#popUpConnection">Se connecter</a>
                  </li> 
                <?php } ?>

            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- /navbar + dropdown-->

    <!--pop up explicative-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Qu’est ce que 
        BonPlan&Co ?</strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p style="text-align: center;">Bon plan & co vous sert à trouver des bons plans à travers tout le BAB !</p>
        <p style="text-align: center;">Utilisez la barre de recherche et cherchez ce que vous voulez !

        Vous trouverez des activités, événement et des offres de covoiturage, colocation et d’offres d’emploi</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
        </div>
      </div>
    </div>
  </div>
  <!--/pop up explicative-->
 
  <!--pop up de connection >> à lier avec le bouton de connexion-->
  <div class="modal fade" id="popUpConnection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Connexion</strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="verifMDP.php" method="post">  <!--lien vers le script de vérification-->
            <label for="identifier">Mail de l'utilisateur:</label>
            <br>
            <input type="text" id="identifier" name="identifier" required>
            <br>
            <label for="password">Mot de passe:</label>
            <br>
            <input type="password" id="password" name="password" required>
            <?php 
            if (isset($_GET['pasBon'])){
              echo "<script>erreurRedMDP()</script>";
            }
            if (isset($_GET['utilisateurInexistant'])){
              echo "<script>erreurRedTout()</script>";
            }
            ?>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" >Se connecter</button>
            </div>
            <div>
              <a href="../questionnaire/siteWebDemo_utilisateur.php">Première connexion ?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <!-- /pop up de connection-->