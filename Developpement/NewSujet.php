<?php
include_once 'include/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/NewSujet.css" media="all"/>
<div class="bloc">
    <p class="titre">Création d'un nouveau sujet :</p>
    <div class="interieur">
        <form method="POST" action="NewSujetSender.php">
            <input class="barre" name="nomSujet" type="text" placeholder="Titre..." required/>
            <textarea class="barreTexte" name="content" placeholder="Ecrire un nouveau sujet" required></textarea>
            <input type="hidden" value="<?php echo $_SESSION['idUser'] ?>" name="idUser" placeholder="idUtilisateur"/>
            <?php
            if (!isset($_POST['idType']))
            {
            ?>
            <select name="idType">
                <?php
                foreach ($types as $type)
                {
                ?>
                <option value="<?php echo $type->getIdType(); ?>"> <?php echo $type->getLibelle(); ?></option>
                <?php
                }
                ?>
            </select>
            <?php
            }
            else
            {
            ?>
            <input type="hidden" value="<?php echo $_POST['idType'] ?>" name="idType"/>
                <?php
            }
                ?>
            <input class="barre" type="submit" value="Confirmer"/>
        </form>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>