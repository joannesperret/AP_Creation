<?php

/*
 * PaysDAO.php
 */

/**
 * LE DAO de la table [pays] de la BD [projet]
 *
 * @author joann
 */
require_once 'entities/Pays.php';

class PaysDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM pays';          
            
            
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Pays($record['id_pays'], $record['nom_pays']);
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
     * @param Client $pObject
     * @return \Client
     */
    
     /// selectOne
    
    public static function selectOne(PDO $pdo, $pObject): Pays {
        $object = null;
        try {
            $sql = 'SELECT * FROM pays WHERE id_pays = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdPays());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Pays();
                $object->setIdPays($record['id_pays']);
                $object->setPays($record['nom_pays']);                       
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;
       
    }

}