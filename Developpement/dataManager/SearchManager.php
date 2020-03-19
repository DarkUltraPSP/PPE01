<?php

class SearchManager 
{
    public static function searchSubject($subjectName)
    {
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare('SELECT * FROM Sujet WHERE nomSujet LIKE "%?%" ORDER BY idSujet DESC');
        $state->bindParam(1, $subjectName);
        $state->execute();
        $resultat = $state->fetchAll();
    }
    
    public static function searchAutor()
    {
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare('SELECT * FROM Utilisateur WHERE pseudo LIKE "%?%" ORDER BY idUtilisateur DESC');
        $state->bindParam(1, $subjectName);
        $state->execute();
        $resultat = $state->fetchAll();
    }
}
