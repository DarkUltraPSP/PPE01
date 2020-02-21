<?php
include_once 'include/header.php';
?>

<link rel="stylesheet" type="text/css" href="css/AllSujets.css" media="all"/>

<?php
$sujets = SujetManager::findAllSujet();
$commentaires = SujetManager::getCommentaire();
$users = SujetManager::getUser();
?>
<div>
    <div class="lateral">

    </div>
    <div class="block">
        <?php
        foreach ($sujets as $sujet)
        {
            echo "<a href=''><div class='NomSujet'><h>".$sujet->getNomSujet()."</h></a></div>";
            foreach ($users as $user)
            {
                if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
                {
                    echo "<h>Ecrit par :".$user->getPseudo()."</h>";
                }
            }
            echo "<div class='Date'> <h>Publié le :".$sujet->getDateSujet()."</h></div>";
        }
        ?>
    </div>
    <div class="lateral">

    </div>
</div>
<?php
include_once 'include/footer.php';
?>