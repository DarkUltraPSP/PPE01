<?php
include_once "include/header.php";
?>
<p class="titreAccueil">Tous les sujets</p>
<?php
if(isset($_SESSION['idUser']))
{
?>
<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
<form class="new" method="POST" action="NewSujet.php">
    <input type="hidden" value="" name="idUser">
    <div class="new">
        <input type="submit" value="Nouveau Sujet"/>
    </div>
</form>
<?php
}
    foreach ($sujets as $sujet)
    {
        echo '<div class="border">'; //Debut div border
        ?>
        <form class="sujet" method='GET' action='PageSujet.php'>
            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
            <input type="submit" name="idSujetSubmit" class="NomSujet link" value="<?php echo $sujet->getNomSujet() ?>" />
        </form>
        <?php
            echo "<div><h>Nombre de commentaires : ".SujetManager::countComs($sujet->getIdSujet())."</h></div>";
        foreach ($users as $user)
        {
            if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
            {
                echo "<h>Ecrit par : ".$user->getPseudo()."</h>";
            }
        }
        echo "<div class='Date'> <h>Publié le : </h>".$sujet->getDateSujet()."</div>";
        if(isset($_SESSION['idUser']) && $_SESSION['isAdmin'] == 1)
        {
        ?>
            <form class="new" method="POST" action="SupprSujet.php">
                <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
                <div class="new">
                    <input type="submit" value="Supprimer" />
                </div>
            </form>
        <?php
        }
        ?>

<?php
        echo '</div>'; // Fin div border
    }
?>

<?php
include_once "include/footer.php";
?>