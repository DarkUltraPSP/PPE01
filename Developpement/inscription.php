<?php
    include_once("include/header.php");
?>
<div class="Organisation">
    <div class="Droit">
        <p>Droit</p>        
    </div>
    <div class="Milieu">
    <?php
        function testPseudo ($pseudo)
        {
            $pseudoAdmin ="admin";


             $codeRetour = false;

            if($pseudo!==$pseudoAdmin )
            {
                $codeRetour = true; 


            }
            return $codeRetour;

        }

        function testemail ($email,$emailConfirmation)
        {
            $emailAdmin ="admin@";


             $codeRetour = false;

            if ($emailConfirmation==$email)
            {

                if($email!==$emailAdmin)
                {
                    $codeRetour = true; 

                }
            return $codeRetour;
            }

        }
        function testPassword ($password,$PasswordConfirmation)
        {
            $passwordAdmin ="admin";


             $codeRetour = false;

            if ($password==$PasswordConfirmation)
            {

                if($password!==$passwordAdmin)
                {
                    $codeRetour = true; 

                }
            return $codeRetour;
            }

        }


    ?>

        <div class = "Prenom">
            <p>Prenom: </p>
            <input type="text" name="prenom" value="" />
        </div>

        <div class="Nom">
            <p>Nom: </p>
            <input type="text" name="nom" value="" />
        </div>
        
        
    <?php

    ?>
        <div class = "genre">
            <p>Pseudo: </p>
            <input type ="text"/>
            <p>Sexe: </p>
            <select>
                <option>Homme</option> 
                <option>Femme</option> 
            <select/>     
        </div>
        
        <div class="adresse">
            <p>Adresse e-mail: </p>
            <input type="text" name="adresse" value="" />
        </div>
        
        <div class="mdp">
            <p>Choisir un mot de passe:</p>
            <input type="text" name="mdp" value="" />
        </div>
        
        <div class="mdpconfirmation">
            <p>Confirmation du mot de passe: </p>
            <input type="text" name="mdpconfirmation" value="" />
        </div>

        

        <form method="POST" action="inscription.php">
  
        <input type="submit" value="Confirmer" class="button_connexion">

        </form>

        </div>
    </div>
</div>
    <div class="Gauche">
        
    </div>
<?php
include_once ("include/footer.php");
?>