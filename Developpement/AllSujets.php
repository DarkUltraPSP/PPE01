<?php
include_once 'include/header.php';
$page = 'AllSujets';
?>

<link rel="stylesheet" type="text/css" href="css/AllSujets.css" media="all"/>

        <?php
        foreach ($sujets as $sujet)
        {
        ?>
            <form method='POST' action='PageSujet.php'>
                <input type="hidden" value="<?php echo $sujet->getIdSujet(); ?>" name="idSujet"/>
                <input type="submit" name="idSujetSubmit" class="NomSujet link" value="<?php echo $sujet->getNomSujet() ?>" />
            </form>
        <?php
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
<?php
include_once 'include/footer.php';
?>