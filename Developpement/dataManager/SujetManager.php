<?php

class SujetManager 
{
    public static function findSujet($idSujet)
    {
        $login = DatabaseLinker::getConnexion();
        
        $subject = new Sujet();
        
        $state = $login->prepare("SELECT * FROM Sujet WHERE idSujet = ?");
        $state->bindParam(1, $idSujet);
        $state->execute();
        $resultat = $state->fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $subject->setIdSujet($lineResultat["idSujet"]);
            $subject->setNomSujet($lineResultat["nomSujet"]);
            $subject->setContenuSujet($lineResultat["contenuSujet"]);
            $subject->setCanRespond($lineResultat["canRespond"]);
            $subject->setDateSujet($lineResultat["dateSujet"]);
            $subject->setIdUtilisateur($lineResultat["idUtilisateur"]);
            $subject->setIdType($lineResultat['idType']);
        }
        return $subject;
    }
    
    public static function findAllSujet()
    {
        $login = dataBaseLinker::getConnexion();
        
        $tabSujet = [];
        $subject = new Sujet();
        
        $state = $login->prepare("SELECT * FROM Sujet ORDER BY dateSujet DESC");
        $state->execute();
        $resultatsSujet=$state->fetchAll();
        
        foreach ($resultatsSujet as $lineResultat)
        {
            $subject = SujetManager::findSujet ($lineResultat["idSujet"]);
            $tabSujet[]=$subject;
        }
        return $tabSujet;
    }
    
    public static function findLastestSubjects()
    {
        $login = dataBaseLinker::getConnexion();
        
        $tabSujet = [];
        $subject = new Sujet();
        
        $state = $login->prepare("SELECT * FROM Sujet ORDER BY dateSujet DESC LIMIT 3");
        $state->execute();
        $resultatsSujet=$state->fetchAll();
        
        foreach ($resultatsSujet as $lineResultat)
        {
            $subject = SujetManager::findSujet ($lineResultat["idSujet"]);
            $tabSujet[]=$subject;
        }
        return $tabSujet;
    }
    
    public static function insertSujet($sujet)
    {
        $login = DatabaseLinker::getConnexion();
        
        $nom = $sujet->getNomSujet();
        $content = $sujet->getContenuSujet();
        $idUtilisateur = $sujet->getIdUtilisateur();
        $idType = $sujet->getIdType();
        $canRespond = 1;
        
        $state = $login->prepare("INSERT INTO Sujet (nomSujet, contenuSujet, canRespond, dateSujet, idUtilisateur, idType) VALUES (?, ?, ?, CURDATE(), ?, ?)");
        $state->bindParam(1, $nom);
        $state->bindParam(2, $content);
        $state->bindParam(3, $canRespond);
        $state->bindParam(4, $idUtilisateur);
        $state->bindParam(5, $idType);
        $state->execute();
    }
    
    public static function delSujet($idSujet)
    {
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("DELETE FROM Sujet WHERE idSujet =  ?;");
        $state->bindParam(1, $idSujet);
        $state->execute();
        
        $state = $login->prepare("DELETE FROM Commentaire WHERE idSujet =  ?;");
        $state->bindParam(1, $idSujet);
        $state->execute();
    }
    
    public static function modifSujet($idSujet, $nomSujet, $contenuSujet)
    {
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("UPDATE Sujet SET contenuSujet = ? WHERE idSujet = ?");
        $state->bindParam(1, $contenuSujet);
        $state->bindParam(2, $idSujet);
        $state->execute();
        
        $state = $login->prepare("UPDATE Sujet SET nomSujet = ? WHERE idSujet = ?");
        $state->bindParam(1, $nomSujet);
        $state->bindParam(2, $idSujet);
        $state->execute();
    }
    
    public static function OpenCloseSujet($idSujet, $canRespond)
    {
        $login = DatabaseLinker::getConnexion();
        
        if ($canRespond == 1)
        {
            $canRep = 2;
        }
        else if ($canRespond == 2)
        {
            $canRep = 1;
        }
        
        $state = $login->prepare("UPDATE Sujet SET canRespond = ? WHERE idSujet = ?");
        $state->bindParam(1, $canRep);
        $state->bindParam(2, $idSujet);
        $state->execute();
    }
    
    public static function countComs($idSujet)
    {
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT COUNT(idCommentaire) AS nbCom FROM Commentaire INNER JOIN Sujet on Commentaire.idSujet = Sujet.idSujet WHERE Commentaire.idSujet = ?");
        
        $state->bindParam(1, $idSujet);
        $state->execute();
        
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $nbCommentaires = $lineResultat['nbCom'];
        }
        return $nbCommentaires;
    }
}