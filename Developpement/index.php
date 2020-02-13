  
<?php
include_once("header.php")
?>

<div class = "titre">
	<p> Recherche sujet/auteur/message </p>
</div>
<?php
    print_r(CommentaireManager::findAllCommentaire());
?>
<?php
include_once("footer.php")
?>