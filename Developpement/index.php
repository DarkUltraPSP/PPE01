  
<?php
include_once("header.php")
?>

<?php
    echo DatabaseLinker::getConnexion();
    echo "<pre>";
    print_r(CommentaireManager::findAllCommentaire());
    echo "</pre>";
?>

<?php
include_once("footer.php")
?>