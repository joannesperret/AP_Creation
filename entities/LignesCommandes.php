<?php

/*
 * LignesCommandes.php
 */

/**
 * Description of LignesCommandes
 *
 * @author joann
 */
class LigneCommande {
    //Propriétés
    
    private $idCde;
    private $idProduit;
    private $qte;
    
    public function __construct($idCde, $idProduit, $qte) {
        $this->idCde = $idCde;
        $this->idProduit = $idProduit;
        $this->qte = $qte;
    }

    public function getIdCde() {
        return $this->idCde;
    }

    public function getIdProduit() {
        return $this->idProduit;
    }

    public function getQte() {
        return $this->qte;
    }

    public function setIdCde($idCde) {
        $this->idCde = $idCde;
    }

    public function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    public function setQte($qte) {
        $this->qte = $qte;
    }


}
