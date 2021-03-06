<?php

/*
 * index.php
 */

// Si les variables de session ne sont pas créées, initialisation des valeurs à 0
if(isset($_SESSION['Panier'])){}else{$_SESSION['Panier']=0;}
if(isset($_SESSION['SommePanier'])){}else{$_SESSION['SommePanier']=0;}

// Démarrage de la session au lancement du script afin de gérer
// les variables de session 'Panier' et 'SommePanier'.

session_start();



// initialisation de la variable id_produit si postée
$idProduit = filter_input(INPUT_GET, "id_produit", FILTER_SANITIZE_NUMBER_INT);

// initialisation de la variable id_produit_consultation si posté
$idProduitConsultation = filter_input(INPUT_GET, "id_produit_consultation", FILTER_SANITIZE_NUMBER_INT);

//
// Gestion des IHM
// 
// Initialisation de la variable IHM à accueil pour affichage

$IHM = 'accueil';
//
// A traiter
//
// Si pas de solution pour transiter id+ lien section:
//
if(isset($idProduitConsultation)){$IHM='shop-details';}
//
// si aucun article n'est sélectionné en visualisation
// initialisation de la valeur à 7 par défaut pour afficher un produit.
// algo à écrire afin d'aficher un article aléatoirement
if($idProduitConsultation==""){
$idProduitConsultation=7;
};


// SUPPRESSION D'UN ARTICLE DU PANIER

$articleASupprimer= filter_input(INPUT_GET, "id_produit_a_enlever", FILTER_SANITIZE_NUMBER_INT);

if($articleASupprimer!==NULL){
        $tCookie=explode('#',$_SESSION["Panier"]); 
        $_SESSION['Panier']=explode('#',$_SESSION["Panier"]);
        unset($tCookie[array_search($articleASupprimer, $tCookie)]);
        $cart= implode("#", $tCookie);
        $_SESSION['Panier']=$cart;
};

//
// Visualisation d'un article sur la page shop-details
// 

if(isset($idProduitConsultation)){

    try {
    require_once 'entities/Produit.php';
    require_once 'daos/ProduitDAO.php';
    require_once 'daos/Database.php';
    require_once 'entities/Photo.php';
    require_once 'daos/PhotoDAO.php';

    $connexion = new Connexion();
    // Selection du fichier .ini pour selection du serveur
    $pdo = $connexion->connect("../conf/bd_ad.ini");
    $dao = new ProduitDAO($pdo);
    $object = $dao->selectProduitById($pdo,$idProduitConsultation);
    // Récupération des valeurs du produit
    $prixProduitVisualise = $object -> getPrix();
    $designationProduitVisualise = $object -> getDesignation();
    $descriptionProduitVisualise = $object->getDescription();
    $stockProduitVisualise = $object->getQteStockee();
    $idProduitVisualise = $object->getIdProduit();
    
    $daoPhoto = new PhotoDAO($pdo);
    $objetPhoto = $daoPhoto->selectPhotoById($pdo,$idProduitConsultation);
    // Récupération des valeurs du produit
    $consultationPhotoPrincipale = $objetPhoto->getPhotoPrincipale();
    $consultationPhoto2 = $objetPhoto->getPhoto2();
    $consultationPhoto3= $objetPhoto->getPhoto3();
    $consultationPhoto4= $objetPhoto->getPhoto4();  
    
   
    }
    
    
    catch (Exception $exc) {
    $errorMessage = "-1";
}
//   echo $prixProduitVisualise;
//   echo $designationProduitVisualise;
//   echo $descriptionProduitVisualise;
//   echo $stockProduitVisualise;
};
  
    
// Récupération de l'action suite clic du lien 
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

// si $action = deconnexion, fermeture de la session

if ((session_id() !== 0) && ($action === "deconnexion")) {
    session_unset();
}

// Modification de la variable $IHM avec contenu du $action si differente de deconnexion
if (isSet($action) && ($action != "deconnexion")) {
    $IHM = $action;
}

//
// GESTION DE LA LISTE CATEGORIES
//

