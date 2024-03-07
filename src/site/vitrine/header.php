

<!-- HEADER COMMUN-->


<!--navbar + dropdown >> mettre en place if else avec verif connection-->
  <nav class="navbar fixed-top" data-bs-theme="dark" style="background-color: rgba(0,2,3,255);">
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../vitrine/index.php"><img src="images/logo.jpg" alt="img logo"></a>
        <a data-bs-toggle="modal" data-bs-target="#popUpConnection"' ><img src='images/icone-non-connect.png' height='40' width='40'> </a>
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
                <a class="nav-link" href="#">Publier un Bon Plan</a>
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
  <div class="modal fade" id="popUpConnection" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <?php 
            if (isset($_GET['pasBon'])){
              echo "document.getElementById('identifier').style.borderColor = 'black'";
              echo "document.getElementById('password').style.borderColor = 'red'";
            }
            if (isset($_GET['utilisateurInexistant'])){
              echo "document.getElementById('identifier').style.borderColor = 'red'";
              echo "document.getElementById('password').style.borderColor = 'red'";
            }
            ?>
            <input type="text" id="identifier" name="identifier" required>
            <br>
            <label for="password">Mot de passe:</label>
            <br>
            <input type="password" id="password" name="password" required>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
  <!-- /pop up de connection-->