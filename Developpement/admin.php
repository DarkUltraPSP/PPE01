<?php
include_once 'include/header.php';
?>

<link rel="stylesheet" type="text/css" href="css/admin.css" media="all"/>

<?php
if ($_SESSION['isAdmin']==1)
{
?>
<label> Liste des utilisateurs inscrits : </label>
<div class="board">
<table>
    <tr>
        <th> Pseudo </th>
        <th> Mail </th>
        <th> Sexe </th>
        <th> Date de Naissance </th>
        <th> Date d'Inscription </th>
        <th> Bannir </th>
    </tr>
    
        <?php
        foreach ($users as $user) 
        {
            echo "<tr>";
            echo "<th>".$user->getPseudo()."</th>";
            echo "<th>".$user->getMail()."</th>";
            echo "<th>".$user->getSexe()."</th>";
            echo "<th>".$user->getDateNaissance()."</th>";
            echo "<th>".$user->getDateInscription()."</th>";
            ?>
            <th>
                <form method="POST" <?php if ($user->getBan() == 0){ echo "action='RaisonBan.php'";} else{ echo "action='bannir.php'"; }?>>
                    <input type="hidden" value="<?php echo $user->getBan(); ?>" name="isBan"/>
                    <input type="hidden" value="<?php echo $user->getIdUtilisateur(); ?>" name="idUser"/>
                    <input type="submit" value="<?php if ($user->getBan() == 0) {echo 'Bannir';} else {echo 'Debannir';} ?>"/>
                </form>
            </th>
            <?php
            echo "</tr>";
        }
        ?>
    </table>
</div>
<?php
}
else
{
    echo "Vous n'êtes pas autorisé a visualiser cette page";
}

include_once 'include/footer.php';