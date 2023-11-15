CREATE TABLE Utilisateur (
   codeCarteEtudiante VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   dateNaiss DATE,
   moyenTransportPrincipal VARCHAR(25),
   moyenTransportSecondaire VARCHAR(50),
   numTel VARCHAR(10),
   mail VARCHAR(30),
   sexe VARCHAR(10),
   adresseUtilisateur VARCHAR(50),
   PRIMARY KEY(codeCarteEtudiante),
   CONSTRAINT check_moyenTransportPrincipal CHECK (moyenTransportPrincipal IN ('Marche', 'Vélo', 'Voiture', 'Bus')),
   CONSTRAINT check_moyenTransportSecondaire CHECK (moyenTransportSecondaire IN ('Marche', 'Vélo', 'Voiture', 'Bus')),
   CONSTRAINT check_sexe CHECK (sexe IN ('Homme', 'Femme'))
);


CREATE TABLE Administrateur (
   codeAdministrateur VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   mail VARCHAR(30),
   numTel VARCHAR(10),
   PRIMARY KEY(codeAdministrateur)
);


CREATE TABLE OffreEmploi (
   codeOffre VARCHAR(4) NOT NULL,
   typeOffre VARCHAR(10) NOT NULL,
   detailOffre VARCHAR(500),
   nomEntreprise VARCHAR(70),
   mailEntreprise VARCHAR(50),
   horaires VARCHAR(50),
   salaire INT, -- Changement du type de données à INT
   dateDeb DATE NOT NULL,
   dateFin DATE NOT NULL,
   adresse VARCHAR(50),
   nbHeures INT,
   datePublication VARCHAR(50),
   PRIMARY KEY(codeOffre),
   CONSTRAINT check_typeOffre CHECK (typeOffre IN ('CDD', 'CDI', 'Interim', 'Stage')),
   CONSTRAINT check_mailEntreprise CHECK (mailEntreprise LIKE '%@%' AND mailEntreprise NOT LIKE '% %' AND mailEntreprise LIKE '%.%'),
   CONSTRAINT check_horaires CHECK (horaires LIKE '%H% / %H%'),
   CONSTRAINT check_salaire CHECK (salaire >= 10)
   -- Ajoutez ici d'autres contraintes si nécessaire
);



CREATE TABLE Colocation (
   codeColocation VARCHAR(4),
   nombrePlaces INT NOT NULL,
   adresseColocation VARCHAR(50),
   taille DECIMAL(7,2),
   loyer DECIMAL(6,2),
   dateDeb DATE NOT NULL,
   dateFin DATE NOT NULL,
   sexe VARCHAR(10),
   Description VARCHAR(500) NOT NULL,
   PRIMARY KEY(codeColocation),
   CONSTRAINT check_nombrePlaces CHECK (nombrePlaces >= 0 AND nombrePlaces < 100),
   CONSTRAINT check_taille CHECK (taille >= 10 AND taille <= 999.99),
   CONSTRAINT check_loyer CHECK (loyer >= 10 AND loyer <= 9999.99)
);

CREATE TABLE Covoiturage (
   codeCovoiturage VARCHAR(4) NOT NULL,
   depart VARCHAR(50) NOT NULL,
   destination VARCHAR(50) NOT NULL,
   nombrePlace int NOT NULL,
   prix DECIMAL(5,2),
   PRIMARY KEY(codeCovoiturage),
   CONSTRAINT check_prix CHECK (prix >= 1 AND prix < 100)
);

CREATE TABLE Activité (
   codeActivité VARCHAR(6) NOT NULL,
   nomActivité VARCHAR(50) NOT NULL,
   typeActivité VARCHAR(50) NOT NULL,
   détailActivité VARCHAR(500),
   adresseActivité VARCHAR(50) NOT NULL,
   etat VARCHAR(50),
   codeAdministrateur VARCHAR(6) NOT NULL,
   PRIMARY KEY(codeActivité),
   FOREIGN KEY(codeAdministrateur) REFERENCES Administrateur(codeAdministrateur),
   CONSTRAINT check_typeActivité CHECK (typeActivité IN ('Sport', 'Musique', 'Restaurant', 'Sortie', 'ActiviteCulturelle', 'ActiviteOrganisee')),
   CONSTRAINT check_etat CHECK (etat IN ('ouvert', 'ferme'))
);


CREATE TABLE Evenement (
   codeEvenement VARCHAR(6) NOT NULL,
   nomEvenement VARCHAR(50) NOT NULL,
   typeEvenement VARCHAR(50),
   adresseEvenement VARCHAR(50),
   détailEvenement VARCHAR(500),
   dateEvenement DATE NOT NULL,
   codeAdministrateur VARCHAR(6) NOT NULL,
   PRIMARY KEY(codeEvenement),
   FOREIGN KEY(codeAdministrateur) REFERENCES Administrateur(codeAdministrateur),
   CONSTRAINT check_typeEvenement CHECK (typeEvenement IN ('Sport', 'Musique', 'Restaurant', 'Sortie', 'ActiviteCulturelle', 'ActiviteOrganisee'))
);


CREATE TABLE ParticiperActivite(
   codeCarteEtudiante VARCHAR(6),
   codeActivité VARCHAR(4),
   PRIMARY KEY(codeCarteEtudiante, codeActivité),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeActivité) REFERENCES Activité(codeActivité)
);

