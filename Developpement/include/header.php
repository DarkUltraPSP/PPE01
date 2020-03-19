<?php
if (!isset($_SESSION))
{
    session_name('user');
    session_start();
}

if (!empty($_GET["deco"]) && $_GET["deco"] == true)
{
    session_unset();
    session_destroy();
}
    include_once ("dataManager/dataBaseLinker.php");
    include_once ("dataManager/CommentaireManager.php");
    include_once ("dataManager/UsersManager.php");
    include_once ("dataManager/SujetManager.php");
    include_once ("dataManager/SearchManager.php");
    include_once 'dataManager/TypeManager.php';
    include_once 'data/TypeSujet.php';
    include_once ("data/Commentaire.php");
    include_once ("data/Sujet.php");
    include_once ("data/User.php");
    
    DatabaseLinker::getConnexion();

    $sujets = SujetManager::findAllSujet();
    $commentaires = Commentairemanager::findAllCommentaires();
    $users = UsersManager::findAllUsers();
    $types = TypeManager::findAllTypes();
    
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Forum PPE01</title>
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/Organisation.css" media="all"/>

        <link rel="icon" type="image/png" href="image/logo.ico" />
    </head>
    <body>
        
        <header>
            
            <div class="divLogo">
                <img src="image/logo.png" class="logo">
            </div>
            
            <div class="nomForum">
                <a href="index.php"><p class="color"> Nom du Forum </p></a>
            </div>
            
            <?php
            if (empty($_SESSION['login']))
            {
                ?>
                <div class="Profil Settings">
                    <a href="Connexion.php"><input type="button" value="Connexion" class="bouton"/></a>
                    <a href="inscription.php"><input type="button" value="Inscription" class="bouton"/></a>
                </div>
                <?php
            }
            else
            {
            ?>
            
                <form method="GET" action="OptionsProfil.php" class="Profil">
                    <?php
                    foreach ($users as $user)
                    {
                        if ($_SESSION['idUser'] == $user->getIdUtilisateur())
                        {
                            ?>
                            <img class="pdpProfil" src="<?php echo $user->getCheminPhoto();?>" >
                            <div class="Settings">
                                <input type="hidden" value="<?php echo $user->getIdUtilisateur(); ?>" name="idUser"/>
                                <input type="submit" value="<?php echo $user->getPseudo();?>" class="optProfil link"/>
                            <?php
                        }
                    }
                    ?>
                            <a href="index.php?deco=true"><input type="button" value="Deconnexion" class="bouton"/></a>
                            </div>
                </form>
            
            <?php
            }
            ?>
        </header>
        
        <div class="Recherche">
            <form method="POST" action="Search.php" class="RechercheCenter">
                <input type="text" name="Recherche" placeholder="Rechercher" required/>
                <SELECT name="TypeRecherche" size="1">
                    <option> Trier par : </option>
                    <option value="Sujet"> Sujet </option>
                    <option value="Auteur"> Auteur </option>
                    <option value="Message"> Message </option>
                </SELECT>
            <input type="submit" value="Rechercher">
            </form>
            <a href="AllSujets.php" class="RechercheCenter"/> Tous les sujets </a>
        </div>
        
        <div class="Orga">
            <div class="lateral">
            </div>
            <div class="block">