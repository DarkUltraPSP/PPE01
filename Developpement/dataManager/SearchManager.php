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
    }
    
    public static function searchAutor()
    {
        
    }
    
    public static function searchContent()
    {
        
    }
}
