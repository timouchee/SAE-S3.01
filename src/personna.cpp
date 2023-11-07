#include "persona.h"
#include <iostream>

using namespace std;

// CONSTRUCTEUR (s'il y en a un, assurez-vous de l'implémenter)

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
