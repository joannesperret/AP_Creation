<?php
/*
 * DatabaseTest.php
 */
require_once '../daos/Database.php';

$cnx = new Connexion();

$pdo = $cnx->connect("../conf/bd_rpi.ini");

echo "<br><pre>";
var_dump($pdo);
echo "</pre><br>";

$cnx->disconnect($pdo);

?>