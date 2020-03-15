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
<link rel="stylesheet" type="text/css" href="css/connexion.css" media="all"/>
<div class="bloc">
    <p class="titre">Connexion :</p>
    <form method="POST" action="Connexion.php">

        <input type ="text" name="pseudo" placeholder="Pseudo" required/>
        <input type ="text" name="password" placeholder="Password" required/>
        <input type="submit" value="Connexion"/>
  
    </form> 
</div>

<?php
    include("include/footer.php")
?>