<?php
/*
 * connexion.php
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
        <script src="jquery/jquery.js"></script>
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Menu mobile -->
<?php include "menu_mobile.php" ?>

        <!-- Header -->
<?php include "header.php" ?>

        <!-- Bandeau recherche -->
<?php include "recherche.php" ?>

        <!-- Breadcrumb Section Begin -->
        <section id="connexion" class="breadcrumb-section set-bg" data-setbg="img/breadcrumb_ap.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Connexion</h2>
                            <div class="breadcrumb__option">
                                <a href='index.php?action=accueil'>Accueil</a>
                                <span>Connexion</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad" >
            <div class="container">
                <div class="checkout__form">
                    <h4>Connectez- vous:</h4>
                    <form action="index.php?action=connexion#connexion method=POST">
                        <div class="row">
                            <div class="col-lg-8 col-md-6" style="margin:0 auto">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" placeholder="Entrez votre email" name="emailConnexion" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Mot de passe<span>*</span></p>
                                            <input type="password" placeholder="Entrez votre mot de passe" name="pwdConnexion" value="">
                                        </div>
                                    </div>
                                </div>            
                                <button type="submit" class="site-btn"name="btnValiderAuthentification" value="button">Valider</button>                                           
                            </div>
                        </div>
                    </form>
                    <p>
                        <label id="message" class="message">
                            <div class="<?php if (isSet($errorMessageAuthentification) != "") echo "alert alert-danger" ?>" role="alert">                                
                                <p style="text-align: center"><?php if (isSet($errorMessageAuthentification) != "") echo $errorMessageAuthentification ?></p>
                            </div>
                            <div class="<?php if (isSet($messageAuthentification) != "") echo "alert alert-success" ?>" role="alert">                                
                                <p style="text-align: center"><?php if (isSet($messageAuthentification) != "") echo $messageAuthentification ?></p>                                                         
                            </div>
<?php
if (isset($message)) {
    if ($message === "") {
        $message = "Vous êtes connecté";
    }
    if ($message === "0") {
        $message = "Vous êtes déconnecté(e) !";
    }
    // echo $message;
}
?>
                        </label>
                        <label id="lblMessageErreur" class="erreur">
<?php
if (isset($errorMessage)) {
    if ($errorMessage === "-1") {
        $errorMessage = "Authentification KO";
    }
    if ($errorMessage === "0") {
        $errorMessage = "Vous devez être identifié(e) pour accéder à 'Gérer mon compte' !";
    }
    // echo $errorMessage;
}

if (isset($prenomClient)) {
    echo $prenomClient->getPrenomclient() . "<br>";
}
?>
                        </label>
                    </p>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->

        <!-- Footer Section Begin -->
        <?php include "footer.php" ?>
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