<?php
//Le nom du fichier
$nomFichier = $_GET['image'];

header('Content-type: image/jpeg');

list($width,$height) = getimagesize($nomFichier);

$newWidth = 250;   //Largeur finale de l'image qui peut être changer en fonction des besoins
$newHeight = 250;   //Hauteur finale de l'image qui peut être changer en fonction des besoins

$newImage = imagecreatetruecolor($newWidth, $newHeight);
$image = imagecreatefromjpeg($nomFichier);

//Récupération de la plus petite dimension entre la longueur et la largeur
$size = min($width, $height);

//Calcule des coordonnées du point de départ du rognage pour centrer l'image
$startX = ($width - $size) / 2;
$startY = ($height - $size) / 2;

//Rognage de l'image en carré en partant du centre
$cropped_image = imagecrop($image, ['x' => $startX, 'y' => $startY, 'width' => $size, 'height' => $size]);

imagecopyresampled($newImage, $cropped_image, 0, 0, 0, 0, $newWidth, $newHeight, $size, $size);

imagejpeg($newImage, null, 100);

imagedestroy($cropped_image);
imagedestroy($newImage);
?>

