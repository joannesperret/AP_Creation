<?php

/* 
 * CommandeTest
 */

require_once 'Commande.php';

$commandeTest= new Commande(1, "2020-10-09", 5, "FA2010092115");

echo "Id Commande: ".$commandeTest->getIdCde()."<br>";
echo "Date commande: ".$commandeTest->getDateCde()."<br>";
echo "Id Client: ".$commandeTest->getIdClient()."<br>";
echo "Facture: ".$commandeTest->getFacture()."<br>";