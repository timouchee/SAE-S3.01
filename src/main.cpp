#include "persona.h"
#include "utilisateur.h"
#include "preference.h"

int main(void)
{
    Utilisateur User1;
    string IDUser, nomUser, prenomUser, motDePasseUser, mailUser, dateNaissUser, adresseUser, etudeUser;
    int choixMoyenTransport; 

    while (true)
    {
        // appelle du questionnaire 

        //PARTIE UTILISATEUR
        /*demande du nom*/
        cout << "Nom: ";
        cin >> nomUser;
        User1.setNom(nomUser);
        cout << endl;
        /*demande du prenom*/
        cout << "Prenom: ";
        cin >> prenomUser;
        User1.setPrenom(prenomUser);
        cout << endl;
        /*demande dateNaiss*/
        while (true) {
            cout << "Date de naissance (jj/mm/aaaa) : ";
            cin >> dateNaissUser;
            User1.setDateNaiss(dateNaissUser);
            if (User1.estDateValide(dateNaissUser)) {
                cout << "La date de naissance est valide." << endl;
                break;
            } else {
                cout << "La date de naissance n'est pas valide. Veuillez réessayer." << endl;
            }
        }
        
        /*demande du mail*/
        while (true) {
            cout << "Mail: ";
            cin >> mailUser;
            User1.setMail(mailUser);
            if (User1.estMailValide(mailUser)) {
                cout << "L'adresse mail est valide." << endl;
                break;
            } else {
                cout << "L'adresse mail n'est pas valide. Veuillez réessayer." << endl;
            }
        }
        
        /*demande son adresse, type: Ville, numRue nomRue */
        while (true) {
            cout << "Adresse (Ville, numeroRue nomRue): ";
            cin >> adresseUser;
            User1.setAdresse(adresseUser);
            if (User1.estMailValide(adresseUser)) {
                cout << "L'adresse est valide." << endl;
                break;
            } else {
                cout << "L'adresse n'est pas valide. Veuillez réessayer." << endl;
            }
        }
        /*demande son type et niveau d'étude*/
        cout << "Niveau d'étude: ";
        cin >> etudeUser;
        cout << endl;
        /*demande comment il se déplace*/
        cout << "Choisissez le moyen de transport (0: pied, 1: velo, 2: moto, 3: voiture): ";
        cin >> choixMoyenTransport;

        // Validation de l'entrée
        if (choixMoyenTransport >= 0 && choixMoyenTransport <= 3) {
            // Convertir l'entier en énuméré MoyenDeTransport
            moyenDeTransport moyenTransportChoisi = static_cast<moyenDeTransport>(choixMoyenTransport);

            // Utilisation du setter pour définir le moyen de transport
            User1.setMoyenDeTransport(moyenTransportChoisi);
        } 
        else {
            cout << "Choix invalide. Veuillez saisir un nombre entre 0 et 3." << endl;
        }

        // PARTIE PREFERENCE
        preference();
        
    
    

    // récupèrer les réponses

    // traiter les données

    // créer les persona à partir du tout
    }
    
    
    return 0;
}
