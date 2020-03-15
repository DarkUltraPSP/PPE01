<?php
    include_once 'include/header.php';
?>

<?php
//$sujets = SearchManager::;

    if (!empty($_POST['Recherche']) && !empty($_POST['TypeRecherche']))
    {
        $keyword = $_POST['Recherche'];
        $typeRecherche = $_POST['TypeRecherche'];
        switch ($typeRecherche)
        {
            case 'Sujet':
                SearchManager::searchSubject($keyword);
                break;
            
            case 'Auteur':
                
                break;
            
            case 'Message':
                
                break;
        }
    }
?>

<?php
    include_once 'include/footer.php';
?>