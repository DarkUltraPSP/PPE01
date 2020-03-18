<?php
include_once 'include/header.php';

if (isset($_POST['idSujet']))
{
    $idSujet = $_POST['idSujet'];
}
    $idUser = $_POST['idUser'];
    $ban = $_POST['isBan'];
    $raisonBan = $_POST['raisonBan'];
    
    UsersManager::banUser($idUser, $ban, $raisonBan);
    
if (isset($idSujet))
{
    header("Location: PageSujet.php?idSujet=$idSujet");
}
else if (isset($_SESSION['isAdmin']))
{
    header("Location: admin.php");
}