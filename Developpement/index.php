<?php
include_once "include/header.php";
?>
<div class="Organisation">
    <div class="Droit">
        <p>Droit</p>        
    </div>

    <div class="Milieu">
    <?php

<<<<<<< HEAD
        DatabaseLinker::getConnexion();

        $sujets = SujetManager::findAllSujet();
        $commentaires = SujetManager::getCommentaire();
        $users = SujetManager::getUser();

        foreach ($sujets as $sujet)
=======
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
        echo "<div class='Contenu'>".$sujet->getContenuSujet()."</div>";
?>
<div class="Commentaire">
<?php
        foreach ($commentaires as $commentaire)
>>>>>>> master
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
            echo "<div class='Contenu'>".$sujet->getContenuSujet()."</div>";

        // DatabaseLinker::getConnexion();
        // echo "<pre>";
        // print_r(CommentaireManager::findAllCommentaire());
        // echo "</pre>";

    ?>
        <div class="Commentaire">
        <?php
                foreach ($commentaires as $commentaire)
                {
                    foreach ($users as $user)
                    {
                        if ($user->getIdUtilisateur() == $commentaire->getidUtilisateur())
                        {
                            echo "<div class='NomSujet'><h> Ecrit par : ".$user->getPseudo()."</h></div>";
                        }
                    }
                    echo "<div class='Date'><h>".$commentaire->getDateCommentaire()."</h></div>";
                    echo "<div class='Contenu'>".$commentaire->getContenuCommmentaire()."</div>";
                }
            }
        ?>
        </div>
    </div>
    <div class="Gauche">
        <img src="image/pub" alt="" class="apex" />
        <img src="image/pub2" alt="" class="switch" />
    </div>
</div>
<?php
include_once "include/footer.php";
?>