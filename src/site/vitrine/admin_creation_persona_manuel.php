<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <p id='title_up'>Création de profils types manuelle</p>
        
    <div id='barre_noire_fine_expand'></div>
    <br>
    <form action="index.php" method="get">  
        <input hidden type="text" name="quelle_page"  value="admin_accueil">
        <input hidden type="text" name="quelle_compte"  value="admin" hidden>
        <button type="submit" class="but_user but_retour_barre_recherche center_but"  >Retour</button>
    </form>

<?php

 


 $serveur = "lakartxela.iutbayonne.univ-pau.fr";
 $nomUtilisateur = "nconguisti_bd";
 $motDePasse = "nconguisti_bd";
 $nomBaseDeDonnees = "nconguisti_bd";
 $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $nomUtilisateur, $motDePasse);



/**
 * @brief Classe représentant un singleton qui contient les toutes réponses des utilisateurs
 * 
 */
class lst_reponse_utilisateur 
{
    private static $instance;
    private function __construct()
    {}
    public static function getInstance()
    {
        if (self::$instance === null) {
            // Créer une nouvelle instance si elle n'existe pas encore
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * @var array $lst_rep_user Tableau contenant les réponses utilisateur.
     */
    public $lst_rep_user = array();

    /**
     * @brief Obtient la liste des réponses utilisateur.
     * @return array La liste des réponses utilisateur.
     */
    public function get_lst_rep_user()
    {
        return $this->lst_rep_user;
    }
        
    /**
     * @brief Remplit la liste des réponses utilisateur avec des éléments aléatoires.
     * @param array $liste_liste_elem_categorie Tableau contenant des listes d'éléments par catégorie.
     * @param int $nb_reponse_creer Nombre de réponses à créer (par défaut 10).
     * @return array La liste des réponses utilisateur remplie.
     */
    function remplirListeReponseUser($liste_liste_elem_categorie, $nb_reponse_creer = 10) 
    {
        $nb_reponse_voulu = $nb_reponse_creer;
        $liste_categorie = ["musique","sport","culture","activitees","restaurants","soirees"];
        $taille = sizeof($liste_liste_elem_categorie);

        for ($i = 0; $i < $nb_reponse_voulu; $i++) 
        {
            $element = array();
            for ($p = 0; $p < $taille; $p++) 
            {               
                // par exemple, catégorie "musique"
                $lst_cat = array($liste_categorie[$p], array());
                $ensembleEl = array(); // Ensemble pour éviter les doublons
                $nbel = rand(0,  5 );
                $possible_elements = $liste_liste_elem_categorie[$p];
                for ($j = 0; $j < $nbel; $j++) 
                {
                    $musiquePossible = array_diff($possible_elements, $ensembleEl);
                    $rajout = $musiquePossible[array_rand($musiquePossible)];
                    $lst_cat[1][] = $rajout;
                    $ensembleEl[] = $rajout;
                }
                $element[] = $lst_cat;
            }
          
            // Ajouter l'élément à la liste
            $this->lst_rep_user[] = $element;
        }

        return $this->lst_rep_user;
    }

    /**
     * @brief Affiche les réponses utilisateur sous forme de texte.
     */
    public function toString()
    {
        echo "<br> <h1> <center> Réponses des utilisateurs </center></h1>";
        foreach ($this->lst_rep_user as $element) 
        {
            echo "<table class='table table-dark table-bordered'>";
            foreach ($element as $categorie)
            {
                echo "<tr>";
                echo "<td>".$categorie[0]."</td>";
                $compt = 5;
                foreach ($categorie[1] as $elem)
                {
                    $compt --;
                    echo "<td>".$elem."</td>";
                }
                for ($i=$compt; $i >0 ; $i--) 
                { 
                    echo "<td></td>";
                }

                echo    "</tr>";
            }
            echo "</table>";
            
        } 
    }

    /**
     * @brief Ajoute une réponse en dur à la liste.
     * @param array $rep La réponse à ajouter.
     */
    public function ajouter1_reponse_en_dur($rep)
    {
        $this->lst_rep_user[] = $rep;
    }

    /**
     * @brief Ajoute une liste de réponses en dur à la liste.
     * @param array $lst_rep Liste des réponses à ajouter.
     */
    public function ajouter_liste_reponse_en_dur($lst_rep)
    {
        foreach($lst_rep as $une_rep)
        {
            $this->ajouter1_reponse_en_dur($une_rep);
        }
    }
}

/**
 * @brief Classe représentant une liste de poids associés à des éléments.
 */
class Liste_poids 
{
    private static $instance;
    private static $lst_rep_user;
    private function __construct()
    {}
    //singleton
    public static function getInstance()
    {
        if (self::$instance === null) {
            // Créer une nouvelle instance si elle n'existe pas encore
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * @var array $listePoids Tableau contenant les poids associés aux éléments.
     */
    public $listePoids = array();

    /**
     * @brief Obtient la liste des poids.
     * @return array La liste des poids associés aux éléments.
     */
    public function get_lst_poids()
    {
        return $this->listePoids;
    }

    /**
     * @brief Remplit la liste des poids à partir d'une liste de réponses utilisateur.
     * @param array $lst_rep_user Liste des réponses utilisateur.
     */
    public function remplir_lst_poids($lst_rep_user)
    {
        foreach ($lst_rep_user as $element) 
        {
            foreach ($element as $item) 
            {
                $el_poids = 5;
                foreach ($item[1] as $elem) 
                {
                    $indice = -1;
                    $existe = false;
                    foreach ($this->listePoids as $mini_elem) 
                    {     
                        $indice++;
                        if ($mini_elem[0] == $elem)   
                        {
                            $existe = true;
                            break;
                        }  
                    }
                    if ($existe == true)
                    {
                        $this->listePoids[$indice][1] += $el_poids;
                    }
                    
                    if ($existe == false)
                    {
                        array_push($this->listePoids, [$elem, $el_poids]);
                    }
                    $el_poids--;

                }
            }
        } 
    }

    /**
     * @brief Fonction de comparaison pour le tri descendant des poids.
     * @param array $a Premier élément à comparer.
     * @param array $b Deuxième élément à comparer.
     * @return int Résultat de la comparaison.
     */
    public function comparerParValeurDecroissante($a, $b) {
        return $b[1] - $a[1];
    }

    /**
     * @brief Trie la liste des poids de manière décroissante.
     */
    public function trier_decroissant_lst_poid()
    {
        usort($this->listePoids, array($this, 'comparerParValeurDecroissante'));
    }
    
    /**
     * @brief Affiche la liste des poids dans l'ordre décroissant.
     */
    public function toString()
    {
        echo "<br> <br> <h2> <center> Liste des éléments pondérés (liste des poids) </center> </h2>  <br>";
        // Afficher la liste triée
        /* foreach ($this->listePoids as $lst_elem)
        {
            echo $lst_elem[0] . " de valeur : ".$lst_elem[1]."<br>";
        } */
        echo "<table class='table table-dark table-bordered'>";
        echo "<th> nom de l'élément </th>";
        echo "<th> Poids de l'élément </th>";
        foreach ($this->listePoids as $lst_elem)
        {
            echo "<tr>";
            echo "<td>".$lst_elem[0]."</td>";
            echo "<td>".$lst_elem[1]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}


/**
 * @brief Classe représentant une réponse utilisateur réduite, filtrée par un élément spécifique.
 */
class Element_pref_choisi_par_utilisateur
{
    private static $instance;
    private function __construct()
    {}
    //singleton
    public static function getInstance()
    {
        if (self::$instance === null) {
            // Créer une nouvelle instance si elle n'existe pas encore
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * @var array $res Tableau contenant la réponse utilisateur réduite.
     */
    public $liste_reponse_reduite;

    /**
     * @var mixed $titre_prochain_profil_type Élément spécifique utilisé pour le filtrage.
     */
    public $titre_prochain_profil_type;

    /**
     * @brief Obtient la liste des réponses utilisateur réduites.
     * @return array La liste des réponses utilisateur réduites.
     */
    public function get_lst_rep_reduite_user()
    {
        return $this->liste_reponse_reduite;
    }

    /**
     * @brief Filtre les réponses utilisateur pour ne conserver que celles contenant un élément précis.
     * @param array $lst_rep_user Liste des réponses utilisateur.
     * @param mixed $elementPrecis Élément précis à rechercher dans les réponses.
     * @return array La liste des réponses utilisateur réduites.
     */
    public function creer_la_liste_reduite_elem($liste_reponse_reduite, $elementPrecis)
    {
        $this->titre_prochain_profil_type = $elementPrecis; 
        $this->liste_reponse_reduite = $liste_reponse_reduite;
        $compteur_1reponse = -1;
        foreach ($this->liste_reponse_reduite as $une_rep)
        {
            $compteur_1reponse++;
            $trouver = false;
            foreach ($une_rep as $categorie)
            {
                foreach ($categorie[1] as $elem)
                {   
                    if ($elem === $elementPrecis)
                    {
                        $trouver = true;
                        break;
                    }
                }
                if ($trouver)
                {
                    break;
                }
            }
            if (!$trouver)
            {
                unset($this->liste_reponse_reduite[$compteur_1reponse]);
            }
        } 
        return $this->liste_reponse_reduite;
    }

    /**
     * @brief Affiche les réponses utilisateur triées pour un élément spécifique.
     */
    public function toString()
    {
        echo "<br> <h2> Les réponses des utilisateurs triées selon l'élément : ". $this->titre_prochain_profil_type." </h2> <br>";
        foreach ($this->liste_reponse_reduite as $element) 
        {
            echo '<ul>';
            foreach ($element as $categorie) {
                echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
            }
            echo '</ul>';
        }
    }
}

/**
 * @brief Classe représentant un profil utilisateur (persona) basé sur les réponses utilisateur.
 */
class Profil_type
{
    public $rep = [ ["musique",[]],["sport",[]],["culture",[]],["activitees",[]],["restaurants",[]],["soirees",[]] ]; 
    public $lst_poid_totale = [] ;
    private static $liste_reponse_reduite;


    public function get_rep() 
    {
        return $this->rep;
    }

    /**
     * @brief Crée le profil d'un utilisateur (persona) en fonction des réponses utilisateur.
     * @param array $lst_rep_user Liste des réponses utilisateur.
     * @return array Le profil de l'utilisateur (persona) sous forme de tableau.
     */
    public function profil_type_creer($liste_reponse_reduite) 
    {
        foreach ($liste_reponse_reduite as $element) 
        {   // Pour chaque réponse utilisateur
            $compteur_categorie = -1;
            foreach ($element as $categorie) 
            {   // Pour chaque catégorie dans une réponse utilisateur
                $compteur_categorie++;
                $place = 6;
                foreach ($categorie[1] as $elem) 
                {   // Pour chaque élément dans une catégorie
                    $place--;
                    // Vérifier si l'élément existe déjà dans $rep
                    $compt_emplace_preference = -1;
                    $existe = false;
                    foreach ($this->rep as $preference)
                    {   // Pour chaque préférence dans la liste des préférences
                        $compt_emplace_preference++;
                        if ($preference[0] == $categorie[0])
                        {
                            $compt_emplace_elem = -1;
                            foreach ($preference[1] as $mini_lst_elem)
                            {   // Pour chaque élément dans la liste d'éléments
                                $compt_emplace_elem++;
                                if ($mini_lst_elem[0] == $elem)
                                {
                                    $this->rep[$compt_emplace_preference][1][$compt_emplace_elem][1] += $place;
                                    $existe = true;
                                }
                            }
                        }
                    }
                    if ($existe == false)
                    {
                        // Ajouter l'élément à la catégorie actuelle
                        array_push($this->rep[$compteur_categorie][1], [$elem, $place, 0]);
                    }
                }
            }
        }
        return $this->rep;
    }
    
    
    /**
     * @brief Affiche les informations de l'étape 0 pour la création du profil utilisateur (persona).
     * @param bool $affiche Indique si les informations doivent être affichées (par défaut false).
     */
    public function calculer_effectif_total($affiche = false)
    {
        if ($affiche == true) {
            echo "liste des réponses utilisateur pour persona : <br>";
        }

        $indic_cat = -1;
        foreach ($this->rep as $categorie) 
        {
            $indic_cat++;
            if ($affiche == true) {
                echo $categorie[0] . " :\n";
            }

            if (!empty($categorie[1])) 
            {
                // Compteur de poids total
                foreach ($categorie[1] as $element) 
                {
                    if ($affiche == true) {
                        echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";
                    }
                    if (isset($this->lst_poid_totale[$indic_cat]))
                    {
                        $this->lst_poid_totale[$indic_cat] += $element[1];
                    }
                    else
                    {
                        array_push($this->lst_poid_totale, $element[1]);
                    }

                }
            } 
            else 
            {
                if ($affiche == true) {
                    echo "  (Aucun élément)\n";
                }
            }

            if ($affiche == true) {
                echo "\n <br>";
            }
        }
        if ($affiche == true) {
            echo "<br>";
            echo "<br>";
        }
    }


    /**
     * @brief Affiche les informations de l'étape 1 pour la création du profil utilisateur (persona).
     * @param bool $affiche Indique si les informations doivent être affichées (par défaut false).
     */
    public function affectation_pourcentage($affiche = false)
    {
        if ($affiche == true) {
            echo "Maintenant avec le calcul des pourcentages arrondis à 2 chiffres après la virgule.<br>";
        }

        $compteur_categorie = -1;
        foreach ($this->rep as $categorie) 
        {   // Pour chaque catégorie
            $compteur_categorie++;
            if (!empty($categorie[1])) 
            {
                $compteur_emplacement_elem = -1;
                foreach ($categorie[1] as $element) 
                {   // Pour chaque élément dans la mini liste d'éléments
                    $compteur_emplacement_elem++;
                    // Calculer le pourcentage arrondi à 2 chiffres après la virgule
                    $this->rep[$compteur_categorie][1][$compteur_emplacement_elem][2] = round((($element[1]/$this->lst_poid_totale[$compteur_categorie])*100), 2);    
                }
            } 
        }

        // Afficher les résultats
        if ($affiche == true)
        {
            foreach ($this->rep as $categorie) 
            {
                echo $categorie[0] . " :\n";
                
                if (!empty($categorie[1])) 
                {
                    foreach ($categorie[1] as $element) 
                    {
                        echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";
                    }
                } 
                else 
                {
                    echo "  (Aucun élément)\n";
                }
                
                echo "\n <br>";
            }  
        }
    }

    
    /**
     * @brief Fonction de comparaison pour trier un tableau par la troisième valeur (pourcentage) dans l'ordre décroissant.
     * @param mixed $a Premier élément à comparer.
     * @param mixed $b Deuxième élément à comparer.
     * @return int Résultat de la comparaison (positif si $a est plus grand, négatif si $b est plus grand, 0 si égaux).
     */
    function comparaison_pourcentage($a, $b) {
        return $b[2] - $a[2];
    }


    /**
     * @brief Trie les éléments de chaque catégorie par la troisième valeur dans l'ordre décroissant.
     */
    public function trier_decroissant()
    {
        // Parcours des données pour trier les éléments
        foreach ($this->rep as &$category) {
            // Tri des sous-tableaux par la troisième valeur dans l'ordre décroissant
            //array($this, 'compareThirdValueDesc')
            //usort($category[1], 'compareThirdValueDesc');
            usort($category[1],array($this, 'comparaison_pourcentage'));
        }
    }


    /**
     * @brief Affiche les informations de l'étape 2 pour la création du profil utilisateur (persona).
     * @param bool $affiche Indique si les informations doivent être affichées (par défaut false).
     */
    public function suppr_elements_peu_significatifs($affiche = false)
    {
        if ($affiche == true) {
            echo "<br>";
            echo "<br>";
            echo "Maintenant trié dans l'ordre";
            echo "<br>";
        }

        foreach ($this->rep as $categorie) 
        {
            if ($affiche == true) {
                echo $categorie[0] . " :\n";
            }
            
            if (!empty($categorie[1])) 
            {
                // Compteur de poids total
                foreach ($categorie[1] as $element) 
                {
                    if ($affiche == true) {
                        echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";
                    }
                }
            } 
            else 
            {
                if ($affiche == true) {
                    echo "  (Aucun élément)\n";
                }
            }
            
            if ($affiche == true) {
                echo "\n <br>";
            }
        } 

        $compt_categorie = -1;
        foreach ($this->rep as $el) 
        {
            $compt_categorie++;
            $nb_purcent = 0;
            $compteur_min_lst = -1;
            foreach ($el[1] as  $elem) 
            {
                $compteur_min_lst++;
                if (isset($this->rep[$compt_categorie][1][$compteur_min_lst]))
                {
                    if ($nb_purcent >= 50) 
                    {
                        unset($this->rep[$compt_categorie][1][$compteur_min_lst]);
                    }
                    else
                    {
                        $nb_purcent += $this->rep[$compt_categorie][1][$compteur_min_lst][2];
                    } 
                }
            }
        }
    }


    /**
     * @brief Affiche les informations de l'étape 3 pour la création du profil utilisateur (persona).
     */
    public function affichage_finale()
    {

      

        echo "<strong> <center> Profil type complet </center> </strong>";

        //echo "<br>";
        echo "<table class='table table-dark table-bordered'>";
        
            foreach ($this->rep as $categorie) 
            {
                echo "<tr>";
                //echo $categorie[0] . " :\n";
                echo "<td>".$categorie[0]."</td>";
                
                if (!empty($categorie[1])) 
                {
                    //compteur  poid totale
                    foreach ($categorie[1] as $element) 
                    {
                        //echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";
                        echo "<td>  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]</td>";
                    }
                } 
                else 
                {
                    echo "  (Aucun élément)\n";
                }
                
                //echo "\n <br>";
                echo "<tr>";
            }  
            echo "</table>";
    }


}

/**
 * @brief Classe représentant une liste de réponses possibles pour différentes catégories.
 */
class Reponse_utilisateur
{
    
    public $lst_rep_part_preference = [ ["musique",[]],["sport",[]],["culture",[]],["activitees",[]],["restaurants",[]],["soirees",[]] ];
    public $indices_centres_interets = ["musique" => 0,"sport" => 1,"culture" => 2,"activitees" => 3,"restaurants" => 4,"soirees" => 5];

    /**
     * @brief Ajoute un élément dans la catégorie choisie.
     * @param string $categorie La catégorie dans laquelle ajouter l'élément.
     * @param mixed $element L'élément à ajouter.
     */
    public function ajouter_elem_dans_centre_interet($categorie,$element) 
    {
        array_push($this->lst_rep_part_preference[$this->indices_centres_interets[$categorie]][1],$element);
    }

    /**
     * @brief Ajoute une liste d'éléments dans la catégorie choisie.
     * @param string $categorie La catégorie dans laquelle ajouter les éléments.
     * @param array $lst_a_ajouter La liste d'éléments à ajouter.
     */
    public function ajouter_lst_elem_dans_centre_interet($categorie,$lst_a_ajouter) 
    {
        foreach($lst_a_ajouter as $elem)
        {
            $this->ajouter_elem_dans_centre_interet($categorie,$elem); 
        }
    }

    /**
     * @brief Retourne la liste des éléments d'une catégorie choisie.
     * @param string $categorie La catégorie pour laquelle obtenir la liste d'éléments.
     * @return array La liste d'éléments de la catégorie.
     */
    public function get_lst_elem($categorie) 
    {
        return $this->lst_rep_part_preference[$this->indices_centres_interets[$categorie]][1];
    }

    /**
     * @brief Affiche tous les éléments possibles par catégorie.
     */
    public function toString() 
    {
        echo "Liste des éléments possibles choisisables : <br>";
        foreach($this->lst_rep_part_preference as $cat)
        {
            echo $cat[0]."<br> <ul>";
            foreach ($cat[1] as $elem)
            {
                echo "<li>".$elem."<br>";
            }
            echo "</ul>";
        }
    }
}


echo "<br>";
echo "<br>";


//liste reponse utilisateur
//liste poids
//rep utilisateur par poids

//MAIN

//Pour chaque centre d'intérêt, listes des éléments possibles
$lst_musique_possible = array
(   "Jazz",
    "Classique",
    "Rock",
    "Pop",
    "Rap",
    "Electro",
    "Musiques_film",
    "Musiques_manga"
);

$lst_sport_possible = array
(   "Rugby",
    "Pala",
    "Football",
    "Tennis",
    "Tennis_de_table",
    "Course_a_pieds",
    "Badminton",
    "Athletisme",
    "Basket",
    "Handball",
    "Esport",
    "Equitation"
);

$lst_culture_possible = array
(
    "Cinema",
    "Theatre",
    "Musee",
    "Zoo",
    "Visite_guidee",
    "Galerie_art",
    "Mediatheque",
    "Corrida",
    "Lecture",
    "Voyage",
    "Numerique"
);

$lst_activitees_possible = array
(
    "Tournoi_jeux_videos",
    "Loup_garoup",
    "Uno",
    "Cricket",
    "Bowling",
    "Plage"
);

$lst_restaurants_possible = array
(
    "Fast_food",
    "Junk_food",
    "Pizzeria",
    "Sushis",
    "Restaurants_traditionnels",
    "Restaurants_du_monde",
    "Restaurants_vegetariens"
);

$lst_soirees_possible = array
(
    "Bar",
    "Soiree_etudiante",
    "Soiree_jeux_Societe",
    "Boite_de_nuit",
    "Soirees_mousse"
);

//Liste des réponses insérées en dur : un questionnaire a été rempli par une dizaine d'étudiants de la promotion.

$liste_reponse_U_en_dur = 
[
    // Réponse 1
    [
        ["musique", ["Rock", "Electro"]],
        ["sport", ["Tennis", "Tennis_de_table", "Badminton", "Handball"]],
        ["culture", ["Numerique", "Voyage", "Cinema"]],
        ["activitees", ["Bowling", "Tournoi_jeux_videos"]],
        ["restaurants", ["Junk_food", "Fast_food"]],
        ["soirees", []]
    ],

    // Réponse 2
    [
        ["musique", ["Rap", "Pop"]],
        ["sport", ["Course_a_pieds", "Athletisme", "Rugby", "Tennis_de_table", "Football"]],
        ["culture", ["Voyage", "Cinema"]],
        ["activitees", ["Plage", "Bowling", "Loup_garoup", "Uno"]],
        ["restaurants", ["Pizzeria", "Fast_food", "Restaurants_traditionnels"]],
        ["soirees", ["Boite_de_nuit", "Soiree_etudiante", "Bar", "Soiree_jeux_Societe"]]
    ],

    // Réponse 3
    [
        ["musique", ["Rock", "Jazz", "Electro", "Musiques_film", "Musiques_manga"]],
        ["sport", ["Badminton", "Tennis_de_table", "Handball", "Esport", "Tennis"]],
        ["culture", ["Cinema", "Musee", "Zoo", "Voyage", "Numerique"]],
        ["activitees", ["Tournoi_jeux_videos", "Loup_garoup", "Bowling", "Uno", "Plage"]],
        ["restaurants", ["Restaurants_du_monde", "Restaurants_traditionnels", "Pizzeria", "Sushis", "Restaurants_vegetariens"]],
        ["soirees", ["Soiree_jeux_Societe", "Soiree_etudiante", "Bar", "Boite_de_nuit"]]
    ],

    // Réponse 4
    [
        ["musique", ["Pop", "Musiques_film", "Rock", "Classique", "Musiques_manga"]],
        ["sport", ["Badminton", "Football", "Pala"]],
        ["culture", ["Voyage", "Cinema", "Numerique", "Lecture", "Zoo"]],
        ["activitees", ["Loup_garou", "Tournoi_jeux_videos", "Uno"]],
        ["restaurants", ["Sushis", "Fast_food", "Restaurants_du_monde"]],
        ["soirees", ["Soiree_jeux_Societe", "Soiree_etudiante", "Bar"]]
    ],

    // Réponse 5
    [
        ["musique", ["Rock", "Musiques_film", "Jazz", "Classique", "Musiques_manga"]],
        ["sport", ["Tennis", "Badminton", "Tennis_de_table", "Esport", "Basket"]],
        ["culture", ["Numerique", "Cinema", "Musee", "Voyage", "Zoo"]],
        ["activitees", ["Bowling", "Plage", "Tournoi_jeux_videos", "Uno", "Loup_garoup"]],
        ["restaurants", ["Restaurants_du_monde", "Restaurants_traditionnels", "Sushis", "Pizzeria", "Fast_food"]],
        ["soirees", ["Bar", "Soiree_etudiante", "Boite_de_nuit", "Soiree_jeux_Societe"]]
    ],

    // Réponse 6
    [
        ["musique", ["Rock", "Pop", "Musiques_manga"]],
        ["sport", ["Football", "Basket"]],
        ["culture", ["Cinema", "Voyage"]],
        ["activitees", ["Tournoi_jeux_videos", "Bowling", "Plage"]],
        ["restaurants", ["Fast_food", "Sushis", "Restaurants_vegetariens"]],
        ["soirees", ["Boite_de_nuit", "Soiree_jeux_Societe"]]
    ],

    // Réponse 7
    [
        ["musique", ["Classique", "Rap", "Musiques_manga", "Musiques_film"]],
        ["sport", ["Football"]],
        ["culture", ["Lecture", "Cinema", "Numerique"]],
        ["activitees", ["Tournoi_jeux_videos", "Uno", "Loup_garoup"]],
        ["restaurants", ["Restaurants_traditionnels", "Restaurants_du_monde", "Pizzeria", "Fast_food"]],
        ["soirees", []]
    ],

    // Réponse 8
    [
        ["musique", ["Rap", "Rock", "Musiques_manga", "Musiques_film"]],
        ["sport", ["Esport", "Rugby", "Pala"]],
        ["culture", ["Numerique", "Lecture", "Mediatheque", "Cinema"]],
        ["activitees", ["Tournoi_jeux_videos", "Loup_garoup", "Bowling", "Uno"]],
        ["restaurants", ["Fast_food", "Pizzeria", "Sushis", "Restaurants_traditionnels"]],
        ["soirees", []]
    ],

    // Réponse 9
    [
        ["musique", ["Classique", "Musiques_film", "Jazz", "Musiques_manga"]],
        ["sport", ["Tennis_de_table", "Badminton", "Athletisme", "Basket", "Esport"]],
        ["culture", ["Numerique", "Cinema", "Lecture"]],
        ["activitees", ["Tournoi_jeux_videos", "Bowling"]],
        ["restaurants", ["Restaurants_traditionnels", "Restaurants_du_monde", "Fast_food"]],
        ["soirees", ["Soiree_jeux_Societe"]]
    ],

    // Réponse 10
    [
        ["musique", ["Classique", "Jazz", "Musiques_manga"]],
        ["sport", ["Tennis_de_table", "Tennis", "Course_a_pieds", "Esport"]],
        ["culture", ["Lecture", "Numerique", "Cinema", "Musee"]],
        ["activitees", ["Tournoi_jeux_videos", "Bowling", "Loup_garoup"]],
        ["restaurants", ["Fast_food", "Sushis", "Pizzeria", "Restaurants_traditionnels"]],
        ["soirees", []]
    ]
];

//Insertion des réponses possibles (quels sont les centres d'intérêt disponibles)

$lst_rep_pos = new Reponse_utilisateur();
//ici on rajoute les liste musique sport etc...
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("musique",$lst_musique_possible);
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("sport",$lst_sport_possible);
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("culture",$lst_culture_possible);
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("activitees",$lst_activitees_possible);
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("restaurants",$lst_restaurants_possible);
$lst_rep_pos->ajouter_lst_elem_dans_centre_interet("soirees",$lst_soirees_possible);

//Création d'une réponse globale contenant tous les centres d'intérêt
 
$lst_rep_utilisateur = lst_reponse_utilisateur::getInstance();
$liste_liste_cat_elem = array();
//,$lst_rep_pos->get_lst_elem("sport")
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("musique"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("sport"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("culture"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("activitees"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("restaurants"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("soirees"));

//Ajout des réponses en dur dans la liste de toutes les réponses des utilisateurs

//$lst_rep_user = $lst_rep_utilisateur->remplirListeReponseUser($liste_liste_cat_elem);//par defaut 10
$lst_rep_utilisateur->ajouter_liste_reponse_en_dur($liste_reponse_U_en_dur);//par defaut 10
echo "<div id='center_tous'>";
$lst_rep_utilisateur->toString();

$lst_pois = Liste_poids::getInstance();
$lst_pois->remplir_lst_poids($lst_rep_utilisateur->get_lst_rep_user());
$lst_pois->trier_decroissant_lst_poid();
$lst_pois->toString();

$lst_rep_user_restraint = Element_pref_choisi_par_utilisateur::getInstance();
//mettre la boucle sur la moitier des liste poid ici
$elementPrecis;

//pour le teste c la boucle

$compteur_persona = -1;

 //requete 1 
 $requete = $connexion->query("DELETE FROM `ProfilType`;");

 //requete 2
 $requete = $connexion->query("DELETE FROM `ContenirElement`;");

 $index_cat_inverse = [
    1 => "musique",
    2 => "sport",
    3 => "culture",
    4 => "activite",
    5 => "restaurant",
    6 => "soire",
];

// Supposons que $resultats soit le résultat de votre requête SQL
// Exemple d'utilisation de PDO
$requete = $connexion->query("SELECT idElement, nom FROM Elements");
$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

// Initialisation du dictionnaire
$dictionnaire = array();

// Transformation des résultats en dictionnaire
foreach ($resultats as $resultat) {
    $dictionnaire[$resultat['nom']] = $resultat['idElement'];
}

// Affichage du dictionnaire
//print_r($dictionnaire);


foreach($lst_pois->get_lst_poids() as $elem)
{
    $compteur_persona ++;
    /* if($compteur_persona >= 3)
    {break;} */
    $elementPrecis = $elem[0]; 

    
    $lst_rep_user_restraint->creer_la_liste_reduite_elem($lst_rep_utilisateur->get_lst_rep_user(),$elementPrecis);
    
    $persona_sans_chiffre = new Profil_type();
    $persona_pas_calculer = $persona_sans_chiffre->profil_type_creer($lst_rep_user_restraint->get_lst_rep_reduite_user());
    $persona_sans_chiffre->calculer_effectif_total();
    $persona_sans_chiffre->affectation_pourcentage();
    $persona_sans_chiffre->trier_decroissant();
    $persona_sans_chiffre->suppr_elements_peu_significatifs();
    echo "<br> <br>";

    echo "Elément à la base du profil type : ".$elementPrecis."<br>";
    try
    {
        $la_requete = "INSERT INTO ProfilType(idProfilType,nom,dateCreation) VALUES ('".($compteur_persona+1)."','".$elementPrecis."','".date("Y-m-d")."');";
        //echo "la requete : $la_requete <br>";
        $requete = $connexion->query($la_requete);

        //INSERT INTO `ProfilType` (`idProfilType`, `nom`, `dateCreation`) VALUES ('', NULL, NULL), ('1', 'tamère', '2024-03-08');
        
        $la_persona = $persona_sans_chiffre->get_rep();
        $compteur_cat = 0;
        $compteur_persona_pour_requete = $compteur_persona + 1;
        foreach($la_persona as $niv1)
        {
            $compteur_cat++;
            //echo $niv1[0];
            //echo "<br>";
            $compteur_mini_liste = 0;
            foreach($niv1[1] as $les_mini_liste)
            {
                $compteur_mini_liste++;
                //echo " ";
                //echo $les_mini_liste[0];
                //echo " ";
                $id_elem = $dictionnaire[$les_mini_liste[0]];
                $la_requete= "INSERT INTO ContenirElement VALUES ('".$compteur_persona_pour_requete."','".$id_elem."',".$compteur_mini_liste.")";
                $requete = $connexion->query($la_requete);
                //INSERT INTO `ContenirElement` (`idProfilType`, `idElement`, `ordre`) VALUES ('1', 'A001', 1)
                //echo " ".$la_requete." ";

            }
            //echo " ".$niv1[0]." ";
        }

        //print_r($persona_sans_chiffre->get_rep());

        


    }
    catch (PDOException $e) 
        {
            echo "Erreur : " . $e->getMessage();
        }
    $persona_sans_chiffre->affichage_finale();

            
        /* 
        table : ProfilType
        atribut : idProfilType/nom/dateCreation	(2024-03-20)

        table : Elements
        atribut : idElement/nom/description/ordreAffichage/idCentreInteret	

        1) clear ProfilType OK
        2) clear Elements   OK
        3) insert 1 ProfilType 
        4) insert dans element tous les truc du profils type inserer avant
        boucler sur :
            -chaque categorie
            -chaque element de chaque categorie

        */
    

    /* switch ($compteur_persona) 
    $elementPrecis = $elem[0];
    {
        case 0:
            $lst_rep_user_restraint->creer_la_liste_reduite_elem($lst_rep_utilisateur->get_lst_rep_user(),$elementPrecis);
            //$lst_rep_user_restraint->toString();
            //$lst_rep_pos->toString(); 
            
            $persona_sans_chiffre = new Profil_type();
            $persona_pas_calculer = $persona_sans_chiffre->profil_type_creer($lst_rep_user_restraint->get_lst_rep_reduite_user());
            $persona_sans_chiffre->calculer_effectif_total();
            $persona_sans_chiffre->affectation_pourcentage();
            $persona_sans_chiffre->trier_decroissant();
            $persona_sans_chiffre->suppr_elements_peu_significatifs();
            echo "<br> <br>";
            echo "<center> élément de base : ".$elementPrecis."</center><br>";
            $persona_sans_chiffre->affichage_finale();
            break;
        case intdiv(sizeof($lst_pois->get_lst_poids()),2) :
            $lst_rep_user_restraint->creer_la_liste_reduite_elem($lst_rep_utilisateur->get_lst_rep_user(),$elementPrecis);
            //$lst_rep_user_restraint->toString();
            //$lst_rep_pos->toString(); 
            
            $persona_sans_chiffre = new Profil_type();
            $persona_pas_calculer = $persona_sans_chiffre->profil_type_creer($lst_rep_user_restraint->get_lst_rep_reduite_user());
            $persona_sans_chiffre->calculer_effectif_total();
            $persona_sans_chiffre->affectation_pourcentage();
            $persona_sans_chiffre->trier_decroissant();
            $persona_sans_chiffre->suppr_elements_peu_significatifs();
            echo "<br> <br>";
            echo "<center> élément de base : ".$elementPrecis."</center><br>";
            $persona_sans_chiffre->affichage_finale();
            break;
        case sizeof($lst_pois->get_lst_poids())-1:
            $lst_rep_user_restraint->creer_la_liste_reduite_elem($lst_rep_utilisateur->get_lst_rep_user(),$elementPrecis);
            //$lst_rep_user_restraint->toString();
            //$lst_rep_pos->toString(); 
            
            $persona_sans_chiffre = new Profil_type();
            $persona_pas_calculer = $persona_sans_chiffre->profil_type_creer($lst_rep_user_restraint->get_lst_rep_reduite_user());
            $persona_sans_chiffre->calculer_effectif_total();
            $persona_sans_chiffre->affectation_pourcentage();
            $persona_sans_chiffre->trier_decroissant();
            $persona_sans_chiffre->suppr_elements_peu_significatifs();
            echo "<br> <br>";
            echo "<center> élément de base : ".$elementPrecis."</center><br>";
            $persona_sans_chiffre->affichage_finale();
            break;
    
        default:
            # code...
            break;
            
        }
        */
   

   
    
}    
echo "</div>";

//etape 0 afficher et caluler le poid pour moyenne de chaque ligne
//etape 1 afficher et mettre les % pour chaque elem
//etape 2 afficher et enlever les 50 % premier
//etape 3 affichage finale (tableau)



        echo date("Y-m-d");
?>


</body>
</html>