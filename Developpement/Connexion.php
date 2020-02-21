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
    <form method="POST" action="Connexion.php">
     <a href="index.php"><input type="button" value="Retour" class="bouton"/></a>
    </form> 


<?php

?>