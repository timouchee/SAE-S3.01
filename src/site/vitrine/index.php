<?php
//quelle page ?
if(isset($_GET["quelle_compte"])) 
{
  session_start();
  //echo $_GET["quelle_page"]." ";
  switch ($_GET["quelle_compte"]) 
  {
    case 'user':
      include "switch_user.php";
      break;

    case 'admin':
      //echo "2";
      include "switch_admin.php";
      break;
    
    default:
      # cmettre un message d'erreur :/
      //echo "3";
      if( isset($_GET["quelle_page"]) && $_GET["quelle_page"]=="detailBonPlan" )
      {
        include "detailBonPlan.php";
      }
      else
      {
        include "accueil.php";
      }
      break;
  }
}
else
{
  if( isset($_GET["quelle_page"]) && $_GET["quelle_page"]=="detailBonPlan" )
  {
    include "detailBonPlan.php";
  }
  else
  {
    include "accueil.php";
  }
}
?>

