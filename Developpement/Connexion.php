<?php
    session_name("sessionAdmin");
    session_start();
    
    include ("include/header.php");
    function ConnexPseudo($pseudo)
    {
        $pseudoAdmin ="admin";


        $codeRetour = false;

        if($pseudo==$pseudoAdmin )
        {
            $codeRetour = true; 


        }
        return $codeRetour;
        
    }
  
    /*function ConnexPassword ($password)
    {
        $passwordAdmin ="admin";
        
        
         $codeRetour = false;
        
        if($password==$passwordAdmin )
        {
            $codeRetour = true; 
            
               
        }
        return $codeRetour;
      
    } */
     
    
    if (!empty($_POST["pseudo"])) //&& !empty($_POST["password"]))
    {
        
        if (ConnexPseudo($_POST["pseudo"]) ==true)
        {
           //$_SESSION["login"]= $_POST["pseudo"];
           header('Location: index.php');
        }
    }
?>
    <form method="POST" action="Connexion.php">

        <input type ="text" name="pseudo"/>
        
        <input type="button" value="Connexion"/>
     <a href="index.php"><input type="button" value="retour" /></a>
    </form> 


<?php


   
   
  
?>