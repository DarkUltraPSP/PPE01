  
<?php
include_once "header.php";
?>

<?php
    DatabaseLinker::getConnexion();
    $sujets = SujetManager::findAllSujet();
    
    foreach ($sujets as $sujet)
    {
        echo $sujet->getTitre();
    }
    echo "<pre>";
    print_r(UsersManager::findAllUser());
    echo "</pre>";
?>

<?php
include_once("footer.php")
?>