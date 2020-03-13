<?php
include_once 'include/header.php';
?>

<form method="POST" action="NewSujetSender.php">
    <input name="nomSujet" type="text" placeholder="Nom du Sujet"/>
    <textarea name="content" placeholder="Ecrire un nouveau sujet"></textarea>
    <input type="text" name="idUtilisateur" placeholder="idUtilisateur"/>
    <input type="submit" value="Confirmer"/>
</form>

<?php
include_once 'include/footer.php';
?>