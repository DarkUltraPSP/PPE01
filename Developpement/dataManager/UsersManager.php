<?php

class UsersManager 
{
    public static function findUser($idUser)
    {
        $login = DatabaseLinker::getConnexion();
        $user = new User();
        $state = $login->prepare("SELECT * FROM Utilisateur WHERE idUtilisateur = ?");
        $state->bindParam(1, $idUser);
        $state-> execute();
        $resultat = $state -> fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $user->setIdUtilisateur($lineResultat["idUtilisateur"]);
            $user->setPseudo($lineResultat["pseudo"]);
            $user->setMotDePasse($lineResultat["password"]);
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
        $user = new Sujet();  
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Utilisateur");
        $state->execute();
        $resultatsUser=$state->fetchAll();
        
        foreach ($resultatsUser as $lineResultat)
        {
            $user = UsersManager::findUser($lineResultat["idUtilisateur"]);
            $tabUser[]=$user;
        }
        return $tabUser;
    }  
}