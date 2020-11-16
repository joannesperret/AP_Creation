<?php

/* 
 * VilleTest
 */

require_once 'Ville.php';

$villeTest = new Ville(1, "59", "Wattrelos", "59150", 1);

echo "Id ville: ".$villeTest->getIdVille()."<br>";
echo "Departement: ".$villeTest->getDepartement()."<br>";
echo "Ville: ".$villeTest->getVille()."<br>";
echo "Code Postal: ".$villeTest->getCp()."<br>";
echo "Id pays: ".$villeTest->getIdPays()."<br>";