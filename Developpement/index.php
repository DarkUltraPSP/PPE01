  
<?php
include_once "header.php";
?>

<?php
    DatabaseLinker::getConnexion();
    
    $sujets = SujetManager::findAllSujet();
    $commentaires = SujetManager::getCommentaire();
    $users = SujetManager::getUser();
    
    foreach ($sujets as $sujet)
    {
        echo "<div class='NomSujet'><p>".$sujet->getNomSujet()."</p></div>";
        echo "<div class='Date'>".$sujet->getDateSujet()."</div>";
        echo "<div class='Contenu'>".$sujet->getContenuSujet()."</div>";
        
        foreach ($commentaires as $commentaire)
        {
            foreach ($users as $user)
            {
                if ($user->getIdUtilisateur() == $commentaire->getidUtilisateur())
                    echo "<div class='NomSujet'><p>".$user->getPseudo()."</p></div>";
            }
            echo "<div class='Date'>".$commentaire->getDateCommentaire()."</div>";
            echo "<div class='Contenu'>".$commentaire->getContenuCommmentaire()."</div>";
        }
    }
    
?>

<?php
include_once("footer.php")
?>