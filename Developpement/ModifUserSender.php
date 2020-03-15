<?php
include_once 'include/header.php';

$user = new User();
$idUser = $_POST['idUser'];

if(!empty($_POST['idUser']))
{
    
    if (!empty($_POST['pseudo']))
    {
        $user->setPseudo($_POST['pseudo']);
    }

    if (!empty($_POST['dateNaissance']))
    {
        $user->setDateNaissance($_POST['dateNaissance']);
    }

    if (!empty($_POST['mail']))
    {
        $user->setMail($_POST['mail']);
    }

    if (!empty($_POST['password']))
    {
        $user->setMotDePasse($_POST['password']);
    }
    
    $user->setIdUtilisateur($idUser);
    
    UsersManager::modifUser($user);
    
    header("Location: OptionsProfil.php?idUser=$idUser");
}

