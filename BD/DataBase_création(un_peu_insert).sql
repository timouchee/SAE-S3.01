CREATE TABLE Utilisateur (
   codeCarteEtudiante VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   dateNaiss DATE,
   moyenTransportPrincipal VARCHAR(15),
   moyenTransportSecondaire VARCHAR(15),
   numTel INT,
   mail VARCHAR(50),
   sexe VARCHAR(15),
   adresse VARCHAR(50),
   PRIMARY KEY(codeCarteEtudiante),
   CONSTRAINT check_moyenTransportPrincipal CHECK (moyenTransportPrincipal IN ('Marche', 'Vélo', 'Voiture', 'Bus')),
   CONSTRAINT check_moyenTransportSecondaire CHECK (moyenTransportSecondaire IN ('Marche', 'Vélo', 'Voiture', 'Bus')),
   CONSTRAINT check_sexe CHECK (sexe IN ('Homme', 'Femme'))
);


CREATE TABLE Administrateur (
   code VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   mail VARCHAR(50),
   numTel INT,
   PRIMARY KEY(code)
);


CREATE TABLE OffreEmploi (
   code VARCHAR(6) NOT NULL,
   typeOffre VARCHAR(10) NOT NULL,
   detail VARCHAR(500),
   nomEntreprise VARCHAR(70),
   mailEntreprise VARCHAR(50),
   horaires VARCHAR(20),
   salaire INT,
   dateDeb DATE NOT NULL,
   dateFin DATE NOT NULL,
   adresse VARCHAR(100),
   nbHeures INT,
   datePublication DATE,
   PRIMARY KEY(code),
   CONSTRAINT check_typeOffre CHECK (typeOffre IN ('CDD', 'CDI', 'Interim', 'Stage')),
   CONSTRAINT check_mailEntreprise CHECK (mailEntreprise LIKE '%@%' AND mailEntreprise NOT LIKE '% %' AND mailEntreprise LIKE '%.%'),
   CONSTRAINT check_horaires CHECK (horaires LIKE '%H% / %H%')
   -- Ajoutez ici d'autres contraintes si nécessaire
);


CREATE TABLE Colocation (
   code VARCHAR(6),
   nombrePlaces INT NOT NULL,
   adresse VARCHAR(100) NOT NULL,
   taille INT,
   loyer INT,
   dateDeb DATE NOT NULL,
   dateFin DATE,
   sexe VARCHAR(15),
   Description VARCHAR(500),
   PRIMARY KEY(code),
   CONSTRAINT check_nombrePlaces CHECK (nombrePlaces >= 0 AND nombrePlaces < 100),
   CONSTRAINT check_taille CHECK (taille >= 10 AND taille <= 999.99),
   CONSTRAINT check_loyer CHECK (loyer >= 10 AND loyer <= 9999.99)
);

CREATE TABLE Covoiturage (
   code VARCHAR(6) NOT NULL,
   depart VARCHAR(100) NOT NULL,
   destination VARCHAR(100) NOT NULL,
   nombrePlace INT NOT NULL,
   prix INT,
   PRIMARY KEY(code),
   CONSTRAINT check_prix CHECK (prix >= 1 AND prix < 100)
);

CREATE TABLE Activite (
   code VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   typeActivite VARCHAR(15) NOT NULL,
   detail VARCHAR(500),
   adresse VARCHAR(100) NOT NULL,
   etat VARCHAR(15),
   codeAdministrateur VARCHAR(6),
   codeCarteEtudiante VARCHAR(6),
   PRIMARY KEY(code),
   FOREIGN KEY(codeAdministrateur) REFERENCES Administrateur(code),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   CONSTRAINT check_typeActivité CHECK (typeActivite IN ('Sport', 'Musique', 'Restaurant', 'Sortie', 'ActiviteCulturelle', 'ActiviteOrganisee')),
   CONSTRAINT check_etat CHECK (etat IN ('Ouvert', 'Ferme', 'En attente'))
);


CREATE TABLE Evenement (
   code VARCHAR(6) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   typeEvenement VARCHAR(15),
   adresse VARCHAR(100),
   detail VARCHAR(500),
   dateEvenement DATE NOT NULL,
   codeAdministrateur VARCHAR(6),
   codeCarteEtudiante VARCHAR(6),
   PRIMARY KEY(code),
   FOREIGN KEY(codeAdministrateur) REFERENCES Administrateur(code),
  FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   CONSTRAINT check_typeEvenement CHECK (typeEvenement IN ('Sport', 'Musique', 'Restaurant', 'Sortie', 'ActiviteCulturelle', 'ActiviteOrganisee'))
);


CREATE TABLE ParticiperActivite(
   codeCarteEtudiante VARCHAR(6),
   codeActivite VARCHAR(6),
   PRIMARY KEY(codeCarteEtudiante, codeActivite),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeActivite) REFERENCES Activite(code)
);

