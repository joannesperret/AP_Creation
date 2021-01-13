<?php

/*
 * ClientDAOTest.php
 */
 
// Inclusion du DAO Database pour assurer la connexion, du DAO ClientDAO comme bibliothÃ¨que, du DTO client pour la fonction
// de crÃ©ation d'un nouveau client et utilisation de ses mÃ©thodes.
// ClientDAOTest.php


require_once '../daos/Database.php';
require_once '../daos/ClientDAO.php';
require_once '../entities/Client.php';

echo "<br><strong>Jeux de tests ClientDAO</strong><pre>";

echo "</pre><hr>";

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramÃ¨tres du fichier ini
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

// Affichage des rÃ©sultats. Edition d'une boucle utilisant les getters afin d'afficher tous les arguments
// des objets en retour.

echo "<br><br>";
foreach ($record as $key => $value) {
    echo "Cient: $key<br>";
    echo " Id_client: " . $value->getIdClient();
    echo " CivilitÃ©: " . $value->getCiviliteClient();
    echo " Nom: " . $value->getNomClient();
    echo " Prenom: " . $value->getprenomClient();
    echo " Date de naissance: " . $value->getDateNaissanceClient();
    echo " Email: " . $value->getEmailClient();
    echo " Password: " . $value->getPwdClient();
    echo " Adresse: " . $value->getAdresseClient();
    echo " Id_ville: " . $value->getIdVille();
    echo " TÃ©lÃ©phone: " . $value->getTelephoneClient();
    echo " NewsLetter: " . $value->getNewsLetterClient() . "<br>";
}
echo "<hr>";

// Test INSERT
echo "<br>Test insert<br><br>";
// CrÃ©ation d'un nouveau client. Affichage en retour du nombre de lignes affectÃ©es.
 $clientSandrine= new Client("", "Madame", "Bonnet", "Danae", "15 place Charles et Albert Roussel", "danaebonnet@gmail.fr", "Sport", "06-27-02-10-10","1990-12-22", 0, 23015);
    
 $affectedInsert=$dao->insert($pdo,$clientSandrine);
   
echo "Nombre de lignes modifiÃ©es? ".$affectedInsert;
echo "<hr>";
   

// Test UPDATE
echo "<br>Test update<br><br>";
// Mise Ã  jour d'un client. Affichage en retour du nombre de lignes affectÃ©es.
 $clientPatrickModifie= new Client(127, "Monsieur", "Bonnet", "Patrick", "15 place Charles et Albert Roussel", "patrickbonnet@gmail.fr", "Running", "06-27-02-40-30","1970-09-23", 1, 23015);
$affectedUpdate = $dao ->update($pdo,$clientPatrickModifie);
   
echo "Nombre de lignes modifiÃ©es? ".$affectedUpdate."<br>";
echo "<hr>";  
// Test DELETE
echo "<br>Test delete<br><br>";
// Suppression d'un client. Affichage en retour du nombre de lignes affectÃ©es.
$clientPatrickDelete= new Client();
$clientPatrickDelete -> setIdClient(85);
$affectedDelete = $dao -> delete($pdo,$clientPatrickDelete);
echo "Nombre de lignes modifiÃ©es? ".$affectedDelete."<br>";
echo "<hr>";
   
// Test SelectOne
echo "<br>Test selectOne<br><br>";
// Selection d'un client par son Id passÃ© en objet. Affichage en retour des paramÃ¨tres via les getters
// Les autres paramÃ¨tres passÃ©s sont optionnels.

$clientSelectOne = new Client();
$clientSelectOne -> setIdClient(90);
$clientSelectOneById=$dao->selectOne($pdo,$clientSelectOne);

// Affichage des rÃ©sultats

echo " Id_client: ".$clientSelectOneById->getIdClient();
echo " CivilitÃ©: ".$clientSelectOneById->getCiviliteClient();
echo " Nom: ".$clientSelectOneById->getNomClient();
echo " Prenom: ".$clientSelectOneById->getprenomClient();
echo " Date de naissance: ".$clientSelectOneById->getDateNaissanceClient();
echo " Email: ".$clientSelectOneById->getEmailClient();
echo " Password: ".$clientSelectOneById->getPwdClient();
echo " Adresse: ".$clientSelectOneById->getAdresseClient();
echo " Id_ville: ".$clientSelectOneById->getIdVille();
echo " TÃ©lÃ©phone: ".$clientSelectOneById->getTelephoneClient();
echo " NewsLetter: ".$clientSelectOneById->getNewsLetterClient()."<br>";

echo "<hr>";

 // Test SelectOneByEmail
echo "<br>Test selectOneByEmail<br><br>";
$client = new Client();
$client -> setPwdClient("P1l0t@ge");
$client ->setEmailClient("joannesperret@hotmail.fr");
$clientSelectOneByEmail = $dao->selectOneByEmail($pdo, $client);


echo " Id_client: " . $clientSelectOneByEmail->getIdClient();
echo " CivilitÃ©: " . $clientSelectOneByEmail->getCiviliteClient();
echo " Nom: " . $clientSelectOneByEmail->getNomClient();
echo " Prenom: " . $clientSelectOneByEmail->getprenomClient();
echo " Date de naissance: " . $clientSelectOneByEmail->getDateNaissanceClient();
echo " Email: " . $clientSelectOneByEmail->getEmailClient();
echo " Password: " . $clientSelectOneByEmail->getPwdClient();
echo " Adresse: " . $clientSelectOneByEmail->getAdresseClient();
echo " Id_ville: " . $clientSelectOneByEmail->getIdVille();
echo " TÃ©lÃ©phone: " . $clientSelectOneByEmail->getTelephoneClient();
echo " NewsLetter: " . $clientSelectOneByEmail->getNewsLetterClient() . "<br>";

echo "<hr>";

