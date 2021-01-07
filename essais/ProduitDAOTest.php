<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
    <title>AP | Création</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    
    <!-- CSS only -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="../jquery/jquery.js"></script>
</head>

  <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix sacs sacoches valisette">  
                   <!-- Test -->                    
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="../img/product/valisette.jpg"style="background-image: url('../img/product/valisette.jpg');">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Valisette</a></h6>
                            <h5>€15.00</h5>
                        </div>
                    </div>
                    <!-- Test -->
                </div>
  </div>

<?php

/*
 * ProduitDAOTest.php
 */
require_once '../daos/Database.php';
require_once '../daos/ProduitDAO.php';
require_once '../daos/CategorieDAO.php';
require_once '../daos/PhotoDAO.php';
require_once '../entities/Produit.php';
require_once '../entities/Categorie.php';
require_once '../entities/Photo.php';

//Initialisation de la connexion
$cnx = new Connexion();
//Selection des paramètres du fichier ini
$pdo = $cnx->connect("../conf/bd.ini");
// TEST Connexion Database
//echo "<br>Test Connexion<pre>";
//var_dump($pdo);
//echo "</pre><br>";

// TEST SelectAll
$dao = new ProduitDAO($pdo);
//$record = $dao->selectAll($pdo);
//
//echo "Produits <br>";
//foreach ($record as $key => $value) {
//echo "Produit: $key<br>";
//echo " Id produit: " . $value->getIdProduit();
//echo " Designation: " . $value->getDesignation();
//echo " Description: " . $value->getDescription();
//echo " Prix: " . $value->getPrix();
//echo " Stock: " . $value->getQteStockee();
//echo " Categorie: " . $value->getCategorie();
//}

// TEST SELECTALL PHOTOS BY IDPRODUIT
//echo"<br>Select All Photos By ID Produit<br>";




// Paramètre passé: id_produit
//$newProduct= new Produit();
//$newProduct->setIdProduit(9);
//$photo = new Photo();
//$photo->setIdProduitP($newProduct->getIdProduit());
//echo " Id Produit variable produit: " . $newProduct->getIdProduit();
//
//echo " Id Produit variable photo: " . $photo->getIdProduitP();
//$daoP = new PhotoDAO($pdo);
//$photoProduit = $daoP->selectPhotoByIdProduit($pdo, $photo);
//
//foreach ($photoProduit as $key => $value) {
//echo "<br>";
//echo " Id Photo: " . $value->getIdPhoto();
//echo " Photo principale: " . $value->getPhotoPrincipale();
//echo " Photo2: " . $value->getPhoto2();
//echo " Photo3: " . $value->getPhoto3();
//echo " Photo4: " . $value->getPhoto4();
//echo " Id Produit: " . $value->getIdProduitP();
//}


// TEST SelectOne
//echo "<br>Select One<br>";
//$produit = new Produit();
//$produit->setIdProduit("9");
//$produitTest = $dao->selectOne($pdo, $produit);
//
//echo " Id Produit: " . $produitTest->getIdProduit()."<br>";
//echo " Description: " . $produitTest->getDescription()."<br>";
//echo " Designation: " . $produitTest->getDesignation()."<br>";
//echo " Prix: " . $produitTest->getPrix()."<br>";
//echo " Stock: " . $produitTest->getQteStockee()."<br>";
//echo " Categorie: " . $produitTest->getCategorie()."<br>";
    
// TEST SELECT BY CATEGORIE
//echo "<br>Select Produits By Categorie<br>";
//
//// Paramètre passé: catégorie
//$categorie= new Categorie();
//$categorie->setIdCategorie(4);
//$produitCat = new Produit();
//$produitCat->setCategorie($categorie);
//echo "categorie<br>";
//var_dump($categorie);
//echo "<br>";
//echo "produitCat<br>";
//var_dump($produitCat);
//echo "<br>";
//
//$dao1 = new ProduitDAO($pdo);
//$produitCategorieTest = $dao1->selectProduitByCategorie($pdo, $categorie);
//
//foreach ($produitCategorieTest as $key => $value) {
//echo "<br>";
//echo " Id produit: " . $value->getIdProduit();
//echo " Designation: " . $value->getDesignation();
//echo " Description: " . $value->getDescription();
//echo " Prix: " . $value->getPrix();
//echo " Stock: " . $value->getQteStockee();
//echo " Categorie: " . $value->getCategorie();
//}

// TEST BOUCLE SELECT ALL CATEGORIES+ AFFICHAGE DES PRODUITS ASSOCIES+ PHOTOS ASSOCIEES


// TESTS
//echo "<br>Affichage des catégories<br>";

$daoCategorie = new CategorieDAO($pdo);
$record = $daoCategorie->selectAll($pdo);
$contenu="";
// Boucle sur les catégories
$contenu.="<div class='row featured__filter'>";
foreach ($record as $key => $value) {
$contenu.="<div class='col-lg-3 col-md-4 col-sm-6 mix'";
$contenu.=$value->getCategorie();
$contenu.="></div>";

//    echo " Id Categorie: " . $value->getIdCategorie();
//    echo " Categorie: " . $value->getCategorie();

    $dao1 = new ProduitDAO($pdo);
    $categorieBoucle = new Categorie();
    $categorieBoucle->setIdCategorie($value->getIdCategorie());
    $produitCategorieTest = $dao1->selectProduitByCategorie($pdo, $categorieBoucle);
    // Boucle sur les articles
    foreach ($produitCategorieTest as $key => $value) {
        $contenu.="<div class='featured__item'>";
        echo "<br>";
        echo " Id produit: " . $value->getIdProduit();
        echo " Designation: " . $value->getDesignation();
        echo " Description: " . $value->getDescription();
        echo " Prix: " . $value->getPrix();
        echo " Stock: " . $value->getQteStockee();
        echo " Categorie: " . $value->getCategorie();
        // Boucle sur les photos
        $daoP = new PhotoDAO($pdo);
        $photoBoucle = new Photo();
        $photoBoucle->setIdProduitP($value->getIdProduit());
        $photoProduit = $daoP->selectPhotoByIdProduit($pdo, $photoBoucle);
        foreach ($photoProduit as $key => $value) {
        echo "<br>";
        echo " Id photo: " . $value->getIdPhoto();
        echo " Photo principale: " . $value->getPhotoPrincipale();
        echo " Photo2: " . $value->getPhoto2();
        echo " Photo3: " . $value->getPhoto3();
        echo " Photo4: " . $value->getPhoto4();
        echo " Id produit: " . $value->getIdProduitP();
        
        }
    }

    echo"<br>";
}
$contenu.="</div>";
echo $contenu;



