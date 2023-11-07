#ifndef UTILISATEUR_H
#define UTILISATEUR_H
#include <iostream>
using namespace std;

class Utilisateur
{
private:
    /**
     * ID : code de la carte étudiante nécessaire à la connexion
     * nom : nom de l'utilisateur
     * prenom : prénom de l'utilisateur
     * motDePasse : mot de passe utilisée à la connection de l'utilisateur
     * mail : adresse mail renseignée par l'utilisateur 
     * dateNaiss : date de naissance de l'utilisateur (type : jj/mm/aaaa)
     */
    string ID, nom, prenom, motDePasse, mail, dateNaiss;
public:
    Utilisateur(/* args */);
    ~Utilisateur();

    //SETTER ET GETTER
    //Setter et Getter de l'ID de l'utilisateur
    string getID() const;
    void setID(string ID);

};

#endif