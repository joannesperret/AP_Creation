<?php

/*
 * Commande.php
 */

/**
 * Description of Commande
 *
 * @author joann
 */
class Commande {
    private $idCde;
    private $dateCde;
    private $idClient;
    private $facture;
    
    public function __construct($idCde, $dateCde, $idClient, $facture) {
        $this->idCde = $idCde;
        $this->dateCde = $dateCde;
        $this->idClient = $idClient;
        $this->facture = $facture;
    }
    
    public function getIdCde() {
        return $this->idCde;
    }

    public function getDateCde() {
        return $this->dateCde;
    }

    public function getIdClient() {
        return $this->idClient;
    }

    public function getFacture() {
        return $this->facture;
    }

    public function setIdCde($idCde) {
        $this->idCde = $idCde;
    }

    public function setDateCde($dateCde) {
        $this->dateCde = $dateCde;
    }

    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function setFacture($facture) {
        $this->facture = $facture;
    }


}


