<?php


    session_name("sessionAdmin");
    session_start();

    include_once("nbproject/header.php");
    include_once ("nbproject/Connexion.php");
   
    if (!empty($_POST["pseudo"]) && !empty($_POST["password"]))
    {
        if (ConnexPassword($_POST["pseudo"],$_POST["password"]) ==true)
        {
           $_SESSION["login"]= $_POST["pseudo"];
           header('Location: Connexion.php');
        }
    }