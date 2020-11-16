<?php

/*
 * CategorieDAO.php
 */

/**
 * LE DAO de la table [categorie] de la BD [projet]
 *
 * @author joann
 */
require_once 'entities/Categorie.php';

class CategorieDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM categorie ORDER BY categorie ASC';
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Categorie($record['id_categorie'], $record['categorie']);
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
     * @param Categorie $pObject
     * @return \Categorie
     */
    
     /// selectOne
    
    public static function selectOne(PDO $pdo, $pObject): Categorie {
        $object = null;
        try {
            $sql = 'SELECT * FROM categorie WHERE id_categorie = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdCategorie());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Categorie();
                $object->setIdCategorie($record['id_categorie']);
                $object->setCategorie($record['categorie']);                       
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;
       
    }    


}


