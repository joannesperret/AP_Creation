<?php

/*
 * Photo.php
 */

/**
 * DTO de la table ['photos'] de la BD ['projet']
 *
 * @author joann
 */
class Photo {
    
    //Propriétés
    
    private $idPhoto;
    private $photoPrincipale;
    private $photo2;
    private $photo3;
    private $photo4;
    private $idProduitP;
    
    // Fonction constructeur
    
    public function __construct($idPhoto="", $photoPrincipale="", $photo2="", $photo3="", $photo4="", $idProduitP="") {
        $this->idPhoto = $idPhoto;
        $this->photoPrincipale = $photoPrincipale;
        $this->photo2 = $photo2;
        $this->photo3 = $photo3;
        $this->photo4 = $photo4;
        $this->idProduitP = $idProduitP;
    }

    // Création des getteurs
    
    public function getIdPhoto() {
        return $this->idPhoto;
    }

    public function getPhotoPrincipale() {
        return $this->photoPrincipale;
    }

    public function getPhoto2() {
        return $this->photo2;
    }

    public function getPhoto3() {
        return $this->photo3;
    }

    public function getPhoto4() {
        return $this->photo4;
    }

    public function getIdProduitP() {
        return $this->idProduitP;
    }

     // Création des setteurs
    
    public function setIdPhoto($idPhoto) {
        $this->idPhoto = $idPhoto;
    }

    public function setPhotoPrincipale($photoPrincipale) {
        $this->photoPrincipale = $photoPrincipale;
    }

    public function setPhoto2($photo2) {
        $this->photo2 = $photo2;
    }

    public function setPhoto3($photo3) {
        $this->photo3 = $photo3;
    }

    public function setPhoto4($photo4) {
        $this->photo4 = $photo4;
    }

    public function setIdProduitP($idProduitP) {
        $this->idProduitP = $idProduitP;
    }

}