CREATE TABLE FairePartieOffreEmploi(
   codeCarteEtudiante VARCHAR(6),
   codeOffre VARCHAR(6),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeOffre),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeOffre) REFERENCES OffreEmploi(code)
);

CREATE TABLE FairePartieColocation(
   codeCarteEtudiante VARCHAR(6),
   codeColocation VARCHAR(6),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeColocation),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeColocation) REFERENCES Colocation(code)
);

CREATE TABLE FairePartieCovoiturage(
   codeCarteEtudiante VARCHAR(6),
   codeCovoiturage VARCHAR(6),
   dateInscription DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeCovoiturage),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeCovoiturage) REFERENCES Covoiturage(code)
);

CREATE TABLE suggererActivite(
   codeCarteEtudiante VARCHAR(6),
   codeActivite VARCHAR(6),
   PRIMARY KEY(codeCarteEtudiante, codeActivite),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeActivite) REFERENCES Activite(code)
);

CREATE TABLE ParticiperEvenement(
   codeCarteEtudiante VARCHAR(6),
   codeEvenement VARCHAR(6),
   dateInscrption DATE NOT NULL,
   PRIMARY KEY(codeCarteEtudiante, codeEvenement),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeEvenement) REFERENCES Evenement(code)
);

CREATE TABLE suggererEvenement(
   codeCarteEtudiante VARCHAR(6),
   codeEvenement VARCHAR(6),
   PRIMARY KEY(codeCarteEtudiante, codeEvenement),
   FOREIGN KEY(codeCarteEtudiante) REFERENCES Utilisateur(codeCarteEtudiante),
   FOREIGN KEY(codeEvenement) REFERENCES Evenement(code)
);

--============Insertion==============**


INSERT INTO Utilisateur (codeCarteEtudiante, nom, prenom, dateNaiss, moyenTransportPrincipal, moyenTransportSecondaire, numTel, mail, sexe, adresse)
VALUES ('123497', 'Doe', 'John', '01/01/2004', 'Vélo', 'Bus', 1234567890, 'john.doe@email.com', 'Homme', '123 Street, City');

INSERT INTO OffreEmploi (code, typeOffre, detail, nomEntreprise, mailEntreprise, horaires, salaire, dateDeb, dateFin, adresse, nbHeures, datePublication)
VALUES ('O001', 'CDI', 'Description de l offre', 'Entreprise XYZ', 'contact@xyz.com', '9H00 / 18H00', 12.31, '01/01/2023', '01/02/2023', '456 Avenue, City', 20, '01/12/2022');

INSERT INTO Administrateur (code, nom, prenom, mail, numTel)
VALUES ('A12345', 'Smith', 'Alice', 'alice.smith@email.com', 9876543210);

INSERT INTO Colocation (code, nombrePlaces, adresse, taille, loyer, dateDeb, dateFin, sexe, Description)
VALUES ('C001', 3, '123 Street, City', 120 , 800.00, '01/01/2023', '01/06/2023', 'Femme', 'Description de la colocation');

INSERT INTO Covoiturage (code, depart, destination, nombrePlace, prix)
VALUES ('0001', 'CityA', 'CityB', 3, 20.50);

INSERT INTO Administrateur (code, nom, prenom, mail, numTel)
VALUES ('00005', 'nom_admin1', 'prenom_admin1', 'admin1@gmail.com', 2043265750);

INSERT INTO Activite (code, nom, typeActivite, detail, adresse, etat, codeAdministrateur,codeCarteEtudiante)
VALUES ('A001', 'Yoga', 'Sport', 'Séance de yoga relaxante', '789 Street, City', 'Ouvert', '00005','123497');

INSERT INTO Evenement (code, nom, typeEvenement, adresse, detail, dateEvenement, codeAdministrateur,codeCarteEtudiante)
VALUES ('00001', 'Concert', 'Musique', '456 Plaza, City', 'Concert en plein air', '15/03/2023', NULL,'123497');

INSERT INTO ParticiperActivite (codeCarteEtudiante, codeActivite)
VALUES ('123497', 'A001');

INSERT INTO FairePartieOffreEmploi (codeCarteEtudiante, codeOffre,dateInscription)
VALUES ('123497', 'O001','15/03/2023');



--============DROPALL==============**



-- Supprimer la table ParticiperEvenement
DROP TABLE ParticiperEvenement;

-- Supprimer la table suggérerEvenement
DROP TABLE suggererEvenement;

-- Supprimer la table ParticiperActivite
DROP TABLE ParticiperActivite;

-- Supprimer la table suggérerActivite
DROP TABLE suggererActivite;

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
DROP TABLE Activite;

-- Supprimer la table OffreEmploi
DROP TABLE OffreEmploi;

-- Supprimer la table Administrateur
DROP TABLE Administrateur;

-- Supprimer la table Utilisateur
DROP TABLE Utilisateur;











