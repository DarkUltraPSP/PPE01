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
idUtilisateur INT,
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

ALTER TABLE Commentaire
ADD CONSTRAINT Utilisateur_idUtilisateur
FOREIGN KEY (idUtilisateur)
REFERENCES Utilisateur (idUtilisateur);

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idUtilisateur
FOREIGN KEY (idUtilisateur)
REFERENCES Utilisateur (idUtilisateur);

INSERT INTO Utilisateur (idUtilisateur, pseudo, password, dateNaissance, cheminPhoto, sexe, mail, ban) VALUES
(1, "Test" , "password",  "2000-12-13", "UserImage/Berserk", "Homme", "test@gmail.com", 0),
(2, "Ixoti", "password", "1999-02-17", "UserImage/PDP Berserk", "Homme", "Ixoti@gmail.com", 0);

INSERT INTO Sujet (idSujet, nomSujet, contenuSujet, canRespond, dateSujet) VALUES
(1, "Y a t-il de bonne ou de mauvaises situations ?", "Vous savez, moi je ne crois pas qu'il y ait de bonnes ou de mauvaises situations. Moi si je devais résumer ma vie, aujourd'hui, avec vous, je dirais que c'est d'abord des rencontres, des gens qui m'ont tendu la main, peut-être à un moment où je ne pouvais pas, où j'étais seul chez moi, et c'est assez curieux de se dire que les hasards, les rencontres forgent une destinée, parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l'interlocuteur en face, je dirais le miroir qui vous aide à avancer ; alors ce n'est pas mon cas comme je le disais là, puisque moi au contraire j'ai pu et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie, je ne suis qu'amour, et finalement quand beaucoup de gens aujourd'hui me disent : Mais comment fais-tu pour avoir cette humanité ? Et bah je leur réponds très simplement, je leur dis : c'est ce goût de l'amour, ce goût donc qui m'a poussé, aujourd'hui, à entreprendre une construction mécanique mais demain, qui sait, peut-être, simplement à me mettre au service de la communauté, à faire le don, le don de soi...", 1, "2019-10-30");

INSERT INTO Commentaire (contenuCommentaire , dateCommentaire, idSujet,idUtilisateur)
VALUES ("Pas mal x) je connais la ref &#128147 Best film ever","2019-11-12",1,2),
("Que des Gamins... le film est nul et les acteurs jouent mal","2019-12-12",1,1),
("Moi je pense avec mon BTS philo que toute solution est juste une suite d'action qui créer des conséquences ","2019-11-10",1,1);