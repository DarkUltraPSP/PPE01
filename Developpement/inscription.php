<?php
    include_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/inscription.css" media="all"/>
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
<div>
    <form class="bloc" method="POST" action="insertUser.php">
        <div class="info">
            <input type="text" name="pseudo" placeholder="Pseudo" />
            <input type="text" name="mail" placeholder="Adresse e-mail" />
            <input type="password" name="password" placeholder="Mot de passe"/>
        </div>
        <div class="info">
            <input type="date" max="2016-01-01" min="1920-01-01" name="dateNaissance"/>
            <select name="sexe" size="1">
                <option> Homme </option>
                <option> Femme </option>
                <option> Hélicoptère d'attaque </option>
            </select>
            <input type="hidden" name="pdp" value="UserImage/utilisateur.png"/>
        </div>
            </select>
</div>
        <input type="submit" value="S'inscrire" name="inscription"/>
    </form>
<?php
include_once ("include/footer.php");
?>