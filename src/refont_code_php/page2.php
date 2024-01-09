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
                $nbel = rand(0,  sizeof($liste_liste_elem_categorie[$p]) );
                for ($j = 0; $j < $nbel; $j++) {
                    $possible_elements = $liste_liste_elem_categorie[$p];
                    $musiquePossible = array_diff($possible_elements, $ensembleEl);
                    $lst_cat[1][] = $musiquePossible[array_rand($musiquePossible)];
                    $ensembleEl[] = end($lst_cat[1]); // Ajouter la dernière valeur à l'ensemble
                }
                $element[] = $lst_cat;
                

            }
            
            /* for ($i = 0; $i < 10; $i++) 
            {
                $element = array();
                foreach($liste_categorie as $cat)
                {
                    // Catégorie "musique" ou "sport"
                    $lst_cat = array($cat, array());
                    $ensembleEl = array(); // Ensemble pour éviter les doublons
                    $nbel = rand(1, 5);
                    for ($j = 0; $j < $nbel; $j++) {
                        // Sélection aléatoire d'éléments possibles dans la catégorie
                        $possible_elements = ($cat === "musique") ? $lst_musique_possible : $lst_sport_possible;
                        $cat_elements = array_diff($possible_elements, $ensembleEl);
                        $lst_cat[1][] = $cat_elements[array_rand($cat_elements)];
                        $ensembleEl[] = end($lst_cat[1]); // Ajouter la dernière valeur à l'ensemble
                    }
                    $element[] = $lst_cat;
                }

                // Ajouter l'élément à la liste
                $this->lst_rep_U[] = $element;
            }  */





            // Ajouter l'élément à la liste
            $this->lst_rep_U[] = $element;
        }

        return $this->lst_rep_U;
    }

    public function toString()
    {
        echo "<br> les reponse utilisateur (il n'y a que musique et sport)";
        foreach ($this->lst_rep_U as $element) 
        {
            echo '<ul>';
            foreach ($element as $categorie) {
                echo '<li>' . $categorie[0] . ': [' . implode(', ', $categorie[1]) . ']</li>';
            }
            echo '</ul>';
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

    public function get_lst_rep_u()
    {
        return $this->res;
    }

    public function garder_que_elem($lst_rep_U,$elementPrecis)
    {
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
        echo "<br> les rep U trier <br>";
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
    
    
    public function afficher_perso_etape_0()
    {
        echo "liste des reponse utilisateur pour persona : <br>";
        $indic_cat = -1;
        foreach ($this->rep as $categorie) 
        {
            $indic_cat ++;
            echo $categorie[0] . " :\n";
            
            if (!empty($categorie[1])) 
            {
                //compteur  poid totale
                foreach ($categorie[1] as $element) 
                {
                    echo "  [\"{$element[0]}\", {$element[1]} , {$element[2]}     ]\n";
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
                echo "  (Aucun élément)\n";
            }
            
            echo "\n <br>";
        }
        echo "<br>";
        echo "<br>";
    }

    public function afficher_perso_etape_1()
    {
        echo "maitenant avec le calcule des pourcentage arondi a 2 chiffre apres la virgule ";
        //print_r($this->lst_poid_totale);
        echo "<br>";
    
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

    public function afficher_perso_etape_2()
    {
        echo "<br>";
        echo "<br>";
        echo "maitenant trier dans l'ordre";
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
    
        $compt_categorie = -1;
        foreach ($this->rep as $el) 
        {
            $compt_categorie ++;
            $nb_purcent = 0;
            $compteur_min_lst = -1;
            foreach ($el[1] as  $elem) 
            {
                $compteur_min_lst ++;
                if ($nb_purcent >= 50) 
                {
                    
                    unset($this->rep[$compt_categorie][1][$compteur_min_lst]);
                    
                }
                else
                {
                    
                    $nb_purcent += $this->rep[$compt_categorie][1][$compt_categorie][2];
                    
                } 
            }
        }

    }

    public function afficher_perso_etape_3()
    {
        
            echo "<br>";
            echo "<br>";
            echo "maitenant sans les 50% premier";
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
    "classique",
    "rock",
    "pop",
    "rap",
    "electro"
);


$lst_sport_possible = array
(   "rugby",
    "pala",
    "football",
    "tennis",
    "Tennis_de_table",
    "course",
    "badminton"
);

$lst_culture_possible = array
(
    "cinema",
    "theatre",
    "musee",
    "zoo",
    "visite_guidee",
    "galerie_art",
    "mediatheque",
    "corrida"
);
$lst_activitees_possible = array
(
    "tournoi_jeux_videos",
    "loup_garoup",
    "uno",
    "cricket"
);
$lst_restaurants_possible = array
(
    "fast_food","junk_food",
    "restaurants_traditionnels",
    "restaurants_du_monde",
    "vegi"
);
$lst_soirees_possible = array
(
    "bar",
    "soiree_etudiante",
    "boite_de_nuit"
);



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

$lst_rep_U = $lst_rep_utilisateur->remplirListeReponseU($liste_liste_cat_elem);//par defaut 10
$lst_rep_utilisateur->toString();

$lst_pois = new Liste_poids();
$lst_pois->remplir_lst_poids($lst_rep_utilisateur->get_lst_rep_u());
$lst_pois->trier_decroissant_lst_poid();
$lst_pois->toString();

$lst_rep_U_restraint = new Reponse_utilisateur_reduite();
//mettre la boucle sur la moitier des liste poid ici
$elementPrecis = "pop";

//pour le teste c la boucle

/* $compteur_persona = -1;
foreach($lst_pois->get_lst_poid() as $elem)
{
    $compteur_persona ++;
    if($compteur_persona >= 10)
    {break;}
    $elementPrecis = $elem[0];

    $lst_rep_U_restraint->garder_que_elem($lst_rep_utilisateur->get_lst_rep_u(),$elementPrecis);
    $lst_rep_U_restraint->toString();
    //$lst_rep_pos->toString(); 
    
    $persona_sans_chiffre = new Persona();
    $persona_pas_calculer = $persona_sans_chiffre->persona_creer($lst_rep_U_restraint->get_lst_rep_u());
    $persona_sans_chiffre->afficher_perso_etape_0();
    $persona_sans_chiffre->afficher_perso_etape_1();
    $persona_sans_chiffre->trier_decroissant();
    $persona_sans_chiffre->afficher_perso_etape_2();
    $persona_sans_chiffre->afficher_perso_etape_3();
    

}    
 */

$lst_rep_U_restraint->garder_que_elem($lst_rep_utilisateur->get_lst_rep_u(),$elementPrecis);
    $lst_rep_U_restraint->toString();
    //$lst_rep_pos->toString(); 
    
    $persona_sans_chiffre = new Persona();
    $persona_pas_calculer = $persona_sans_chiffre->persona_creer($lst_rep_U_restraint->get_lst_rep_u());
    $persona_sans_chiffre->afficher_perso_etape_0();
    $persona_sans_chiffre->afficher_perso_etape_1();
    $persona_sans_chiffre->trier_decroissant();
    $persona_sans_chiffre->afficher_perso_etape_2();
    $persona_sans_chiffre->afficher_perso_etape_3();


/* 
explication
reponse questionnaire 1 fois
faire 10~50 reponse random(orienter un truc ou des vraie reponse)
environs 3 persona
explication
montrer que y a une coherence persona => reponse Utilisateur


*/













