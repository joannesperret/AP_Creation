<?php

/* 
 * PhotosTest.php
 */

require_once 'Photo.php';

$photoTest= new Photo(1, "sac.jpg", "sac_dessus.jpg", "sac_dessous.jpg", "sac_côté.jpg", 3);

echo "Id Photo: ".$photoTest->getIdPhoto()."<br>";
echo "Image 1: ".$photoTest->getPhotoPrincipale()."<br>";
echo "Image 2: ".$photoTest->getPhoto2()."<br>";
echo "Image 3: ".$photoTest->getPhoto3()."<br>";
echo "Image 4: ".$photoTest->getPhoto4()."<br>";
echo "Id Produit: ".$photoTest->getIdProduit()."<br>";
