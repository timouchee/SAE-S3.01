<?php
//quelle page ?
if(isset($_GET["quelle_compte"]))
{
  //echo $_GET["quelle_page"]." ";
  switch ($_GET["quelle_compte"]) 
  {
    case 'user':
      include "switch_user.php";
      break;

    case 'admin':
      include "switch_admin.php";
      break;
    
    default:
      # cmettre un message d'erreur :/
      include "index.php";
      break;
  }
}
?>
