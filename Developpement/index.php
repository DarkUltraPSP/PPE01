  
<?php
include_once "header.php";
?>

<?php
    DatabaseLinker::getConnexion();
    
    $sujets = SujetManager::findAllSujet();
    $commentaires = SujetManager::getCommentaire();
    $user = SujetManager::getUser();
    
    foreach ($sujets as $sujet)
    {
        echo "<div class='NomSujet'><p>".$sujet->getNomSujet()."</p></div>";
        echo "<div class='Date'>".$sujet->getDateSujet()."</div>";
        echo "<div class='Contenu'>".$sujet->getContenuSujet()."</div>";
        
        foreach ($commentaires as $commentaire)
        {
            /*if ($commentaire->getIdUtilisateur() == $user->getIdUtilisateur())
            {
                echo "<div class='NomSujet'><p>".$user->getPseudo()."</p></div>";
            }*/
            echo "<div class='NomSujet'><p>".$commentaire->getIdUtilisateur()."</p></div>";
            echo "<div class='Date'>".$commentaire->getDateCommentaire()."</div>";
            echo "<div class='Contenu'>".$commentaire->getContenuCommmentaire()."</div>";
        }
    }
    
    echo "<pre>";
    print_r(SujetManager::getCommentaire());
    echo "</pre>";
    
    echo "<pre>";
    print_r(UsersManager::findAllUser());
    echo "</pre>";
    
?>

<?php
include_once("footer.php")
?>