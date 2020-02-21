<?php
include_once "include/header.php";
?>
<div class="Organisation">
    <div class="Droit">
        <p> Gauche </p>        
    </div> <!--Ferme div Droit -->
    <div class="Milieu">
<?php
    DatabaseLinker::getConnexion();

    $sujets = SujetManager::findAllSujet();
    $commentaires = SujetManager::getCommentaire();
    $users = SujetManager::getUser();
    foreach ($sujets as $sujet)
    {
        echo "<div class='NomSujet'><p>".$sujet->getNomSujet()."</p></div>";
        foreach ($users as $user)
        {
            if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
            {
                echo "<h>Ecrit par :".$user->getPseudo()."</h>";
            }
        }
        echo "<div class='Date'> <h>Publié le : </h>".$sujet->getDateSujet()."</div>";
    }
?>
    </div> <!--Ferme div Milieu -->
    <div class="Gauche"> 
        <img src="image/pub.jpg" alt="" class="apex" />
        <img src="image/pub2.jpg" alt="" class="switch" />
    </div> <!--Ferme div Gauche -->
</div> <!--Ferme div Organisation -->

<?php
include_once "include/footer.php";
?>