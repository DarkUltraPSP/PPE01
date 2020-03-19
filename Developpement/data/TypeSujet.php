<?php

class TypeSujet 
{
    private $idType;
    private $libelle;
    private $pathPhotoType;
    
    function getIdType() {
        return $this->idType;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getPathPhotoType() {
        return $this->pathPhotoType;
    }

    function setIdType($idType) {
        $this->idType = $idType;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setPathPhotoType($pathPhotoType) {
        $this->pathPhotoType = $pathPhotoType;
    }

}
