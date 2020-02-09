<?php

class Commentaire
{
    private $idCommentaire;
    private $contenuCommmentaire;
    private $dateCommentaire;
    
    function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function getContenuCommmentaire() {
        return $this->contenuCommmentaire;
    }

    function getDateCommentaire() {
        return $this->dateCommentaire;
    }

    function setIdCommentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

    function setContenuCommmentaire($contenuCommmentaire) {
        $this->contenuCommmentaire = $contenuCommmentaire;
    }

    function setDateCommentaire($dateCommentaire) {
        $this->dateCommentaire = $dateCommentaire;
    }


}
