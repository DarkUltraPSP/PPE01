<?php

    function ConnexPseudo ($pseudo)
    {
            $pseudoAdmin ="admin";


             $codeRetour = false;

            if($pseudo==$pseudoAdmin )
            {
                $codeRetour = true; 


            }
            return $codeRetour;

    }

    function ConnexPassword ($password)
    {
        $passwordAdmin ="admin";
        
        
         $codeRetour = false;
        
        if($password==$passwordAdmin )
        {
            $codeRetour = true; 
            
               
        }
        return $codeRetour;
      
    } 
    
?>
    <form method="POST" action="index.php">
        <input type="text" name="idUtilisateur" placeholder="Nom d'utilisateur">
        <input type="submit" value="Connexion" class="bouton"/>
    </form> 


<?php

?>