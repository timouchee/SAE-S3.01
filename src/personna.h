#ifndef PERSONA_H
#define PERSONA_H
    #include <iostream>
    #include <map>
    using namespace std;
    /**
     * DICO : 
     * thème: => correspond à un centre d'intérêt lié à une persona (nourriture, musique...)
     *
     */

    class personna
    {
    private:

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

        
    public:
        personna(/* args */);
        ~personna();
        bool estOKPourCovoiturage(bool possedeVoiture);

    };
#endif