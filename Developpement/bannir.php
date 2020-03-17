<?php
include_once 'include/header.php';

$users = UsersManager::findAllUsers();

    $idSujet = $_POST['idSujet'];
    $idUser = $_POST['idUser'];
    $ban = $_POST['isBan'];
    UsersManager::banUser($idUser, $ban);
    
    header("Location: PageSujet.php?idSujet=$idSujet");