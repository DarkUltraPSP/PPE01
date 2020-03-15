<?php
    session_name("sessionAdmin");
    session_start();
    
    include ("include/header.php");
    
?>
<link rel="stylesheet" type="text/css" href="css/connexion.css" media="all"/>
<div class="bloc">
    <p class="titre">Connexion</p>
    <div class="interieur">
        <form method="POST" action="Connexion.php">
            <p class="titre2">Pseudo :</p>
            <input class="barre" type ="text" name="pseudo" placeholder="Votre pseudo" required/>
            <p class="titre2"> Mot de passe :</p>
            <input class="barre" type ="text" name="password" placeholder="Votre mot de passe" required/>
            </br>
            </br>  
            <input class="barre" type="submit" value="Connexion"/>
        </form> 
    </div>
</div>

<?php
    include("include/footer.php")
?>