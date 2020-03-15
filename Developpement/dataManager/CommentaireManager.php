<?php

class CommentaireManager {
   
    public static function findCommentaire($idCommentaire)
    {
        $commentary = new Commentaire();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Commentaire WHERE idCommentaire = ?");
        $state->bindParam(1, $idCommentaire);
        $state->execute();
        $resultat = $state->fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $commentary->setIdCommentaire($lineResultat["idCommentaire"]);
            $commentary->setContenuCommmentaire($lineResultat["contenuCommentaire"]);
            $commentary->setDateCommentaire($lineResultat["dateCommentaire"]);
            $commentary->setIdArticle($lineResultat["idSujet"]);
            $commentary->setIdUtilisateur($lineResultat["idUtilisateur"]);
        }
        return $commentary;
    }
    
    public static function findAllCommentaires()
    {
        $com = new Commentaire();
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Commentaire ORDER BY dateCommentaire");
        $tabCom = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $com = CommentaireManager::findCommentaire($lineResultat["idCommentaire"]);
            $tabCom[] = $com;
        }
        return $tabCom;
    }
    
    public static function insertCommentaire($commentaire)
    {
        $content = $commentaire->getContenuCommmentaire();
        $idArticle =  $commentaire->getIdArticle();
        $idUtilisateur = $commentaire->getIdUtilisateur();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("INSERT INTO Commentaire (dateCommentaire, contenuCommentaire, idSujet, idUtilisateur) VALUES (CURDATE(), ?, ?, ?)");
        $state->bindParam(1, $content);
        $state->bindParam(2, $idArticle);
        $state->bindParam(3, $idUtilisateur);
        $state->execute();
    }
    
    public static function delCommentaire($idCommentaire)
    {
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("DELETE FROM Commentaire WHERE idCommentaire =  ?");
        $state->bindParam(1, $idCommentaire);
        $state->execute();
    }
    
    public static function modifCommentaire($contenuCom, $idCom)
    {
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("UPDATE Commentaire SET contenuCommentaire = ? WHERE idCommentaire = ?");
        $state->bindParam(1, $contenuCom);
        $state->bindParam(2, $idCom);
        $state->execute();
    }
    
}