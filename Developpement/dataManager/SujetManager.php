<?php

class SujetManager 
{
    public static function findSujet($idSujet)
    {
        $subject = new Sujet();
        $login = DatabaseLinker::getConnexion();
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
        }
        return $subject;
    }
    
    public static function findAllSujet()
    {
        $tabSujet = [];
        $subject = new Sujet();
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet");
        $state->execute();
        $resultatsSujet=$state->fetchAll();
        
        foreach ($resultatsSujet as $lineResultat)
        {
            $subject = SujetManager::findSujet ($lineResultat["idSujet"]);
            $tabSujet[]=$subject;
        }
        return $tabSujet;
    }
    
}