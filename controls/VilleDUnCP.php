<?php

/* 
 * VilleDUnCP.php
 */

// SCRIPT OBJET
// PROBLEMATIQUE: LE DAO NE PEUT ETRE COMMUN AVEC CELUI DU CONTROLEUR
// CHEMIN RELATIF DIFFERENT
// MODE DEGRADE EN PROCEDURAL



    
    $id = filter_input(INPUT_GET, "id");   
    $lsContenu="<div class='checkout__input' id=''>";
    $lsContenu .= "<select name='villeInscription' class='nice-select checkout__input'>"; 
   // $lsContenu = "";
    try {
        // connexion à changer pour passer en prod sur Always Data
        $lcn = new PDO("mysql:host=mysql-joannesperret.alwaysdata.net;port=3306;dbname=joannesperret_api", "212504", "P1l0t@ge");        
        // connexion en localhost
        // $lcn = new PDO("mysql:host=localhost;dbname=projet", "root", "");
        $lcn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcn->exec("SET NAMES 'UTF8'");

        $lsSQL = "SELECT cp, ville FROM ville WHERE cp = ?";
        $lrs = $lcn->prepare($lsSQL);
        $lrs->execute(array($id));
        
        foreach($lrs as $enr) {
            $lsContenu .= "<option value='$enr[1]'>$enr[1]</option>";
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