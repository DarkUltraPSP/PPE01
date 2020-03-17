<?php
include_once 'include/header.php';

echo $_POST['ban'];
echo $_POST['idUser'];
echo $_POST['idSujet'];

if(!empty($_POST['ban']) && !empty($_POST['idUser']) && !empty($_POST['idSujet']))
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