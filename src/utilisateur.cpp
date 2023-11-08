#include "utilisateur.h"
#include "iostream"
using namespace std;

/*------------------------------- CONSTRUCTEUR ---------------------------------------------*/


/*------------------------------- SETTER ET GETTER -----------------------------------------*/

string Utilisateur::getID() const{
    return ID;
}
void Utilisateur::setID(string id){
    ID = id;
}

//Setter et Getter du nom de l'utilisateur
string Utilisateur::getNom() const{
    return nom;
}
void Utilisateur::setNom(string nomUser){
    nom = nomUser;
}

//Setter et Getter du prenom de l'utilisateur
string Utilisateur::getPrenom() const{
    return prenom;
}
void Utilisateur::setPrenom(string prenomUser){
    prenom = prenomUser;
}

//Setter et Getter du mot de passe de l'utilisateur
string Utilisateur::getMotDePasse() const{
    return motDePasse;
}
void Utilisateur::setMotDePasse(string motDePasseUser){
    motDePasse = motDePasseUser;
}

//Setter et Getter du mail de l'utilisateur
string Utilisateur::getMail() const{
    return mail;
}
void Utilisateur::setMail(string mailUser){
    mail = mailUser;
}

//Setter et Getter de la date de naissance de l'utilisateur
string Utilisateur::getDateNaiss() const{
    return dateNaiss;
}
void Utilisateur::setDateNaiss(string dateNaissUser){
    dateNaiss = dateNaissUser;
}

//Setter et Getter de l'adresse de l'utilisateur
string Utilisateur::getAdresse() const{
    return adresse;
}
void Utilisateur::setAdresse(string adresseUser){
    adresse = adresseUser;
}

//Setter et Getter de la date de naissance de l'utilisateur
string Utilisateur::getEtude() const{
    return etude;
}
void Utilisateur::setEtude(string etudeUser){
    etude = etudeUser;
}

//Setter et Getter de la persona liée à l'utilisateur
Persona Utilisateur::getPersona() const{
    return maPersona;
}
void Utilisateur::setPersona(Persona personaUser){
    maPersona = personaUser;
}

/*------------------------------------------ METHODE -----------------------------------------*/