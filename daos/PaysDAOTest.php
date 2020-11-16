<?php

/*
 * VilleDAOTest.php
 */
require_once 'daos/Database.php';
require_once 'daos/PaysDAO.php';
require_once 'entities/Pays.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../conf/bd.ini");
// TEST Connexion Database
echo "<br>Test Connexion<pre>";
var_dump($pdo);
echo "</pre><br>";

// TEST SelectAll
$dao = new PaysDAO($pdo);
$record = $dao->selectAll($pdo);

echo "Table pays <br>";
foreach ($record as $key => $value) {
    echo "Pays: $key<br>";
    echo " Id Pays: " . $value->getIdPays();
    echo " Pays: " . $value->getPays();    
    
// TEST SelectOne

$pays = new Pays();
$pays->setIdPays("4");
$paysTest = $dao->selectOne($pdo, $pays);


echo "<br>Select One <br><br>";

echo " Id Pays: " . $paysTest->getPays()."<br>";
echo " Pays: " . $paysTest->getPays()."<br>";


}

