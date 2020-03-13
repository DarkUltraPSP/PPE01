<?php
include_once 'include/header.php';

    if (!empty($_POST["idSujet"]) && !empty($_POST["nomSujet"]) && !empty($_POST["modifSujet"]))
    {
        $idSujet = $_POST['idSujet'];
        $content = $_POST['modifSujet'];
        $nomSujet = $_POST['nomSujet'];
        echo $idSujet;
        echo $content;
        echo $nomSujet;
        SujetManager::modifSujet($idSujet, $nomSujet, $content);
        header("Location: PageSujet.php?idSujet=$idSujet");
    }