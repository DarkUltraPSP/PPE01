  
<?php
include_once("header.php")
?>

<?php
    echo print_r(CommentaireManager::findAllCommentaire());
?>
<?php
include_once("footer.php")
?>