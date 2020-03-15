<?php

include_once 'include/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/OptionsProfil.css" media="all"/>
<?php

if (!empty($_GET['idUser']))
{
    
    foreach ($users as $user)
    {
        if ($_GET['idUser'] == $user->getIdUtilisateur() && $user->getBan()==1)
        {
            ?>
<div class="all">
    <form class="form column" method="POST" action="ModifUser.php">
        <?php
        echo "<div class='pseudo'>".$user->getPseudo()."</div>";
        ?>
        <input type="hidden" value="<?php echo $user->getPseudo() ?>" name="pseudo"/>
        <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
        <input class="btn" type="submit" value="Modifer pseudo"/>
    </form>
    <div class="org">
        <div class="pdp">
            <form class="form column" method="POST" action="ModifUser.php">
                <?php
                echo "<img class='img' src='".$user->getCheminPhoto()."'/>";
                ?>
                <input type="hidden" value="<?php echo $user->getCheminPhoto() ?>" name="pathPhoto"/>
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <input class="btn" type="submit" value="Modifer photo de profil"/>
            </form>
        </div>
        <form class="form column" method="POST" action="ModifUser.php">
            <label> Date de Naissance : </label>
            <?php
            echo $user->getDateNaissance();
            ?>
            <input type="hidden" value="<?php echo $user->getDateNaissance() ?>" name="dateNaissance"/>
            <input class="btn" type="submit" value="Modifer date de naissance"/>
            <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
            <?php
            echo "<p> Nombre de sujet postés : ".UsersManager::countSujets($_GET['idUser'])."</p>";
            echo "<p> Nombre de commentaires postés : ".UsersManager::countCommentaires($_GET['idUser'])."</p>";
            ?>
        </form>
        <div class="column">
            <form class="form column" method="POST" action="ModifUser.php">
                <label> Adresse e-mail : </label>
                <?php
                echo $user->getMail();
                ?>
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <input type="hidden" value="<?php echo $user->getMail() ?>" name="mail"/>
                <input class="btn" type="submit" value="Modifer votre adresse mail"/>
            </form>
            <form class="form column" method="POST" action="ModifUser.php">
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <input type="hidden" value="<?php echo $user->getMotDePasse() ?>" name="password"/>
                <input class="btn"type="submit" value="Modifier mot de passe"/>
            </form>
        </div>
    </div>
</div>
<?php
        }
        else if ($user->getBan()==0)
        {
            ?>
            <h> Cet utilisateur à été banni. </h>
            <a href="index.php"> Retour à l'accueil </a>
            <?php
            include_once 'include/footer.php';
            exit;
        }
        
    }
    
}
else if(empty($_GET['idUser']))
{
    ?>
    <h> La page que vous avez demandé n'est pas disponible ou le profil en question à été banni.</h>
    <a href="index.php"> Retour à l'accueil </a>
    <?php
    include_once 'include/footer.php';
    exit;
}
?>

<?php
include_once 'include/footer.php';
?>