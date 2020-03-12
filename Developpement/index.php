<?php
include_once "include/header.php";
?>
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
        echo '</div>'; // Fin div border
    }
?>

<?php
include_once "include/footer.php";
?>