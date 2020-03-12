<?php
include_once 'include/header.php';

    if (!empty($_POST["idCom"]) && !empty($_POST["idSujet"]) && !empty($_POST["modif"]))
    {
        $idSujet = $_POST['idSujet'];
        $content = $_POST['modif'];
        $idCom = $_POST['idCom'];
        echo $idSujet;
        echo $content;
        echo $idCom;
        CommentaireManager::modifCommentaire($content,$idCom);
        header("Location: PageSujet.php?idSujet=$idSujet");
    }

include_once 'include/footer.php';