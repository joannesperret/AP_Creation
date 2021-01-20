<?php

/*
 * VilleDAOTest.php
 */
require_once '../daos/Database.php';
require_once '../daos/VilleDAO.php';
require_once '../entities/Ville.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../../conf/bd.ini");
// TEST Connexion Database
echo "<br>Test Connexion<pre>";
var_dump($pdo);
echo "</pre><br>";

// TEST SelectOneByCp pour requête asynchrone
echo'SelectTownByCp';

$daoCp = new VilleDAO($pdo);
$villeTestCPInt = $daoCp->selectTownByCp($pdo, 42140);
echo "Table ville <br>";
foreach ($villeTestCPInt as $key => $value) {
    echo "Ville: $key<br>";
    echo " Id Ville: " . $value->getIdVille();
    echo " Departement: " . $value->getDepartement();
    echo " Ville: " . $value->getVille();
echo " Id Pays: " . $value->getIdPays()."<br>";}

// TEST SelectAll
$dao = new VilleDAO($pdo);
$record = $dao->selectAll($pdo);

//echo "Table ville <br>";
//foreach ($record as $key => $value) {
//    echo "Ville: $key<br>";
//    echo " Id Ville: " . $value->getIdVille();
//    echo " Departement: " . $value->getDepartement();
//    echo " Ville: " . $value->getVille();
//    echo " Id Pays: " . $value->getIdPays()."<br>";

// TEST SelectOneByCp

$villeCp = new Ville();
$villeCp->setCp("59150");
$villeTest2 = $dao->selectOneByCP($pdo, $villeCp);

//var_dump($record);
echo "Select OneByCp <br><br>";

echo " Id Ville: " . $villeTest2->getIdVille()."<br>";
echo " Departement: " . $villeTest2->getDepartement()."<br>";
echo " Ville: " . $villeTest2->getVille()."<br>";
echo " Id Pays: " . $villeTest2->getIdPays()."<br><br>";


    
// TEST SelectOne

$ville = new Ville();
$ville->setIdVille("28340");

$villeTest = $dao->selectOne($pdo, $ville);

//var_dump($record);
echo "Select One <br><br>";

echo " Id Ville: " . $villeTest->getIdVille()."<br>";
echo " Departement: " . $villeTest->getDepartement()."<br>";
echo " Ville: " . $villeTest->getVille()."<br>";
echo " Id Pays: " . $villeTest->getIdPays()."<br>";

// TEST SelectOne

$villeSelect = new Ville();
$villeSelect->setVille("Meys");

$villeSelectTest = $dao->selectOneByVille($pdo, $villeSelect);

//var_dump($record);
echo "Select One By Ville <br><br>";

echo " Id Ville: " . $villeSelectTest->getIdVille()."<br>";
echo " Departement: " . $villeSelectTest->getDepartement()."<br>";
echo " Ville: " . $villeSelectTest->getVille()."<br>";
echo " Id Pays: " . $villeSelectTest->getIdPays()."<br>";
echo " CP: " . $villeSelectTest->getCP()."<br>";
    
