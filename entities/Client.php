<?php

/*
 * Clients.php
 */

/**
 * Description of Client
 *
 * @author joann
 */
class Client {
       // Propriétés
    private $idClient;
    private $civiliteClient;
    private $nomClient;
    private $prenomClient;
    private $adresseClient;
    private $emailClient;
    private $pwdClient;
    private $telephoneClient;
    private $dateNaissanceClient;
    private $newsLetterClient;    
    private $idVille;    
   
    public function __construct($idClient="", $civiliteClient="", $nomClient="", $prenomClient="", $adresseClient="", $emailClient="", $pwdClient="", $telephoneClient="", $dateNaissanceClient="", $newsLetterClient="", $idVille="") {
        $this->idClient = $idClient;
        $this->civiliteClient = $civiliteClient;
        $this->nomClient = $nomClient;
        $this->prenomClient = $prenomClient;
        $this->adresseClient = $adresseClient;
        $this->emailClient = $emailClient;
        $this->pwdClient = $pwdClient;
        $this->telephoneClient = $telephoneClient;
        $this->dateNaissanceClient = $dateNaissanceClient;
        $this->newsLetterClient = $newsLetterClient;
        $this->idVille = $idVille;
    }
    
    public function getIdClient() {
        return $this->idClient;
    }

    public function getCiviliteClient() {
        return $this->civiliteClient;
    }

    public function getNomClient() {
        return $this->nomClient;
    }

    public function getPrenomClient() {
        return $this->prenomClient;
    }

    public function getAdresseClient() {
        return $this->adresseClient;
    }

    public function getEmailClient() {
        return $this->emailClient;
    }

    public function getPwdClient() {
        return $this->pwdClient;
    }

    public function getTelephoneClient() {
        return $this->telephoneClient;
    }

    public function getDateNaissanceClient() {
        return $this->dateNaissanceClient;
    }

    public function getNewsLetterClient() {
        return $this->newsLetterClient;
    }

    public function getIdVille() {
        return $this->idVille;
    }

    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function setCiviliteClient($civiliteClient) {
        $this->civiliteClient = $civiliteClient;
    }

    public function setNomClient($nomClient) {
        $this->nomClient = $nomClient;
    }

    public function setPrenomClient($prenomClient) {
        $this->prenomClient = $prenomClient;
    }

    public function setAdresseClient($adresseClient) {
        $this->adresseClient = $adresseClient;
    }

    public function setEmailClient($emailClient) {
        $this->emailClient = $emailClient;
    }

    public function setPwdClient($pwdClient) {
        $this->pwdClient = $pwdClient;
    }

    public function setTelephoneClient($telephoneClient) {
        $this->telephoneClient = $telephoneClient;
    }

    public function setDateNaissanceClient($dateNaissanceClient) {
        $this->dateNaissanceClient = $dateNaissanceClient;
    }

    public function setNewsLetterClient($newsLetterClient) {
        $this->newsLetterClient = $newsLetterClient;
    }

    public function setIdVille($idVille) {
        $this->idVille = $idVille;
    }

    
   
}
