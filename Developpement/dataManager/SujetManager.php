<?php

class SujetManager 
{
    public static function findSujet($idSujet)
    {
        $subject = new Sujet();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idSujet = ?");
        $state->bindParam(1, $idSujet);
        $state-> execute();
        $resultat = $state -> fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $subject-> setIdSujet ($lineResultat["idSujet"]);
            $subject-> setNomSujet ($lineResultat["nomSujet"]);
            $subject-> setContenuSujet ($lineResultat["contenuSujet"]);
            $subject-> setCanRespond ($lineResultat["canRespond"]);
            $subject-> setDateSujet ($lineResultat["dateSujet"]);
        }
        return $subject;
    }
    
    public static function findAllSujet()
    {
        $tabSujet = [];
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet ");
        $state -> execute();
        $resultatsSujet= $state ->fetchAll();
        
        foreach ($resultatsSujet as $lineResultat)
        {
            $subject = new Sujet();  
            $subject = SujetManager::findSujet ($lineResultat["idSujet"]);
          
            $tabSujet[]=$subject;
        }
        return $tabSujet;
    }
}