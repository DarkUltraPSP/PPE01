<?php

class TopicManager 
{
    public function findSujet($idSujet)
    {
        $subject = new Sujet();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idSujet = ?");
        $state = bindParam(1, $idSujet);
        $state-> execute();
        $resultat = $state -> fetchAll();
        foreach ($resulat as $lineResultat)
        {
            $subject-> setIdSujet ($lineResultat["idSujet"]);
            $subject-> setNomSujet ($lineResultat["nomSujet"]);
            $subject-> setContenuSujet ($lineResultat["contenuSujet"]);
            $subject-> setCanRespond ($lineResultat["canRespond"]);
            $subject-> setDateSujet ($lineResultat["dateSujet"]);
        }
        return $subject;
    }
}