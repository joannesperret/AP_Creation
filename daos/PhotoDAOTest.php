<?php

/*
 * PhotoDAOTest.php
 */
require_once '../daos/Database.php';
require_once '../daos/PhotoDAO.php';
require_once '../daos/ProduitDAO.php';
require_once '../daos/CategorieDAO.php';
require_once '../entities/Photo.php';
require_once '../entities/Produit.php';
require_once '../entities/Categorie.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../conf/bd.ini");
// TEST Connexion Database
echo "<br>Test Connexion<pre>";
var_dump($pdo);
echo "</pre><br>";

// TEST SelectPhotoByCategorie

$daoCategorie = new CategorieDAO($pdo);
$record = $daoCategorie->selectAll($pdo);
$contenu="";
//// Boucle sur les catégories
$contenu.="<div class='row featured__filter'>";
foreach ($record as $key => $value) {
$contenu.="<div class='col-lg-3 col-md-4 col-sm-6 mix'";
$contenu.=$value->getCategorie();
$contenu.="></div>";
//
//   echo " Id Categorie: " . $value->getIdCategorie();
//   echo " Categorie: " . $value->getCategorie();
$dao = new PhotoDAO($pdo);
$categorie= new Categorie;
$categorie->setIdCategorie($value->getIdCategorie());
echo "Categorie ID: ".$categorie->getIdCategorie()."<br>";
$record = $dao->selectPhotoByCategorie($pdo,$categorie);
//var_dump($record);
//echo "Photo by Categorie:<br>";
foreach ($record as $key => $valueP) {
//echo "<br>";
echo " Id Photo: " . $valueP->getIdPhoto();
echo " Photo principale: " . $valueP->getPhotoPrincipale()."<br>";
//echo " Photo2: " . $valueP->getPhoto2();
//echo " Photo3: " . $valueP->getPhoto3();
//echo " Photo4: " . $valueP->getPhoto4();
//echo " Id Produit: " . $valueP->getIdProduitP();

//}
//echo " Photo principale: " . $record->getPhotoPrincipale();
//echo " Id Produit: " . $record->getIdProduitP();
}

// TEST SelectAll
//$dao = new PhotoDAO($pdo);
//$record = $dao->selectAll($pdo);

//foreach ($record as $key => $value) {
//echo "Photo:<br>";
//echo " Id Photo: " . $value->getIdPhoto();
//echo " Photo principale: " . $value->getPhotoPrincipale();
//echo " Photo 2: " . $value->getPhoto2();
//echo " Photo 3: " . $value->getPhoto3();
//echo " Photo 4: " . $value->getPhoto4();
//echo " Id Produit: " . $value->getIdProduitP();
//}
    
// TEST SelectOne
//echo "<br>Select One<br>";
//$photo = new Photo();
//$photo->setIdProduitP("26");
//
//$photoTest = $dao->selectOne($pdo, $photo);
//
//echo " Id Photo: " . $photoTest->getIdPhoto()."<br>";
//echo " Photo principale: " . $photoTest->getPhotoPrincipale()."<br>";
//echo " Photo 2: " . $photoTest->getPhoto2()."<br>";
//echo " Photo 3: " . $photoTest->getPhoto3()."<br>";
//echo " Photo 4: " . $photoTest->getPhoto4()."<br>";
//echo " Id Produit: " . $photoTest->getIdProduitP()."<br>";

   
// SELECT ALL BY ID PRODUIT
// Paramètre passé: id_produit
//$newProduit= new Produit();
//$newProduit->setIdProduit("5");
//$photoP = new Photo();
//$photoP->setIdProduitP(5);
// var_dump($newProduit);
//echo"<br>";
// var_dump($photoP);
//echo $photoP.typeOf();
//$daoP = new PhotoDAO($pdo);
//$photoProduit = $daoP->selectPhotoByIdProduit($pdo, $photoP);

//foreach ($photoProduit as $key => $value) {
//echo "<br>";
//echo " Id Photo: " . $value->getIdPhoto();
//echo " Photo principale: " . $value->getPhotoPrincipale();
//echo " Photo2: " . $value->getPhoto2();
//echo " Photo3: " . $value->getPhoto3();
//echo " Photo4: " . $value->getPhoto4();
//echo " Id Produit: " . $value->getIdProduitP();
}

