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

    include "header.php";



    //Connexion BD
    $bdd = "nconguisti_bd";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "nconguisti_bd";
    $pass = "nconguisti_bd";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
    $link->set_charset("utf8mb4");

    //Afichage base

    $query="SELECT libelleBonPlan, detail, adresseBonPlan, 'type', image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom, c.Message, c.note
    FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
    JOIN Commentaire c ON b.idBonPlan = c.idBonPlan
    WHERE b.idBonPlan = 001"; // 001 a changer pour l'id du bonplan en question

    $result = mysqli_query($link, $query);

    $data = mysqli_fetch_assoc($result);
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

    echo "<br>";
    echo "<div class='detailBonPlanContainer'>";

    echo "<h1>$libelleBonPlan</h1>";
    echo "<hr>";

    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='$image' alt='Card image cap'>";
    echo "<div class='card-body'>";

    echo "<h5 class='card-title'>Par $nom $prenom</h5>";
    echo "<p class='card-text'>$heureOuverture h/$heureFermeture h</p>";
    echo "</div>";
    echo "</div>";

    echo "<br>";

    echo "<div class='card' style='width: 18rem;'>";
    echo "<div class='card-body'>";
    echo "<p class='card-title'>$detail</p>";
    echo "</div>";
    echo "</div>";

    


    echo "<div class='card' style='width: 18rem;'>";
    echo "<div class='card-body'>";
    echo "<p class='card-title'>$adresseBonPlan</p>";

    echo "</div>";
    echo "</div>";

    echo "<br>";

    echo "<button class = 'but_user' style='width:330px'>Participer a cette activité!</button>";

    echo "<br>";

    echo "<h1>Commentaires</h1>";

    $queryCom="SELECT c.Message, c.note, u.prenom, u.nom
    FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
    JOIN Commentaire c ON b.idBonPlan = c.idBonPlan
    WHERE b.idBonPlan = 001"; // 001 a changer pour l'id du bonplan en question
    $resultatCom = mysqli_query($link, $queryCom);

    while ($data = mysqli_fetch_assoc($resultatCom))
    {
        $nom = $data["nom"];
        $prenom = $data["prenom"];
        $message = $data["Message"];
        $note = $data["note"];

      //Partie code
      echo "<p>$nom $prenom</p>";
      echo "<div class='card' style='width: 25rem;'>";
    echo "<div class='card-body'>";
    echo "<p class='card-title'>$message</p>";
    echo "<p class='card-title'>note : $note</p>";
    echo "</div>";
    echo "</div>";
 

    }

    
//azeazoeaozeo
    ?>
 
</body>
</html>