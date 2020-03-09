<?php
    include_once 'include/header.php';
?>

<link rel="stylesheet" type="text/css" href="css/PageSujet.css" media="all"/>

<?php
$sujets = SujetManager::findAllSujet();
$commentaires = SujetManager::getCommentaire();
$users = SujetManager::getUser();
?>

    <?php
    foreach ($sujets as $sujet)
    {
        if (!empty($_POST["idSujet"]) && $_POST["idSujet"] == $sujet->getIdSujet())
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
                echo "<div class='com'>";
                if ($com->getIdArticle()== $sujet->getIdSujet())
                {
                    foreach ($users as $user)
                    {
                        if ($user->getIdUtilisateur() == $com->getIdUtilisateur())
                        {
                            echo "<div class='userCom'>";
                            echo    "<div><h3>".$user->getPseudo()."</h3></div>";
                            echo    "<div><img class='pdp' src='".$user->getCheminPhoto()."'></div>";
                            echo "</div>";
                        }
                    }
                    echo "<div class='contenuCom'>";
                    echo    "<div><h>".$com->getContenuCommmentaire()."</h></div>";
                    echo    "<div class='date'><h> Publié le ".$com->getDateCommentaire()."</h></div>";
                    echo "</div>";
                }
                echo "</div>";
            }
            echo "</div>";
        }
    }
    ?>

<?php
    include_once 'include/footer.php';
?>