<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <h2 style="text-align: center;">Page d'accueil</h2>
    <?php

        //Connexion BD
        $bdd = "nconguisti_bd";
        $host = "lakartxela.iutbayonne.univ-pau.fr";
        $user = "nconguisti_bd";
        $pass = "nconguisti_bd";

        $link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
        $link->set_charset("utf8mb4");

        //Afichage base
        $query="SELECT idBonPlan, libelleBonPlan, detail, adresseBonPlan, type, image, dateOuverture, dateFermeture, heureOuverture, heureFermeture, b.nomVille, b.codeCarteEtudiante, u.prenom, u.nom
        FROM BonPlan b JOIN Utilisateur u ON b.codeCarteEtudiante = u.codeCarteEtudiante
        ORDER BY type DESC";
        $result = mysqli_query($link, $query);
        $compteEvenement = 0;
        echo "<section id='listeBonsPlans'>";

        while ($data = mysqli_fetch_assoc($result))
        {
        $idBonPlan = $data["idBonPlan"];
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

        //Rectifiation des horaires (on enlève les secondes)
        $heureOuverture = substr($data["heureOuverture"],0,-3);
        $heureFermeture = substr($data["heureFermeture"],0,-3);

        if($type == "Activite")
        {
            echo "<a class='carte' href='detailBonPlan.php?$idBonPlan' >";
            echo "<div class='card' style='width: 20rem;'>";
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
            echo "<a class='carte' href='detailBonPlan.php?$idBonPlan' >";
            echo "<div class='card' style='width: 30rem;'>";
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
    ?>
</body>
</html>