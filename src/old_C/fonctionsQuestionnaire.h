#ifndef FONCTIONSQUESTIONNAIRE_H
#define FONCTIONSQUESTIONNAIRE_H

#include "fonctionsRecupChoix.h"
#include <list>
#include <map>


//Création d'une réponse à une question
typedef list<string> ReponseOrdonnee;
ReponseOrdonnee::iterator iteratorReponseOrdonnee;

void afficher_liste(ReponseOrdonnee &Unereponse)
{
        //Affichage de la liste
    iteratorReponseOrdonnee = Unereponse.begin();
    while (iteratorReponseOrdonnee != Unereponse.end())
    {
        cout << *iteratorReponseOrdonnee << endl;
        iteratorReponseOrdonnee++;
    }
}

string recupererDomaineActivite( short int nbQuestion)
{
    string bonElement;
    switch (nbQuestion)
        {
            case 1:
                bonElement = "Musique";
                break;
            case 2:
                bonElement = "Sport";
                break;
            case 3:
                bonElement = "Activites culturelles";
                break;
            case 4:
                bonElement = "Activites organisees";
                break;
            case 5:
                bonElement = "Restaurant";
                break;
            case 6:
                bonElement = "Sorties";
                break;
            
            default:
                cout << "erreur" << endl;
                break;
        }
    return bonElement;
}


//Création d'une ligne avec toutes les réponses d'un utilisateur
enum CentresInteret {musiques = 1, sports, activitesCulturelles, activitesOrganisees, restaurants, sorties};

typedef map<CentresInteret, ReponseOrdonnee> Ligne;
Ligne uneLigne;
typedef Ligne::iterator iteratorLigne;
iteratorLigne unIteratorLigne;

//Création de la map, contenant toutes les lignes
typedef list<Ligne> MapDesLignes;
MapDesLignes laMap;

//Création des différentes réponses vides
ReponseOrdonnee reponseMusique;
ReponseOrdonnee reponseSport;
ReponseOrdonnee reponseActivitesCulturelles;
ReponseOrdonnee reponseActivitesOrganisees;
ReponseOrdonnee reponseRestaurants;
ReponseOrdonnee reponseSorties;

void ajouterUneReponse(ReponseOrdonnee &uneReponse, string element)
{   
    uneReponse.push_back(ReponseOrdonnee::value_type(element)); 
}

void ajouter_dans_une_ligne(Ligne &cetteLigne, CentresInteret unCentreDInteret, ReponseOrdonnee &uneReponse)
{
    cetteLigne.insert(Ligne::value_type(unCentreDInteret, uneReponse));
}

void ajouter_ligne_dans_map(MapDesLignes &map, Ligne &laLigne)
{
    map.push_back(MapDesLignes::value_type(laLigne));
}

void afficherQuestion(short int nbQuestion, string question, string choixPossible, ReponseOrdonnee &categorieReponse)
{
    string bonElement;
    string reponseQuestion;
    cout << question << endl;
    cout << choixPossible << endl;
    cin >> reponseQuestion;
    cout << endl;

    //Récupération de la réponse, conversion dans le type enum
    for (size_t i = 0; i < reponseQuestion.length(); i++)
    {
        int choix = reponseQuestion[i] - '0'; // Conversion du caractère en entier
        

        //En fonction de categorieReponse, savoir si on récupère une musique, un sport, ...
        switch (nbQuestion)
            {
                case 1:
                    bonElement = recuperationsMusiques(choix);
                    break;
                case 2:
                    bonElement = recuperationsSport(choix);
                    break;
                case 3:
                    bonElement = recuperationsActivitesCulturelles(choix);
                    break;
                case 4:
                    bonElement = recuperationsActivitesOrganisees(choix);
                    break;
                case 5:
                    bonElement = recuperationsRestaurants(choix);
                    break;
                case 6:
                    bonElement = recuperationsSorties(choix);
                    break;
                
                default:
                    cout << "erreur" << endl;
                    break;
            }
        
        //Agrémentation de la liste des musiques
        ajouterUneReponse(categorieReponse, bonElement);
    }
    //Affichage liste
    afficher_liste(categorieReponse);
    cout << endl << endl;
}

#endif