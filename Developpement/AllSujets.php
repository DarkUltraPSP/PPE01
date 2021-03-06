<?php
include_once "include/header.php";
?>
<link rel="stylesheet" type="text/css" href="css/AllSujets.css" media="all"/>
<p class="titreAccueil">Tous les sujets</p>
<?php
if(isset($_SESSION['idUser']) && !isset($_SESSION['isBan']))
{
?>
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
        ?>
<div class="border">
    <div class="divType">
        <?php
        foreach ($types as $type)
        {
            if ($sujet->getIdType() == $type->getIdType())
            {
            ?>
        <img class="TypePhoto" src="<?php echo $type->getPathPhotoType() ?>">
            <?php
            }
        }
        ?>
    </div>
    <div class="InfoSujet">
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
            echo "<div> <h>Publié le : </h>".$sujet->getDateSujet()."</div>";
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
    </div>
</div>
<?php
    }
?>

<?php
include_once "include/footer.php";
?>