<?php

include_once 'include/header.php';

$idUser = $_POST['idUser'];
?>
<link rel="stylesheet" type="text/css" href="css/ModifUser.css" media="all"/>
<?php

if (!empty($_POST['pseudo']))
{?>
    <form class="modif" method="POST" action="ModifUserSender.php">
        <p class="titre">Modification de votre pseudo</p>
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="text" value="<?php echo $_POST['pseudo']; ?>" name="NewPseudo" placeholder="Entrez un nouveau pseudo"/>
        </br>
        <input class="btn2" type="submit" value="Confirmer"/>
    </form>
<?php
}

if (!empty($_POST['pathPhoto']))
{
    ?>
<div class="modif">
    <p class="titre"> Modification de votre photo de profil</p>
    <form class="contenu" method="POST" action="ModifUserSender.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_POST['pseudoPDP']; ?>" name="pseudoPDP"/>
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="file" id="idFichier" name="fichier"/>
        </br>
        <input class="btnPhoto" type="submit" value="Valider"/>
    </form>
</div>
    <?php
}

if (!empty($_POST['bio']))
{
    ?>
    <form method="POST" action="ModifUserSender.php">
        <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
        <input type="text" value="<?php echo $_POST['bio']; ?>" name="bio"/>
        <input type="submit" value="Confirmer"/>
    </form>
<?php
}

if (!empty($_POST['dateNaissance']))
{
    ?>
<form class="modif" method="POST" action="ModifUserSender.php">
    <p class="titre">Modification de votre date de naissance</p>    
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <input type="date" max="2016-01-01" min="1920-01-01" name="dateNaissance"/>
    <input class="btn2" type="submit" value="Confirmer"/>
</form>
    <?php
}

if (!empty($_POST['mail']))
{
    ?>
<form class="modif" method="POST" action="ModifUserSender.php">
    <p class="titre"> Modification de votre adresse mail</p>
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <input type="text" value="<?php echo $_POST['mail']; ?>" name="mail" placeholder="Entrez une nouvelle adresse mail"/>
    </br>
    </br>
    <input class="btn2" type="submit" value="Confirmer"/>
</form>
    <?php
}

if (!empty($_POST['password']))
{
    ?>
<form class="modifMdp" method="POST" action="ModifUserSender.php">
    <p class="titre">Modification de votre mot de passe</p>
    <input type="hidden" value="<?php echo $idUser; ?>" name="idUser"/>
    <label> Entrez votre mot de passe actuel </label>
    <input type="password" name="password1" placeholder="Mot de passe actuel"/>
    </br>
    <label> Entrez votre nouveau mot de passe</label>
    <input type="password" name="password1" placeholder="Nouveau mot de passe"/>
    </br>
    <label> Confirmez votre nouveau mot de passe </label>
    <input type="password" name="password2" placeholder=" Nouveau Mot de passe"/>
    </br>    
    </br>
    <input class="btn2" type="submit" value="Confirmer"/>
</form>
    <?php
}

include_once 'include/footer.php';