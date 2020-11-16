<?php

/*
 * Ville.php
 */

/**
 * Description of Ville
 *
 * @author joann
 */
class Ville {
    //Propriétés
    
    private $idVille;
    private $departement;
    private $ville;
    private $cp;
    private $idPays;
    
    public function __construct($idVille="", $departement="", $ville="", $cp="", $idPays="") {
        $this->idVille = $idVille;
        $this->departement = $departement;
        $this->ville = $ville;
        $this->cp = $cp;
        $this->idPays = $idPays;
    }

    public function getIdVille() {
        return $this->idVille;
    }

    public function getDepartement() {
        return $this->departement;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getIdPays() {
        return $this->idPays;
    }

    public function setIdVille($idVille) {
        $this->idVille = $idVille;
    }

    public function setDepartement($departement) {
        $this->departement = $departement;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function setIdPays($idPays) {
        $this->idPays = $idPays;
    }
   
}
