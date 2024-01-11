<?php
//a changer :
/* 
*/

/**
 * @brief Classe représentant une liste de réponses utilisateur.
 */
class lst_reponse_utilisateur 
{
    /**
     * @var array $lst_rep_U Liste des réponses utilisateur.
     */
    public $lst_rep_U = array();

    /**
     * @brief Récupère la liste des réponses utilisateur.
     * @return array La liste des réponses utilisateur.
     */
    public function get_lst_rep_u()
    {
        return $this->lst_rep_U;
    }
        
    /**
     * @brief Remplit la liste de réponses utilisateur avec des éléments aléatoires de musique et de sport.
     * 
     * @param array $lst_musique_possible Liste des éléments musicaux possibles.
     * @param array $lst_sport_possible Liste des éléments sportifs possibles.
     * @return array La liste remplie de réponses utilisateur.
     */
    function remplirListeReponseU($lst_musique_possible, $lst_sport_possible) 
    {
        $liste_categorie = ["musique","sport"];
        for ($i = 0; $i < 10; $i++) 
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
        }

        return $this->lst_rep_U;
    }

    /**
     * @brief Convertit la liste de réponses utilisateur en chaîne de caractères.
     */
    public function toString()
    {
        echo "<br> les réponses utilisateur (il n'y a que musique et sport)";
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


/**
 * @brief Classe représentant une liste de poids.
 */
class Liste_poids 
{
    /**
     * @var array $listePoids Liste des poids.
     */
    public $listePoids = array();

    /**
     * @brief Récupère la liste des poids.
     * @return array La liste des poids.
     */
    public function get_lst_poid()
    {
        return $this->listePoids;
    }

    /**
     * @brief Remplit la liste des poids en fonction des éléments d'une liste de réponses utilisateur.
     * 
     * @param array $lst_rep_U Liste de réponses utilisateur.
     */
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
                    $existe = false;
                    foreach ($this->listePoids as $mini_elem) 
                    {     
                        $indice++;
                        if($mini_elem[0]==$elem)   
                        {
                            $existe=true;
                            break;
                        }  
                    }
                    if($existe == true)
                    {
                        $this->listePoids[$indice][1]+= $el_poids;
                    }
                    
                    if($existe == false)
                    {
                        array_push($this->listePoids, [$elem,$el_poids]);
                    }
                    $el_poids --;
                }
            }
        } 
    }

    /**
     * @brief Fonction de comparaison pour le tri des poids par valeur décroissante.
     * 
     * @param array $a Premier élément pour la comparaison.
     * @param array $b Deuxième élément pour la comparaison.
     * @return int Résultat de la comparaison.
     */
    public function comparerParValeurDecroissante($a, $b) {
        return $b[1] - $a[1];
    }

    /**
     * @brief Trie la liste des poids en fonction des valeurs numériques (descendant).
     */
    public function trier_decroissant_lst_poid()
    {
        usort($this->listePoids, array($this, 'comparerParValeurDecroissante'));
    }
    
    /**
     * @brief Convertit la liste des poids triée en chaîne de caractères.
     */
    public function toString()
    {
        echo "<br> <br> Voici la liste des poids dans l'ordre décroissant";
        // Afficher la liste triée
        foreach ($this->listePoids as $lst_elem)
        {
            echo $lst_elem[0] . " de valeur : ".$lst_elem[1]."<br>";
        }
    }
}

/**
 * @brief Classe représentant une version réduite des réponses utilisateur.
 */
class Reponse_utilisateur_reduite
{
    /**
     * @var array $res Résultat des réponses utilisateur.
     */
    public $res;

    /**
     * @brief Récupère la liste des réponses utilisateur.
     * @return array La liste des réponses utilisateur.
     */
    public function get_lst_rep_u()
    {
        return $this->res;
    }

