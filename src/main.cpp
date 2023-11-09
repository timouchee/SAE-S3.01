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
        cout << "Nom: ";
        cin >> nomUser;
        cout << endl;
        /*demande du prenom*/
        cout << "Prenom: ";
        cin >> prenomUser;
        cout << endl;
        /*demande dateNaiss*/
        while (true) {
        cout << "Date de naissance (jj/mm/aaaa) : ";
        cin >> dateNaissUser;

        if (estDateValide(dateNaissUser)) {
            cout << "La date de naissance est valide." << endl;
            break;
        } else {
            cout << "La date de naissance n'est pas valide. Veuillez réessayer." << endl;
        }
    }
        
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
