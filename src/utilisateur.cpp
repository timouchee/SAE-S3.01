#include "utilisateur.h"
#include "iostream"
using namespace std;

/*------------------------------- CONSTRUCTEUR ---------------------------------------------*/

// Constructeur par défaut
Utilisateur::Utilisateur() : transport(pied), maPersona() {
    ID = "";
    nom = "";
    prenom = "";
    motDePasse = "";
    mail = "";
    dateNaiss = "";
    adresse = "";
    etude = "";
}

// Constructeur avec des paramètres
Utilisateur::Utilisateur(string id, string n, string pren, string mdp, string m, string dateN, string adr, string etd, moyenDeTransport trans) : transport(trans), maPersona() {
    ID = id;
    nom = n;
    prenom = pren;
    motDePasse = mdp;
    mail = m;
    dateNaiss = dateN;
    adresse = adr;
    etude = etd;
}

// Constructeur copieur
Utilisateur::Utilisateur(const Utilisateur& autreUtilisateur) : transport(autreUtilisateur.transport), maPersona(autreUtilisateur.maPersona) {
    ID = autreUtilisateur.ID;
    nom = autreUtilisateur.nom;
    prenom = autreUtilisateur.prenom;
    motDePasse = autreUtilisateur.motDePasse;
    mail = autreUtilisateur.mail;
    dateNaiss = autreUtilisateur.dateNaiss;
    adresse = autreUtilisateur.adresse;
    etude = autreUtilisateur.etude;
}

// Destructeur
Utilisateur::~Utilisateur() {}

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

//Setter et Getter de moyen de transport
void Utilisateur::setMoyenDeTransport(moyenDeTransport nouveauTransport) {
    transport = nouveauTransport;
}
moyenDeTransport Utilisateur::getMoyenDeTransport() const {
    return transport;
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

bool Utilisateur::estAdresseValide(string adresseUser){
    // Séparer le ville/village et la rue
    size_t posVirgule = adresseUser.find(',');
    if (posVirgule == string::npos || posVirgule == 0 || posVirgule == adresseUser.length() - 1){
        return false;
    }
    string villeUser = adresseUser.substr(0, posVirgule);
    string rueUser = adresseUser.substr(posVirgule + 1);

    // Séparer le numéro de la rue et nom de la rue
    size_t posEspace = rueUser.find(' ');
    if (posEspace == string::npos || posEspace == 0 || posEspace == rueUser.length() - 1){
        return false;
    }
    string numRue = rueUser.substr(0,posEspace);
    string nomRue = rueUser.substr(posEspace + 1);

    //vérifie si le numero de la rue est uniquement composée de nombres
    for (char caractere : numRue) {
        if (!isdigit(caractere)) {
            return false;
        }
    }

    //vérifie si le nom de la rue est correct
    for (char caractere : nomRue) {
        if (!isalpha(caractere) && !isspace(caractere)) {
            return false;
        }
    }
    // Tout est OK
    return true;

}