    /**
     * @brief Garde uniquement les éléments de la liste des réponses utilisateur correspondant à un élément précis.
     * 
     * @param array $lst_rep_U Liste des réponses utilisateur à filtrer.
     * @param mixed $elementPrecis Élément spécifique à garder dans les réponses.
     * @return array La liste des réponses utilisateur filtrée.
     */
    public function garder_que_elem($lst_rep_U, $elementPrecis)
    {
        $this->res = $lst_rep_U;
        $compteur_1reponse = -1;
        foreach ($this->res as $une_rep)
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
                unset($this->res[$compteur_1reponse]);
            }
        }
        return $this->res;
    }

    /**
     * @brief Convertit la liste filtrée des réponses utilisateur en une chaîne de caractères.
     */
    public function toString()
    {
        echo "<br> Les réponses utilisateur triées <br>";
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

/**
 * @brief Classe représentant un Persona.
 */
class Persona
{
    /**
     * @var array $rep Réponses du Persona dans les catégories "musique" et "sport".
     */
    public $rep = [ ["musique",[]],["sport",[]] ]; 
    /**
     * @var array $lst_poid_totale Liste des poids totaux par catégorie.
     */
    public $lst_poid_totale = [] ;
    
    /**
     * @brief Crée un Persona en utilisant les réponses utilisateur.
     * 
     * @param array $lst_rep_U Liste des réponses utilisateur.
     * @return array Les réponses du Persona dans les catégories "musique" et "sport".
     */
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
    
    /**
     * @brief Affiche les étapes initiales du Persona.
     */
    public function afficher_perso_etape_0()
    {
        echo "liste des reponse utilisateur pour persona";
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

    /**
     * @brief Calcule et affiche les pourcentages des éléments pour chaque catégorie.
     */
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
    
    /**
     * @brief Compare la troisième valeur pour trier les éléments dans chaque catégorie.
     */
    function compareThirdValueDesc($a, $b) {
        return $b[2] - $a[2];
    }

    /**
     * @brief Trie les éléments de chaque catégorie en fonction de leur pourcentage (décroissant).
     */
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

    /**
     * @brief Affiche les éléments triés dans chaque catégorie.
     */
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

    /**
     * @brief Supprime les éléments représentant 50% ou plus du poids total dans chaque catégorie.
     */
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


/**
 * @brief Classe représentant une liste de réponses possibles pour différentes catégories.
 */
class Reponse
{
    /**
     * @var array $lst_rep_possible_categorie Liste des réponses possibles par catégorie.
     */
    public $lst_rep_possible_categorie = [["musique", []], ["sport", []]];
    
    /**
     * @var array $num_categorie Numéro associé à chaque catégorie.
     */
    public $num_categorie = ["musique" => 0, "sport" => 1];
    
    /**
     * @brief Ajoute un élément dans la catégorie choisie.
     * 
     * @param string $categorie Catégorie où ajouter l'élément.
     * @param mixed $element Élément à ajouter.
     */
    public function ajouter_elem_cat($categorie, $element)
    {
        array_push($this->lst_rep_possible_categorie[$this->num_categorie[$categorie]][1], $element);
    }

    /**
     * @brief Ajoute une liste d'éléments dans la catégorie choisie.
     * 
     * @param string $categorie Catégorie où ajouter les éléments.
     * @param array $lst_a_ajouter Liste d'éléments à ajouter.
     */
    public function ajouter_elem_cat_lst($categorie, $lst_a_ajouter)
    {
        foreach ($lst_a_ajouter as $elem) {
            $this->ajouter_elem_cat($categorie, $elem);
        }
    }

    /**
     * @brief Récupère la liste des éléments d'une catégorie choisie.
     * 
     * @param string $categorie Catégorie dont on veut récupérer les éléments.
     * @return array Liste des éléments de la catégorie spécifiée.
     */
    public function get_lst_elem($categorie)
    {
        return $this->lst_rep_possible_categorie[$this->num_categorie[$categorie]][1];
    }

    /**
     * @brief Affiche la liste des éléments possibles pour chaque catégorie.
     */
    public function toString()
    {
        echo "Liste des éléments possibles pour chaque catégorie : <br>";
        foreach ($this->lst_rep_possible_categorie as $cat) {
            echo $cat[0] . "<br> <ul>";
            foreach ($cat[1] as $elem) {
                echo "<li>" . $elem . "<br>";
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

$lst_rep_pos = new Reponse();
//ici on rajoute les liste musique sport etc...
$lst_rep_pos->ajouter_elem_cat_lst("musique",$lst_musique_possible);
$lst_rep_pos->ajouter_elem_cat_lst("sport",$lst_sport_possible);
 
$lst_rep_utilisateur = new lst_reponse_utilisateur();
//enlever le = quand tu aura mis un get
$lst_rep_U = $lst_rep_utilisateur->remplirListeReponseU($lst_rep_pos->get_lst_elem("musique"),$lst_rep_pos->get_lst_elem("sport"));
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




