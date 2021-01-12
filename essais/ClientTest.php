<?php

/* 
 * ClientTest
 */

// Inclusion du DTO 'client'
require_once '../entities/Client.php';

// Création d'un nouveau client
$clientTest = new Client(1, "Monsieur", "Perret", "Joannès", "7 Hameau du Malgré Tout", 
"joannesperret@hotmail.fr", "MdP", "06-52-81-07-98", "1976-03-03", 1, 22728);
     
// Affichage du résultat par utilisation des getters

echo "Id_client: ".$clientTest->getIdClient()."<br>";
echo "Civilité: ".$clientTest->getCiviliteClient()."<br>";
echo "Nom: ".$clientTest->getNomClient()."<br>";
echo "Prenom: ".$clientTest->getPrenomClient()."<br>";
echo "Date de naissance: ".$clientTest->getDateNaissanceClient()."<br>";
echo "Email: ".$clientTest->getEmailClient()."<br>";
echo "Password: ".$clientTest->getPwdClient()."<br>";
echo "Adresse: ".$clientTest->getAdresseClient()."<br>";
echo "Id_ville: ".$clientTest->getIdVille()."<br>";
echo "Téléphone: ".$clientTest->getTelephoneClient()."<br>";
echo "NewsLetter: ".$clientTest->getNewsLetterClient()."<br>";