try {
    require_once 'entities/Categorie.php';
    require_once 'daos/CategorieDAO.php';
    require_once 'daos/Database.php';

    $connexion = new Connexion();
    // Selection du fichier .ini pour selection du serveur
    $pdo = $connexion->connect("../conf/bd_ad.ini");
    $dao = new CategorieDAO($pdo);
    $tCategorie = $dao->selectAll($pdo);
    // Inserer boucle sur les categories
    $listeCategories = "";
    // Gestion de la liste des Produits
    $listeProduits = "<li data-filter='*'><a href='index.php#catalogue'>Tous les produits</a></li>";
    foreach ($tCategorie as $objet) {
        $categorie = $objet->getCategorie();
        $classCategorie = strtolower($categorie);
        $listeCategories .= "<li data-filter='.$classCategorie'><a href='index.php#catalogue'>$categorie </a></li>";
        $listeProduits .= "<li data-filter='.$classCategorie'><a href='index.php#catalogue'>$categorie</a></li>";
    }
    if ($objet == FALSE) {
        $errorMessage = "-1";
    } else {
        // $message = "";
    }
} catch (Exception $exc) {
    $errorMessage = "-1";
}

//
// GESTION DES PRODUITS DE LA PAGE D'ACCUEIL
//
// AJOUTER UN IF SUR IHM ACCUEIL UNIQUEMENT POUR SOULAGER LE RESEAU
// Modification de la variable $IHM avec contenu du $action si differente de deconnexion
if (isSet($IHM) && ($IHM === "accueil")) {
//    
//    echo $IHM;

    require_once 'daos/Database.php';
    require_once 'daos/ProduitDAO.php';
    require_once 'daos/CategorieDAO.php';
    require_once 'daos/PhotoDAO.php';
    require_once 'entities/Produit.php';
    require_once 'entities/Categorie.php';
    require_once 'entities/Photo.php';

//Initialisation de la connexion
    $cnx = new Connexion();
//Selection des paramètres du fichier ini

    $pdo = $cnx->connect("../conf/bd_ad.ini");

// TEST BOUCLE SELECT ALL CATEGORIES+ AFFICHAGE DES PHOTOS ASSOCIEES+ PRODUITS ASSOCIES
    $daoCategorie = new CategorieDAO($pdo);
    $record = $daoCategorie->selectAll($pdo);
    $contenu = "";
    $contenu .= "<div class='row featured__filter'>";

//// Boucle sur les catégories    
    foreach ($record as $key => $value) {

        // Boucle sur les photos principales de la catégorie
        $dao = new PhotoDAO($pdo);
        $categorie = new Categorie;
        $categorie->setIdCategorie($value->getIdCategorie());
        $categorie->setCategorie($value->getCategorie());

        $record = $dao->selectPhotoByCategorie($pdo, $categorie);

        foreach ($record as $key => $valueP) {
             // Boucle sur les produits des photos de la catégorie
            $daoProduit = new ProduitDAO($pdo);
            $produit = new Produit;
            $produit->setIdProduit($valueP->getIdProduitP());
            $produitO = $daoProduit->selectOne($pdo, $produit);
            $contenu .= "<div class='col-lg-3 col-md-4 col-sm-6 mix " . strtolower($value->getCategorie()) . "'><div class='featured__item'><div class='featured__item__pic set-bg' data-setbg='img/product/" . $valueP->getPhotoPrincipale() . "'style='background-image: url(../img/product/" . $valueP->getPhotoPrincipale();
            $contenu .= "')</div>";
            $contenu .= "<ul class='featured__item__pic__hover'>";
            $contenu .= "<li><a href='index.php?id_produit_consultation=";
            $contenu.=$produitO->getIdProduit();
            $contenu.="&index.php?action=shop-details#produit'><i class='fa fa-eye'></i></a></li>";
            $contenu .= "<li><a href='index.php?id_produit=";
            $contenu .=$produitO->getIdProduit();            
            $contenu .="'><i class='fa fa-shopping-cart'></i></a></li></ul></div></div>";           
            $contenu .= "<div class='featured__item__text'style=padding:0px!important;margin-top:-40px!important;margin-bottom:40px!important>
                    <h6><a href='#'>" . $produitO->getDesignation() . "</a></h6>
                    <h5>€" . $produitO->getPrix() . "</h5></div></div>";
        }
    }
    $contenu .= "</div>";
}

//
// GESTION DE L'AUTHENTIFICATION
//
// Récupération des données saisies par l'utilisateur depuis la page de connexion
$emailClient = filter_input(INPUT_GET, "emailConnexion", FILTER_SANITIZE_STRING);
$passwordClient = filter_input(INPUT_GET, "pwdConnexion", FILTER_SANITIZE_STRING);
$btnAuthentification = filter_input(INPUT_GET, "btnValiderAuthentification", FILTER_SANITIZE_STRING);

