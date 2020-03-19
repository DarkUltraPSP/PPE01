<?php

class TypeManager 
{
    public static function findType($idType)
    {
        $type = new TypeSujet();
        $login = DatabaseLinker::getConnexion();
        $state = $login->prepare("SELECT * FROM TypeSujet WHERE idType = ?");
        $state->bindParam(1, $idType);
        $state->execute();
        $resultat = $state->fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $type->setIdType($lineResultat['idType']);
            $type->setLibelle($lineResultat['libelle']);
        }
        return $type;
    }
    
    public static function findAllTypes()
    {
            $login = dataBaseLinker::getConnexion();

            $tabType = [];
            $type = new TypeSujet();

            $state = $login->prepare("SELECT * FROM TypeSujet");
            $state->execute();
            $resultats=$state->fetchAll();

            foreach ($resultats as $lineResultat)
            {
                $type = TypeManager::findType($lineResultat["idType"]);
                $tabType[]=$type;
            }
            return $tabType;
    }
}