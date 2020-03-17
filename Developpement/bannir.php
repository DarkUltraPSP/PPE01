<?php
include_once 'include/header.php';

if(!empty($POST['ban']) && !empty($POST['idUser']))
{
    UsersManager::banUser($POST['idUser']);
}