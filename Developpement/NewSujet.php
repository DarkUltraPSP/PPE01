<?php
include_once 'include/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/NewSujet.css" media="all"/>
<div class="bloc">
    <p class="titre">Création d'un nouveau sujet :</p>
    <div class="interieur">
        <form method="POST" action="NewSujetSender.php">
        <input class="barre" name="nomSujet" type="text" placeholder="Titre..."/>
        <textarea class="barreTexte" name="content" placeholder="Ecrire un nouveau sujet"></textarea>
        <input class="id" type="text" name="idUtilisateur" placeholder="idUtilisateur"/>
        <input class="barre" type="submit" value="Confirmer"/>
        </form>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>