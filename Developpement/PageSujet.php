<?php
    include_once 'include/header.php';
?>

<link rel="stylesheet" type="text/css" href="css/PageSujet.css" media="all"/>

<?php
                
    foreach ($sujets as $sujet)
    {
        
        if (!empty($_GET["idSujet"]) && $_GET["idSujet"] == $sujet->getIdSujet())
        {
            
            echo "<div class='Sujet'>";
            echo    "<div><h1>".$sujet->getNomSujet()."</h1></div>";
            echo    "<div class='contenuSujet'>".$sujet->getContenuSujet()."</div>";
            echo    "<div class='date'><h> Publié le ".$sujet->getDateSujet()."</h></div>";
            if(isset($_SESSION['idUser']) && $_SESSION['isAdmin'] == 1 || isset($_SESSION['idUser']) && $_SESSION['idUser'] == $sujet->getIdUtilisateur())
            {
            ?>
                <form class="new" method="POST" action="closeSujet.php">
                    <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
                    <input type="hidden" value="<?php echo $sujet->getCanRespond(); ?>" name="canRespond"/>
                    <input type="submit" value= "<?php if ($sujet->getCanRespond() == 1){ echo "Clore le sujet"; } else{ echo "Ouvrir le sujet"; }?>" />
                </form>
                <form class="new" method="POST" action="ModifSujetForm.php">
                    <input type="hidden" value="<?php echo $sujet->getIdSujet();?>" name="idSujet" />
                    <input type="hidden" value="<?php echo $sujet->getNomSujet();?>" name="nomSujet" />
                    <input type="hidden" value="<?php echo $sujet->getContenuSujet();?>" name="content" />
                    <input type="submit" value="Modifier"/>
                </form>
                <form class="new" method="POST" action="SupprSujet.php">
                    <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
                    <input type="submit" value="Supprimer" />
                </form>
            <?php
            }
            if (isset($_SESSION['idUser']) && $_SESSION['isAdmin'] == 1)
            {
                ?>
                <form class="new" method="POST" action="bannir.php">
                    <input type="hidden" value="<?php $sujet->getIdUtilisateur(); ?>" name="idUser"/>
                    <input type="submit" value="Bannir"/>
                </form>
                <?php
            }
            echo "</div>";
            
            echo "<div>";
            echo "<div><h2> Commentaires : </h2></div>";
            
            foreach ($commentaires as $com)
            {
                
                if ($com->getIdArticle()== $sujet->getIdSujet())
                {
                    echo "<div class='com'>";
                    
                    foreach ($users as $user)
                    {
                        
                        if ($user->getIdUtilisateur() == $com->getIdUtilisateur())
                        {
                            echo "<div class='lateral'>";
                            ?>
                            <form method="GET" action="OptionsProfil.php">
                                <input type="hidden" value="<?php echo $user->getIdUtilisateur() ?>" name="idUser"/>
                                <input class="pseudo link" type="submit" value="<?php echo $user->getPseudo()?>"/>
                            </form>
                            <?php
                            echo    "<div><img class='pdp' src='".$user->getCheminPhoto()."'></div>";
                            echo "</div>";
                        }
                    }
                    
                    echo "<div class='contenuCom'>";
                    echo    "<div><h>".$com->getContenuCommmentaire()."</h></div>";
                    echo "</div>";
                    echo "<div class='lateral'>";
                    echo "<div><h> Publié le ".$com->getDateCommentaire()."</h></div>";
                    if(isset($_SESSION['idUser']) && $_SESSION['isAdmin'] == 1 || isset($_SESSION['idUser']) && $_SESSION['idUser'] == $com->getIdUtilisateur())
                    {
                    ?>
                        <form method="POST" action="SupprCommentaire.php">
                            <input type="hidden" value="<?php echo $com->getIdCommentaire();?>" name="idCom" />
                            <input type="hidden" value="<?php echo $com->getIdArticle();?>" name="idSujet" />
                            <input type="submit" value="Supprimer"/>
                        </form>
                        <form method="POST" action="ModifComForm.php">
                            <input type="hidden" value="<?php echo $com->getIdCommentaire();?>" name="idCom" />
                            <input type="hidden" value="<?php echo $com->getIdArticle();?>" name="idSujet" />
                            <input type="hidden" value="<?php echo $com->getContenuCommmentaire();?>" name="content" />
                            <input type="submit" value="Modifier"/>
                        </form>
                        <?php
                        if ($_SESSION['isAdmin'] == 1)
                        {
                            foreach ($users as $user)
                            {
                                if ($user->getIdUtilisateur() == $com->getIdUtilisateur())
                                {
                                ?>
                                    <form method="POST" action="bannir.php">
                                        <input type="hidden" value="<?php echo $sujet->getIdSujet();?>" name="idSujet"/>
                                        <input type="hidden" value="<?php echo $user-> getBan(); ?>" name="ban"/>
                                        <input type="hidden" value="<?php echo $com->getIdUtilisateur(); ?>" name="idUser"/>
                                        <input type="submit" value="<?php if ($user->getBan() == 0) {echo 'Bannir';} else {echo 'Debannir';} ?>"/>
                                    </form>
                                <?php
                                }
                            }
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }
            
            echo "</div>";
            if ($sujet->getCanRespond() == 1)
            {
                if (isset($_SESSION['idUser']))
                {
                ?>
                    <div class="newCom">
                        <form method="POST" action="insertCom.php" class="inputCom">
                            <textarea name="content" placeholder="Ecrire un commentaire" class="inputCom" ></textarea>
                            <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet" />
                            <input type="hidden" value="<?php echo $_SESSION['idUser']; ?>" name="idUtilisateur" />
                            <input name = "rep" type="submit" value="Repondre"/>
                        </form>
                    </div>
                <?php
                }
            }
            if (!empty($_POST["Reponse"]))
            {
                header("Location : PageSujet.php");
            }

        }
        else if (empty($_GET["idSujet"]))
        {
            ?>
            <h> La page que vous avez demandé n'est pas disponible ou le sujet en question à été supprimé.</h>
            <a href="index.php"> Retour à l'accueil </a>
            <?php
            exit;
        }
        
    }
?>

<?php
    include_once 'include/footer.php';