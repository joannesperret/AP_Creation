<?php

/* 
 * VilleDUnCP.php
 */

// SCRIPT OBJET
// PROBLEMATIQUE: LE DAO NE PEUT ETRE COMMUN AVEC CELUI DU CONTROLEUR
// CHEMIN RELATIF DIFFERENT
// MODE DEGRADE EN PROCEDURAL

    
    $id = filter_input(INPUT_POST, "id" ,FILTER_SANITIZE_NUMBER_INT);   
    $lsContenu="<div class='checkout__input form-group' id=''>";
    $lsContenu .= "<select name='villeInscription' class='form-control checkout__input'>"; 
   // $lsContenu = "";
    try {
        // inclusion des daos et entities
        require_once '../daos/Database.php';
        require_once '../entities/Client.php';
        // création d"un nouvel objet de connexion
        $connexion = new Connexion();
        // Selection du fichier .ini pour paramétrage
        $pdo = $connexion->connect("../../conf/bd_ad.ini");
        // Ajout de la gestion des erreurs        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");
        // Création de la requête
        $sql = "SELECT cp, ville FROM ville WHERE cp = ?";
        $lrs = $pdo->prepare($sql);
        $lrs->bindValue(1,$id);
        $lrs->execute();
        // boucle sur les résultats et alimentation de la liste déroulante
        foreach($lrs as $enr) {
            $lsContenu .= "<option class='form-control'value='$enr[1]'>$enr[1]</option>";
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
    
