<?php

/*
 * ProduitDAO.php
 */

/**
 * LE DAO de la table [produit] de la BD [projet]
 *
 * @author joann
 */
require_once 'entities/Produit.php';

class ProduitDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM produits ORDER BY designation ASC';
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Produit($record['id_produit'], $record['designation'], $record['description'],$record['prix'], $record['qte_stockee'], $record['categorie']);
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
     * @param Produit $pObject
     * @return \Produit
     */
    
     /// selectOne
    
    public static function selectOne(PDO $pdo, $pObject): Produit {
        $object = null;
        try {
            $sql = 'SELECT * FROM produits WHERE id_produit = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdProduit());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Produit();
                $object->setIdProduit($record['id_produit']);
                $object->setDesignation($record['designation']);
                $object->setDescription($record['description']);
                $object->setPrix($record['prix']);
                $object->setQteStockee($record['qte_stockee']);
                $object->setCategorie($record['categorie']);
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;       
    } 
    
    /**
     * 
     * @param PDO $pdo
     * @param Produit $pObject
     * @return \Produit
     */
    
     /// selectOne
    
    public static function selectProduitById(PDO $pdo, int $id): Produit {
        $object = null;
        try {
            $sql = 'SELECT * FROM produits WHERE id_produit = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $id);
            $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Produit();
                $object->setIdProduit($record['id_produit']);
                $object->setDesignation($record['designation']);
                $object->setDescription($record['description']);
                $object->setPrix($record['prix']);
                $object->setQteStockee($record['qte_stockee']);
                $object->setCategorie($record['categorie']);
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;       
    }   

    /**
     * 
     * @param PDO $pdo
     * @param Produit $pObject
     * @return \Produit par catégorie
     */
    
     /// selectProduitByCategorie    

    public static function selectProduitByCategorie(PDO $pdo, $pObject): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM produits WHERE categorie = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getidCategorie());
            $cmd->execute();            
            while ($record = $cmd->fetch()) {
                $object = new Produit($record['id_produit'], $record['designation'], $record['description'],$record['prix'], $record['qte_stockee'], $record['categorie']);
                $list[] = $object;
            }
        } catch (PDOException $e) {
            $object = null;
            $list[] = $object;
        }
        return $list;
    }
    
    

}
