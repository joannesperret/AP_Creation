<?php

/* 
 * CategorieTest.php
 */

require_once 'Categorie.php';

$categorieTest= new Categorie(1, "Bavoirs");

echo "Id Catégorie: ".$categorieTest->getIdCategorie()."<br>";
echo "Catégorie: ".$categorieTest->getCategorie()."<br>";