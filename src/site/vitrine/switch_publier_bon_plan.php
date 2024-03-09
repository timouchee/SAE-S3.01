<?php
include "header.php";
//quelle page ?
if(isset($_GET["publie_quoi"]))
{
  //echo $_GET["quelle_page"]." ";
  switch ($_GET["publie_quoi"]) 
  {
    case 'publier_activite':
        include "publier_activite.php";
        break;

    case 'publier_coloc':
        include "publier_coloc.php";
        break;
    
    case 'publier_covoit':
        include "publier_covoit.php";
        break;

    /* case 'publier_offre_emploi':
        include "recherchpublier_offre_emploi.php";
        break; */

    case 'publier_event':
        include "publier_event.php";     //créer switch pour différent type de publication
        break;
    
    case 'question':
        include "question.php";
        break;

    default:
      # cmettre un message d'erreur :/
      include "publier.php";   //page d'accueil
      break;
  }
}
?>