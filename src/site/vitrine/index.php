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
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>BonPlan&Co</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

  <?php

  include "header.php";

    //Connexion BD
    $bdd = "nconguisti_bd";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "nconguisti_bd";
    $pass = "nconguisti_bd";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
    $link->set_charset("utf8mb4");

    //Afichage base
    $query="SELECT libelleBonPlan, detail, adresseBonPlan, 'type', image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom
    FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante";
    //WHERE idBonPlan = 001
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);

    while ($data = mysqli_fetch_assoc($result))
    {
      $libelleBonPlan = $data["libelleBonPlan"];
      $detail = $data["detail"];
      $adresseBonPlan = $data["adresseBonPlan"];
      $type = $data["type"];
      $image = $data["image"];
      $dateOuverture = $data["dateOuverture"];
      $dateFermeture = $data["dateFermeture"];
      $heureOuverture = $data["heureOuverture"];
      $heureFermeture = $data["heureFermeture"];
      $nomVille = $data["nomVille"];
      $codeCarteEtudiante = $data["codeCarteEtudiante"];
      $nom = $data["nom"];
      $prenom = $data["prenom"];

      //Partie code
      echo "<div class='card' style='width: 18rem;'>";
      echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>$libelleBonPlan</h5>";
      echo "<p class='card-text'>$detail</p>";
      echo "<a href='...' class='btn btn-primary'>Go somewhere</a>";
      echo "</div>";
      echo "</div>";

    }

    
    ?>

</body>

<script>
  //apparition auto pop up exmplicative
  document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    myModal.show();
  });
</script>
<script src="script.js"></script>

</html>