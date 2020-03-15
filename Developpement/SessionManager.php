<?php

include_once 'include/header.php';
//Fonctions connexion
function testIdentifiants($login, $password)
{
    foreach ($users as $user)
    {
        $loginUser = $user->getPseudo();
        $passwordUser = $user->getPseudo();
        $codeRetour = false;

        if ($login == $loginUser && $password == $passwordUser)
        {
            $codeRetour = true;
        }
    }
    return $codeRetour;
}

if (testIdentifiants($_POST["username"], $_POST["password"]) == true)
{
    foreach ($users as $users)
    {
        
    }
    $_SESSION["login"] = $_POST["username"];

    header('Location: index.php');
    exit;
}