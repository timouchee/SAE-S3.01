#ifndef TRAITEMENTQUESTIONNAIRE_H
#define TRAITEMENTQUESTIONNAIRE_H

#include <iostream>
#include "utilisateur.h"

using namespace std;

//création d'une liste d'utilisateurs pour enregistrer les données de ces derniers
typedef list<Utilisateur> lstUtilisateur;
lstUtilisateur uneLstUtilisateur;

/* mise en place de liste pour récupérer les réponses du questionnaire
lstReponseQuestionnaire = [ligne[domaine[string]]]*/
typedef list<string> domaine;
typedef list<domaine> ligne;
typedef list<ligne> lstReponseQuestionnaire;



/* récupération des réponses du questionnaire */
void recupDonnees(Utilisateur reponseUtilisateur);

/* traiter les données */
void traiterDonnees(lstReponseQuestionnaire reponseQuestionnaire);


#endif