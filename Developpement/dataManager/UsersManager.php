<?php

class UsersManager 
{
    public static function findUser($idUser)
    {
        $login = DatabaseLinker::getConnexion();
        $user = new Users();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idUser = ?");
        $state->bindParam(1, $idUser);
        $state-> execute();
        $resultat = $state -> fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $user->setIdUtilisateur($lineResultat["idUtilisateur"]);
            $user->setPseudo($lineResultat["pseudo"]);
            $user->setMotDePasse($lineResultat["motDePasse"]);
            $user->setDateNaissance($lineResultat["dateNaissance"]);
            $user->setCheminPhoto($lineResultat["cheminPhoto"]);
            $user->setSexe($lineResultat["sexe"]);
            $user->setMail($lineResultat["mail"]);
            $user->setBan($lineResultat["ban"]);
        }
        return $user;
    }
    
      public static function findAllUser()
    {
       
        $tabUser = [];
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM User ");
        $state -> execute();
        $resultatsUser= $state ->fetchAll();
        
        foreach ($resultatsUser as $lineResultat)
        {
            $user = new Sujet();  
            $user = UsersManager::findSujet($lineResultat["idUtilisateur"]);
            $tabUser[]=$user;
        }
        return $tabUser;
    }  
}