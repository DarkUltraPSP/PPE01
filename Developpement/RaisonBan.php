<?php

include_once 'include/header.php';

$idSujet = $_POST['idSujet'];
$idUser = $_POST['idUser'];
$isBan = $_POST['isBan'];
?>

<form method="POST" action="bannir.php">
    <input type="hidden" value="<?php echo $idSujet ; ?>" name="idSujet"/>
    <input type="hidden" value="<?php echo $isBan; ?>" name="isBan"/>
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <textarea placeholder="Donnez une raison a ce banissement" name="raisonBan"></textarea>
    <input type="submit" value="Bannir">
</form>
<?php
include_once 'include/footer.php';