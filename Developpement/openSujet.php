<?php
    include_once 'include/header.php';

    if (!empty($_POST["idSujet"]))
    {
        $idSujet = $_POST['idSujet'];
        SujetManager::openSujet($idSujet);
        header("Location: PageSujet.php?idSujet=$idSujet");
    }