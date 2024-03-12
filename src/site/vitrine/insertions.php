<?php

//Connexion BD

$bdd = "nconguisti_bd";
$host = "lakartxela.iutbayonne.univ-pau.fr";
$user = "nconguisti_bd";
$pass = "nconguisti_bd";
$link = mysqli_connect($host, $user, $pass, $bdd) or die("connexion impossible");
$link->set_charset("utf8mb4");


//Déclaration de toutes les fonctions d'insertions

function insertion_participation_bon_plan($link, $idUser, $idBonPlan)
{
    $query="INSERT INTO Participer VALUES (?, ?, DEFAULT)";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "ii", $idUser, $idBonPlan);
        if(!(mysqli_stmt_execute($stmt)))
        {
            header("Location: ./index.php");
        }
        mysqli_stmt_close($stmt);
        return $participation = true;
    }
    else
    { 
        header("Location: index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan");
        return $participation = false;
    }
}

function insertion_commenter_bon_plan($link, $idUser, $idBonPlan)
{
    $score = $_POST["score"];
    $msg = $_POST["message"];
    var_dump($msg);
    $query="INSERT INTO Commentaire VALUES (DEFAULT, ?,?,?,?)";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "siii",$msg,$score, $idUser, $idBonPlan);
        if(!(mysqli_stmt_execute($stmt)))
        {
            header("Location: ./index.php");
        }
        mysqli_stmt_close($stmt);
    }
    else
    {
        header("Location: index.php?quelle_compte=user&quelle_page=detailBonPlan&idBonPlan=$idBonPlan&codeCarteEtudiante=$idUser");
    }
}

//L'utilisateur participe à un bon plan
if(isset($_POST['Participation'])) {
    
    if($_POST['idBonPlan'] && $_POST['idUser'])
    {
        $idUser = $_POST['idUser'];
        $idBonPlan = $_POST['idBonPlan'];
        $participation = insertion_participation_bon_plan($link, $idUser, $idBonPlan);
        header("Location: index.php?quelle_compte=user&quelle_page=detailBonPlan&idBonPlan=$idBonPlan&participation=$participation&codeCarteEtudiante=$idUser");
    }
    else
    {
        header("Location: index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan");
    }
}

//L'utilisateur commente un bon plan
if(isset($_POST['Commenter'])) {
    
    if($_POST['idBonPlan'] && $_POST['idUser'])
    {
        $idUser = $_POST['idUser'];
        $idBonPlan = $_POST['idBonPlan'];
        $participation = 0;
        insertion_commenter_bon_plan($link, $idUser, $idBonPlan);
        header("Location: index.php?quelle_compte=user&quelle_page=detailBonPlan&idBonPlan=$idBonPlan&participation=$participation&codeCarteEtudiante=$idUser");
    }
    else
    {
        header("Location: index.php?quelle_page=detailBonPlan&idBonPlan=$idBonPlan");
    }
}
?>