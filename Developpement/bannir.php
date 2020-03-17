<?php
include_once 'include/header.php';

$users = UsersManager::findAllUsers();

    $idSujet = $_POST['idSujet'];
    $idUser = $_POST['idUser'];
    $ban = $_POST['isBan'];
    $raisonBan;
    UsersManager::banUser($idUser, $ban, $raisonBan);
    
    header("Location: PageSujet.php?idSujet=$idSujet");