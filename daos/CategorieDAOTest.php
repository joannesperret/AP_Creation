<?php

/*
 * CategorieDAOTest.php
 */
require_once '../daos/Database.php';
require_once '../daos/CategorieDAO.php';
require_once '../entities/Categorie.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../conf/bd.ini");
// TEST Connexion Database
echo "<br>Test Connexion<pre>";
var_dump($pdo);
echo "</pre><br>";

// TEST SelectAll
$dao = new CategorieDAO($pdo);
$record = $dao->selectAll($pdo);

echo "Categories <br>";
foreach ($record as $key => $value) {
echo "Categorie: $key<br>";
echo " Id Categorie: " . $value->getIdCategorie();
echo " Categorie: " . $value->getCategorie();
    
// TEST SelectOne

$categorie = new Categorie();
$categorie->setIdCategorie("1");

$categorieTest = $dao->selectOne($pdo, $categorie);

//var_dump($record);
//echo "Select One <br><br>";
//
//echo " Id Categorie: " . $categorieTest->getIdCategorie()."<br>";
//echo " Categorie: " . $categorieTest->getCategorie()."<br>";


    
}
