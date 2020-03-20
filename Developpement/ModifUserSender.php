<?php
include_once 'include/header.php';

function testPseudo($newPseudo)
{
    $users = UsersManager::findAllUsers();
    $testPseudo = false ;
    
    foreach ($users as $user)
    {
        if ($newPseudo == $user->getPseudo())
        {
            $testPseudo = true;
        }
    }
    return $testPseudo;
}

$user = new User();
$idUser = $_POST['idUser'];

if(!empty($_POST['idUser']))
{
    if (!empty($_POST['NewPseudo']))
    {
        if (testPseudo($_POST['NewPseudo']) == false)
        {
            $user->setPseudo($_POST['NewPseudo']);
        }
        else
        {
            echo "Ce pseudo est deja pris.";
            echo "Vous allez être redirigé vers votre profil.";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="5; URL=OptionsProfil.php?idUser=<?php echo $idUser ?>"> 
            <?php
            exit;
        }
    }

    if (!empty($_POST['bio']))
    {
        $user->setBiographie($_POST['bio']);
    }
        
    if (!empty($_POST['dateNaissance']))
    {
        $user->setDateNaissance($_POST['dateNaissance']);
    }

    if (!empty($_POST['mail']))
    {
        $user->setMail($_POST['mail']);
    }

    if (!empty($_POST['password']))
    {
        $user->setMotDePasse($_POST['password']);
    }
    
    if (!empty($_FILES['fichier']['tmp_name']))
    {
        $pseudo = $_POST['pseudoPDP'];
        
        $destination = "UserImage/$pseudo".pathinfo($_FILES['fichier'], PATHINFO_EXTENSION);
        pathinfo($destination, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['fichier']['tmp_name'], $destination);
        exit;
    }
    
    $user->setIdUtilisateur($idUser);
    
    UsersManager::modifUser($user);
    
    header("Location: OptionsProfil.php?idUser=$idUser");
}