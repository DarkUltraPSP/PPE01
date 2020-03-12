<?php
include_once 'include/header.php';

if (!empty($_POST["nomSujet"]) && !empty($_POST["content"]) && !empty($_POST["idUtilisateur"]))
    {
        $sujet = new Sujet();
        $sujet->setNomSujet($_POST["nomSujet"]);
        $sujet->setContenuSujet($_POST["content"]);
        $sujet->setIdUtilisateur($_POST["idUtilisateur"]);
        SujetManager::insertSujet($sujet);
    }

    header("Location: AllSujets.php");