<?php
$doc = new DOMDocument();
$doc->load('bd'); // mettre le lien vers la bd

$query = $_POST['query'];
$suggestions = '';

// mettre à jour la recherche pour l'éléments voulu
if($query != ''){
  $continents = $doc->getElementsByTagName('continents');
  foreach ($continents as $continent) {
    $lesPays = $continent->getElementsByTagName('pays');
    foreach ($lesPays as $pays) {
      $nomPays = $pays->nodeValue;
      if (stripos($nomPays, $query) !== false) {
        $suggestions .= '<p>' . $nomPays . '</p>';
      }
    }
  }
}

echo $suggestions;
?>
