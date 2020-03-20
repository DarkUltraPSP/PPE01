<?php
    include_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/inscription.css" media="all"/>
<div class="contour">
    <p class="titre">Inscription</p>
    <form method="POST" action="insertUser.php">
<div class="bloc">
        <div class="info">
            <input class="details" type="text" name="pseudo" placeholder="Pseudo" required/>
            <input class="details" type="email" name="mail" placeholder="Adresse e-mail" required/>
            <input class="details" type="password" name="password" placeholder="Mot de passe" required/>
        </div>
        <div class="info2">
            <input class="details" type="date" max="2016-01-01" min="1920-01-01" name="dateNaissance" required/>
            <select class="details" name="sexe" size="1" required>
                <option> Homme </option>
                <option> Femme </option>
                <option> Hélicoptère d'attaque </option>
            </select>
            <input type="hidden" value="Aucune Biographie" name="bio"/>
            <input type="hidden" name="pdp" value="UserImage/utilisateur.png"/>
        </div>
        </br>
</div>
       <input class="inscrire" type="submit" value="S'inscrire" name="inscription"/>
    </form>
</div>
<?php
include_once ("include/footer.php");
?>