<?php
    session_name("sessionAdmin");
    session_start();
    
    include ("include/header.php");
    function ConnexPseudo($pseudo)
    {
        $codeRetour = false;
        $users = UsersManager::findAllUsers();
        foreach ($users as $user)
        {
            
            if ($user->getPseudo() == $pseudo)
            {
                $codeRetour = true;  
            }                       
        }
        return $codeRetour;
    }
  
    function ConnexPassword ($password)
    {
        $codeRetour = false;
        $users = UsersManager::findAllUsers();
       
        foreach ($users as $user)
        {
            if ($user->getMotDePasse() == $password )
            {
                $codeRetour = true;   
            }
            
                        
        }
        return $codeRetour;
       
    } 
     
    if (!empty($_POST["pseudo"])&& !empty($_POST["password"]))
    {
        if (ConnexPseudo($_POST["pseudo"]) ==true && ConnexPassword($_POST["password"]) ==true)
        {
           
           //$_SESSION["login"]= $_POST["pseudo"];
           header("Location: index.php");
        }
    }
?>


    <form method="POST" action="Connexion.php">

        <input type ="text" name="pseudo" placeholder="Pseudo"/>
        <input type ="text" name="password" placeholder="Password"/>
        <input type="submit" value="Connexion"/>
  
    </form> 


<?php


   
   
  
?>