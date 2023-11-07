#ifndef PERSONA_H
#define PERSONA_H
    #include <iostream>
    #include <map>
    #include <list>
    #include "utilisateur.h"
    using namespace std;
    /**
     * DICO : 
     * thème: => correspond à un centre d'intérêt lié à une persona (nourriture, musique...)
     */

    class Persona
    {
    private:
        /**
         * liste des utilisateurs associées à cette persona
         * 
         */
        typedef list<Utilisateur> lstUtilisateur; 
        lstUtilisateur uneListeUtilisateur;

        
        /** 
         * action: => correspond à une interaction avec une recommendation présentée sur le site (click, like ...)
         * action :
         *  click +
         *  comment +
         *  valider présence +
         *  skip -
         *  recherche +
         * 
         * maj du résultat de la somme des actions tous les semaines pour vérifier si le résultat est toujours cohérent 
         * 
         */
        int somme_action;
        /**
         * Il y a un degré de préférence pour chaque thème.
         * Le degré de préférence est calculé en fonction du résultat des actions (somme liés aux actions)
         * 
         * 
         */
        int degre_de_preference;
        /**
         * 
         * liste préférence musique [(musique, degré_de_préférence), (...)]
         * liste préférence nourriture [(typeNourriture, degré_de_préférence), (...)]
         * liste préférence activité [(activité, degré_de_préférence), (...)]
         * 
         */
        typedef map<int, pair<int, string>> listPreference;
        listPreference lstPrefMusique;
        listPreference lstPrefNourriture;
        listPreference lstPrefActivite;
        /**
         * Cette attribut servira à savoir si la personne associée à cette persona possède une voiture
         * Cela servira pour les informations en lien avec le covoiturage ainsi qu'avec l'option pour les trajets (piéton, cycliste, voiture...)
         * On part du principe que si la personne ne nous dit pas qu'elle possède une voiture elle n'en possède donc pas.
         */
        bool possedeVoiture = false;
        /**
         * liste des tranches de budget auquels les étudiants seraient affectées afin de proposer des activités apropriées 
         * (pas trop cher pour budget restraint)
         * 
         */
        enum tranchebudget {gratuit, restraint, moyen, large};
        tranchebudget ressourcebudget;
        
    public:

        //CONSTRUCTEURS
        Persona(/* args */);
        ~Persona();

        //SETTER ET GETTER
        // Getter et Setter pour somme_action
        int getSommeAction() const;
        void setSommeAction(int sommeAction);

        // Getter et Setter pour degre_de_preference
        int getDegreDePreference() const;
        void setDegreDePreference(int degreDePreference);

        // Getter et Setter pour lstPrefMusique
        const listPreference& getLstPrefMusique() const;
        void setLstPrefMusique(const listPreference& lstPref);

        // Getter et Setter pour lstPrefNourriture
        const listPreference& getLstPrefNourriture() const;
        void setLstPrefNourriture(const listPreference& lstPref);

        // Getter et Setter pour lstPrefActivite
        const listPreference& getLstPrefActivite() const;
        void setLstPrefActivite(const listPreference& lstPref);

        // Getter et Setter pour possedeVoiture
        bool getPossedeVoiture() const;
        void setPossedeVoiture(bool possede);

        // Getter et Setter pour ressourcebudget
        tranchebudget getRessourceBudget() const;
        void setRessourceBudget(tranchebudget budget);

        // Getter et setter pour uneListeUtilisateur
        const lstUtilisateur& getUneListeUtilisateur() const;
        void setUneListeUtilisateur(const lstUtilisateur& listeUtilisateur); 
        // Parcours de la liste et effectuer certaines opérations
        void parcourirListeUtilisateur() const;

        //METHODE
        bool estOKPourCovoiturage(bool possedeVoiture);

    };
#endif
