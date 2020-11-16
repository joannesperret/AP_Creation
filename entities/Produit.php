<?php

/*
 * Produit.php
 */

/**
 * Description of Produit
 *
 * @author joann
 */
class Produit {
    //Propriétés
    
    private $idProduit;
    private $designation;
    private $description;
    private $prix;
    private $qteStockee;
    private $categorie;
    
    public function __construct($idProduit="", $designation="", $description="",$prix="", $qteStockee="", $categorie="") {
        $this->idProduit = $idProduit;
        $this->designation = $designation;
        $this->description = $description;
        $this->prix = $prix;
        $this->qteStockee = $qteStockee;
        $this->categorie = $categorie;
    }
    
    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getDesignation() {
        return $this->designation;
    }
    
     public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getQteStockee() {
        return $this->qteStockee;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }
    
     public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setQteStockee($qteStockee) {
        $this->qteStockee = $qteStockee;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

}
