<?php
    include_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/inscription.css" media="all"/>
<div class="contour">
    <p class="titre">Inscription</p>
    <form class="bloc" method="POST" action="insertUser.php">
        <img class="photoProfil" src="" width="150" height="150"/>

        <div class="info">
            <input class="details" type="text" name="pseudo" placeholder="Pseudo" required/>
            <input class="details" type="text" name="mail" placeholder="Adresse e-mail" required/>
            <input class="details" type="password" name="password" placeholder="Mot de passe" required/>
        </div>
        <div class="info">
            <input class="details" type="date" max="2016-01-01" min="1920-01-01" name="dateNaissance" required/>
            <select class="details" name="sexe" size="1" required>
                <option> Homme </option>
                <option> Femme </option>
                <option> Hélicoptère d'attaque </option>
            </select>
                
            <input type="hidden" name="pdp" value="UserImage/utilisateur.png"/>
        </div>
    
        <input class="inscrire" type="submit" value="S'inscrire" name="inscription"/>
    </form>
</div>
<?php
include_once ("include/footer.php");
?>