// Si les champs Email et password ont été saisis
if($btnAuthentification!=NULL){
if ($emailClient != null && $passwordClient != null) {
    require_once 'entities/Client.php';
    require_once 'daos/ClientDAO.php';
    try {
        /*
         * Connexion
         */

        require_once 'daos/Database.php';

        $connexion = new Connexion();

        // Selection du fichier .ini pour selection du serveur
        $pdo = $connexion->connect("../conf/bd_ad.ini");

        $client = new Client();
        $client->setEmailClient($emailClient);
        $client->setPwdClient($passwordClient);

        $dao = new ClientDAO($pdo);
        // Affectation de la méthode SelectOneByEmail afin de valider si le client a un compte
        
        $objet = $dao->selectOneByEmail($pdo, $client);
        if ($objet === null) {
            $errorMessageAuthentification = "Identifiants erronés";
            $IHM="connexion";
        } else {
            $message = "1";

            // Session ouverte au lancement du script pour la gestion du panier

            // récupération des données client contenues dans la BD
            $idCSession = $objet->getIdClient();
            $civiliteSession = $objet->getCiviliteClient();
            $nomSession = $objet->getNomClient();
            $prenomSession = $objet->getPrenomClient();
            $adresseSession = $objet->getAdresseClient();
            $emailSession = $objet->getEmailClient();
            $pwdSession = $objet->getPwdClient();
            $telephoneSession = $objet->getTelephoneClient();
            $dateNaissanceSession = $objet->getDateNaissanceClient();
            $newsLetterSession = $objet->getNewsLetterClient();
            $idVSession = $objet->getIdVille();

            // affectation des données client à la session         

            $_SESSION['idClient'] = $idCSession;
            $_SESSION['civilite'] = $civiliteSession;
            $_SESSION['nom'] = $nomSession;
            $_SESSION['prenom'] = $prenomSession;
            $_SESSION['adresse'] = $adresseSession;
            $_SESSION['email'] = $emailSession;
            $_SESSION['password'] = $pwdSession;
            $_SESSION['telephone'] = $telephoneSession;
            $_SESSION['naissance'] = $dateNaissanceSession;
            $_SESSION['newsletter'] = $newsLetterSession;
            $_SESSION['idVille'] = $idVSession;
            
//
// REMPLISSAGE DES CHAMPS VOS INFORMATIONS SI CLIENT AUTHENTIFIE
//

    if ($emailClient != null && $passwordClient != null) {
        try {
            require_once 'entities/Ville.php';
            require_once 'daos/VilleDAO.php';
            require_once 'daos/Database.php';

            $connexion = new Connexion();
            // Selection du fichier .ini pour selection du serveur
            $pdo = $connexion->connect("../conf/bd_ad.ini");
            $dao = new VilleDAO($pdo);
            $villeClientConnecte = new Ville();
            $villeClientConnecte->setIdVille($idVSession);
            $villeClient = $dao->selectOne($pdo, $villeClientConnecte);
            $nomVilleClientConnecte = $villeClient->getVille();
            $cpVilleClientConnecte = $villeClient->getCp();
            $idPaysClientConnecte = $villeClient->getIdPays();
            $_SESSION['ville'] = $nomVilleClientConnecte;
            $_SESSION['cp'] = $cpVilleClientConnecte;
            $_SESSION['id_Pays'] = $idPaysClientConnecte;

            if ($objet == FALSE) {
                $errorMessage = "-1";
            } else {
                $message = "";
            }
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            $errorMessage = "-1";
        }

        try {
            require_once 'entities/Pays.php';
            require_once 'daos/PaysDAO.php';
            require_once 'daos/Database.php';

            $daoPays = new PaysDAO($pdo);
            $paysRecherche = new Pays();
            // récupérer l' ID Pays de la ville du client    
            $paysRecherche->setIdPays($idPaysClientConnecte);
            $paysClientConnecte = $daoPays->selectOne($pdo, $paysRecherche);
            $paysClientSession = $paysClientConnecte->getPays();
            //$idPaysClientConnecte= $paysClientConnecte->getidPays();
            //$_SESSION['id_pays'] = $idPaysClientSession; 
            $_SESSION['pays'] = $paysClientSession;
            $_SESSION['id_Pays'] = $paysRecherche;

            if ($objet == FALSE) {
                $errorMessage = "-1";
            } else {
                $message;
            }
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            $errorMessage = "-1";
        }
    }
        }
        // récupération des exceptions et affectation à la variable $exc
    } catch (Exception $exc) {

        $errorMessage = "-1";
    }

    // si problème de connexion à la BD, affectation de la valeur '-1' à la variable $errorMessage   
} else {
    $errorMessageAuthentification = "Tous les champs sont obligatoires";
   $IHM="connexion";
}

};



