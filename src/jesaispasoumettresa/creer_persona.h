/**
 * @file creer_persona.h
 * @author Xan SALLENAVE
 * @brief 
 * @version 1.0
 * @date 2023-12-19
 * 
 * @copyright Copyright (c) 2023
 * 
 */
#ifndef CREER_PERSONA_H
#define CREER_PERSONA_H

#include <iostream>
#include <map>
#include <list>
#include <iterator>
using namespace std;

/**
 * @brief  la classe Persona permet de representer une personne a partir de ses goûts
 * 
 * @details au dela de decrire un utlisateur par ses goûts
 * elle permet de lier l'utilisateur avec la même Persona
 * 
 * 
 * @warning une Persona avec 0 ou trop d'utilisateur sera supprimer pour des raisons d'optimisation et de stockage
 */
class Persona{
    // ATTRIBUTS
    /**
     * @brief nom lié à la Persona
     * 
     */
    string nomPersona;

    /**
     * @brief liste de préférences associées à la Persona
     * 
     */
    lstpref1U lstPref;

};

/**
 * @brief  L'énumération pour les categorie de préférences permet de définir les goûts d'une personne a partir des différentes réponses 
 * au cours du questionnaire auquel il a répondu lorsqu'il s'est connecté couplé avec les différentes informations qu'il consulte sur le site
 * 
 * @details au dela de decrire un Utilisateur par ses goûts l'énumération permet
 * de fournir des des recommendations / informations plus personalisés pour l'Utilisateur
 * 
 * 
 * la Voiture conduite par l'Individu est représenter  par un pointeur vers un objet de la classe Voiture
 * 
 * @warning la liste des categorie peut toujours changer et peut donc amener à la perte ou à l'ajout de nouvelles catégories
 */
enum categorie { musique, restaurant };
/**
 * @brief 
 * Alias pour listes d'éléments et de preferenceUtilisateur 
 * 
 */
typedef list<string> lstelem;
typedef map<categorie, lstelem> lstpref1U;
typedef list<lstpref1U> preferenceUtilisateur;
typedef list<pair<string, int>> type_listPoids;

void remplirListePoids(const preferenceUtilisateur& lstresU, type_listPoids& listePoids);

preferenceUtilisateur cree_pref_U();

Persona creerPersona();

type_listPoids defPrefUtilisateurs(lstpref1U );

void trouverPersona(preferenceUtilisateur lstPref);

#endif