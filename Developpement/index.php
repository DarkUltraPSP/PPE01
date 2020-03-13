<?php
include_once "include/header.php";
?>
<form class="new" method="POST" action="NewSujet.php">
    <input type="hidden" value="" name="idUser">
    <input class="link" type="submit" value="Nouveau Sujet"/>
</form>
<?php

    foreach ($sujets as $sujet)
    {
        echo '<div class="border">'; //Debut div border
        ?>
        <form method='GET' action='PageSujet.php'>
            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
            <input type="submit" name="idSujetSubmit" class="NomSujet link" value="<?php echo $sujet->getNomSujet() ?>" />
        </form>
        <?php
            echo "<div><h>Commentaires : </h>".sizeof(CommentaireManager::findAllCommentaires($sujet->getIdSujet()))."</div>";
        foreach ($users as $user)
        {
            if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
            {
                echo "<h>Ecrit par : ".$user->getPseudo()."</h>";
            }
        }
        echo "<div class='Date'> <h>Publié le : </h>".$sujet->getDateSujet()."</div>";
        ?>
        <form class="new" method="POST" action="SupprSujet.php">
            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
            <input class="link" type="submit" value="Supprimer" />
        </form>

<?php
        echo '</div>'; // Fin div border
    }
?>

<?php
include_once "include/footer.php";
?>