// 
// GESTION DE L'INSCRIPTION
// 

$inscrptionValidation = filter_input(INPUT_POST, "inscription" ,FILTER_SANITIZE_STRING);
$btValiderInscription = filter_input(INPUT_POST, "btnValiderCommande" ,FILTER_SANITIZE_STRING);


// Si la case Créer un compte a été cochéé et que le bouton Valider a été cliqué

if (((isset($btValiderInscription)) != null) && ((isset($inscrptionValidation)) != null)) {


    // Récupération des saisies utiisateurs
    // 
    // Utilisation du FILTER_SANITIZE_STRING pour éviter le Cross Dock Scripting

    $civiliteInscription = filter_input(INPUT_POST, "civilite" ,FILTER_SANITIZE_STRING);
    $nomInscription = filter_input(INPUT_POST, "nomInscription" ,FILTER_SANITIZE_STRING);
    $prenomInscription = filter_input(INPUT_POST, "prenomInscription" ,FILTER_SANITIZE_STRING);
    $dateNaissanceClient = filter_input(INPUT_POST, "dateNaissanceInscription" ,FILTER_SANITIZE_STRING);
    $emailInscription = filter_input(INPUT_POST, "emailInscription" ,FILTER_SANITIZE_STRING);
    $emailInscription2 = filter_input(INPUT_POST, "emailInscription2" ,FILTER_SANITIZE_STRING);
    $telephoneInscription = filter_input(INPUT_POST, "telephoneInscription" ,FILTER_SANITIZE_STRING);
    $adresseInscription = filter_input(INPUT_POST, "adresseInscription" ,FILTER_SANITIZE_STRING);
    $villeInscription = filter_input(INPUT_POST, "villeInscription" ,FILTER_SANITIZE_STRING);
    $cpInscription = filter_input(INPUT_POST, "cpInscription" ,FILTER_SANITIZE_STRING);
    $pwdClientInscription = filter_input(INPUT_POST, "passwordInscription" ,FILTER_SANITIZE_STRING);
    $pwdClient2Inscription = filter_input(INPUT_POST, "passwordInscription2" ,FILTER_SANITIZE_STRING);
    $newsLetterInscription = filter_input(INPUT_POST, "newsLetterInscription", FILTER_SANITIZE_STRING);
    $paysInscription = filter_input(INPUT_POST, "paysInscription",FILTER_SANITIZE_STRING);   
    $message;
    $errorMessageInscription;

// Contrôle sur la saisie de tous les champs

    if ($paysInscription != null && $pwdClientInscription != null && $pwdClient2Inscription != null && $cpInscription != null && $villeInscription != null && $civiliteInscription != null && $nomInscription != null && $prenomInscription != null && $dateNaissanceClient != null && $emailInscription != null && $emailInscription2 != null && $telephoneInscription != null && $adresseInscription != null) {

        // Récupération de l'idVille via le selectOne
        try {
            require_once 'entities/Ville.php';
            require_once 'daos/VilleDAO.php';
            require_once 'daos/Database.php';

            $connexion = new Connexion();
            // Selection du fichier .ini pour selection du serveur
            $pdo = $connexion->connect("../conf/bd_ad.ini");
            $dao = new VilleDAO($pdo);
	    // Création d'un objet ville reprenant le nom de ville récupéré via requête asynchrone
	    // lors de la saisie du formulaire par utilisateur
            $villeSaisie = new Ville();            
            $villeSaisie->setVille($villeInscription);
	    // Execution du selectOne afin d'hydrater l'objet $villeClient
            $villeClient = $dao->selectOneByVille($pdo, $villeSaisie);
            $nomVilleClientInscription = $villeClient->getVille();
            $idVilleClientInscription = $villeClient->getIdVille();
            $idPaysClientInscription = $villeClient->getIdPays();

            if ($villeClient === null) {
                $errorMessage = "Le code postal n'existe pas";
            } else {
                //$message = "";
            }
        } catch (Exception $exc) {
            $errorMessage = "Erreur de connexion interne au site";
        }

		// Inclusion des Entities
        require_once 'entities/Client.php';
        require_once 'daos/ClientDAO.php';
        require_once 'daos/Database.php';
        
        // Contrôle de cohérence des données
        // Obligation de saisir un mot de passe de plus de 8 caractères
        if (strlen($pwdClientInscription) > 8) {
            if ($pwdClientInscription === $pwdClient2Inscription) {
                if ($emailInscription === $emailInscription2) {
                    try {
                        //connexion
                        $connexion = new Connexion();
                        // Selection du fichier .ini pour selection du serveur
                        $pdo = $connexion->connect("../conf/bd_ad.ini");
                        $daoClient = new ClientDAO($pdo);
                        $newClient = new Client("", $civiliteInscription, $nomInscription, $prenomInscription, $adresseInscription, $emailInscription, $pwdClientInscription, $telephoneInscription, $dateNaissanceClient, $newsLetterInscription, $idVilleClientInscription);
                        $pdo->beginTransaction();
                        $affected = $daoClient->insert($pdo, $newClient);
                        $pdo->commit();
                    } catch (Exception $ex) {

                        $errorMessageInscription = $ex->getMessage();
                    }
                    if ($affected == 1) {
                        $message = "Merci pour votre inscription.";
                    } else {
                        $errorMessageInscription = "Utilisateur existant, vous pouvez- vous connecter.";
                    }
                } else {
					// Message d'erreur si la saisie du contrôle d'e-mail est erronnée
                    $errorMessageInscription = "Les adresses Emails doivent être identiques.";
                    
                }
            } else {
				// Message d'erreur si la saisie de contrôle de mot de passe est erronée
                $errorMessageInscription = "Les mots de passes doivent être identiques.";
                
            }
        } else {
			// Message d'erreur si le mot de passe est inférieur à 8 caractères
            $errorMessageInscription = "Le mot de passe doit contenir au moins 8 caractères";
            
        }
    } else {
		// Message d'erreur si tous les champs n'ont pas été renseignés
        $errorMessageInscription = "Tous les champs sont obligatoires.";
        
    }
}




