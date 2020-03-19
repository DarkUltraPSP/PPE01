<?php

class TypeSujet 
{
    private $idType;
    private $libelle;
    
    function getIdType() {
        return $this->idType;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setIdType($idType) {
        $this->idType = $idType;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }


}
