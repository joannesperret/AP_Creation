<?php

/*
 * PhotoDAO.php
 * LE DAO de la table [photos] de la BD [projet]
 */

/**
 * Description of Photos
 *
 * @author joann
 */
require_once 'entities/Photo.php';

class PhotoDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM photos ORDER BY id_photo ASC';
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Photo($record['id_photo'], $record['photo_principale'], $record['photo_2'], $record['photo_3'], $record['photo_4'], $record['id_produit']);
                $list[] = $object;
            }
        } catch (PDOException $e) {
            $object = null;
            $list[] = $object;
        }
        return $list;
        
}

    /**
     * 
     * @param PDO $pdo
     * @param Photo $pObject
     * @return \Photo
     */
    
     /// selectOne
    
    public static function selectOne(PDO $pdo, $pObject): Photo {
        $object = null;
        try {
            $sql = 'SELECT * FROM photos WHERE id_produit = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdProduitP());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
               $object = new Photo($record['id_photo'], $record['photo_principale'], $record['photo_2'], $record['photo_3'], $record['photo_4'], $record['id_produit']);
                $object->setIdPhoto($record['id_photo']);
                $object->setPhotoPrincipale($record['photo_principale']);
                $object->setPhoto2($record['photo_2']);
                $object->setPhoto3($record['photo_3']);
                $object->setPhoto4($record['photo_4']);
                $object->setIdProduitP($record['id_produit']);
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;       
    }

         /// selectPhotoByIdProduit  

    public static function selectPhotoByIdProduit(PDO $pdo, $pObject): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM photos WHERE id_produit = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getidProduitP());
            $cmd->execute();            
            while ($record = $cmd->fetch()) {
                $object = new Photo($record['id_photo'], $record['photo_principale'], $record['photo_2'], $record['photo_3'], $record['photo_4'], $record['id_produit']);
                $list[] = $object;
            }
        } catch (PDOException $e) {
            $object = null;
            $list[] = $object;
        }
        return $list;
    }
    
         /// selectPhotoByIdProduit  

         public static function selectPhotoById(PDO $pdo, $id): Photo {
        try {
            $sql = 'SELECT * FROM photos WHERE id_produit = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $id);
            $cmd->execute();
            while ($record = $cmd->fetch()) {
                $object = new Photo($record['id_photo'], $record['photo_principale'], $record['photo_2'], $record['photo_3'], $record['photo_4'], $record['id_produit']);
            }
        } catch (PDOException $e) {
            $object = null;
            $list[] = $object;
        }
        return $object;
    }

    /// selectPhotoByCategorie 
    
public static function selectPhotoByCategorie(PDO $pdo, $pObject):array {
        $list = array();
        try {
            $sql = 'SELECT id_photo,photo_principale,photo_2,photo_3,photo_4,ph.id_produit FROM photos ph JOIN produits p ON p.id_produit= ph.id_produit WHERE p.categorie=?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdCategorie());
            $cmd->execute();            
            while ($record = $cmd->fetch()) {
                $object = new Photo($record['id_photo'], $record['photo_principale'], $record['photo_2'], $record['photo_3'], $record['photo_4'], $record['id_produit']);
                $list[]=$object;        
                }
        } catch (PDOException $e) {
            $object = null;  
             $list[]=$object; 
        }
        return $list;
    }
   
}

