<?php

/* 
 * LignesCommandes.php
 */

require_once 'LignesCommandes.php';

$ligneCommandeTest= new LigneCommande(1, 45, 2);

echo "Id Commande: ".$ligneCommandeTest->getIdCde()."<br>";
echo "Id Produit: ".$ligneCommandeTest->getIdProduit()."<br>";
echo "Quantité commandée: ".$ligneCommandeTest->getQte()."<br>";