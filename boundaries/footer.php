<?php

/* 
 * footer.php
 */
?>

    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="../index.php"><img src="img/logo_ap.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Addresse: Wattrelos</li>
                            <li>Téléphone: 06 52 81 07 98</li>
                            <li>Email: anneperret01@hotmail.fr</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>AP Création</h6>
                        <ul>
                            <li><a href="#">AP Création</a></li>
                            <li><a href="#">La boutique</a></li>
                            <li><a href="#">Achats sécurisés</a></li>
                            <li><a href="#">Livraison</a></li>
                            <li><a href="#">Mentions légales</a></li>
                            <li><a href="#">Plan du site</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Qui sommes-nous?</a></li>
                            <li><a href="#">Nos services</a></li>
                            <li><a href="#">Projets</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Temoignages</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Inscrivez- vous à notre newsletter</h6>
                        <p>Tenez- vous au courant de nos dernières offres.</p>
                        <div class="<?php if (isSet($errorMessageNewsletter) != "") echo "alert alert-danger" ?>" role="alert">                                
                                   <p style="text-align: center"><?php if (isSet($errorMessageNewsletter) != "") echo $errorMessageNewsletter ?></p>
                            </div>
                            <div class="<?php if (isSet($messageNewsletter) != "") echo "alert alert-success" ?>" role="alert">                                
                                    <p style="text-align: center"><?php if (isSet($messageNewsletter) != "") echo $messageNewsletter ?></p>                                                         
                            </div>
                        <form action="" method="POST">
                            <input type="text" name="mailNewsletter" placeholder="Entrez votre email">
                            <button type="submit" class="site-btn"name="btnNewsletter"value="btnNewsletter">Inscription</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>