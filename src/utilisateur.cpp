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
bool Utilisateur::estDateValide(string dateNaissUser) {
    // Vérifier la longueur de la chaîne (jj/mm/aaaa)
    if (dateNaissUser.length() != 10) {
        return false;
    }

    // Vérifier si les caractères aux positions spécifiques sont des chiffres et '/'
    for (int i = 0; i < 10; ++i) {
        if (i == 2 || i == 5) {
            if (dateNaissUser[i] != '/') {
                return false;
            }
        } else {
            if (!isdigit(dateNaissUser[i])) {
                return false;
            }
        }
    }

    // Extraire le jour, le mois et l'année de la chaîne
    int jour = stoi(dateNaissUser.substr(0, 2));
    int mois = stoi(dateNaissUser.substr(3, 2));
    int annee = stoi(dateNaissUser.substr(6, 4));

    // Vérifier si le jour, le mois et l'année sont dans des plages valides
    if (jour >= 1 && jour <= 31 && mois >= 1 && mois <= 12 && annee >= 1700 && annee <= 9999) {
        return true;
    }

    return false;
}

bool Utilisateur::estMailValide(string mailUser){
    // Vérifie s'il y a le '@'
    size_t posArobase = mailUser.find('@');
    if (posArobase == string::npos || posArobase == 0 || posArobase == mailUser.length() - 1) {
        return false;
    }

    // Séparer le pseudo de l'utilisateur et le domaine
    string nmailPseudo = mailUser.substr(0, posArobase);
    string domaine = mailUser.substr(posArobase + 1);

    // Vérifier le domaine contient un seul caractère '.'
    size_t posPoint = domaine.find('.');
    if (posPoint == string::npos || posPoint == 0 || posPoint == domaine.length() - 1) {
        return false;
    }

    return true;
}