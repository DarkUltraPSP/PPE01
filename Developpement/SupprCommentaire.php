<?php
include_once 'include/header.php';

foreach ($commentaires as $com) 
{
    if (!empty($_POST["idCom"]) && $_POST["idCom"] == $com->getIdCommentaire())
    {
        $idCom = $com->getIdCommentaire();
    }
}
echo $idCom;
?>
<div><h>Voulez vous supprimer ce commentaire ?</h></div>
<form method="POST" action="SupprCommentaire.php">
    <input type="submit" name="question" value="Oui" />
    <input type="submit" name="question" value="Non" />
</form>

<?php
if (!empty($_POST["question"]))
{
    echo $_POST["question"];
}
if (!empty($_POST["question"]))
{
    if ($_POST["question"]=="oui")
    {
        CommentaireManager::delCommentaire($idCommentaire);
    }
    header('Location: PageSujet.php');
    exit();
}
?>

<?php
    include_once 'include/footer.php';
?>