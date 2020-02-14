<?php

class CommentaireManager {
   
    public static function findCommentaire($idCommentaire)
    {
        $commentary = new Commentaire();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idCommentaire = ?");
        $state->bindParam(1, $idCommentaire);
        $state->execute();
        $resultat = $state->fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $commentary->setIdCommentaire($lineResultat["idCommentaire"]);
            $commentary->setContenuCommmentaire($lineResultat["contenuCommentaire"]);
            $commentary->setDateCommentaire($lineResultat["dateCommentaire"]);
            $commentary->setIdArticle($lineResultat["idArticle"]);
        }
        return $commentary;
    }
    
    public static function findAllCommentaire()
    {
        $tabCom = [];
        $com = new Commentaire();
        $login = dataBaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Commentaire");
        $state->execute();
        $resultats = $state->fetchAll();
        foreach($resultats as $lineResultat)
        {
            $com = CommentaireManager::findCommentaire($lineResultat["idCommentaire"]);
            $tabCom[] = $com;
        }
        return $tabCom;
    }
}