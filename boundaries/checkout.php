<?php

/* 
 * checkout.php
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
    <title>AP | Creation</title>

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
    <link rel="stylesheet" href="css/personnalise.css" type="text/css">
    <script src="jquery/jquery.js"></script>
    <script src="js/ajax.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Menu mobile -->
    <?php include "menu_mobile.php"?>
  
    <!-- Header -->
     <?php include "header.php"?>
   
    <!-- Bandeau recherche -->
    <?php include "recherche.php"?>

    <!-- Breadcrumb Section Begin -->
    <section id="compte" class="breadcrumb-section set-bg" data-setbg="img/breadcrumb_ap.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Commande</h2>
                        <div class="breadcrumb__option">
                            <a href='index.php?action=accueil'>Accueil</a>
                            <span>Commande</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
<!--            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Avez- vous un coupon? <a href="#">Cliquez ici</a> pour entrer votre code</h6>
                </div>
            </div>-->
            <div class="checkout__form">
                <h4>Vos informations</h4>
                <form action="" method="POST">         
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row" class="checkout__input__checkbox" id=civilite>                                                      
                                <div class="col-lg-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="civilite" value="Madame" checked="<?php if (isSet($_SESSION['civilite']) === "Madame") echo "checked" ?>" >
                                        <label class="form-check-label" for="civiliteF" id="civiliteF">
                                            Madame
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="civilite" value="Monsieur" checked="<?php if (isSet($_SESSION['civilite']) === "Monsieur") echo "checked" ?>" >
                                        <label class="form-check-label" for="civiliteH" id="civiliteH">
                                            Monsieur
                                        </label>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nom<span>*</span></p>
                                        <input type="text" name="nomInscription" placeholder="Entrez- votre nom" value="<?php if (isSet($_SESSION['nom'])) echo $_SESSION['nom'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Prénom<span>*</span></p>
                                        <input type="text" name="prenomInscription" placeholder="Entrez- votre prénom" value="<?php if (isSet($_SESSION['prenom'])) echo $_SESSION['prenom'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Date de naissance<span>*</span></p>
                                <input type="text" name="dateNaissanceInscription" placeholder="Format: AAAA-MM-JJ" value="<?php if (isSet($_SESSION['naissance'])) echo $_SESSION['naissance'] ?>">
                            </div>  
                            <div class="checkout__input">
                                <p>Pays<span>*</span></p>
                                <input type="text" name="paysInscription" placeholder="Pays" value="<?php if (isSet($_SESSION['pays'])) echo $_SESSION['pays'] ?>">
                            </div>                  
                            <!--AJAX à installer sur Ville et code postal-->
                            <div class="row">  
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Code Postal<span>*</span></p>
<!--                                        <input type="text" name="cpInscription" placeholder="Code Postal" value="<?php if (isSet($_SESSION['cp'])) echo $_SESSION['cp'] ?>">-->
                                        <input id="itCP" name="cpInscription" type="text" value="<?php if (isSet($_SESSION['cp'])) echo $_SESSION['cp'] ?>" size="5" placeholder="Code Postal"/>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">

                                        <p>Sélectionnez votre ville<span>*</span></p>
                                        <div class="checkout__input" id="pResultat" ><?php if (isSet($_SESSION['ville'])) echo"<input type='text'name='villeInscription' value='" . $_SESSION['ville'] . "'" ?>
                                           
                                            <input type="text" placeholder="Ville" disabled="">  
                                             </div>
                                            <input id="btVoir" name="btVoir" type="button" value="Afficher les villes">                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                                
                                    <div class="checkout__input">
                                        <p>Addresse<span>*</span></p>
                                        <input type="text" placeholder="Numéro et nom de rue" class="checkout__input__add" name="adresseInscription" value="<?php if (isSet($_SESSION['adresse'])) echo $_SESSION['adresse'] ?>">                                
                                    </div> 
                               
                                <div class="checkout__input">
                                    <p>Téléphone<span>*</span></p>
                                    <input type="text" name="telephoneInscription" value="<?php if (isSet($_SESSION['telephone'])) echo $_SESSION['telephone'] ?>" placeholder="XX-XX-XX-XX-XX">
                                </div>
                               
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="emailInscription" value="<?php if (isSet($_SESSION['email'])) echo $_SESSION['email'] ?>" placeholder="email@hebergeur.fr">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Confirmation Email<span>*</span></p>
                                        <input type="text" name="emailInscription2" value="<?php if (isSet($_SESSION['email'])) echo $_SESSION['email'] ?>" placeholder="email@hebergeur.fr">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="newsletter">
                                    S'inscrire à la newsletter?
                                    <input type="checkbox" id="newsletter" name="newsLetterInscription" value="news" checked="<?php if (isSet($_SESSION['newsletter']) === "1") echo "checked" ?>">
                                    <span class="checkmark"></span>
                                </label>
                            </div>                                                      
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Mot de passe<span>*</span></p>
                                        <input type="password" name="passwordInscription" value="<?php if (isSet($_SESSION['password'])) echo $_SESSION['password'] ?>" placeholder="Entrez votre mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Confirmez votre mot de passe<span>*</span></p>
                                        <input type="password" name="passwordInscription2" value="<?php if (isSet($_SESSION['password'])) echo $_SESSION['password'] ?>" placeholder="Confirmez votre mot de passe">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Vous faire livrer à une adresse différente?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Informations complémentaires de livraison<span>*</span></p>
                                <input type="text"
                                       placeholder="Informations complémentaires de livraison.">
                            </div>
                        </div>   
                    
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Votre commande</h4>
                                <div class="checkout__order__products">Articles <span>Prix</span></div>
                                <ul>
                                    <?php if(isSet($contenuPanierTotal)){echo $contenuPanierTotal;
                                };?>
<!--                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>-->
                                </ul>
<!--                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>-->
                                <div class="checkout__order__total">Total <span><?php if(isSet($_SESSION["SommePanier"]))
                            {echo $_SESSION["SommePanier"];
                                }else echo'0';?> €</span></div>                              
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Créer un compte?
                                        <input type="checkbox" id="acc-or" name="inscription" value="inscription" <?php if (isSet($_SESSION['nom'])){ echo '';}else{echo 'checked';} ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Gagnez du temps lors de votre prochaine commande!</p>
<!--                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Vérification du payement.
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>-->
                                <button type="submit" class="site-btn" name="btnValiderCommande" value="button">Valider</button>
                            </div>
                            <div class="<?php if (isSet($errorMessageInscription) != "") echo "alert alert-danger" ?>" role="alert">                                
                                   <p style="text-align: center"><?php if (isSet($errorMessageInscription) != "") echo $errorMessageInscription ?></p>
                            </div>
                            <div class="<?php if (isSet($message) != "") echo "alert alert-success" ?>" role="alert">                                
                                    <p style="text-align: center"><?php if (isSet($message) != "") echo $message ?></p>                                                         
                            </div>
                       </div>
                    </div>
                 </form>   
            </div>
               
            </div>
          </div>
    </section>
    <!-- Checkout Section End -->

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