CREATE DATABASE PPE01;
USE PPE01;
CREATE TABLE Utilisateurs (idUtilisateurs INT AUTO_INCREMENT ,pseudo VARCHAR(64),motDePasse VARCHAR(64),dateNaissance DATE, sexe VARCHAR(64),email VARCHAR(64), bloque TINYINT ,idCommentaires INT ,PRIMARY KEY (idUtilisateurs));

CREATE TABLE Sujets (idSujets INT AUTO_INCREMENT ,nomSujet VARCHAR(64),cheminPhoto VARCHAR (64), contenuSujet LONGTEXT , canRespond TINYINT , dateSujet DATE ,idUtilisateurs INT,PRIMARY KEY(idSujets));

CREATE TABLE Commentaires (idCommentaires INT AUTO_INCREMENT, contenuCommentaire LONGTEXT ,  dateCommentaire DATE ,idSujets INT ,PRIMARY KEY(idCommentaires));

ALTER TABLE Utilisateurs 
ADD CONSTRAINT Utilisateurs_idCommentaires
FOREIGN KEY (idCommentaires)
REFERENCES Commentaires (idCommentaires);

ALTER TABLE Commentaires
ADD CONSTRAINT Commentaires_idSujets
FOREIGN KEY (idSujets)
REFERENCES Sujets (idSujets);

ALTER TABLE Sujets
ADD CONSTRAINT Sujets_idUtilisateurs
FOREIGN KEY (idUtilisateurs)
REFERENCES Utilisateurs (idUtilisateurs);