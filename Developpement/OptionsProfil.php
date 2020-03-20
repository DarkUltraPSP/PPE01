<?php

include_once 'include/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/OptionsProfil" media="all"/>
<?php

if (!empty($_GET['idUser']))
{
    foreach ($users as $user)
    {
        if ($_GET['idUser'] == $user->getIdUtilisateur())
        {
            if ($user->getBan()==0)
            {
            ?>
<div class="all">
    <div class="pseudo">
        <?php
            echo $user->getPseudo();
        ?>
        <form class="form column" method="POST" action="ModifUser.php">
       
        <input class="titre" type="hidden" value="<?php echo $user->getPseudo() ?>" name="pseudo"/>
        <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
        <?php 
        if ($_SESSION['idUser'] == $user->getIdUtilisateur())
            {
            ?>
            <input class="modif" type="image" src="image/modif.png">
            <?php
            }
            ?>
        </form>
    </div>
    <div class="org">
        <div class="pdp">
            <form class="form column" method="POST" action="ModifUser.php">
                <?php
                echo "<img class='img' src='".$user->getCheminPhoto()."'/>";
                ?>
                <input type="hidden" value="<?php echo $user->getPseudo() ?>" name="pseudoPDP"/>
                <input type="hidden" value="<?php echo $user->getCheminPhoto() ?>" name="pathPhoto"/>
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <?php 
                if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                {
                ?>
                <input class="modifPhoto" type="submit" value="Modifier"/>
                <?php
                }
                ?>
            </form>
        </div>
        <div class="middle">
            <div>
                <label> Biographie : </label>
                <div class="textBio">
                    <?php 
                    $bio = $user->getBiographie();
                    if (!empty($bio))
                    {
                        echo $bio;
                        if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                        {
                        ?>
                    <form method="POST" action="ModifUser.php">
                        <input type="hidden" value="<?php echo $bio ?>" name="bio"/>
                        <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                        <input type="submit" value="Modifier"/>
                    </form>
                        <?php 
                        }
                    }
                    else
                    {
                        echo "<p> Aucune biographie </p>";
                        if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                        {
                        ?>
                    <form method="POST" action="ModifUser.php">
                        <input type="hidden" value="<?php echo $bio ?>" name="bio"/>
                        <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                        <input type="submit" value="Modifier"/>
                    </form>
                        <?php 
                        }
                    }
                    ?>
                </div>
                <div class ="dateNaissance">
                    <form method="POST" action="ModifUser.php">
                    <label> Date de Naissance : </label>
                    <?php
                    echo $user->getDateNaissance();
                    ?>
                    <input type="hidden" value="<?php echo $user->getDateNaissance() ?>" name="dateNaissance"/>
                    <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                    <?php 
                    if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                    {
                    ?>
                    <input class="modif" type="image" src="image/modif.png">
                    <?php
                    }
                    ?>
                    </form>
                </div>
                <div class="stat">
                    <?php
                    echo "<p> Nombre de sujets postés : ".UsersManager::countSujets($_GET['idUser'])."</p>";
                    echo "<p> Nombre de commentaires postés : ".UsersManager::countCommentaires($_GET['idUser'])."</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="cote">
            <form class="formColumn" method="POST" action="ModifUser.php">
                <label> Adresse e-mail : </label>
                <?php
                echo $user->getMail();
                ?>
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <input type="hidden" value="<?php echo $user->getMail() ?>" name="mail"/>
                <?php if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                {
                ?>
                <input class="modif" type="image" src="image/modif.png">
                <?php
                }
                ?>
            </form>
            <form class="formColumn2" method="POST" action="ModifUser.php">
                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                <input type="hidden" value="<?php echo $user->getMotDePasse() ?>" name="password"/>
                <?php 
                if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                {
                ?>
                <p>Mot de passe :</p>
                <input class="modif" type="image" src="image/modif.png">
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
            }
            else if ($user->getBan()==1)
            {
                ?>
                <h> Cet utilisateur à été banni. </h>
                <h> Motif du bannissement : </h>
                <?php echo $user->getRaisonBan(); ?>
                <a href="index.php"> Retour à l'accueil </a>
                <?php
                include_once 'include/footer.php';
                exit;
            }
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