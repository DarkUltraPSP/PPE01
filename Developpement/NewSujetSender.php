<?php
include_once 'include/header.php';

if (!empty($_POST["nomSujet"]) && !empty($_POST["content"]) && !empty($_POST["idUser"]) && !empty($_POST['idType']))
{
    $sujet = new Sujet();
    $sujet->setNomSujet($_POST["nomSujet"]);
    $sujet->setContenuSujet($_POST["content"]);
    $sujet->setIdUtilisateur($_POST["idUser"]);
    $sujet->setIdType($_POST['idType']);
    echo $_POST['idType'];
    SujetManager::insertSujet($sujet);
}

    header("Location: AllSujets.php");