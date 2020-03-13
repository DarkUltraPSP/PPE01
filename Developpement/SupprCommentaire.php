<?php
include_once 'include/header.php';

    if (!empty($_POST["idCom"]) && !empty($_POST["idSujet"]))
    {
        $idSujet = $_POST['idSujet'];
        echo $idSujet;
        CommentaireManager::delCommentaire($_POST["idCom"]);
        header("Location: PageSujet.php?idSujet=$idSujet");
    }

    include_once 'include/footer.php';
?>