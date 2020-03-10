<?php
    include_once 'include/header.php';
?>
<div><h>Voulez vous supprimer ce commentaire ?</h></div>
<form method="POST">
    <input type="radio" name="question" value="oui" id="oui" /> <label for="oui">oui</label>
    <input type="radio" name="question" value="non" id="non" /> <label for="non">non</label>
    <div><input type="submit" name="Confirm" value="Confirmer" /></div>
</form>
<?php
if (!empty($_POST["idCom"]) && !empty($_POST["content"]))
{
    
}
?>

<?php
    include_once 'include/footer.php';
?>