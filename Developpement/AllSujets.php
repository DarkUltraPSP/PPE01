<?php
include_once 'include/header.php';
session_name("idSujet");
session_start();
?>

<link rel="stylesheet" type="text/css" href="css/AllSujets.css" media="all"/>

<?php
$sujets = SujetManager::findAllSujet();
$commentaires = SujetManager::getCommentaire();
$users = SujetManager::getUser();
?>
<div class="Orga">
    <div class="lateral">
        <h>C'est la pub</h>
    </div>
    <div class="block">
        <?php
        foreach ($sujets as $sujet)
        {
            echo "<a href='PageSujet.php'><div class='NomSujet'><h>".$sujet->getNomSujet()."</h></a></div>";
            foreach ($users as $user)
            {
                if ($user->getIdUtilisateur() == $sujet->getIdUtilisateur())
                {
                    echo "<h>Ecrit par :".$user->getPseudo()."</h>";
                }
            }
            echo "<div class='Date'> <h>Publié le :".$sujet->getDateSujet()."</h></div>";
            ?>
            <form method='POST' action='PageSujet.php'>
                <input type='hidden' value='<?php echo $sujet->getIdSujet(); ?>' name='idSujet'/>
            </form>
        <?php
        }
        ?>
    </div>
    <div class="lateral">
        <h>C'est la pub</h>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>