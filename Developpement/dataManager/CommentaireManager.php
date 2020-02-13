<?php

class CommentaireManager {
   
    public static function findCommentaire($idCommentaire)
    {
        $commentary = new Commentaire();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idCommentaire = ?");
        $state = bindParam(1, $idCommentaire);
        $state-> execute();
        $resultat = $state->fetchAll();
        foreach ($resulat as $lineResultat)
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
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet");
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $com = Commentairemanager::findCommentaire($lineResultat["idCommentaire"]);
            $tabCom[] = $com;
        }
    }
}