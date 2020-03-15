<?php
include_once 'include/header.php';

if (!empty($_POST['idSujet']) && $_POST['content'] && $_POST['nomSujet'])
{
    $idSujet = $_POST['idSujet'];
    $nomSujet = $_POST['nomSujet'];
    $content = $_POST['content'];
}
?>
<link rel="stylesheet" type="text/css" href="css/ModifSujetForm.css" media="all"/>
<div class="bloc">
    <p class="titre">Modification en cours...</p>
    <div class="interieur">
        <form method="POST" action="ModifSujet.php">
            <input class="barre" type="text" value="<?php echo $nomSujet ?>" name="nomSujet" />
            <textarea class="barreTexte" name="modifSujet"><?php echo $content ?></textarea>
            <input type="hidden" value="<?php echo $idSujet?>" name="idSujet" />
            <input class="barre" type="submit" value="Modifier"/>
        </form>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>