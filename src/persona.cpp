#include "persona.h"
#include "utilisateur.h"
#include <iostream>

using namespace std;

// CONSTRUCTEUR (s'il y en a un, assurez-vous de l'implémenter)
// Constructeur par défaut
Persona::Persona() : somme_action(0), degre_de_preference(0), possedeVoiture(false), ressourcebudget(gratuit) {
}

// Constructeur avec des paramètres
Persona::Persona(int sommeAction, int degreDePreference, bool possedeVoiture, tranchebudget budget)
    : somme_action(sommeAction), degre_de_preference(degreDePreference), possedeVoiture(possedeVoiture), ressourcebudget(budget) {
    // Initialisation des autres membres si nécessaire
}

// Constructeur copieur
Persona::Persona(const Persona& autrePersona)
    : somme_action(autrePersona.somme_action), degre_de_preference(autrePersona.degre_de_preference),
      possedeVoiture(autrePersona.possedeVoiture), ressourcebudget(autrePersona.ressourcebudget),
      lstPrefMusique(autrePersona.lstPrefMusique), lstPrefNourriture(autrePersona.lstPrefNourriture),
      lstPrefActivite(autrePersona.lstPrefActivite), uneListeUtilisateur(autrePersona.uneListeUtilisateur) {
    // Copiez les autres membres si nécessaire
}

// Destructeur
Persona::~Persona() {}

// Getter et Setter pour somme_action
int Persona::getSommeAction() const {
    return somme_action;
}

void Persona::setSommeAction(int sommeAction) {
    somme_action = sommeAction;
}

// Getter et Setter pour degre_de_preference
int Persona::getDegreDePreference() const {
    return degre_de_preference;
}

void Persona::setDegreDePreference(int degreDePreference) {
    degre_de_preference = degreDePreference;
}

// Getter et Setter pour lstPrefMusique
const Persona::listPreference& Persona::getLstPrefMusique() const {
    return lstPrefMusique;
}

void Persona::setLstPrefMusique(const listPreference& lstPref) {
    lstPrefMusique = lstPref;
}

// Getter et Setter pour lstPrefNourriture
const Persona::listPreference& Persona::getLstPrefNourriture() const {
    return lstPrefNourriture;
}

void Persona::setLstPrefNourriture(const listPreference& lstPref) {
    lstPrefNourriture = lstPref;
}

// Getter et Setter pour lstPrefActivite
const Persona::listPreference& Persona::getLstPrefActivite() const {
    return lstPrefActivite;
}

void Persona::setLstPrefActivite(const listPreference& lstPref) {
    lstPrefActivite = lstPref;
}

// Getter et Setter pour possedeVoiture
bool Persona::getPossedeVoiture() const {
    return possedeVoiture;
}

void Persona::setPossedeVoiture(bool possede) {
    possedeVoiture = possede;
}

// Getter et Setter pour ressourcebudget
Persona::tranchebudget Persona::getRessourceBudget() const {
    return ressourcebudget;
}

void Persona::setRessourceBudget(tranchebudget budget) {
    ressourcebudget = budget;
}

const Persona::lstUtilisateur& Persona::getUneListeUtilisateur() const {
    return uneListeUtilisateur;
}

// Définition du setter pour uneListeUtilisateur
void Persona::setUneListeUtilisateur(const lstUtilisateur& listeUtilisateur) {
    uneListeUtilisateur = listeUtilisateur;
}

// Définition de la méthode pour parcourir la liste et effectuer des opérations
void Persona::parcourirListeUtilisateur() const {
    for (const auto& utilisateur : uneListeUtilisateur) {
        cout << utilisateur.getID() << endl;
    }
}


