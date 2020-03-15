<?php
include_once 'include/header.php';

if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['dateNaissance']) && !empty($_POST['sexe']) && !empty($_POST['pdp']))
{
    $user = new User();
    $user->setPseudo($_POST['pseudo']);
    $user->setMail($_POST['mail']);
    $user->setMotDePasse($_POST['password']);
    $user->setDateNaissance($_POST['dateNaissance']);
    $user->setSexe($_POST['sexe']);
    if ($_POST['sexe'] == "Homme")
    {
        $user->setCheminPhoto("UserImage/user.png");
    }
    else if ($_POST['sexe'] == "Femme")
    {
        $user->setCheminPhoto("UserImage/user-female.png");
    }
    else if ($_POST['sexe'] == "Hélicoptère d'attaque")
    {
        $user->setCheminPhoto("UserImage/attackHelico.jpg");
    }
    UsersManager::insertUser($user);
}
header("Location: Connexion.php");