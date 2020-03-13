<?php
include_once 'include/header.php';

if (!empty($_POST["content"]) && !empty($_POST["idSujet"]) && !empty($_POST["idUtilisateur"]))
    {
        $idSujet = $_POST['idSujet'];
        $comment = new Commentaire();
        $comment->setContenuCommmentaire($_POST["content"]);
        $comment->setIdArticle($_POST["idSujet"]);
        $comment->setIdUtilisateur($_POST["idUtilisateur"]);
        CommentaireManager::insertCommentaire($comment);
    }

    header("Location: PageSujet.php?idSujet=$idSujet");
    
include_once 'include/footer.php';
?>