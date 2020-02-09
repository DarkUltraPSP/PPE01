CREATE DATABASE PPE01;

USE PPE01;

CREATE TABLE Utilisateur
(
idUtilisateur INT AUTO_INCREMENT,
pseudo VARCHAR(64),
password VARCHAR(64),
dateNaissance DATE,
cheminPhoto VARCHAR (64),
sexe VARCHAR(64),
mail VARCHAR(64),
ban TINYINT,
idCommentaire INT,
PRIMARY KEY (idUtilisateur)
 );

CREATE TABLE Sujet
(
idSujet INT AUTO_INCREMENT,
nomSujet VARCHAR(64),
contenuSujet LONGTEXT,
canRespond TINYINT,
dateSujet DATE,
idUtilisateur INT,
PRIMARY KEY(idSujet)
);

CREATE TABLE Commentaire
(
idCommentaire INT AUTO_INCREMENT, 
contenuCommentaire LONGTEXT,
dateCommentaire DATE,
idSujet INT,
PRIMARY KEY(idCommentaire)
);

ALTER TABLE Utilisateur
ADD CONSTRAINT Utilisateur_idCommentaire
FOREIGN KEY (idCommentaire)
REFERENCES Commentaire (idCommentaire);

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idSujet
FOREIGN KEY (idSujet)
REFERENCES Sujet (idSujet);

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idUtilisateur
FOREIGN KEY (idUtilisateur)
REFERENCES Utilisateur (idUtilisateur);

-- INSERT INTO Utilisateur (idUtilisateur, pseudo, password, dateNaissance, cheminPhoto, sexe, mail, ban) VALUES

-- INSERT INTO Sujet (idSujet, nomSujet, contenuSujet canRespond, dateSujet) VALUES

-- INSERT INTO Commentaire (idCommentaire, contenuCommentaire, dateCommentaire) VALUES