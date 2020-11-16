<?php

/*
 * Categorie.php
 */

/**
 * Description of Categorie
 *
 * @author joann
 */
class Categorie {
    
    // Propriétés
    private $idCategorie;
    private $categorie;
    
    public function __construct($idCategorie="", $categorie="") {
        $this->idCategorie = $idCategorie;
        $this->categorie = $categorie;
    }
    
    public function getIdCategorie() {
        return $this->idCategorie;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }


}
