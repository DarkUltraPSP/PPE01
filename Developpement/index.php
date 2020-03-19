<?php
include_once "include/header.php";
?>
<p class="titreAccueil">Accueil</p>
<?php
if(isset($_SESSION['idUser']))
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
?>

<form method="GET" action="SujetsType.php">
    <?php
    foreach ($types as $type)
    {
    ?>
    <input type="submit" value="<?php echo $type->getLibelle(); ?>" name="libelle">
    <input type="hidden" value="<?php echo $type->getIdType()?>" name="idType">
    <?php
    }
    ?>
</form>

<?php
include_once "include/footer.php";
?>