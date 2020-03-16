<?php
include_once 'include/header.php';

if (!empty($_POST['pseudo']))
{
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
}

function testPseudo($pseudo, $mail)
{
    $users = UsersManager::findAllUsers();
    $testPseudo = true;
    foreach ($users as $user)
    {
        if ($pseudo == $user->getPseudo() || $mail == $user->getMail())
        {
            $testPseudo = false;
        }
    }
    return $testPseudo;
}

if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['dateNaissance']) && !empty($_POST['sexe']) && !empty($_POST['pdp']) && testPseudo($_POST['pseudo'],$_POST['mail']) == true)
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
else 
{
    echo "<p>Ce nom d'utilisateur est deja pris. </p>";
    echo "<p> Vous allez être redirigé vers la page d'inscription dans 3 secondes. </p>";
    ?><META HTTP-EQUIV="Refresh" CONTENT="3; URL=Connexion.php"><?php
    header("Location: Connexion.php");
    exit;

}

header("Location: Connexion.php");