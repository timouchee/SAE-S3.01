#include "persona.h"
#include "utilisateur.h"
#include "traitementQuestionnaire.h"
#include <iostream>
using namespace std;
int main(void)
{
    string IDUser, nomUser, prenomUser, motDePasseUser, mailUser, dateNaissUser, adresseUser, etudeUser;
    string moyenDeTransport; 

    while (true)
    {
        // appelle du questionnaire 

        //PARTIE UTILISATEUR
        /*demande du nom*/
        cout << "nom: ";
        cin >> nomUser;
        cout << endl;
        /*demande du prenom*/
        cout << "prenom: ";
        cin >> prenomUser;
        cout << endl;
        /*demande dateNaiss*/
        cout << "date de naissance: ";
        cin >> dateNaissUser;
        cout << endl;
        /*demande du mail*/
        cout << "mail: ";
        cin >> mailUser;
        cout << endl;
        /*demande son adresse*/
        cout << "adresse: ";
        cin >> adresseUser;
        cout << endl;
        /*demande son type et niveau d'étude*/
        cout << "etude: ";
        cin >> etudeUser;
        cout << endl;
        /*demande comment il se déplace*/
        cout << "etude: ";
        cin >> moyenDeTransport;
        cout << endl;

        // PARTIE PREFERENCE
    
    

    // récupèrer les réponses

    // traiter les données

    // créer les persona à partir du tout
    }
    
    
    return 0;
}
