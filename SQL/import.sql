CREATE DATABASE IF NOT EXISTS PPE01;

USE PPE01;

CREATE TABLE IF NOT EXISTS Utilisateur
(
idUtilisateur INT AUTO_INCREMENT,
pseudo VARCHAR(64),
password VARCHAR(64),
dateNaissance DATE,
cheminPhoto VARCHAR (64),
biographie LONGTEXT,
sexe VARCHAR(64),
mail VARCHAR(64),
ban BOOLEAN,
raisonBan VARCHAR(64),
isAdmin BOOLEAN,
dateInscription DATE,
PRIMARY KEY (idUtilisateur)
);

CREATE TABLE IF NOT EXISTS Sujet
(
idSujet INT AUTO_INCREMENT,
nomSujet VARCHAR(64),
contenuSujet LONGTEXT,
canRespond TINYINT,
dateSujet DATE,
idUtilisateur INT,
idType INT,
PRIMARY KEY(idSujet)
);

CREATE TABLE IF NOT EXISTS TypeSujet
(
    idType INT AUTO_INCREMENT,
    libelle VARCHAR (64),
    pathPhotoType VARCHAR(64),
    PRIMARY KEY (idType)
);

CREATE TABLE IF NOT EXISTS Commentaire
(
idCommentaire INT AUTO_INCREMENT, 
contenuCommentaire LONGTEXT,
dateCommentaire DATE,
idSujet INT,
idUtilisateur INT,
PRIMARY KEY(idCommentaire)
);

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

ALTER TABLE Sujet
ADD CONSTRAINT Sujet_idType
FOREIGN KEY (idType)
REFERENCES TypeSujet (idType);

INSERT INTO Utilisateur (pseudo, password, dateNaissance, cheminPhoto, sexe, mail, ban, isAdmin, dateInscription, biographie) VALUES
("Admin" , "admin",  "2000-12-13", "UserImage/administrateur.png", "Homme", "admin@gmail.com", false, true, "2020-02-01", "Administrateur du forum"),
("Ixoti", "password", "1999-02-17", "UserImage/PDP Berserk.png", "Homme", "Ixoti@gmail.com", false, false, "2020-02-01","Compte testeur"),
("Ogur", "password", "1998-03-17" ,"UserImage/user.png", "Homme", "Ogur@gmail.com", false, false, "2020-02-01","Compte testeur"),
("Nero", "Nero", "2001-02-15", "UserImage/Gally.jpg", "Homme", "Nero@gmail.com", false, true, "2020-01-01","Createur du forum");

INSERT INTO Sujet (nomSujet, contenuSujet, canRespond, dateSujet, idUtilisateur, idType) VALUES
("Y a t-il de bonne ou de mauvaises situations ?", "Vous savez, moi je ne crois pas qu'il y ait de bonnes ou de mauvaises situations. Moi si je devais résumer ma vie, aujourd'hui, avec vous, je dirais que c'est d'abord des rencontres, des gens qui m'ont tendu la main, peut-être à un moment où je ne pouvais pas, où j'étais seul chez moi, et c'est assez curieux de se dire que les hasards, les rencontres forgent une destinée, parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l'interlocuteur en face, je dirais le miroir qui vous aide à avancer ; alors ce n'est pas mon cas comme je le disais là, puisque moi au contraire j'ai pu et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie, je ne suis qu'amour, et finalement quand beaucoup de gens aujourd'hui me disent : Mais comment fais-tu pour avoir cette humanité ? Et bah je leur réponds très simplement, je leur dis : c'est ce goût de l'amour, ce goût donc qui m'a poussé, aujourd'hui, à entreprendre une construction mécanique mais demain, qui sait, peut-être, simplement à me mettre au service de la communauté, à faire le don, le don de soi...", 1, "2019-10-30", 3, 1),
("Babyfoot IRL", "Yo les kheys j'ai recemment aquis un babyfoot et j'y joue tous les jours. Au point d'y jouer tout seul. Cela deviens une addiction. Pas plus tard qu'hier soir, dans mon lit j'ai eu une idée de génie : Et si je jouais au babyfoot IRl ? Du coup je demande aux jeunes mamans ou jeunes papas si ils pourraient me preter leurs enfant le temps d'une aprem qu'on essaie ce nouveau sport avec des potes. (Oui j'ai mis au pluriel les enfants parceque meme au babyfoot calssique il est pas rare de perdre une balle)", 1, "2020-01-30", 2, 1),
("Entrainement Ninja", "Bonjour les gars, j'aimerais ameliorer mes techniques de ninja mais j'ai pas les moyens de m'acheter un mannequin et puis taper un objet c'est pas realiste. Des gens chauds pour venir gare du nord s'entrainer avec moi ?", 1, "2020-01-07", 3, 1);

INSERT INTO Commentaire (contenuCommentaire , dateCommentaire, idSujet,idUtilisateur) VALUES 
("Pas mal x) je connais la ref &#128147 Best film ever","2019-11-12",1,2),
("Que des Gamins... le film est nul et les acteurs jouent mal","2019-12-12",1,1),
("Moi je pense avec mon BTS philo que toute solution est juste une suite d'action qui créer des conséquences ","2019-11-10",1,1);

INSERT INTO TypeSujet (libelle, pathPhotoType) VALUES
("Blabla", "image/chat.png"),
("Informatique", "image/upload.png"),
("Sport", "image/dumbbell.png"),
("Jeux video", "image/gamepad.png"),
("Actualité", "image/internet.png"),
("Savoir & Culture", "image/book.png");