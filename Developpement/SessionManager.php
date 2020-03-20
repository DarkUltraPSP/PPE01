<?php
session_name('user');
session_start();

include_once "include/header.php";



//Fonctions connexion
function testIdentifiants($login, $password)
{
    $users = UsersManager::findAllUsers();
    
    foreach ($users as $user)
    {
        $codeRetour = false;

        if ($_POST["pseudo"] == $user->getPseudo() && $_POST["password"] == $user->getMotDePasse())
        {
            $loginUser = $user->getPseudo();
            $idUser = $user->getIdUtilisateur();
            $passwordUser = $user->getMotDePasse();
            $isAdmin = $user->getIsAdmin();
            $codeRetour = true;
            break;
        }
    }
    return $codeRetour;
}

if (testIdentifiants($_POST["pseudo"], $_POST["password"]) == true)
{
    foreach ($users as $user)
    {
        if ($_POST["pseudo"] == $user->getPseudo() && $_POST["password"] == $user->getMotDePasse())
        {
            if (testBan($user->getIdUtilisateur()) == false)
            {
            $loginUser = $user->getPseudo();
            $idUser = $user->getIdUtilisateur();
            $isAdmin = $user->getIsAdmin();
            $ban = $user->getBan();
            }
            else if (testBan($user->getIdUtilisateur()) == true)
            {
                ?>
                <p> Connexion impossible </p>
                <p> Votre compte à été banni du forum pour : </p>
                <?php echo $user->getRaisonBan(); ?>
                <META HTTP-EQUIV="Refresh" CONTENT="5; URL=index.php">
                <p>Si vous n'etes pas automatiquement redirigé, veuillez cliquer <a href="index.php"> ici </a>.</p>
                <?php
                exit;
            }
        }
    }
    
    $_SESSION["isBan"] = $ban;
    $_SESSION["login"] = $loginUser;
    $_SESSION["isAdmin"] = $isAdmin;
    $_SESSION['idUser'] = $idUser;
    
    header('Location: index.php');
    exit;
}
else
{
    echo "Votre pseudo ou votre mot de passe est incorrect.";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="5; URL=Connexion.php">
    <?php
}