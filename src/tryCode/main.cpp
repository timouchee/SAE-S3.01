#include <iostream>
#include <string>

#include "fonctionsQuestionnaire.h"

using namespace std;


int main (void)
{
    //Formulaire

    //Création des variables de récupération (cin)
    short int nbQuestion = 0;
    string reponse;
    cout << "Bienvenue ! Veuillez repondre a un questionnaire pour que nous sachions quelles sont vos envies " << endl;
    cout << "Appuyez sur A pour commencer le formulaire" << endl;
    cin >> reponse;
    cout << endl;

    //QUESTION 1
    nbQuestion ++;
    string question1 = "Question 1 : Cochez les styles de musique que vous voulez voir. Selectionnez les par ordre de preference (ex: 1432)";
    string musiquesPossibles = "Jazz | classique | rock | pop | rap | electro";
    afficherQuestion(nbQuestion, question1, musiquesPossibles, reponseMusique);


    //QUESTION 2
    nbQuestion ++;
    string question2 = "Question 2 : Cochez les sports que vous voulez voir. Selectionnez les par ordre de preference";
    string sportsPossibles = "rugby | pala | football | tennis | Tennis_de_table | course | badminton";
    afficherQuestion(nbQuestion, question2, sportsPossibles, reponseSport);


    //QUESTION 3
    nbQuestion ++;
    string question3 = "Question 3 : Cochez les activites culturelles que vous voulez voir. Selectionnez les par ordre de preference";
    string activitesCulturellesPossibles = "cinema | theatre | musee | zoo | visite_guidee | galerie_art | mediatheque | corrida";
    afficherQuestion(nbQuestion, question3, activitesCulturellesPossibles, reponseActivitesCulturelles);


    //QUESTION 4
    nbQuestion ++;
    string question4 = "Question 4 : Cochez les activites organisees que vous voulez voir. Selectionnez les par ordre de preference";
    string activitesOrganiseesPossibles = "tournoi_jeux_videos | loup_garoup | uno | cricket";
    afficherQuestion(nbQuestion, question4, activitesOrganiseesPossibles, reponseActivitesOrganisees);


    //QUESTION 5
    nbQuestion ++;
    string question5 = "Question 5 : Cochez les types de restaurants que vous voulez voir. Selectionnez les par ordre de preference";
    string restaurantsPossibles = "fast_food | junk_food | restaurants_traditionnels | restaurants_du_monde";
    afficherQuestion(nbQuestion, question5, restaurantsPossibles, reponseRestaurants);


    //QUESTION 6
    nbQuestion ++;
    string question6 = "Question 6 : Cochez les activites culturelles que vous voulez voir. Selectionnez les par ordre de preference";
    string soireesPossibles = "bar | soiree_etudiante | boite_de_nuit";
    afficherQuestion(nbQuestion, question6, soireesPossibles, reponseSorties);


    //CREATION DE LA LISTE
    cout << "Merci d avoir repondu, creation du profil..." << endl;
    ajouter_dans_une_ligne(uneLigne, musiques, reponseMusique);
    ajouter_dans_une_ligne(uneLigne, sports, reponseSport);
    ajouter_dans_une_ligne(uneLigne, activitesCulturelles, reponseActivitesCulturelles);
    ajouter_dans_une_ligne(uneLigne, activitesOrganisees, reponseActivitesOrganisees);
    ajouter_dans_une_ligne(uneLigne, restaurants, reponseRestaurants);
    ajouter_dans_une_ligne(uneLigne, sorties, reponseSorties);

    cout << "AFFICHAGE DE LA LIGNE" << endl;
    unIteratorLigne = uneLigne.begin();
    while (unIteratorLigne != uneLigne.end())
    {
        cout << "--" << recupererDomaineActivite(unIteratorLigne->first) <<  " -- " << endl;
        afficher_liste(unIteratorLigne->second);
        cout << endl << endl;

        unIteratorLigne++;
    }

    //AJOUT DE LA LIGNE DANS LA MAP
    cout << "AJOUT DE VOS PREFERENCES DANS L ALGORITHME DE RECOMMANDATIONS ..." << endl;
    ajouter_ligne_dans_map(laMap, uneLigne);

    return 0;
}
