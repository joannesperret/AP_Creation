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

    <?php
    /*
     * ProduitDAOTestIHMAccueil.php
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

// TEST BOUCLE SELECT ALL CATEGORIES+ AFFICHAGE DES PHOTOS ASSOCIEES+ PRODUITS ASSOCIES
    $daoCategorie = new CategorieDAO($pdo);
    $record = $daoCategorie->selectAll($pdo);
    $contenu = "";
    $contenu .= "<div class='row featured__filter'>";
    
//// Boucle sur les catégories    
    foreach ($record as $key => $value) {
      
        // Boucle sue les photos principales de la catégorie
        $dao = new PhotoDAO($pdo);
        $categorie = new Categorie;
        $categorie->setIdCategorie($value->getIdCategorie());
        $categorie->setCategorie($value->getCategorie());
       
        $record = $dao->selectPhotoByCategorie($pdo, $categorie);
       
        foreach ($record as $key => $valueP) {
      
         $contenu.="<div class='col-lg-3 col-md-4 col-sm-6 mix ".strtolower($value->getCategorie())."'><div class='featured__item'><div class='featured__item__pic set-bg' data-setbg='../img/product/".$valueP->getPhotoPrincipale()."'style='background-image: url(../img/product/".$valueP->getPhotoPrincipale();
         $contenu.="')</div>";
         $contenu.="<ul class='featured__item__pic__hover'>
                        <li><a href='#'><i class='fa fa-heart'></i></a></li>
                        <li><a href='#'><i class='fa fa-retweet'></i></a></li>
                        <li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>
                    </ul></div></div>";
         // Boucle sur les produits des photos de la catégorie
            $daoProduit = new ProduitDAO($pdo);
            $produit = new Produit;
            $produit->setIdProduit($valueP->getIdProduitP());            
            $produitO = $daoProduit->selectOne($pdo, $produit);          
            $contenu.="<div class='featured__item__text'>
                    <h6><a href='#'>".$produitO->getDesignation()."</a></h6>
                    <h5>€".$produitO->getPrix()."</h5></div></div>";
            
        }

    }
$contenu.="</div>"; 

echo$contenu;




