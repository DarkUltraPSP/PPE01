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
    private $isAdmin;
    private $ban;
    private $raisonBan;
    private $biographie;

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

    function getIsAdmin() {
        return $this->isAdmin;
    }

    function getBan() {
        return $this->ban;
    }

    function getRaisonBan() {
        return $this->raisonBan;
    }

    function getBiographie() {
        return $this->biographie;
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

    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    function setBan($ban) {
        $this->ban = $ban;
    }

    function setRaisonBan($raisonBan) {
        $this->raisonBan = $raisonBan;
    }

    function setBiographie($biographie) {
        $this->biographie = $biographie;
    }

}
