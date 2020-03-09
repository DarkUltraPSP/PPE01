<?php
include_once "include/header.php";
?>
<?php
    DatabaseLinker::getConnexion();

    $sujets = SujetManager::findAllSujet();
    $commentaires = SujetManager::getCommentaire();
    $users = SujetManager::getUser();

    foreach ($sujets as $sujet)
    {
        echo '<div class="border">'; //Debut div border
        ?>
        <form method='POST' action='PageSujet.php'>
            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
            <input type="submit" name="idSujetSubmit" class="NomSujet link" value="<?php echo $sujet->getNomSujet() ?>" />
        </form>
        <?php
        foreach ($users as $user)
        {
            if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
            {
                echo "<h>Ecrit par : ".$user->getPseudo()."</h>";
            }
        }
        echo "<div class='Date'> <h>Publié le : </h>".$sujet->getDateSujet()."</div>";
        echo '</div>';// Fin div border
    }
?>

<?php
include_once "include/footer.php";
?>