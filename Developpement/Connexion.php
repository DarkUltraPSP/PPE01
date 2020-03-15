<?php
    session_name("sessionAdmin");
    session_start();
    
    include ("include/header.php");
    
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