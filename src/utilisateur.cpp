#include "utilisateur.h"
#include "iostream"
using namespace std;

string Utilisateur::getID() const{
    return ID;
}

void Utilisateur::setID(string id){
    id = ID;
}

//Setter et Getter du nom de l'utilisateur
string Utilisateur::getNom() const{
    return nom;
}
void Utilisateur::setNom(string nomUser){
    nomUser = nom;
}

//Setter et Getter du prenom de l'utilisateur
string Utilisateur::getPrenom() const{
    return prenom;
}
void Utilisateur::setPrenom(string prenomUser){
    prenomUser = prenom;
}

//Setter et Getter du mot de passe de l'utilisateur
string Utilisateur::getMotDePasse() const{
    return motDePasse;
}
void Utilisateur::setMotDePasse(string motDePasseUser){
    motDePasseUser = motDePasse;
}

//Setter et Getter du mail de l'utilisateur
string Utilisateur::getMail() const{
    return mail;
}
void Utilisateur::setMail(string mailUser){
    mailUser = mail;
}

//Setter et Getter de la date de naissance de l'utilisateur
string Utilisateur::getDateNaiss() const{
    return dateNaiss;
}
void Utilisateur::setDateNaiss(string dateNaissUser){
    dateNaissUser = dateNaiss;
}