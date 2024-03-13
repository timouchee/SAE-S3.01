<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="script.js"></script>
    <title>BonPlan&Co</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

  <?php
  include "header.php";

    //Connexion BD
    $bdd = "nconguisti_bd";
    
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    //$host = "localhost";
    $user = "nconguisti_bd";
    //$user = "root";
    $pass = "nconguisti_bd";
    //$pass = "";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
    $link->set_charset("utf8mb4");

    //une autre connexion cette fois en PDO

    //if la dessus si le mec est connecter
    $connexion = new PDO("mysql:host=$host;dbname=$bdd", $user, $pass);

    $requete = $connexion->prepare("SELECT E.nom FROM Contenirelement C JOIN Elements E on E.idElement = C.idElement WHERE C.idProfilType = :idProfilType");    
    $id_user = "1";//le recup si le mec est connecter
    $requete->bindParam(':idProfilType', $id_user);
    $requete->execute();
    $les_element_persona_wanted = $requete->fetchAll(PDO::FETCH_COLUMN);
    //print_r($resultats);
    //echo " la : ".in_array("Cinema", $resultats)." ";
    //la j'ai toute les categorie d'element que l'utilisateur aime personnament
    //faut mtn changer la requete en bas pour prendre les bon plan 

 

    //Afichage base
    $query="SELECT idBonPlan, libelleBonPlan, detail, adresseBonPlan, type, image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom
    FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
    ORDER BY type DESC";
    $result = mysqli_query($link, $query);
    $compteEvenement = 0;

    //echo "<div class='center center_but'>";
    echo "<div id='container'>";
    echo "<input type='text' id='barre_de_recherche_bonplan' class='' placeholder='Recherche' oninput='trouver_bonplan()'>";
    echo "</div>";
    //echo "</div>";


    echo "<section id='listeBonsPlans'>";


    while ($data = mysqli_fetch_assoc($result))
    {
      /* if(in_array($data["un atribut a rajotuer dans bon plan"], $resultats) || mt_rand(1, 10)==1)
      {
        mettre tous le code dans le if
      } */
      $idBonPlan = $data["idBonPlan"];
      $libelleBonPlan = $data["libelleBonPlan"];
      $detail = $data["detail"];
      $adresseBonPlan = $data["adresseBonPlan"];
      $type = $data["type"];
      $image = $data["image"];
      $dateOuverture = $data["dateOuverture"];
      $dateFermeture = $data["dateFermeture"];
      $heureOuverture = substr($data["heureOuverture"],0,-3);
      $heureFermeture = substr($data["heureFermeture"],0,-3);
      $nomVille = $data["nomVille"];
      $codeCarteEtudiante = $data["codeCarteEtudiante"];
      $nom = $data["nom"];
      $prenom = $data["prenom"];

      //Partie code

      //Rectifiation des horaires (on enlève les secondes)
      $heureOuverture = substr($data["heureOuverture"],0,-3);
      $heureFermeture = substr($data["heureFermeture"],0,-3);

      if($type == "Activite")
      {

        if(isset($_GET["quelle_compte"]) && $_GET["quelle_compte"]=='user') {
          $codeCarte = $_GET['codeCarteEtudiante'];
          //$codeCarte = $_SESSION["codeCarteEtudiante"];
          echo "<a class='carte' href='index.php?quelle_compte=user&quelle_page=detailBonPlan&idBonPlan=$idBonPlan&codeCarteEtudiante=$codeCarte' >";
        }
        else {
          echo "<a class='carte' href='index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan' >";
        }

        echo "<div class='card' style='width: 90%;'>";
        echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$libelleBonPlan</h5>";
        echo "<p class='card-text'> Par $nom $prenom</p>";
        echo "<p class='card-text horaires'>$heureOuverture h / $heureFermeture h</p>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
      }

      if($type == "Evenement" && $compteEvenement < 1)
      {

        if(isset($_GET["quelle_compte"]) && $_GET["quelle_compte"]=='user') {
          $codeCarte = $_GET['codeCarteEtudiante'];
          echo "<a class='carte' href='index.php?quelle_compte=user&quelle_page=detailBonPlan&idBonPlan=$idBonPlan&codeCarteEtudiante=$codeCarte'>";
        }
        else {
          echo "<a class='carte' href='index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan' >";

        }
        echo "<div class='card' style='width: 90%;'>";
        echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$libelleBonPlan</h5>";
        echo "<p class='card-text'>$detail</p>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        $compteEvenement +=1;
      }
    }

    echo "</section>";

     $connexion = null;
    ?>

</body>
</html>