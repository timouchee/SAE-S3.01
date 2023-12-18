/**
 * @file main.cpp
 * @author Xan SALLENAVE, Timeo JULIARD
 * @brief 
 * @version 1.0
 * @date 2023-12-18
 * 
 * @copyright Copyright (c) 2023
 * 
 */

#include <iostream>
#include <map>
#include <list>
#include <iterator>
using namespace std;

/**
 * @brief  L'énumération pour les categorie de préférences permet de définir les goûts d'une personne a partir des différentes réponses 
 * au cours du questionnaire auquel il a répondu lorsqu'il s'est connecté couplé avec les différentes informations qu'il consulte sur le site
 * 
 * @details au dela de decrire un Utilisateur par ses goûts l'énumération permet
 * de fournir des des recommendations / informations plus personalisés pour l'Utilisateur
 * 
 * 
 * la Voiture conduite par l'Individu est représenter  par un pointeur vers un objet de la classe Voiture
 * 
 * @warning la liste des categorie peut toujours changer et peut donc amener à la perte ou à l'ajout de nouvelles catégories
 */
enum categorie { musique, restaurant };
/**
 * @brief 
 * Alias pour listes d'éléments et de preferenceUtilisateur 
 * 
 */
typedef list<string> lstelem;
typedef map<categorie, lstelem> lstpref1U;
typedef list<lstpref1U> preferenceUtilisateur;
typedef list<pair<string, int>> type_listPoids;

/**
 * @brief Fonction pour créer et initialiser les préférences utilisateur
 * @return Liste des préférences utilisateur initialisées
 */
preferenceUtilisateur cree_pref_U(void) {
    // Initialisation des structures de données
    preferenceUtilisateur lstresU;
    lstelem lstElemMusique1;
    lstelem lstElemRestaurant;
    lstpref1U U1;

    // Initialisation des préférences pour la musique
    lstElemMusique1.push_back(lstelem::value_type("pop"));
    // ... (ajout d'autres éléments pour la musique)

    // Initialisation des préférences pour les restaurants
    lstElemRestaurant.push_back(lstelem::value_type("macdo"));
    // ... (ajout d'autres éléments pour les restaurants)

    // Insertion des préférences dans la structure principale
    U1.insert({ musique, lstElemMusique1 });
    U1.insert({ restaurant, lstElemRestaurant });
    lstresU.push_back(preferenceUtilisateur::value_type(U1));

    // Nettoyage des listes pour la prochaine initialisation
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();

    // ... (répéter le processus pour d'autres préférences utilisateurs)

    return lstresU;
}

/**
 * @brief Fonction pour remplir une liste de poids basés sur les preferenceUtilisateur
 * @param lstresU Liste des preferenceUtilisateur
 * @param listePoids Liste à remplir avec les poids des éléments
 */
void remplirListePoids(const preferenceUtilisateur& lstresU, type_listPoids& listePoids) {
    /**
     * @brief 
     * Stockage des occurrences de chaque élément
     * 
     */
    map<string, int> occurences;

    // Parcours des préférences utilisateur pour compter les occurrences
    for (const auto& utilisateur : lstresU) {
        for (const auto& categorieElem : utilisateur) {
            const auto& listeElem = categorieElem.second;

            /**
             * @brief 
             * Début à 5 selon l'algorithme
             * 
             */
            int index = 5;

            // Parcours des éléments avec décrémentation de l'indice
            for (auto it = listeElem.begin(); it != listeElem.end(); ++it) {
                if (occurences.find(*it) == occurences.end()) {
                    occurences[*it] = index;
                } else {
                    occurences[*it] += index;
                }
                index--;
            }
        }
    }

    // Transfert des résultats dans la liste de poids et tri par ordre décroissant
    for (const auto& occurence : occurences) {
        listePoids.push_back(make_pair(occurence.first, occurence.second));
    }
    listePoids.sort([](const pair<string, int>& a, const pair<string, int>& b) {
        return a.second > b.second;
    });
}

