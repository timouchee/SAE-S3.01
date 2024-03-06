<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
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
    echo "<img id='image' src='$image'>";


    ?>
    
</body>
</html>