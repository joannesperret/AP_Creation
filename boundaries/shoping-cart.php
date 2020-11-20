<?php

/* 
 * shoping-cart.php
 */

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <title>AP | Création</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    
    <!-- CSS only -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="jquery/jquery.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Menu Mobile -->

    <?php include "menu_mobile.php"?>

    <!-- Header-->
    
    <?php include "header.php"?>
    

<!-- Bandeau recherche -->
    <?php include "recherche.php"?>

    <!-- Breadcrumb Section Begin -->
    <section id="panier" class="breadcrumb-section set-bg" data-setbg="img/breadcrumb_ap.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Panier</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php?action=accueil">Accueil</a>
                            <span>Panier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produits</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isSet($contenuPanier)){echo $contenuPanier;}?>                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php?action=accueil#catalogue" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="index.php?action=shoping-cart#panier" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Mettre à jour</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">AJOUTER UN COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout__order">
                        <h4>Votre Commande</h4>
                        <div class="checkout__order__products">Articles <span>Prix</span></div>
                        <ul>
                            <?php if (isSet($contenuPanierTotal)) {
                                echo $contenuPanierTotal;
                            }
                            ?>
<!--                            <li>Subtotal <span>$454.98</span></li>-->
                        </ul>
                        <div class="checkout__order__total">Total <span><?php
                            if (isSet($_SESSION["SommePanier"])) {
                                echo $_SESSION["SommePanier"];
                            } else
                                echo'0';
                            ?> €</span></div> 

                        <a href="index.php?action=checkout#compte" class="primary-btn">COMMANDER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include "footer.php"?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>

