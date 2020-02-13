<?php

class Commentaire
{
    private $idCommentaire;
    private $contenuCommmentaire;
    private $dateCommentaire;
    private $idArticle;
    
    function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function getContenuCommmentaire() {
        return $this->contenuCommmentaire;
    }

    function getDateCommentaire() {
        return $this->dateCommentaire;
    }

    function getIdArticle() {
        return $this->idArticle;
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

    function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }



}
