<?php

//Connexion BD
$bdd = "nconguisti_bd";
$host = "lakartxela.iutbayonne.univ-pau.fr";
$user = "nconguisti_bd";
$pass = "nconguisti_bd";
$link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
$link->set_charset("utf8mb4");


//Déclaration de toutes les fonctions d'insertions

function insertion_participation_bon_plan($idUser, $idBonPlan)
{
    $query="INSERT INTO PARTICIPER VALUES (?, ?)";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $idUser, $idBonPlan);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//$_POST['idUser'] && $_POST['idBonPlan']


//Récupération des POST
$true = false;
//L'utilisateur participe à une activité
if(isset($_POST['Participartion'])) {
    
    if($true)
    {
        echo "oui";
        $idUser = $_POST['idUser'];
        $idBonPlan = $_POST['idBonPlan'];
        insertion_participation_bon_plan($idUser, $idBonPlan);
        header("Location: ./detailBonPlan.php");
    }
    else
    {
        echo "non";
        header("Location: ./index.php");
    }
}
 


?>