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
