#ifndef FONCTIONSRECUPCHOIX_H
#define FONCTIONSRECUPCHOIX_H

#include <iostream>
#include <string>


using namespace std;

//Création des réponses possibles
    enum LesMusiques {Jazz = 1, classique, rock, pop, rap, electro};
    enum LesSports {rugby = 1, pala, football, tennis, Tennis_de_table, course, badminton};
    enum LesActivitesCulturelles {cinema = 1, theatre, musee, zoo, visite_guidee, galerie_art, mediatheque, corrida};
    enum LesActivitesOrganisees {tournoi_jeux_videos = 1, loup_garoup, uno, cricket};
    enum LesRestaurants {fast_food = 1, junk_food, restaurants_traditionnels, restaurants_du_monde};
    enum LesSorties {bar = 1, soiree_etudiante, boite_de_nuit};



//FONCTIONS DE RECUPERATION : ELLES SERVENT A RECUPERER LE CONTENU D UN TYPE ENUM (ex : jazz) A PARTIR DE SON INDICE (1)

string recuperationsMusiques(int choix)
{
        LesMusiques musique = static_cast<LesMusiques>(choix);
        string strMusique;
        
        switch (musique)
        {
            case Jazz:
                strMusique = "Jazz";
                break;
            case classique:
                strMusique = "classique";
                break;
            case rock:
                strMusique = "rock";
                break;
            case pop:
                strMusique = "pop";
                break;
            case rap:
                strMusique = "rap";
                break;
            case electro:
                strMusique = "electro";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strMusique;
}

string recuperationsSport(int choix)
{
        LesSports sport = static_cast<LesSports>(choix);
        string strSport;
        
        switch (sport)
        {
            case rugby:
                strSport = "rugby";
                break;
            case pala:
                strSport = "pala";
                break;
            case football:
                strSport = "football";
                break;
            case tennis:
                strSport = "tennis";
                break;
            case Tennis_de_table:
                strSport = "Tennis_de_table";
                break;
            case course:
                strSport = "course";
                break;
            case badminton:
                strSport = "badminton";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strSport;
}

string recuperationsActivitesCulturelles(int choix)
{
        LesActivitesCulturelles activiteCulturelle = static_cast<LesActivitesCulturelles>(choix);
        string strActiviteCulturelle;
        
        switch (activiteCulturelle)
        {
            case cinema:
                strActiviteCulturelle = "cinema";
                break;
            case theatre:
                strActiviteCulturelle = "theatre";
                break;
            case musee:
                strActiviteCulturelle = "musee";
                break;
            case zoo:
                strActiviteCulturelle = "zoo";
                break;
            case visite_guidee:
                strActiviteCulturelle = "visite_guidee";
                break;
            case galerie_art:
                strActiviteCulturelle = "galerie_art";
                break;
            case mediatheque:
                strActiviteCulturelle = "mediatheque";
                break;
            case corrida:
                strActiviteCulturelle = "corrida";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strActiviteCulturelle;
}

string recuperationsActivitesOrganisees(int choix)
{
        LesActivitesOrganisees activitesOrganisees = static_cast<LesActivitesOrganisees>(choix);
        string strActivitesOrganisees;
        
        switch (activitesOrganisees)
        {
            case tournoi_jeux_videos:
                strActivitesOrganisees = "tournoi_jeux_videos";
                break;
            case loup_garoup:
                strActivitesOrganisees = "loup_garoup";
                break;
            case uno:
                strActivitesOrganisees = "uno";
                break;
            case cricket:
                strActivitesOrganisees = "cricket";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strActivitesOrganisees;
}

string recuperationsRestaurants(int choix)
{
        LesRestaurants restaurants = static_cast<LesRestaurants>(choix);
        string strRestaurants;
        
        switch (restaurants)
        {
            case fast_food:
                strRestaurants = "fast_food";
                break;
            case junk_food:
                strRestaurants = "junk_food";
                break;
            case restaurants_traditionnels:
                strRestaurants = "restaurants_traditionnels";
                break;
            case restaurants_du_monde:
                strRestaurants = "restaurants_du_monde";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strRestaurants;
}

string recuperationsSorties(int choix)
{
        LesSorties sorties = static_cast<LesSorties>(choix);
        string strSorties;
        
        switch (sorties)
        {
            case bar:
                strSorties = "bar";
                break;
            case soiree_etudiante:
                strSorties = "soiree_etudiante";
                break;
            case boite_de_nuit:
                strSorties = "boite_de_nuit";
                break;
            default:
                cout << "erreur" << endl;
        }
    return strSorties;
}

#endif