/**
 * @brief Fonction principale
 * @return Statut de l'exécution
 */
int main(void) {
    // Création des préférences utilisateur
    preferenceUtilisateur lstresU = cree_pref_U();

    // Initialisation de la liste des poids
    type_listPoids listePoids;

    // Remplissage de la liste des poids
    remplirListePoids(lstresU, listePoids);

    // Affichage des poids dans l'ordre décroissant
    for (const auto& poids : listePoids) {
        cout << "[" << poids.first << ", " << poids.second << "]" << endl;
    }

    return 0;
}





















/* 
#include <iostream>
#include <map>
#include <list>
#include <iterator>
using namespace std;

enum categorie { musique, restaurant};
typedef list<string> lstelem;
typedef map<categorie, lstelem> lstpref1U;
typedef list<lstpref1U> preferenceUtilisateur;
typedef list<pair<string,int>> type_listPoids;



preferenceUtilisateur cree_pref_U(void)
{
    preferenceUtilisateur lstresU;
    lstelem lstElemMusique1;
    lstelem lstElemRestaurant;
    lstpref1U U1;

    lstElemMusique1.push_back(lstelem::value_type("pop"));
    lstElemMusique1.push_back(lstelem::value_type("jazz"));
    lstElemMusique1.push_back(lstelem::value_type("electro"));
    lstElemMusique1.push_back(lstelem::value_type("retro"));
    lstElemMusique1.push_back(lstelem::value_type("swing"));
    
    lstElemRestaurant.push_back(lstelem::value_type("macdo"));
    lstElemRestaurant.push_back(lstelem::value_type("KFC"));
    lstElemRestaurant.push_back(lstelem::value_type("BQ"));
    lstElemRestaurant.push_back(lstelem::value_type("quick"));
    lstElemRestaurant.push_back(lstelem::value_type("pizza hut"));
    
    U1.insert({musique,lstElemMusique1});
    U1.insert({restaurant,lstElemRestaurant});
    lstresU.push_back(preferenceUtilisateur::value_type(U1));
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();
    return lstresU;
}


void remplirListePoids(const preferenceUtilisateur& lstresU, type_listPoids& listePoids) {
    map<string, int> occurences; // Pour stocker les occurrences de chaque élément

    // Parcourir chaque utilisateur
    for (const auto& utilisateur : lstresU) {
        // Parcourir chaque catégorie de préférences
        for (const auto& categorieElem : utilisateur) {
            const auto& listeElem = categorieElem.second;

            // Parcourir chaque élément de la liste en comptant depuis la fin
            int tailleListe = listeElem.size();
            int index = 1; // Indice de l'élément dans la liste (commencer par 1)
            for (auto it = listeElem.rbegin(); it != listeElem.rend(); ++it) {
                // Si l'élément n'est pas déjà dans les occurrences, l'ajouter
                if (occurences.find(*it) == occurences.end()) {
                    occurences[*it] = index;
                } else {
                    // Sinon, mettre à jour la valeur en ajoutant l'indice actuel
                    occurences[*it] += index;
                }

                // Incrémenter l'indice
                index++;
            }
        }
    }

    // Transférer les résultats dans listePoids
    for (const auto& occurence : occurences) {
        listePoids.push_back(make_pair(occurence.first, occurence.second));
    }
    listePoids.sort([](const pair<string, int>& a, const pair<string, int>& b) {
        return a.second > b.second; // Trie par ordre décroissant des valeurs
    });
}

int main (void)
{
    preferenceUtilisateur lstresU = cree_pref_U();
    
    type_listPoids listePoids;

    remplirListePoids(lstresU, listePoids);

    // Afficher  listePoids
    for (const auto& poids : listePoids) {
        cout << "[" << poids.first << ", " << poids.second << "]" << endl;
    }


    return 0;
}



 */

























