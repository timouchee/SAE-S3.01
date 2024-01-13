<?php
//a changer :
/* 
*/
  

class lst_reponse_utilisateur 
{
    public $lst_rep_U = array();

    public function get_lst_rep_u()
    {
        return $this->lst_rep_U;
    }
        
    function remplirListeReponseU($liste_liste_elem_categorie,$nb_reponse_creer = 10) 
    {
        $nb_reponse_voulu = $nb_reponse_creer;
        $liste_categorie = ["musique","sport","culture","activitees","restaurants","soirees"];
        $taille = sizeof($liste_liste_elem_categorie);
        //$liste_categorie = ["musique","sport"];

        for ($i = 0; $i < $nb_reponse_voulu; $i++) 
        {
            $element = array();
            for ($p = 0; $p < $taille; $p++) 
            {               
                // Catégorie "musique"
                $lst_cat = array($liste_categorie[$p], array());
                $ensembleEl = array(); // Ensemble pour éviter les doublons
                $nbel = rand(0,  5 );
                $possible_elements = $liste_liste_elem_categorie[$p];
                for ($j = 0; $j < $nbel; $j++) 
                {
                    $musiquePossible = array_diff($possible_elements, $ensembleEl);
                    $rajout = $musiquePossible[array_rand($musiquePossible)];
                    $lst_cat[1][] = $rajout;
                    $ensembleEl[] = $rajout;//end($lst_cat[1]); // Ajouter la dernière valeur à l'ensemble
                }
                $element[] = $lst_cat;
                

            }
          
            // Ajouter l'élément à la liste
            $this->lst_rep_U[] = $element;
        }

        return $this->lst_rep_U;
    }

    public function toString()
    {
        echo "<br> les reponse utilisateur ";
        foreach ($this->lst_rep_U as $element) 
        {
            echo '<ul>';
            foreach ($element as $categorie) {
                echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
            }
            echo '</ul>';
        } 
    }

    public function ajouter1_reponse_en_dur($rep)
    {
        $this->lst_rep_U[] = $rep;
    }

    public function ajouter_liste_reponse_en_dur($lst_rep)
    {
        foreach($lst_rep as $une_rep)
        {
            $this->ajouter1_reponse_en_dur($une_rep);
        }
    }

}
class Liste_poids 
{
    public $listePoids = array();

    public function get_lst_poid()
    {
        return $this->listePoids;
    }

    // Initialiser le tableau des listePoids à zéro
    public function remplir_lst_poids($lst_rep_U)
    {
       foreach ($lst_rep_U as $element) 
        {
            foreach ($element as $item) 
            {
                $el_poids = 5;
                foreach ($item[1] as $elem) 
                {
                    $indice = -1;
                    $exite = false;
                    foreach ($this->listePoids as $mini_elem) 
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
                        $this->listePoids[$indice][1]+= $el_poids;

                    }
                    
                    if($exite ==false)
                    {
                        array_push($this->listePoids, [$elem,$el_poids]);
                    }
                    $el_poids --;

                    //echo $elem." ";
                }
            }
            //echo "<br>";
        } 
    }

    // Fonction de comparaison pour le tri
    public function comparerParValeurDecroissante($a, $b) {
        return $b[1] - $a[1];
    }
    public function trier_decroissant_lst_poid()
    {
        // Trier la liste en fonction des valeurs numériques (descendant)
        //usort($this->listePoids, 'comparerParValeurDecroissante');
        usort($this->listePoids, array($this, 'comparerParValeurDecroissante'));
    }
    
    public function toString()
    {
        echo "<br> <br> voici la liste des poids dans l'ordre décroissant : <br>";
        // Afficher la liste triée
        foreach ($this->listePoids as $lst_elem)
        {
            echo $lst_elem[0] . " de valeur : ".$lst_elem[1]."<br>";
        }
    }
    
}

class Reponse_utilisateur_reduite
{
    public $res;
    public $element_de_triage;

    public function get_lst_rep_u()
    {
        return $this->res;
    }

