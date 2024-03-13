<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Detail d'un bon plan</title>
</head>
<body>

    <?php

  //Si on a participé à un bon plan :
if(isset($_GET['participation']) && $_GET['participation'] == 1)
{
    $participation = $_GET['participation'];
    //echo "$participation";
    //Afficher fenetre modale
    echo '<script type="text/javascript">
    // Attendre que la page soit chargée
    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionner la fenêtre modale par son ID
        let modal = document.getElementById("popUpParticipation");
            
        // Afficher la fenêtre modale
        modal.style.display = "block";

        // Fermer la fenêtre modale lorsque l utilisateur clique sur le bouton de fermeture
                let span = document.getElementById("fermer");
                span.onclick = function() {
                    modal.style.display = "none";
                }
    });
  </script>';
}

    include "header.php";

    //Connexion BD
    $bdd = "nconguisti_bd";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "nconguisti_bd";
    $pass = "nconguisti_bd";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
    $link->set_charset("utf8mb4");

    //Afichage base

    $idBonPlan = $_GET['idBonPlan'];

    $query="SELECT idBonPlan, libelleBonPlan, detail, adresseBonPlan, type, image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom
    FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
    WHERE b.idBonPlan = ?";

    $stmt = $link->prepare($query);
    $stmt->bind_param("s", $idBonPlan);
    $stmt->execute();
    $stmt->bind_result($idBonPlan, $libelleBonPlan, $detail, $adresseBonPlan, $type, $image, $dateOuverture, $dateFermeture, $heureOuverture, $heureFermeture, $nomVille, $codeCarteEtudiante, $nom, $prenom);
    $stmt->fetch();
    $stmt->close();

    //Partie code

    $heureOuverture = substr($heureOuverture,0,-3);
    $heureFermeture = substr($heureFermeture,0,-3);

    echo "<br>";

    echo "<div class='detailBonPlanContainer'>";

    echo "<h1>$libelleBonPlan</h1>";
    echo "<hr>";

    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
    echo "<div class='card-body'>";

    echo "<h5 class='card-title'>Par $nom $prenom</h5>";
    echo "<p class='card-text'>$heureOuverture h/$heureFermeture h</p>";
    echo "<hr>";
    echo "<p class='card-text'>$detail</p>";
    echo "<p class='card-text'>$adresseBonPlan</p>";
    echo "</div>";
    echo "</div>";

    echo "<br>";

    if(isset($_GET["quelle_compte"]) && $_GET["quelle_compte"]=='user')
    {

      if(isset($_GET['codeCarteEtudiante']))
      {
        $codeCarteEtudiante = $_GET['codeCarteEtudiante'];

        echo "<form action='insertions.php' method='post'>";
        echo "<input type='hidden' name='idUser' value='$codeCarteEtudiante'>";
        echo "<input type='hidden' name='idBonPlan' value='$idBonPlan'>";

        if(isset($_GET['participation']) && $_GET['participation'] == 1)
        {
          echo "<button class='but_admin_lst_rouge' style='width:330px' type='submit' name='Participation'>Annuler votre participation</button>";
        }
        else
        {
          echo "<button class='but_admin_lst' style='width:330px' type='submit' name='Participation'>Participer a cette activité</button>";
        }
      
        echo "</form>";
      }
        
    }
    else
    {
        echo "<a data-bs-toggle='modal' data-bs-target='#popUpConnection' class='but_admin_lst' style='width:330px' >Participer a cette activité</a>";
    }
    
    echo "<br>";

    echo "<hr>";


    echo "<h1>Commentaires</h1>";

    $queryCom="SELECT c.Message, c.note, u.prenom, u.nom
    FROM Utilisateur u
    JOIN Commentaire c ON c.codeCarteEtudiante = u.codeCarteEtudiante
    WHERE c.idBonPlan = ?";

    $stmt = $link->prepare($queryCom);
    $stmt->bind_param("s", $idBonPlan);
    $stmt->execute();
    $stmt->bind_result($Message, $note, $prenom, $nom);
    while ( $stmt->fetch())
    {
        echo "<div class='card' style='width: 25rem;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> $nom $prenom</h5>";
        echo "<hr>";
        echo "<p class='card-text'>$Message</p>";
        echo "<p class='card-text'>note : $note / 5 </p>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }


    $stmt->close();

    echo "<br>";

    if(isset($_GET['codeCarteEtudiante']))
    {
        $codeCarteEtudiante = $_GET['codeCarteEtudiante'];


        echo "<div class='alignerSaisie'>";
        echo "<div class='centered-horizontally'>";

        echo "<form action='insertions.php' method='post'>";
        echo "<input type='hidden' name='idUser' value='$codeCarteEtudiante'>";
        echo "<input type='hidden' name='idBonPlan' value='$idBonPlan'>";
        echo "<br><textarea name='message' placeholder='Commenter ici' rows='5' cols='50'></textarea><br>";


        echo "<label for='score'>Choisir une note</label>";

            echo "<select name='score' id='score'>";
            echo "<option value='1'>1</option>";
            echo "<option value='2'>2</option>";
            echo "<option value='3'>3</option>";
            echo "<option value='4'>4</option>";
            echo "<option value='5'>5</option>";

            echo "</select>";
        echo "<br>";

        echo "<button class='but_admin_lst' style='width:330px' type='submit' name='Commenter'>Commenter ce bon plan</button>";
        echo "</form>";

        echo "</div>";
        echo "</div>";

    }
    else
    {
        echo "<a data-bs-toggle='modal' data-bs-target='#popUpConnection' class='but_admin_lst' style='width:330px' >Commenter ce bon plan</a>";
    }


    ?>


<div class="modal" id="popUpParticipation" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Merci pour ta participation</h5>
      </div>
      <div class="modal-body">
        <p>N'oublie pas de commenter ce bon plan. <br> Bonne aventure !</p>
      </div>
      <div class="modal-footer">
        <button type="button" id='fermer' class="btn btn-primary">J'ai compris</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>