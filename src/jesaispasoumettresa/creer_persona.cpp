/**
 * @file creer_persona.cpp
 * @author Xan SALLENAVE
 * @brief 
 * @version 1.0
 * @date 2023-12-19
 * 
 * @copyright Copyright (c) 2023
 * 
 */
#include "creer_persona.h"

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
    // Initialisation des préférences pour les restaurants
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

    lstElemMusique1.push_back(lstelem::value_type("pop"));
    lstElemMusique1.push_back(lstelem::value_type("rock"));
    lstElemMusique1.push_back(lstelem::value_type("rap"));

    lstElemRestaurant.push_back(lstelem::value_type("BQ"));
    lstElemRestaurant.push_back(lstelem::value_type("quick"));
    lstElemRestaurant.push_back(lstelem::value_type("pizza hut"));
    lstElemRestaurant.push_back(lstelem::value_type("dominos pizza"));
    lstElemRestaurant.push_back(lstelem::value_type("macdo"));

    U1.insert({musique,lstElemMusique1});
    U1.insert({restaurant,lstElemRestaurant});
    lstresU.push_back(preferenceUtilisateur::value_type(U1));
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();

    lstElemMusique1.push_back(lstelem::value_type("pop"));
    lstElemMusique1.push_back(lstelem::value_type("classique"));
    lstElemMusique1.push_back(lstelem::value_type("rock"));
    lstElemMusique1.push_back(lstelem::value_type("jazz"));
    lstElemMusique1.push_back(lstelem::value_type("rap"));
    
    lstElemRestaurant.push_back(lstelem::value_type("quick"));
    lstElemRestaurant.push_back(lstelem::value_type("so & so"));

    U1.insert({musique,lstElemMusique1});
    U1.insert({restaurant,lstElemRestaurant});
    lstresU.push_back(preferenceUtilisateur::value_type(U1));
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();

    lstElemMusique1.push_back(lstelem::value_type("rap"));
    lstElemMusique1.push_back(lstelem::value_type("electro"));
    lstElemMusique1.push_back(lstelem::value_type("classique"));
    lstElemMusique1.push_back(lstelem::value_type("pop"));
    lstElemMusique1.push_back(lstelem::value_type("jazz"));

    lstElemRestaurant.push_back(lstelem::value_type("macdo"));
    lstElemRestaurant.push_back(lstelem::value_type("ABU"));
    lstElemRestaurant.push_back(lstelem::value_type("BQ"));
    lstElemRestaurant.push_back(lstelem::value_type("so & so"));
    lstElemRestaurant.push_back(lstelem::value_type("quick"));

    U1.insert({musique,lstElemMusique1});
    U1.insert({restaurant,lstElemRestaurant});
    lstresU.push_back(preferenceUtilisateur::value_type(U1));
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();

    lstElemMusique1.push_back(lstelem::value_type("swing"));
    lstElemMusique1.push_back(lstelem::value_type("pop"));
    lstElemMusique1.push_back(lstelem::value_type("electro"));
    
    lstElemRestaurant.push_back(lstelem::value_type("macdo"));
    lstElemRestaurant.push_back(lstelem::value_type("KFC"));
    lstElemRestaurant.push_back(lstelem::value_type("dominos pizza"));
    lstElemRestaurant.push_back(lstelem::value_type("quick"));
    lstElemRestaurant.push_back(lstelem::value_type("so & so"));
    
    U1.insert({musique,lstElemMusique1});
    U1.insert({restaurant,lstElemRestaurant});
    lstresU.push_back(preferenceUtilisateur::value_type(U1));
    lstElemMusique1.clear();
    lstElemRestaurant.clear();
    U1.clear();
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