<?php

/* 
 * VilleDUnCP.php
 */

// SCRIPT OBJET
// PROBLEMATIQUE: LE DAO NE PEUT ETRE COMMUN AVEC CEMLUI DU CONTROLEUR
// CHEMIN RELATIF DIFFERENT
// MODE DEGRADE EN PROCEDURAL

//try {
//    require_once '../entities/Ville.php';
//    require_once '../daos/VilleDAO.php';
//    require_once '../daos/Database.php';
//    
//    $connexion = new Connexion();
//    // Selection du fichier .ini pour selection du serveur
//    $pdo = $connexion->connect("conf/bd_ad.ini");
//    $dao = new VilleDAO($pdo);
//    $villeSaisie =new Ville();
//    $villeSaisie->setCp($cpInscription);
//    $villeClient = $dao->selectOneByCP($pdo,$villeSaisie);
//    $nomVilleClientInscription= $villeClient->getVille(); 
//    $idVilleClientInscrption = $villeClient->getIdVille();
//    $idPaysClientInscription = $villeClient->getIdPays();
//      
//    if ($villeClient === null) {
//        $errorMessage = "Le code postal n'existe pas";
//    } else {
//        $message = "";
//    }
//} catch (Exception $exc) {
//    $errorMessage = "-1";
//}


    // --- VillesDUnPays.php
    $id = filter_input(INPUT_GET, "id");
    $lsContenu = "<select>";
    
    try {
        // connexion à changer pour passer en prod sur Always Data
        $lcn = new PDO("mysql:host=localhost;dbname=projet", "root", "");
        $lcn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcn->exec("SET NAMES 'UTF8'");

        $lsSQL = "SELECT cp, ville FROM ville WHERE cp = ?";
        $lrs = $lcn->prepare($lsSQL);
        $lrs->execute(array($id));
        
        foreach($lrs as $enr) {
            $lsContenu .= "<option>$enr[1]</option>";
        }
        $lsContenu .= "</select>";
        if($lsContenu != "") {
            $lsContenu = substr($lsContenu, 0, -1);
        }

        $lcn = null;
    }
    catch(PDOException $e) {
        $lsContenu = $e->getMessage();
    }  
    
    echo $lsContenu;