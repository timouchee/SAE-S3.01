#ifndef UTILISATEUR_H
#define UTILISATEUR_H
#include <iostream>
#include "persona.h"
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
     * adresse : adresse du domicile de l'utilisateur (type: Ville, mum rue)
     * etude : représente le niveau d'étude ainsi que la formation suivie
     */
    string ID, nom, prenom, motDePasse, mail, dateNaiss, adresse, etude;
    /**
     * mise en place des différents types de transport pour l'option de trajet
     */
    enum moyenDeTransport {pied, velo, moto, voiture};
    /**
     * Un utilisateur est lié à une seule persona
     */
    Persona maPersona; 

public:
    //  CONSTRUCTEUR
    Utilisateur(/* args */);
    ~Utilisateur();

    //  SETTER ET GETTER
    //Setter et Getter de l'ID de l'utilisateur
    string getID() const;
    void setID(string id);

    //Setter et Getter du nom de l'utilisateur
    string getNom() const;
    void setNom(string numUser);

    //Setter et Getter du prenom de l'utilisateur
    string getPrenom() const;
    void setPrenom(string prenomUser);

    //Setter et Getter du mot de passe de l'utilisateur
    string getMotDePasse() const;
    void setMotDePasse(string motDePasseUser);

    //Setter et Getter du mail de l'utilisateur
    string getMail() const;
    void setMail(string mailUser);

    //Setter et Getter de la date de naissance de l'utilisateur
    string getDateNaiss() const;
    void setDateNaiss(string dateNaissUser);

    //Setter et Getter de l'adresse de l'utilisateur
    string getAdresse() const;
    void setAdresse(string adresseUser);


    //Setter et Getter de la date de naissance de l'utilisateur
    string getEtude() const;
    void setEtude(string etudeUser);

    //Setter et Getter de la persona liée à l'utilisateur
    Persona getPersona() const;
    void setPersona(Persona personaUser);


};

#endif


/**
 * enum action {musique, nourriture...}
 * lstPref[pair<action[0], map<style musicale, degre pref>
 *         pair<action[1], map<style nourriture, degre pref>...]
 * 
 */