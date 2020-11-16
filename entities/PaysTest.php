<?php

/* 
 * PaysTest.php
 */

require_once 'Pays.php';

$paysTest= new Pays(1, "France");

echo "Id Pays: ".$paysTest->getIdPays()."<br>";
echo "Pays: ".$paysTest->getpays()."<br>";