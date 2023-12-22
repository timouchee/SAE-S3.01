<?php



$lst_musique_possible = array
(
    "pop",
    "rock",
    "jazz",
    "rap",
    "classique",
    "reggae",
    "electro",
    "blues",
    "country",
    "folk"
);

$lst_sport_possible = array
(
    "badminton",
    "football",
    "basketball",
    "tennis",
    "volleyball",
    "golf",
    "natation",
    "cyclisme",
    "escalade",
    "course à pied"
);


echo "<br>";
echo "<br>";


//ou cas ou 
/* 
function remplirListeTeste($lst_musique_possible,$lst_sport_possible) 
{
    $teste = array();

    for ($i = 0; $i < 10; $i++) 
    {
        $element = array();

        // Catégorie "musique"
        $musique = array("musique", array());
        $nbMusique = rand(1, 5);
        for ($j = 0; $j < $nbMusique; $j++) {
            $musique[1][] = $lst_musique_possible[array_rand($lst_musique_possible)];
        }

        // Catégorie "sport"
        $sport = array("sport", array());
        $nbSport = rand(1, 5);
        for ($j = 0; $j < $nbSport; $j++) {
            $sport[1][] = $lst_sport_possible[array_rand($lst_sport_possible)];
        }

        // Ajouter les catégories à l'élément
        $element[] = $musique;
        $element[] = $sport;

        // Ajouter l'élément à la liste
        $teste[] = $element;
    }

    return $teste;
}
 */

function remplirListeTeste($lst_musique_possible, $lst_sport_possible) 
{
    $teste = array();

    for ($i = 0; $i < 10; $i++) 
    {
        $element = array();

        // Catégorie "musique"
        $musique = array("musique", array());
        $ensembleMusique = array(); // Ensemble pour éviter les doublons
        $nbMusique = rand(1, 5);
        for ($j = 0; $j < $nbMusique; $j++) {
            $musiquePossible = array_diff($lst_musique_possible, $ensembleMusique);
            $musique[1][] = $musiquePossible[array_rand($musiquePossible)];
            $ensembleMusique[] = end($musique[1]); // Ajouter la dernière valeur à l'ensemble
        }

        // Catégorie "sport"
        $sport = array("sport", array());
        $ensembleSport = array(); // Ensemble pour éviter les doublons
        $nbSport = rand(1, 5);
        for ($j = 0; $j < $nbSport; $j++) {
            $sportPossible = array_diff($lst_sport_possible, $ensembleSport);
            $sport[1][] = $sportPossible[array_rand($sportPossible)];
            $ensembleSport[] = end($sport[1]); // Ajouter la dernière valeur à l'ensemble
        }

        // Ajouter les catégories à l'élément
        $element[] = $musique;
        $element[] = $sport;

        // Ajouter l'élément à la liste
        $teste[] = $element;
    }

    return $teste;
}
 
// Exemple d'utilisation
$lst_musique_possible = array("pop", "rock", "jazz", "rap", "classique", "reggae", "electro", "blues", "country", "folk");
$lst_sport_possible = array("badminton", "football", "basketball", "tennis", "volleyball", "golf", "natation", "cyclisme", "escalade", "course à pied");

$lst_rep_U = remplirListeTeste($lst_musique_possible, $lst_sport_possible);





// Exemple d'utilisation
$lst_rep_U = remplirListeTeste($lst_musique_possible,$lst_sport_possible);
//echo json_encode($lst_rep_U, JSON_PRETTY_PRINT);
//var_dump

echo "<br> les reponse utilisateur (il n'y a que musique et sport";
foreach ($lst_rep_U as $element) 
{
    echo '<ul>';
    foreach ($element as $categorie) {
        echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
    }
    echo '</ul>';
} 

$listePoids = array();

// Initialiser le tableau des listePoids à zéro
foreach ($lst_rep_U as $element) 
{
    foreach ($element as $item) 
    {
        $el_poids = 5;
        foreach ($item[1] as $elem) 
        {
            $indice = -1;
            $exite = false;
            foreach ($listePoids as $mini_elem) 
            //[ >["pop",5],["bad",2]  ]                  
            {     
                $indice++;
                //echo "elem : ".$elem."<br>";  
                //echo "mini elem  : ".$mini_elem[1]."<br>";
                if($mini_elem[0]==$elem)   
                {
                    $exite=true;
                    break;
                }  
            }
            if($exite == true)
            {
                $listePoids[$indice][1]+= $el_poids;

            }
            
            if($exite ==false)
            {
                array_push($listePoids, [$elem,$el_poids]);
            }
            $el_poids --;

            //echo $elem." ";
        }
    }
    //echo "<br>";
}

echo "<br>";
echo "<br>";


//print_r($listePoids);
/* foreach ($listePoids as $lst_elem)
{
    echo $lst_elem[0] . " de valeur : ".$lst_elem[1]."<br>";
} */


echo "voici la liste des poids dans l'ordre décroissant";
echo "<br>";
echo "<br>";



// Fonction de comparaison pour le tri
function comparerParValeurDecroissante($a, $b) {
    return $b[1] - $a[1];
}

// Trier la liste en fonction des valeurs numériques (descendant)
usort($listePoids, 'comparerParValeurDecroissante');

// Afficher la liste triée
foreach ($listePoids as $lst_elem)
{
    echo $lst_elem[0] . " de valeur : ".$lst_elem[1]."<br>";
}




function remplirListeAvecElementPrecis($lst_musique_possible, $lst_sport_possible, $elementPrecis) 
{
    $listeResultat = array();

    for ($i = 0; $i < 10; $i++) 
    {
        $element = array();

        // Catégorie "musique"
        $musique = array("musique", array());
        $ensembleMusique = array(); // Ensemble pour éviter les doublons
        $nbMusique = rand(1, 5);
        for ($j = 0; $j < $nbMusique; $j++) {
            $musiquePossible = array_diff($lst_musique_possible, $ensembleMusique);
            $musique[1][] = $musiquePossible[array_rand($musiquePossible)];
            $ensembleMusique[] = end($musique[1]); // Ajouter la dernière valeur à l'ensemble
        }

        // Catégorie "sport"
        $sport = array("sport", array());
        $ensembleSport = array(); // Ensemble pour éviter les doublons
        $nbSport = rand(1, 5);
        for ($j = 0; $j < $nbSport; $j++) {
            $sportPossible = array_diff($lst_sport_possible, $ensembleSport);
            $sport[1][] = $sportPossible[array_rand($sportPossible)];
            $ensembleSport[] = end($sport[1]); // Ajouter la dernière valeur à l'ensemble
        }

        // Ajouter les catégories à l'élément
        $element[] = $musique;
        $element[] = $sport;

        // Vérifier si l'élément précis est présent dans l'une des catégories
        $intersectionMusique = array_intersect($musique[1], [$elementPrecis]);
        $intersectionSport = array_intersect($sport[1], [$elementPrecis]);

        // Ajouter l'élément à $listeResultat si l'élément précis est présent
        if (!empty($intersectionMusique) || !empty($intersectionSport)) {
            $listeResultat[] = $element;
        }
    }

    return $listeResultat;
}

// Exemple d'utilisation avec "pop" comme élément précis
$elementPrecis = "pop";
$lst_rep_U = remplirListeAvecElementPrecis($lst_musique_possible, $lst_sport_possible, $elementPrecis);

// Afficher le résultat
echo "<br> les rep U trier <br>";
foreach ($lst_rep_U as $element) 
{
    echo '<ul>';
    foreach ($element as $categorie) {
        echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
    }
    echo '</ul>';
}






?>
