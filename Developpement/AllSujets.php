<?php
include_once 'include/header.php';

?>
<link rel="stylesheet" type="text/css" href="css/AllSujets.css" media="all"/>
<?php
if(isset($_SESSION['idUser']))
{
?>
<div>
    <form class="new" method="POST" action="NewSujet.php">
        <input type="hidden" value="" name="idUser">
        <input type="submit" value="Nouveau Sujet"/>
    </form>
</div>
<?php
}
foreach ($sujets as $sujet)
{
?>
<div class="Sujet">
    
        <form class="titre" method='GET' action='PageSujet.php'>
            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
            <input type="submit" name="idSujetSubmit" class="NomSujet link" value="<?php echo $sujet->getNomSujet() ?>" />
        </form>
        <div class="bloc">
            <div class="blocGauche">
                <?php
                echo "<div><h>Nombre de commentaires : ".SujetManager::countComs($sujet->getIdSujet())."</h></div>";
                foreach ($users as $user)
                {
                    if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
                    {
                        echo "<h>Ecrit par : ".$user->getPseudo()."</h>";
                    }
                }
                echo "<div class='Date'> <h>Publié le : ".$sujet->getDateSujet()."</h></div>";
                ?>
            </div>
            <div class="blocDroit">
                <?php
                if(isset($_SESSION['idUser']) && $_SESSION['isAdmin'] == 1)
                {
                ?>
                    <form class="new" method="POST" action="SupprSujet.php">
                    <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
                    <input type="submit" value="Supprimer" />
                    </form>
                <?php        
                }
                
                ?>
            </div>
        </div>
</div>
<?php
}   
include_once 'include/footer.php';
?>