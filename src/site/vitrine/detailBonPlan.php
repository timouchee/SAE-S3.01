<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Detail d'un bon plan</title>
</head>
<body>

    <?php

    //Connexion BD
    $bdd = "nconguisti_bd";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "nconguisti_bd";
    $pass = "nconguisti_bd";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
    $link->set_charset("utf8mb4");

    //Afichage base
    $query="SELECT libelleBonPlan, detail, adresseBonPlan, 'type', image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, nomVille, codeCarteEtudiante
    FROM BonPlan
    WHERE idBonPlan = 001";
    $result = mysqli_query($link, $query);

    $data = mysqli_fetch_assoc($result);
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
        
    //Partie code

    echo "<h1>$libelleBonPlan</h1>";
    echo "<hr>";

    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>$libelleBonPlan</h5>";
    echo "<p class='card-text'>$detail</p>";
    echo "<a href='...' class='btn btn-primary'>Go somewhere</a>";
    echo "</div>";
    echo "</div>";

    
    ?>
    
</body>
</html>