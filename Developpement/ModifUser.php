<?php

include_once 'include/header.php';

$idUser = $_POST['idUser'];

if (!empty($_POST['pseudo']))
{
    foreach ($users as $user)
    {
        if ($_POST['pseudo'] != $user->gePseudo())
        {
    ?>
    <form method="POST" action="ModifUserSender.php">
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="text" value="<?php echo $_POST['pseudo']; ?>" name="pseudo" placeholder="Entrez un nouveau pseudo"/>
        <input type="submit" value="Confirmer"/>
    </form>
    <?php
        }
        else if ($_POST['pseudo'] == $user->getPseudo())
        {
            echo "Ce pseudo est deja pris.";
            echo "Vous allez être redirigé vers votre profil.";
            ?>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=OptionsProfil.php?idUser=<?php echo $idUser ?>"> 
            <?php
        }
    }
}

if (!empty($_POST['pathPhoto']))
{
    ?>
<form method="POST" action="ModifUserSender.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <input type="file" id="idFichier" name="fichier"/>
    <input type="submit" value="Valider"/>
</form>

    <?php
}

if (!empty($_POST['bio']))
{
    ?>
    <form method="POST" action="ModifUserSender.php">
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="text" value="<?php echo $_POST['bio']; ?>" name="bio" placeholder="Entrez un nouveau pseudo"/>
        <input type="submit" value="Confirmer"/>
    </form>
<?php
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