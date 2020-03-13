<?php
if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['dateNaissance']) && !empty($_POST['sexe']))
{
    echo ($_POST['pseudo']);
    echo ($_POST['mail']);
    echo ($_POST['password']);
    echo ($_POST['dateNaissance']);
    echo ($_POST['sexe']);
}