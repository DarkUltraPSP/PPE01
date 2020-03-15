<?php
include_once 'include/header.php';

if (!empty($_POST['idSujet']) && $_POST['content'] && $_POST['nomSujet'])
{
    $idSujet = $_POST['idSujet'];
    $nomSujet = $_POST['nomSujet'];
    $content = $_POST['content'];
}
?>
<div class="bloc">
    <p class="titre">Modification du sujet...</p>
    <div class="interieur">
        <form method="POST" action="ModifSujet.php">
            <input type="text" value="<?php echo $nomSujet ?>" name="nomSujet" />
            <textarea name="modifSujet"><?php echo $content ?></textarea>
            <input type="hidden" value="<?php echo $idSujet?>" name="idSujet" />
            <input type="submit" value="Modifier"/>
        </form>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>