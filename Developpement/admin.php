<?php
include_once 'include/header.php';

if ($_SESSION['isAdmin']==1)
{
    foreach($users as $user)
    {
        ?>
<table>
    <tr>
        
    </tr>
    <td>
        
    </td>
</table>


        echo '<pre>';
        echo $user->getPseudo();
        echo $user->getMail();
        echo $user->getSexe();
        echo $user->getDateNaissance();
        echo $user->getDateInscription();
        echo "</pre>";
        <?php
    }
}
else
{
    echo "Vous n'êtes pas autorisé a visualiser cette page";
}