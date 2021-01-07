<?php

/* 
 * ProduitTest.php
 */

require_once 'Produit.php';

$produitTest= new Produit(1,"Trousse","Description du produit",12, 5, 1);

echo "Id Produit: ".$produitTest->getIdProduit()."<br>";
echo "Désignation: ".$produitTest->getDesignation()."<br>";
echo "Description: ".$produitTest->getDescription()."<br>";
echo "Prix: ".$produitTest->getPrix()."<br>";
echo "Quantité: ".$produitTest->getQteStockee()."<br>";
echo "Categorie: ".$produitTest->getCategorie()."<br>";