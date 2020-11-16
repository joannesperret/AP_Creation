<?php

/*
 * ClientDAOTest.php
 */
require_once '../daos/Database.php';
require_once '../daos/ClientDAO.php';
require_once '../entities/Client.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../conf/bd.ini");

// TEST Connexion Database
echo "<br>Test Connexion<pre>";
var_dump($pdo);
echo "</pre><br>";

// TEST SelectAll
$dao = new ClientDAO($pdo);
$record = $dao->selectAll($pdo);

//var_dump($record);
echo "Table client <br>";
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

// Test INSERT
//    $clientPatrick= new Client("", "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-94-50","1970-09-23", 0, 23015);
//    
//    $affected=$dao->insert($pdo,$clientPatrick);
//    
//    echo "Insertion réussie? ".$affected;
// Test selectOneByEmailAndPwd
// Test UPDATE

$clientPatrickModifie = new Client(23, "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-94-50", "1970-09-23", 0, 23015);

//   $affected=$dao->update($pdo,$clientPatrickModifie);
//   
//   echo "Mise à jour réussie? ".$affected;
// Test DELETE
//   $clientPatrickModifie= new Client(24, "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-94-50","1970-09-23", 0, 23015);
//    
//    $affected=$dao->delete($pdo,$clientPatrickModifie);
//
//    echo "Mise à jour réussie? ".$affected;
// Test SelectOne

$clientPatrickModifie = new Client(24, "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-94-50", "1970-09-23", 0, 23015);
$clientJoannes = new Client();
//$clientJoannes->setIdClient(1);
//  $client=$dao->selectOne($pdo,$clientPatrickModifie);
////
//
//echo " Id_client: ".$client->getIdClient();
//echo " Civilité: ".$client->getCiviliteClient();
//echo " Nom: ".$client->getNomClient();
//echo " Prenom: ".$client->getprenomClient();
//echo " Date de naissance: ".$client->getDateNaissanceClient();
//echo " Email: ".$client->getEmailClient();
//echo " Password: ".$client->getPwdClient();
//echo " Adresse: ".$client->getAdresseClient();
//echo " Id_ville: ".$client->getIdVille();
//echo " Téléphone: ".$client->getTelephoneClient();
//echo " NewsLetter: ".$client->getNewsLetterClient()."<br>";
//

 // Test SelectOne

$clientJoannes->setPwdClient("Zizou");
$clientJoannes->setEmailClient("tanguiperret99@gmail.fr");
$client = $dao->selectOneByEmailAndPwd($pdo, $clientJoannes);
//

echo " Id_client: " . $client->getIdClient();
echo " Civilité: " . $client->getCiviliteClient();
echo " Nom: " . $client->getNomClient();
echo " Prenom: " . $client->getprenomClient();
echo " Date de naissance: " . $client->getDateNaissanceClient();
echo " Email: " . $client->getEmailClient();
echo " Password: " . $client->getPwdClient();
echo " Adresse: " . $client->getAdresseClient();
echo " Id_ville: " . $client->getIdVille();
echo " Téléphone: " . $client->getTelephoneClient();
echo " NewsLetter: " . $client->getNewsLetterClient() . "<br>";

//

$cnx->disconnect($pdo);

