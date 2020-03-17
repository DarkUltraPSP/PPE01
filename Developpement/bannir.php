<?php
include_once 'include/header.php';

if(!empty($POST['ban']) && !empty($POST['idUser']) && !empty($_POST['idSujet']))
{
    $idSujet = $_POST['idSujet'];
    
    foreach ($users as $user)
    {
        if ($_POST['idUser'] == $user->getiIdUtilisateur())
        {
            $ban = $user->getBan();
        }
    }
    UsersManager::banUser($POST['idUser'], $ban);
    header("Location : PageSujet.php?idSujet=$idSujet");
}
else
{
    echo "Une erreur s'est produite";
}