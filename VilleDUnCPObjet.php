<?php

/* 
 * VilleDUnCPObjet.php
 */


// Contrôleur appelé par la requête ajax permettant et générant
// la liste des villes liées à un code postal saisi.
    
    // Récupération de
    $cp = filter_input(INPUT_POST, "id" ,FILTER_SANITIZE_NUMBER_INT);   
    $lsContenu="<div class='checkout__input form-group' id=''>";
    $lsContenu .= "<select name='villeInscription' class='form-control checkout__input'>"; 
   // $lsContenu = "";
    try {
        // inclusion des daos et entities
        require_once 'daos/Database.php';
        require_once 'daos/VilleDAO.php';
        require_once 'entities/Ville.php';
        // création d"un nouvel objet de connexion
        $connexion = new Connexion();
        // Selection du fichier .ini pour paramétrage
        $pdo = $connexion->connect("../conf/bd_ad.ini");
        // Ajout de la gestion des erreurs        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
        $dao = new VilleDAO($pdo);
        $ville = $dao->selectTownByCp($pdo, $cp);
        // boucle sur les résultats et alimentation de la liste déroulante
        foreach($ville as $key => $value) {
        $lsContenu .= "<option class='form-control'value='".$value->getVille()."'>".$value->getVille()."</option>";
        }
        $lsContenu .= "</select>";
        $lsContenu .= "</div>";
        if($lsContenu != "") {
            $lsContenu = substr($lsContenu, 0, -1);
        }
        $lcn = null;
    }
    catch(PDOException $e) {
        $lsContenu = $e->getMessage();
    }      
    echo $lsContenu;
    
