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


#include "creer_persona.h"
using namespace std;


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