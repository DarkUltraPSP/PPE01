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

    if (!empty($_POST['bio']))
    {
        $user->setBiographie($_POST['bio']);
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
    
    if (!empty($_FILES['fichier']['tmp_name']))
    {
        $destination = "UserImage/";
        move_uploaded_file($_FILES['fichier']['tmp_name'], $destination);
        exit;
    }
    
    $user->setIdUtilisateur($idUser);
    
    UsersManager::modifUser($user);
    
    header("Location: OptionsProfil.php?idUser=$idUser");
}

