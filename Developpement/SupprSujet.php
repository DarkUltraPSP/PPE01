<?php
include_once 'include/header.php';

    if (!empty($_POST["idSujet"]))
    {
        $idSujet = $_POST['idSujet'];
        echo $idSujet;
        SujetManager::delSujet($_POST["idSujet"]);
        header("Location: AllSujets.php");
    }