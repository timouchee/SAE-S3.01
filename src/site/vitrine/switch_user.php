<?php
//quelle page ?
if(isset($_GET["quelle_page"]))
{
  //echo $_GET["quelle_page"]." ";
  switch ($_GET["quelle_page"]) 
  {
    case 'info_activite':
        include "info_activite.php";
        break;

    case 'recherche_coloc':
        include "recherche_coloc.php";
        break;
    
    case 'recherche_covoit':
        include "recherche_covoit.php";
        break;

    case 'recherche_offre_emploi':
        include "recherche_offre_emploi.php";
        break;

    case 'switch_publier_bon_plan':
        include "publier_bon_plan.php";     //créer switch pour différent type de publication
        break;
    
    case 'historique':
        include "historique.php";
        break;

    case 'param':
        include "param.php";
        break;

    default:
      # cmettre un message d'erreur :/
      include "pageUser.php";   //page d'accueil
      break;
  }
}
?>