<?php
?>
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

    <div class = "nom_Prenom">
        
        <form method="POST" action="inscription.php">
        <input type ="<?php $pseudo ?>"/>
        
        <input type="submit" value="Connexion" class="button_connexion">
        <input type ="text"/>
        </form>
    </div>
<?php

?>
    <div class = "pseudo_genre">
        <input type ="text"/>
        <select>
            <option>Homme</option> 
            <option>Femme</option> 
            <option>Autre</option> 
        <select/>
        
    </div>

    <div class = "email">
       
        <form method="POST" action="inscription.php">
        <input type ="<?php $email ?>"/>
        <input type ="<?php $emailConfirmation ?>"/>
       
        
        <input type ="<?php $password ?>"/>
        <input type ="<?php $passwordConfirmation ?>"/>
       
        <input type="submit" value="Confirmer" class="button_connexion">
        
        </form>

    </div>