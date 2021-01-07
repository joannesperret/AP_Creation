<?php

/* 
 * UtilisateurTest
 */

require_once 'Utilisateur.php';

$utilisateurTest = new Utilisateur(1, "Joann7s", "MdP", "joannesperret@hotmail.fr", "BO");

echo "Id utilisateur: ".$utilisateurTest->getIdUtilisateur()."<br>";
echo "Pseudo: ".$utilisateurTest->getPseudo()."<br>";
echo "Password: ".$utilisateurTest->getMdp()."<br>";
echo "Email: ".$utilisateurTest->getEmail()."<br>";
echo "Fonction: ".$utilisateurTest->getQualité()."<br>";
