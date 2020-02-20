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
    
}