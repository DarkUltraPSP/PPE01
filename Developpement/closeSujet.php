<?php
    include_once 'include/header.php';

    if (!empty($_POST["idSujet"]) && !empty($_POST['canRespond']))
    {
        $idSujet = $_POST['idSujet'];
        $canRespond = $_POST['canRespond'];
        SujetManager::OpenCloseSujet($idSujet, $canRespond);
        header("Location: PageSujet.php?idSujet=$idSujet");
    }