    public function garder_que_elem($lst_rep_U,$elementPrecis)
    {
        $this->element_de_triage = $elementPrecis; 
        $this->res = $lst_rep_U;
        $compteur_1reponse = -1;
        foreach($this->res as $une_rep)
        {
            $compteur_1reponse ++;
            $trouver = false;
            foreach($une_rep as $categorie)
            {
                foreach($categorie[1] as $elem)
                {   
                    if($elem === $elementPrecis)
                    {
                        $trouver = true;
                        break;
                    }
                }
                if($trouver)
                {
                    break;
                }
            }
            if(!$trouver)
            {
                unset($this->res[$compteur_1reponse]);
            }
        } 
        return $this->res;
    }

    public function toString()
    {
        echo "<br> les rep U trier pour : ". $this->element_de_triage." <br>";
        foreach ($this->res as $element) 
        {
            echo '<ul>';
            foreach ($element as $categorie) {
                echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
            }
            echo '</ul>';
        }
    }

}

class Persona
{
    public $rep = [ ["musique",[]],["sport",[]],["culture",[]],["activitees",[]],["restaurants",[]],["soirees",[]] ]; 
    public $lst_poid_totale = [] ;
    

    public function persona_creer($lst_rep_U) 
    {
        foreach ($lst_rep_U as $element) 
        {   //dans 1 reponse utilisateur
            $compteur_categorie = -1;
            foreach ($element as $categorie) 
            {   //dans une categorie;
                $compteur_categorie ++;
                $place = 6;
                foreach ( $categorie[1] as $elem) 
                {   //dans un element
                    $place --;
                    //le if doit verifier que sa existe ou pas dans $rep
                    $compt_emplace_preference = -1;
                    $existe = false;
                    foreach($this->rep as $preference)
                    {   //dans une des preference la => ["musique",[["Pop", 8,0], ["Rap", 7],0]]
                        $compt_emplace_preference ++;
                        if($preference[0]==$categorie[0])
                        {
                            $compt_emplace_elem = -1;
                            foreach($preference[1] as $mini_lst_elem)
                            {   //on est dans la liste de mini liste la => ["Pop", 8,0], ["Rap", 7],0]
                                $compt_emplace_elem ++;
                                if($mini_lst_elem[0]==$elem)
                                {
                                    $this->rep[$compt_emplace_preference][1][$compt_emplace_elem][1] +=$place;
                                    $existe = true;
                                }
                            }
                        }
                    }
                    if($existe == false)
                    {
                        
                        array_push($this->rep[$compteur_categorie][1], [$elem,$place,0]);
                    }
                    
                }
            }
        }
        return $this->rep;
    } 
    
    
    public function afficher_perso_etape_0($affiche = false)
    {
        if($affiche==true){echo "liste des reponse utilisateur pour persona : <br>";}
        
        $indic_cat = -1;
        foreach ($this->rep as $categorie) 
        {
            $indic_cat ++;
            if($affiche==true) {echo $categorie[0] . " :\n";}
            
            if (!empty($categorie[1])) 
            {
                //compteur  poid totale
                foreach ($categorie[1] as $element) 
                {
                    if($affiche==true) {echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";}
                    if(isset($this->lst_poid_totale[$indic_cat]))
                    {
                        $this->lst_poid_totale[$indic_cat] +=$element[1];
                    }
                    else
                    {
                        array_push($this->lst_poid_totale,$element[1]);
                    }
    
                }
            } 
            else 
            {
                if($affiche==true) {echo "  (Aucun élément)\n";}
            }
            
            if($affiche==true) {echo "\n <br>";}
        }
        if($affiche==true){echo "<br>";
        echo "<br>";}
        
    }

    public function afficher_perso_etape_1($affiche = false)
    {
        if($affiche==true) {
        echo "maitenant avec le calcule des pourcentage arondi a 2 chiffre apres la virgule ";
        //print_r($this->lst_poid_totale);
        echo "<br>";}
    
        $compteur_categorie = -1;
        foreach ($this->rep as $categorie) 
        {   //dans categorie
            $compteur_categorie ++;
            if (!empty($categorie[1])) 
            {
                $compteur_emplacement_elem = -1;
                foreach ($categorie[1] as $element) 
                {   //dans la mini liste d'element
                    $compteur_emplacement_elem ++;
                    //faire un truce
                    //echo $$this->rep[$compteur_categorie][1][$compteur_emplacement_elem][2];
                    //echo "<br>";
                    //echo $$this->rep[$compteur_categorie][1][$compteur_emplacement_elem][1];
                    //echo "<br>";
                    //echo $this->lst_poid_totale[$compteur_categorie];
                    //echo "<br>";
                    $this->rep[$compteur_categorie][1][$compteur_emplacement_elem][2] = round((($this->rep[$compteur_categorie][1][$compteur_emplacement_elem][1]/$this->lst_poid_totale[$compteur_categorie])*100),2) ;    
                    //echo $this->rep[$compteur_categorie][1][$compteur_emplacement_elem][2];
                }
            } 
            
        }

        //afficher
        if($affiche==true)
        {
           foreach ($this->rep as $categorie) 
            {
                echo $categorie[0] . " :\n";
                
                if (!empty($categorie[1])) 
                {
                    //compteur  poid totale
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
    




    // Fonction de comparaison pour trier par la troisième valeur dans l'ordre décroissant
    function compareThirdValueDesc($a, $b) {
        return $b[2] - $a[2];
    }

    public function trier_decroissant()
    {
        // Parcours des données pour trier les éléments
        foreach ($this->rep as &$category) {
            // Tri des sous-tableaux par la troisième valeur dans l'ordre décroissant
            //array($this, 'compareThirdValueDesc')
            //usort($category[1], 'compareThirdValueDesc');
            usort($category[1],array($this, 'compareThirdValueDesc'));
        }
    }

    public function afficher_perso_etape_2($affiche = false)
    {
        if($affiche==true){

            echo "<br>";
            echo "<br>";
            echo "maitenant trier dans l'ordre";
            echo "<br>";
        }
    
        foreach ($this->rep as $categorie) 
        {
            if($affiche==true) {echo $categorie[0] . " :\n";}
            
            if (!empty($categorie[1])) 
            {
                //compteur  poid totale
                foreach ($categorie[1] as $element) 
                {
                    if($affiche==true) {echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";}
                }
            } 
            else 
            {
                if($affiche==true) {echo "  (Aucun élément)\n";}
            }
            
            if($affiche==true) {echo "\n <br>";}
        } 
    
        $compt_categorie = -1;
        foreach ($this->rep as $el) 
        {
            $compt_categorie ++;
            $nb_purcent = 0;
            $compteur_min_lst = -1;
            foreach ($el[1] as  $elem) 
            {
                $compteur_min_lst ++;
                if(isset($this->rep[$compt_categorie][1][$compteur_min_lst]))
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

    public function afficher_perso_etape_3()
    {
        
            echo "<br>";
            echo "<br>";
            echo "<strong> maitenant sans les 50% premier </strong>";
            echo "<br>";
        
            foreach ($this->rep as $categorie) 
            {
                echo $categorie[0] . " :\n";
                
                if (!empty($categorie[1])) 
                {
                    //compteur  poid totale
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

class Reponse
{
    public $lst_rep_possible_categorie = [ ["musique",[]],["sport",[]],["culture",[]],["activitees",[]],["restaurants",[]],["soirees",[]] ];
    public $num_categorie = ["musique" => 0,"sport" => 1,"culture" => 2,"activitees" => 3,"restaurants" => 4,"soirees" => 5];


    
    //ajoute 1 élément dans la categorie choisie
    public function ajouter_elem_cat($categorie,$element) 
    {
        array_push($this->lst_rep_possible_categorie[$this->num_categorie[$categorie]][1],$element);
    }

    //ajoute une liste d'élément dans la categorie choisie
    public function ajouter_elem_cat_lst($categorie,$lst_a_ajouter) 
    {
        foreach($lst_a_ajouter as $elem)
        {
            $this->ajouter_elem_cat($categorie,$elem); 
        }
    }

    //retourn la liste des element d'une categorie choisie
    public function get_lst_elem($categorie) 
    {
        return $this->lst_rep_possible_categorie[$this->num_categorie[$categorie]][1];
    }

    //afficher tous
    public function toString() 
    {
        echo "liste des element possible choisissable : <br>";
        foreach($this->lst_rep_possible_categorie as $cat)
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

$lst_rep_pos = new Reponse();
//ici on rajoute les liste musique sport etc...
$lst_rep_pos->ajouter_elem_cat_lst("musique",$lst_musique_possible);
$lst_rep_pos->ajouter_elem_cat_lst("sport",$lst_sport_possible);
$lst_rep_pos->ajouter_elem_cat_lst("culture",$lst_culture_possible);
$lst_rep_pos->ajouter_elem_cat_lst("activitees",$lst_activitees_possible);
$lst_rep_pos->ajouter_elem_cat_lst("restaurants",$lst_restaurants_possible);
$lst_rep_pos->ajouter_elem_cat_lst("soirees",$lst_soirees_possible);
 
$lst_rep_utilisateur = new lst_reponse_utilisateur();
//enlever le = quand tu aura mis un get
$liste_liste_cat_elem = array();
//,$lst_rep_pos->get_lst_elem("sport")
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("musique"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("sport"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("culture"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("activitees"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("restaurants"));
array_push($liste_liste_cat_elem,$lst_rep_pos->get_lst_elem("soirees"));

//$lst_rep_U = $lst_rep_utilisateur->remplirListeReponseU($liste_liste_cat_elem);//par defaut 10
$lst_rep_utilisateur->ajouter_liste_reponse_en_dur($liste_reponse_U_en_dur);//par defaut 10
$lst_rep_utilisateur->toString();

$lst_pois = new Liste_poids();
$lst_pois->remplir_lst_poids($lst_rep_utilisateur->get_lst_rep_u());
$lst_pois->trier_decroissant_lst_poid();
$lst_pois->toString();

$lst_rep_U_restraint = new Reponse_utilisateur_reduite();
//mettre la boucle sur la moitier des liste poid ici
$elementPrecis;

//pour le teste c la boucle

$compteur_persona = -1;
foreach($lst_pois->get_lst_poid() as $elem)
{
    $compteur_persona ++;
    if($compteur_persona >= 3)
    {break;}
    $elementPrecis = $elem[0];

    $lst_rep_U_restraint->garder_que_elem($lst_rep_utilisateur->get_lst_rep_u(),$elementPrecis);
    //$lst_rep_U_restraint->toString();
    //$lst_rep_pos->toString(); 
    
    $persona_sans_chiffre = new Persona();
    $persona_pas_calculer = $persona_sans_chiffre->persona_creer($lst_rep_U_restraint->get_lst_rep_u());
    $persona_sans_chiffre->afficher_perso_etape_0();
    $persona_sans_chiffre->afficher_perso_etape_1();
    $persona_sans_chiffre->trier_decroissant();
    $persona_sans_chiffre->afficher_perso_etape_2();
    $persona_sans_chiffre->afficher_perso_etape_3();
    
}    
 


/* $lst_rep_U_restraint->garder_que_elem($lst_rep_utilisateur->get_lst_rep_u(),$elementPrecis);
$lst_rep_U_restraint->toString();

$persona_sans_chiffre = new Persona();
$persona_pas_calculer = $persona_sans_chiffre->persona_creer($lst_rep_U_restraint->get_lst_rep_u());
$persona_sans_chiffre->afficher_perso_etape_0();
$persona_sans_chiffre->afficher_perso_etape_1();
$persona_sans_chiffre->trier_decroissant();
$persona_sans_chiffre->afficher_perso_etape_2();
$persona_sans_chiffre->afficher_perso_etape_3();



 */









