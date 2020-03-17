<?php
include_once 'include/header.php';

if ($_SESSION['isAdmin']==1)
{
    foreach($users as $user)
    {
        echo $user->getPseudo();
        echo $user->getMail();
        echo $user->getSexe();
        echo $user->getDateNaissance();
        echo $user->getDateInscription();
    }
}
else
{
    echo "Vous n'êtes pas autorisé a visualiser cette page";
}