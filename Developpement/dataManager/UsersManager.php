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
            $user->setIsAdmin($lineResultat["isAdmin"]);
            $user->setBan($lineResultat["ban"]);
            $user->setRaisonBan($lineResultat["raisonBan"]);
            $user->setBiographie($lineResultat["biographie"]);
            $user->setDateInscription($lineResultat["dateInscription"]);
        }
        return $user;
    }
    
    public static function findAllUsers()
    {
        $users = new User();
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Utilisateur ORDER BY dateInscription");
        $tabUser = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $users = UsersManager::findUser($lineResultat["idUtilisateur"]);
            $tabUser[] = $users;
        }
        return $tabUser;
    }
    
    public static function insertUser($user)
    {
        $login = DatabaseLinker::getConnexion();
        
        $pseudo = $user->getPseudo();
        $password = $user->getMotDePasse();
        $dateNaissance = $user->getDateNaissance();
        $mail = $user->getMail();
        $sexe = $user->getSexe();
        $ban = 0;
        $pdp = $user->getCheminPhoto();
        
        $state = $login->prepare("INSERT INTO Utilisateur (pseudo, password, dateNaissance, mail, sexe, dateInscription, ban, cheminPhoto) VALUES (?, ?, ?, ?, ?, CURDATE(), ?, ?)");
        
        $state->bindParam(1, $pseudo);
        $state->bindParam(2, $password);
        $state->bindParam(3, $dateNaissance);
        $state->bindParam(4, $mail);
        $state->bindParam(5, $sexe);
        $state->bindParam(6, $ban);
        $state->bindParam(7, $pdp);
        $state->execute();
    }
    
    public static function modifUser($user)
    {
        $login = DatabaseLinker::getConnexion();
        
        $idUser = $user->getIdUtilisateur();
        $pseudo = $user->getPseudo();
        $bio = $user->getBiographie();
        $password = $user->getMotDePasse();
        $dateNaissance = $user->getDateNaissance();
        $mail = $user->getMail();
        
        if(!empty($pseudo))
        {
            $state = $login->prepare("UPDATE Utilisateur SET pseudo = ? WHERE idUtilisateur = ?");
            $state->bindParam(1, $pseudo);
        }
        if (!empty($bio))
        {
            $state = $login->prepare("UPDATE Utilisateur SET biographie = ? WHERE idUtilisateur = ?");
            $state->bindParam(1, $bio);
        }
            
        if(!empty($dateNaissance))
        {
            $state = $login->prepare("UPDATE Utilisateur SET dateNaissance = ? WHERE idUtilisateur = ?");
            $state->bindParam(1, $dateNaissance);
        }
        
        if(!empty($mail))
        {
            $state = $login->prepare("UPDATE Utilisateur SET mail = ? WHERE idUtilisateur = ?");
            $state->bindParam(1, $mail);
        }
        
        if(!empty($password))
        {
            $state = $login->prepare("UPDATE Utilisateur SET password = ? WHERE idUtilisateur = ?");
            $state->bindParam(1, $password);
        }
        $state->bindParam(2, $idUser);
        $state->execute();
        
    }
    
    public static function countSujets($idUser)
    {
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT COUNT(idSujet) AS nbSujet FROM Sujet INNER JOIN Utilisateur on Sujet.idUtilisateur = Utilisateur.idUtilisateur WHERE Sujet.idUtilisateur = ?");
        
        $state->bindParam(1, $idUser);
        $state->execute();
        
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $nbSujet = $lineResultat['nbSujet'];
        }
        return $nbSujet;
    }
    
    public static function countCommentaires($idUser)
    {
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT COUNT(idCommentaire) AS nbCom FROM Commentaire INNER JOIN Utilisateur on Commentaire.idUtilisateur = Utilisateur.idUtilisateur WHERE Commentaire.idUtilisateur = ?");
        
        $state->bindParam(1, $idUser);
        $state->execute();
        
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $nbCommentaires = $lineResultat['nbCom'];
        }
        return $nbCommentaires;
    }
    
    public static function banUser($idUser, $ban, $raisonBan)
    {
        $login = DatabaseLinker::getConnexion();
        
        if ($ban == 0)
        {
            $ban = 1;
        }
        else if ($ban == 1)
        {
            $ban = 0;
        }
        
        $state = $login->prepare("UPDATE Utilisateur SET ban = ?, raisonBan = ? WHERE idUtilisateur = ?");    
        $state->bindParam(1, $ban);
        $state->bindParam(2, $raisonBan);
        $state->bindParam(3, $idUser);
        
        $state->execute();
    }
}