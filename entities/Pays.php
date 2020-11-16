<?php

/*
 * Pays.php
 */

/**
 * Description of Pays
 *
 * @author joann
 */
class Pays {
    //Propriété
    
    private $idPays;
    private $pays;
    
    public function __construct($idPays="", $pays="") {
        $this->idPays = $idPays;
        $this->pays = $pays;
    }

    public function getIdPays() {
        return $this->idPays;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setIdPays($idPays) {
        $this->idPays = $idPays;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

}
