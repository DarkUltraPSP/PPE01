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
                            echo    "<div><h3>".$user->getPseudo()."</h3></div>";
                            echo    "<div><img class='pdp' src='".$user->getCheminPhoto()."'></div>";
                            echo "</div>";
                        }
                        
                    }
                    
                    echo "<div class='contenuCom'>";
                    echo    "<div><h>".$com->getContenuCommmentaire()."</h></div>";
                    echo "</div>";
                    echo "<div class='lateral'>";
                    echo "<div><h> Publié le ".$com->getDateCommentaire()."</h></div>";
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
                    echo "</div>";
                    echo "</div>";
                }
                
            }
            
            echo sizeof(CommentaireManager::findAllCommentaires($_GET["idSujet"]));
            
            echo "</div>";
            ?>
            <div class="newCom">
                <form method="POST" action="insertCom.php" class="inputCom">
                    <textarea name="content" placeholder="Ecrire un commentaire" class="inputCom" ></textarea>
                    <input type="hidden" value="<?php echo $sujet->getIdSujet();?>" name="idSujet" />
                    <input type="text" name="idUtilisateur" placeholder="Mettez votre idUtilisateur" />
                    <input name = "rep" type="submit" value="Repondre"/>
                </form>
            </div>

            <?php
            if (!empty($_POST["Reponse"]))
            {
                header("Location : PageSujet.php");
            }

        }
        
    }
?>

<?php
    include_once 'include/footer.php';
?>