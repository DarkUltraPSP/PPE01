<?php

class Sujet 
{
    private $idSujet;
    private $nomSujet;
    private $contenuSujet;
    private $canRespond;
    private $dateSujet;
    private $idUtilisateur;

    function getIdSujet() {
        return $this->idSujet;
    }

    function getNomSujet() {
        return $this->nomSujet;
    }

    function getContenuSujet() {
        return $this->contenuSujet;
    }

    function getCanRespond() {
        return $this->canRespond;
    }

    function getDateSujet() {
        return $this->dateSujet;
    }

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function setIdSujet($idSujet) {
        $this->idSujet = $idSujet;
    }

    function setNomSujet($nomSujet) {
        $this->nomSujet = $nomSujet;
    }

    function setContenuSujet($contenuSujet) {
        $this->contenuSujet = $contenuSujet;
    }

    function setCanRespond($canRespond) {
        $this->canRespond = $canRespond;
    }

    function setDateSujet($dateSujet) {
        $this->dateSujet = $dateSujet;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }


}