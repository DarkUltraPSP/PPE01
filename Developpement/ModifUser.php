<?php

include_once 'include/header.php';

$idUser = $_POST['idUser'];

if (!empty($_POST['pseudo']))
{
    ?>
    <form method="POST" action="ModifUserSender.php">
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="text" value="<?php echo $_POST['pseudo']; ?>" name="pseudo" placeholder="Entrez un nouveau pseudo"/>
        <input type="submit" value="Confirmer"/>
    </form>
    <?php
}

if (!empty($_POST['pathPhoto']))
{
    echo "Formulaire d'envoie de fichiers";
}

if (!empty($_POST['dateNaissance']))
{
    ?>
<form method="POST" action="ModifUserSender.php">
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <input type="date" max="2016-01-01" min="1920-01-01" name="dateNaissance"/>
    <input type="submit" value="Confirmer"/>
</form>
    <?php
}

if (!empty($_POST['mail']))
{
    ?>
<form method="POST" action="ModifUserSender.php">
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <input type="text" value="<?php echo $_POST['mail']; ?>" name="mail" placeholder="Entrez une nouvelle adresse mail"/>
    <input type="submit" value="Confirmer"/>
</form>
    <?php
}

if (!empty($_POST['password']))
{
    ?>
<form method="POST" action="ModifUserSender.php">
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <label> Entrez votre mot de passe actuel </label>
    <input type="password" name="password1" placeholder="Mot de passe actuel"/>
    <label> Entrez votre nouveau mot de passe</label>
    <input type="password" name="password1" placeholder="Nouveau mot de passe"/>
    <label> Confirmez votre nouveau mot de passe </label>
    <input type="password" name="password2" placeholder=" Nouveau Mot de passe"/>
    <input type="submit" value="Confirmer"/>
</form>
    <?php
}

include_once 'include/footer.php';