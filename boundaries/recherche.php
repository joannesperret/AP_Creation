<?php

/* 
 * recherche.php
 */

?>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Catégories</span>
                        </div>
                        <ul>                          
                            <?php
                            if (isset($listeProduits)) {
                                echo $listeProduits;
                            }
                            ?>  
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Catégories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Que recherchez- vous?">
                                <button type="submit" class="site-btn">RECHERCHER</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>06 78 27 04 24</h5>
                                <span>Du lundi au samedi 10h- 19h</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="hero__item set-bg" data-setbg="img/banner/banner_api2.jpg">
                        <div class="hero__text">
<!--                           <span></span>
                      <h2>AP Création</h2>                            -->
                            <a href="#" class="primary-btn">Accueil</a>
                        </div>
                    </div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>