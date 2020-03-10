<?php

class SearchManager 
{
    public static function searchSubject($subjectName)
    {
        $subject = new Sujet();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet WHERE nomSujet LIKE ('?')");
        $state->bindParam(1, $subjectName);
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
    
    public static function searchAutor()
    {
        
    }
    
    public static function searchContent()
    {
        
    }
}
