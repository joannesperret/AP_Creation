<?php

/*
 * Utilisateurs
 */

/**
 * Description of Utilisateurs
 *
 * @author joann
 */
class Utilisateur {
    //Propriétés
    
    private $idUtilisateur;
    private $pseudo;
    private $mdp;
    private $email;
    private $qualité;

    public function __construct($idUtilisateur, $pseudo, $mdp, $email, $qualité) {
        $this->idUtilisateur = $idUtilisateur;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->email = $email;
        $this->qualité = $qualité;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getQualité() {
        return $this->qualité;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setQualité($qualité) {
        $this->qualité = $qualité;
    }
   
}
