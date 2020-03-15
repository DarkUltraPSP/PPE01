<?php

class User
{
    private $idUtilisateur;
    private $pseudo;
    private $motDePasse;
    private $dateNaissance;
    private $dateInscription;
    private $cheminPhoto;
    private $sexe;
    private $mail;
    private $ban;

    function getIdUtilisateur() {
    return $this->idUtilisateur;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getDateInscription() {
        return $this->dateInscription;
    }
    
    function getCheminPhoto() {
        return $this->cheminPhoto;
    }

    function getSexe() {
        return $this->sexe;
    }

    function getMail() {
        return $this->mail;
    }

    function getBan() {
        return $this->ban;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }
    
    function setDateInscription($dateInscription) {
        $this->dateInscription = $dateInscription;
    }
    
    function setCheminPhoto($cheminPhoto) {
        $this->cheminPhoto = $cheminPhoto;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setBan($ban) {
        $this->ban = $ban;
    }

}
