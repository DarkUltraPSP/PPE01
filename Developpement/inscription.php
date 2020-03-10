<?php
    include_once("include/header.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link rel="stylesheet" href="css/inscription.css">
    </head>

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
        <div class = "haut">
            <div class="hautGauche">
                <p>Photo</p>
            </div>
            <div class="hautDroit">
                <input type="text" placeholder="Pseudo" name="pseudo" value="" />
                </br>
                </br>
                <p>Date de naissance :</p>
                <select name="jour" placeholder="Jour">
                <?php
                for ($jour = 01; $jour < 31; $jour++) 
                {
                ?>
                    <OPTION><?php echo $jour ?></OPTION>
                <?php
                }
                ?>
                </select>
                <select name="Mois" placeholder="Mois">
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>
                <select name="annee" placeholder="Annee">
                <?php
                for ($annee = 1920; $annee < 2016 ; $annee++) 
                {
                ?>
                    <OPTION><?php echo $annee ?></OPTION>
                <?php
                }
                ?> 
                </select>
                </br>
                </div>
                <p>Sexe: </p>
                <select>
                    <option>Homme</option> 
                    <option>Femme</option> 
                <select/>     
        
        <div class="bas">
            <p>Adresse e-mail: </p>
            <input type="text" name="adresse" value="" />
        
            <p>Choisir un mot de passe:</p>
            <input type="text" name="mdp" value="" />
        
            <p>Confirmation du mot de passe: </p>
            <input type="text" name="mdpconfirmation" value="" />

        

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