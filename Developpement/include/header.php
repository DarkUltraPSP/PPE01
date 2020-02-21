<?php
    include_once ("dataManager/dataBaseLinker.php");
    include_once ("dataManager/CommentaireManager.php");
    include_once ("dataManager/UsersManager.php");
    include_once ("dataManager/SujetManager.php");
    include_once ("dataManager/Search.php");
    include_once ("data/Commentaire.php");
    include_once ("data/Sujet.php");
    include_once ("data/User.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Forum PPE01</title>
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
        <link rel="icon" type="image/logo.png" href="images/logo.png" />
    </head>
    <body>
        <div class = "entete">
            <img src="image/logo.png" class="logo">
            <p class="nomForum"> Nom du Forum </p>
            <div class="boutonPosition">
                <a href="Connexion.php"><input type="button" value="Connexion" class="bouton"/></a>
                <a href="inscription.php"><input type="button" value="Inscription" class="bouton"/></a>
            </div>
        </div>
        <div class="Recherche">
                <form method="POST" action="Search.php" class="RechercheCenter">
                <input type="text" name="Recherche"/>
                <SELECT name="TypeRecherche" size="1">
                    <option> Sujet
                    <option> Auteur
                    <option> Message
                </SELECT>
                <input type="submit" value="Rechercher">
            </form>
            <a href="AllSujets.php" class="RechercheCenter"/> Tous les sujets </a>
        </div>