//
// GESTION DE L'INSCRIPTION A LA NEWSLETTER
//

$btnNewsletter = filter_input(INPUT_POST, "btnNewsletter", FILTER_SANITIZE_NUMBER_INT);
// echo "btnNewsletter:".$btnNewsletter;
    
if (((isset($btnNewsletter)) != null)) {

    $inscriptionNewsletter = filter_input(INPUT_POST, "mailNewsletter", FILTER_SANITIZE_STRING);
    $errorMessageNewsletter;
    $messageNewsletter;

    require_once 'entities/Client.php';
    require_once 'daos/ClientDAO.php';
    try {
        /*
         * Connexion
         */

        require_once 'daos/Database.php';

        $connexion = new Connexion();

// Selection du fichier .ini pour selection du serveur
        $pdo = $connexion->connect("../conf/bd_ad.ini");

        $client = new Client();
        $client->setEmailClient($inscriptionNewsletter);
        $client->setNewsLetterClient(1);
       
        $client->setIdVille(36831);
        $dao = new ClientDAO($pdo);
// Création d'un client avec adresse mail
        $objet = $dao->insert($pdo, $client);
        if ($objet == -1) {
            $errorMessageNewsletter = "Vous êtes déjà inscrit à notre newsletter.";
        } else {
            $messageNewsletter = "Merci pour votre inscription!";
        }
// récupération des exceptions et affectation à la variable $exc
    } catch (Exception $exc) {
      
        $errorMessageNewsletter = "Vous êtes déjà inscrit à notre newsletter.";
    } 

}

//
// CREATION DU COOKIE PANIER
//
   

// initialisation de la variable récupérant le cookie Panier


//$cart = filter_input(INPUT_COOKIE, "Panier");

// initialisation de la variable récupérant le cookie Somme Panier
//$ommePanier = filter_input(INPUT_COOKIE, "SommePanier");

