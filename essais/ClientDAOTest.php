<?php

/*
 * ClientDAOTest.php
 */
 
// Inclusion du DAO Database pour assurer la connexion, du DAO ClientDAO comme bibliothèque, du DTO client pour la fonction
// de création d'un nouveau client et utilisation de ses méthodes.
// ClientDAOTest.php


require_once '../daos/Database.php';
require_once '../daos/ClientDAO.php';
require_once '../entities/Client.php';

echo "<br><strong>Jeux de tests ClientDAO</strong><pre>";

echo "</pre><hr>";

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../../conf/bd_ad.ini");

// TEST Connexion Database
echo "<br>Test Connexion<br>";
var_dump($pdo);
echo"<br>";
echo "<hr>";

// TEST SelectAll
echo "<br>Test SelectAll";
$dao = new ClientDAO($pdo);
$record = $dao->selectAll($pdo);

// Affichage des résultats. Edition d'une boucle utilisant les getters afin d'afficher tous les arguments
// des objets en retour.

echo "<br><br>";
foreach ($record as $key => $value) {
    echo "Cient: $key<br>";
    echo " Id_client: " . $value->getIdClient();
    echo " Civilité: " . $value->getCiviliteClient();
    echo " Nom: " . $value->getNomClient();
    echo " Prenom: " . $value->getprenomClient();
    echo " Date de naissance: " . $value->getDateNaissanceClient();
    echo " Email: " . $value->getEmailClient();
    echo " Password: " . $value->getPwdClient();
    echo " Adresse: " . $value->getAdresseClient();
    echo " Id_ville: " . $value->getIdVille();
    echo " Téléphone: " . $value->getTelephoneClient();
    echo " NewsLetter: " . $value->getNewsLetterClient() . "<br>";
}
echo "<hr>";

// Test INSERT
echo "<br>Test insert<br><br>";
// Création d'un nouveau client. Affichage en retour du nombre de lignes affectées.
 $clientPatrick= new Client("", "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-40-30","1970-09-23", 0, 23015);
    
 $affectedInsert=$dao->insert($pdo,$clientPatrick);
   
echo "Insertion réussie? ".$affectedInsert;
echo "<hr>";
   

// Test UPDATE
echo "<br>Test update<br><br>";
// Mise à jour d'un client. Affichage en retour du nombre de lignes affectées.
$clientPatrickModifie = new Client();
$clientPatrickModifie ->setNewsLetterClient(1);

$affectedUpdate=$dao->update($pdo,$clientPatrickModifie);
   
echo "Mise à jour réussie? ".$affectedUpdate."<br>";
echo "<hr>";  
// Test DELETE
echo "<br>Test delete<br><br>";
// Suppression d'un client. Affichage en retour du nombre de lignes affectées.
$clientPatrickDelete= new Client();
//$clientPatrickDelete ->setIdClient($idClient);
    
$affectedDelete=$dao->delete($pdo,$clientPatrickModifie);

echo "Suppression réussie? ".$affectedDelete."<br>";
echo "<hr>";
   
// Test SelectOne
echo "<br>Test selectOne<br><br>";
// Selection d'un client par son Id passé en objet. Affichage en retour des paramètres via les getters
// Les autres paramètres passés sont optionnels.

$clientSelectOne = new Client();
$clientSelectOne ->setIdClient(78);
$clientSelectOneById=$dao->selectOne($pdo,$clientSelectOne);

// Affichage des résultats

echo " Id_client: ".$clientSelectOneById->getIdClient();
echo " Civilité: ".$clientSelectOneById->getCiviliteClient();
echo " Nom: ".$clientSelectOneById->getNomClient();
echo " Prenom: ".$clientSelectOneById->getprenomClient();
echo " Date de naissance: ".$clientSelectOneById->getDateNaissanceClient();
echo " Email: ".$clientSelectOneById->getEmailClient();
echo " Password: ".$clientSelectOneById->getPwdClient();
echo " Adresse: ".$clientSelectOneById->getAdresseClient();
echo " Id_ville: ".$clientSelectOneById->getIdVille();
echo " Téléphone: ".$clientSelectOneById->getTelephoneClient();
echo " NewsLetter: ".$clientSelectOneById->getNewsLetterClient()."<br>";

echo "<hr>";

 // Test SelectOneByEmailAndByPwd
echo "<br>Test selectOneByEmail<br><br>";

$clientSelectOneByEmail = $dao->selectOneByEmail($pdo, $clientPatrick);


echo " Id_client: " . $clientSelectOneByEmail->getIdClient();
echo " Civilité: " . $clientSelectOneByEmail->getCiviliteClient();
echo " Nom: " . $clientSelectOneByEmail->getNomClient();
echo " Prenom: " . $clientSelectOneByEmail->getprenomClient();
echo " Date de naissance: " . $clientSelectOneByEmail->getDateNaissanceClient();
echo " Email: " . $clientSelectOneByEmail->getEmailClient();
echo " Password: " . $clientSelectOneByEmail->getPwdClient();
echo " Adresse: " . $clientSelectOneByEmail->getAdresseClient();
echo " Id_ville: " . $clientSelectOneByEmail->getIdVille();
echo " Téléphone: " . $clientSelectOneByEmail->getTelephoneClient();
echo " NewsLetter: " . $clientSelectOneByEmail->getNewsLetterClient() . "<br>";

echo "<hr>";

