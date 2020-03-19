<?php
include_once 'include/header.php';
if (!empty($_POST['idCom']) && $_POST['idSujet'] && !empty($_POST['content']))
{
    $idCom = $_POST['idCom'];
    $idSujet = $_POST['idSujet'];
    $content = $_POST['content'];
}
?>
<link rel="stylesheet" type="text/css" href="css/ModifComForm.css" media="all"/>
<form method="POST" action="ModifCommentaire.php">
    <textarea name="modif"><?php echo $content; ?></textarea>
    <input type="hidden" value="<?php echo $idCom; ?>" name="idCom" />
    <input type="hidden" value="<?php echo $idSujet; ?>" name="idSujet" />
    <input type="submit" value="Modifier"/>
</form>

<?php
include_once 'include/footer.php';
?>