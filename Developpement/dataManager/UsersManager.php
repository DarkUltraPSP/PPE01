<?php

class UserManager 
{
    public function findUser($idUser)
    {
        $login = DatabaseLinker::getConnexion();
        $user = new Users();
        $state = $login->prepare("SELECT * FROM Sujet WHERE idUser = ?");
        $state = bindParam(1, $idUser);
        $state-> execute();
        $resultat = $state -> fetchAll();
        foreach ($resultat as $lineResultat)
        {
            $user->setIdUtilisateur($lineResultat["idUtilisateur"]);
            $user->setPseudo($lineResultat["pseudo"]);
            $user->setMotDePasse($lineResultat["motDePasse"]);
            $user->setDateNaissance($lineResultat["dateNaissance"]);
            $user->setCheminPhoto($lineResultat["cheminPhoto"]);
            $user->setSexe($lineResultat["sexe"]);
            $user->setMail($lineResultat["mail"]);
            $user->setBan($lineResultat["ban"]);
        }
    }
}