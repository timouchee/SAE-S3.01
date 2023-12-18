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

    //cout << "haya" << endl;
    return lstresU;
}

void remplirListePoids(const preferenceUtilisateur& lstresU, type_listPoids& listePoids) {
    map<string, int> occurences; // Pour stocker les occurrences de chaque élément

    // Parcourir chaque utilisateur
    for (const auto& utilisateur : lstresU) {
        // Parcourir chaque catégorie de préférences
        for (const auto& categorieElem : utilisateur) {
            const auto& listeElem = categorieElem.second;

            // Parcourir chaque élément de la liste en décrémentant de 1
            int index = 5; // Commencer par 5 selon l'algo de Virgile
            for (auto it = listeElem.begin(); it != listeElem.end(); ++it) {
                // Si l'élément n'est pas déjà dans les occurrences, l'ajouter
                if (occurences.find(*it) == occurences.end()) {
                    occurences[*it] = index;
                } else {
                    // Sinon, mettre à jour la valeur en ajoutant l'indice actuel
                    occurences[*it] += index;
                }

                // Décrémenter l'indice
                index--;
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

