// Si un article est positionné dans le panier
// récupération de l'ID du produit séléctionné
if(isSet($idProduit)!==NULL){
    // appel des DAO/ DTO
    require_once 'entities/Photo.php';
    require_once 'daos/PhotoDAO.php';
    require_once 'entities/Produit.php';
    require_once 'daos/ProduitDAO.php';    
    // Récupération du clic caddie
    if(isSet($idProduit)){
    //Si l'id a été envoyé
    // Initialisation de la SESSION Panier
    $cart = $_SESSION["Panier"];
    if ($cart == null) {
        // Panier inexistant
        $cart = $idProduit;
    } else {
        
        $cart .= "#" . $idProduit;
    }
    
    $_SESSION['Panier']=$cart;
    };
    
    // Si les variables de session ne sont pas créées, initialisation des valeurs à 0
if(isset($_SESSION['Panier'])){}else{$_SESSION['Panier']=0;}
if(isset($_SESSION['SommePanier'])){}else{$_SESSION['SommePanier']=0;}

    if($_SESSION['Panier']!==NULL && $_SESSION['Panier']!==0 && $_SESSION['Panier']!==""){
    // le cookie est transformé en tableau
    //$tCookie=explode('#',$_COOKIE["Panier"]);
    $tCookie=explode('#',$_SESSION["Panier"]);
    // Initialisation de la variable d'affichage du panier
    $contenuPanier="";
    $contenuPanierTotal="";
    $daoPhoto = new PhotoDAO($pdo);
    $daoProduit = new ProduitDAO($pdo);
    // boucle sur les ID du cookie pour affichage des photos
    $sommePanier=0;    
    foreach ($tCookie as $value) {
        // Boucle sur les photos principales de la catégorie
        $recordPhoto = $daoPhoto->selectPhotoById($pdo, $value);
        $contenuPanier .= "<tr><td class='shoping__cart__item'><img src='img/product/";
        $contenuPanier .= $recordPhoto->getPhotoPrincipale();
        $contenuPanier .= " 'alt='' style=width:30%!important>";
        $recordProduit = $daoProduit->selectProduitById($pdo, $value);
        $contenuPanier .= "<h5>";
        $contenuPanier .= $recordProduit->getDesignation();
        $contenuPanier .= "</h5></td><td class='shoping__cart__price'>";
        $contenuPanier .= "€" . $recordProduit->getPrix();
        $contenuPanier .= "</td><td class='shoping__cart__quantity'><div class='quantity'><div class='pro-qty'><input type='text' value='1'></div>";
        $contenuPanier .= "</div></td><td class='shoping__cart__total'>€";
        $contenuPanier .= $recordProduit->getPrix();
        $contenuPanier .= "</td><td class='shoping__cart__item__close'><a href='index.php?id_produit_a_enlever=";
        $contenuPanier .=$recordProduit->getIdProduit();
        $contenuPanier .="'><span class='icon_close'></span></a>";
        $contenuPanier .= "</td></tr>";
        $contenuPanierTotal.="<li>";
        $contenuPanierTotal.=$recordProduit->getDesignation();
        $contenuPanierTotal.="<span>";
        $contenuPanierTotal.=$recordProduit->getPrix();
        $contenuPanierTotal.="</span>";
        $contenuPanierTotal.='</li>';
          // création du cookie SommePanier
        
//        $sommePanier=$recordProduit->getPrix();
//        $_SESSION["SommePanier"]+=$sommePanier;
        
   if (isSet($recordProduit)!=NULL) {
       
        if ($_SESSION['Panier'] === 0) {
            // Panier inexistant
            $sommePanier = $recordProduit->getPrix();
    
        } else {
          
            $sommePanier+= $recordProduit->getPrix();
            $_SESSION["SommePanier"]=$sommePanier;
        }
      
       
    }

                
   }
  
};

};

// Mise à 0 de la SommePanier si panier vidé
if(isset($_SESSION['Panier'])==0){$_SESSION['SommePanier']=0;};
if(isset($_SESSION['Panier'])==""){$_SESSION['Panier']=0;};


// Test de modification de l' IHM via le ?action

//echo $IHM;



include 'boundaries/' . $IHM . '.php';



//include 'boundaries/accueil.php';      ==> page d'accueil
//include 'boundaries/connexion.php';    ==> page d'authentification
//include 'boundaries/blog-details.php'  ==> page de détail des blocs
//include 'boundaries/blog.php'          ==> page générale du blog
//include 'boundaries/checkout.php'      ==> page inscription/ validation de commande
//include 'boundaries/contact.php'       ==> page contact
//include 'boundaries/shop-details.php'  ==> page produit
//include 'boundaries/shop-grid.php'     ==> page boutique
//include 'boundaries/shoping-cart.php'  ==> page panier

// Test de modification de l' IHM via le ?action





