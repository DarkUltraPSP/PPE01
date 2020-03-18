<?php

include_once 'include/header.php';

if (isset($_POST['idSujet']))
{
    $idSujet = $_POST['idSujet'];
}
$idUser = $_POST['idUser'];
$isBan = $_POST['isBan'];
?>
<link rel="stylesheet" type="text/css" href="css/RaisonBan.css" media="all"/>
<div class="bloc">
    <p class="titre">Bannissement</p>
    <form method="POST" action="bannir.php">
        <?php
        if (isset($_POST['idSujet']))
        {
        ?>
            <input type="hidden" value="<?php echo $idSujet ; ?>" name="idSujet"/>
        <?php
        }
        ?>
        <input type="hidden" value="<?php echo $isBan; ?>" name="isBan"/>
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <p>Décrivez en quelques mots la raison de ce bannissement.</p>
        <textarea  class="ban" name="raisonBan"></textarea>
        </br>
        <input class="btn" type="submit" value="Bannir">
    </form>
</div>
<?php

include_once 'include/footer.php';