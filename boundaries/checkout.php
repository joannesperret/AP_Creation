<!DOCTYPE html>
<!-- checkout.php
IHM inscription et validation du panier-->
<html lang="fr">
<!-- inclusion dans le head des meta names, du favicon et définition de l'affichage-->
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani Template">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AP | Creation</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
         <!-- Css Styles inclusion des librairies, plugins, fichiers css -->
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/personnalise.css" type="text/css">      
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
<!-- inclusion des trois sections se répétant sur toutes les pages pour faciliter la maintenance -->

        <!-- Inclusion du menu mobile pour la partie responsive -->
<?php include "menu_mobile.php" ?>

        <!-- Inclusion du bandeau head -->
<?php include "header.php" ?>

        <!-- Inclusion de la recherche -->
<?php include "recherche.php" ?>

        <!-- Section bandeau de séparation -->
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
        <!-- Section bandeau de séparation -->

        <!-- Section de gestion des informations client -->
        <section class="checkout spad">
            <div class="container">
                <div class="checkout__form">
                    <h4>Vos informations</h4>
					<!-- Section de formulaire -->
                    <form action="" method="POST"> 
					<!-- Utilisation du système de grilles de Bootstrap -->
		                 <div class="row">
                            <div class="col-lg-6 col-md-6">
							<!-- Boutons radio civilite -->
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
								<!-- Input des données client, intégration du PHP, si le client est authentifié, ses données s'affichent -->	
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
                              
                                <div class="row">  
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Code Postal<span>*</span></p>
                                            <input id="itCP" name="cpInscription" type="text" value="<?php if (isSet($_SESSION['cp'])) echo $_SESSION['cp'] ?>" size="5" placeholder="Code Postal"/>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
									
                                            <p>Sélectionnez votre ville<span>*</span></p>
                                            <div class="checkout__input" id="pResultat" ><?php if (isSet($_SESSION['ville'])) echo"<input type='text'name='villeInscription' value='" . $_SESSION['ville'] . "'" ?>

                                                <input type="text" placeholder="Ville" disabled="">  
                                            </div>
									<!-- Bouton de validation de la requête AJAX permettant de récupérer les villes liées au code postal saisi -->		
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
                                            <input type="password" name="passwordInscription" id="password"  value="<?php //if (isSet($_SESSION['password'])) echo $_SESSION['password'] ?>" placeholder="Entrez votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Confirmez votre mot de passe<span>*</span></p>
                                            <input type="password" name="passwordInscription2" id="password2" value="<?php // if (isSet($_SESSION['password'])) echo $_SESSION['password'] ?>" placeholder="Confirmez votre mot de passe">
                                        </div>
                                    </div>
                                </div>
								
                                <div class="checkout__input__checkbox">
                                    <label for="diff-acc">
                                        Afficher le mot de passe
										<!-- checkbox d'affichage/ masquage du mot de passe -->
                                        <input type="checkbox" id="diff-acc"> 
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>   

                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__order">
                                    <h4>Votre commande</h4>
                                    <div class="checkout__order__products">Articles <span>Prix</span></div>
									<!-- Affichage dynamique du contenu du panier -->
                                    <ul>
									<?php if (isSet($contenuPanierTotal)) {
										echo $contenuPanierTotal;
									}?>									
                                    </ul>
                                    <div class="checkout__order__total">Total <span><?php
		                    // Affichage dynamique du contenu du panier 
                                            if (isSet($_SESSION["SommePanier"])) {
                                                echo $_SESSION["SommePanier"];
                                            } else
                                                echo'0';
                                            ?> €</span></div>                              
                                    <div class="checkout__input__checkbox">
                                        <label for="acc-or">
                                            Créer un compte?
									<!-- Si le client est connecté, la case est décochée -->
                                            <input type="checkbox" id="acc-or" name="inscription" value="inscription" <?php if (isSet($_SESSION['nom'])) {
                                                echo '';
                                            } else {
                                                echo 'checked';
                                            } ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <p>Gagnez du temps lors de votre prochaine commande!</p>
                                    <button type="submit" class="site-btn" name="btnValiderCommande" value="button">Valider</button>
                                </div>
								<!-- Le message de validation de commande ou d'erreur ne s'affiche qu'après clic du bouton submit -->
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
    <!-- Fin de la section d'inscription -->

    <!-- Inclusion du footer -->
<?php include "footer.php" ?>
    <!-- Footer Section End -->

    <!-- Inclusion des bibliothèques/ scripts et plugins JavaScript -->
	<script src="jquery/jquery.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>
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