CREATE TABLE FairePartieOffreEmploi(
   codeCarteEtudiante VARCHAR(6),
   codeOffre VARCHAR(4),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeOffre),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeOffre) REFERENCES OffreEmploi(codeOffre)
);

CREATE TABLE FairePartieColocation(
   codeCarteEtudiante VARCHAR(6),
   codeColocation VARCHAR(4),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeColocation),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeColocation) REFERENCES Colocation(codeColocation)
);

CREATE TABLE FairePartieCovoiturage(
   codeCarteEtudiante VARCHAR(6),
   codeCovoiturage VARCHAR(50),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeCovoiturage),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeCovoiturage) REFERENCES Covoiturage(codeCovoiturage)
);

CREATE TABLE suggérerActivite(
   codeCarteEtudiante VARCHAR(6),
   codeActivité VARCHAR(4),
   PRIMARY KEY(codeCarteEtudiante, codeActivité),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeActivité) REFERENCES Activité(codeActivité)
);

CREATE TABLE ParticiperEvenement(
   codeCarteEtudiante VARCHAR(6),
   codeEvenement VARCHAR(4),
   dateInscrption DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeEvenement),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeEvenement) REFERENCES Evenement(codeEvenement)
);

CREATE TABLE suggérerEvenement(
   codeCarteEtudiante VARCHAR(6),
   codeEvenement VARCHAR(4),
   PRIMARY KEY(codeCarteEtudiante, codeEvenement),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeEvenement) REFERENCES Evenement(codeEvenement)
);

--============insertion==============**


INSERT INTO Utilisateur (codeCarteEtudiante, nom, prenom, dateNaiss, moyenTransportPrincipal, moyenTransportSecondaire, numTel, mail, sexe, adresseUtilisateur)
VALUES ('123497', 'Doe', 'John', '01/01/2004', 'Vélo', 'Bus', '1234567890', 'john.doe@email.com', 'Homme', '123 Street, City');

INSERT INTO OffreEmploi (codeOffre, typeOffre, detailOffre, nomEntreprise, mailEntreprise, horaires, salaire, dateDeb, dateFin, adresse, nbHeures, datePublication)
VALUES ('O001', 'CDI', 'Description de l offre', 'Entreprise XYZ', 'contact@xyz.com', '9H00 / 18H00', 50000, '01/01/2023', '01/02/2023', '456 Avenue, City', 40, '01/12/2022');

INSERT INTO Administrateur (codeAdministrateur, nom, prenom, mail, numTel)
VALUES ('A12345', 'Smith', 'Alice', 'alice.smith@email.com', '9876543210');

INSERT INTO Colocation (codeColocation, nombrePlaces, adresseColocation, taille, loyer, dateDeb, dateFin, sexe, Description)
VALUES ('C001', 3, '123 Street, City', 120 , 800.00, '01/01/2023', '01/06/2023', 'Femme', 'Description de la colocation');

INSERT INTO Covoiturage (codeCovoiturage, depart, destination, nombrePlace, prix)
VALUES ('0001', 'CityA', 'CityB', 3, 20.50);

INSERT INTO Administrateur (codeAdministrateur, nom, prenom, mail, numTel)
VALUES ('00005', 'nom_admin1', 'prenom_admin1', 'admin1@gmail.com', 2043265750);

INSERT INTO Activité (codeActivité, nomActivité, typeActivité, détailActivité, adresseActivité, etat, codeAdministrateur)
VALUES ('A001', 'Yoga', 'Sport', 'Séance de yoga relaxant', '789 Street, City', 'ouvert', '00005');

INSERT INTO Evenement (codeEvenement, nomEvenement, typeEvenement, adresseEvenement, détailEvenement, dateEvenement, codeAdministrateur)
VALUES ('00001', 'Concert', 'Musique', '456 Plaza, City', 'Concert en plein air', '15/03/2023', '00005');

INSERT INTO ParticiperActivite (codeCarteEtudiante, codeActivité)
VALUES ('123497', 'A001');

INSERT INTO FairePartieOffreEmploi (codeCarteEtudiante, codeOffre,dateInscription)
VALUES ('123497', 'O001','15/03/2023');



--============DROPALL==============**



-- Supprimer la table ParticiperEvenement
DROP TABLE ParticiperEvenement;

-- Supprimer la table suggérerEvenement
DROP TABLE suggérerEvenement;

-- Supprimer la table ParticiperActivite
DROP TABLE ParticiperActivite;

-- Supprimer la table suggérerActivite
DROP TABLE suggérerActivite;

-- Supprimer la table FairePartieCovoiturage
DROP TABLE FairePartieCovoiturage;

-- Supprimer la table FairePartieColocation
DROP TABLE FairePartieColocation;

-- Supprimer la table FairePartieOffreEmploi
DROP TABLE FairePartieOffreEmploi;

-- Supprimer la table Covoiturage
DROP TABLE Covoiturage;

-- Supprimer la table Colocation
DROP TABLE Colocation;

-- Supprimer la table Evenement
DROP TABLE Evenement;

-- Supprimer la table Activité
DROP TABLE Activité;

-- Supprimer la table OffreEmploi
DROP TABLE OffreEmploi;

-- Supprimer la table Administrateur
DROP TABLE Administrateur;

-- Supprimer la table Utilisateur
DROP TABLE Utilisateur;











