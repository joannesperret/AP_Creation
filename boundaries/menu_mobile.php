<?php /*
 * menu_mobile.php
 */
// Lancement de la session si elle n'est pas déjà démarrée
if (session_id() === "") {
    session_start();
}
// Suppression de la session si l'utilisateur a cliqué sur deconnexion
if ((session_id() !== "") && ($action === "deconnexion")) {
    session_unset();
}
?>

<!-- Menu mobile intégré aux IHM -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo_ap.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
<!--                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>-->
                <li><a href="index.php?action=shoping-cart#panier"><i class="fa fa-shopping-bag"></i> <span><?php if(($_SESSION["Panier"]!="")||($_SESSION["Panier"]!=0)){$tCookie=explode('#',$_SESSION["Panier"]);echo count($tCookie);}
                                //else if(($_SESSION["Panier"])===""){echo'0';}
                                else echo '0';?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span><?php if(isSet($_SESSION["SommePanier"]))
                            {echo $_SESSION["SommePanier"];
                                }else echo'0';?> €</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/france.png" alt="">
                <div>Français</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                 <?php
                                if (isSet($_SESSION['prenom'])) {
                                    echo"<a href='index.php?action=checkout#compte'><i class='fa fa-user'></i>Bienvenue: " . $_SESSION['prenom'] . "</a>";
                                    echo "<a href='index.php?action=deconnexion'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-person-x-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' d='M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z'/></svg> Deconnexion</a>";
              
                                } else {
                                    echo"<a href='index.php?action=connexion#connexion'><i class='fa fa-user'></i> Connectez- vous</a>";
                                }
                                ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href='index.php?action=accueil'>Accueil</a></li>
<!--                <li><a href='index.php?action=shop-grid'>Boutique</a></li>-->
<!--                <li><a href="#">Pages</a>
                    <a href="../../../../Users/joann/AppData/Local/Temp/Fresh Berries.url"></a>-->
                   
<!--                        <ul class="header__menu__dropdown"><li><a href='index.php?action=shop-details'>Produits</a></li>-->
<!--                        <li><a href='index.php?action=shoping-cart#panier'>Panier</a></li>-->
                        
<!--                        <li><a href='index.php?action=blog-details'>Articles du blog</a></li></ul>-->
                    
                </li>
<!--                <li><a href='index.php?action=blog'>Blog</a></li>-->
                <li><a href='index.php?action=checkout#compte'>Mon compte</a></li>
                <li><a href='index.php?action=contact#contact'>Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> anneperret01@hotmail.fr</li>
                <li>Expédition gratuite à partir de 50€</li>
            </ul>
        </div>
    </div>
   