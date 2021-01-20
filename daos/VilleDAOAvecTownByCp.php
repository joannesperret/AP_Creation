<?php

/*
 * VilleDAO
 */

/**
 * LE DAO de la table [ville] de la BD [projet]
 *
 * @author joann
 */
require 'entities/Ville.php';


class VilleDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM ville';
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Ville($record['id_ville'], $record['departement'], $record['ville'], $record['cp'], $record['id_pays']);
                $list[] = $object;
            }
        } catch (PDOException $e) {
            $object = null;
            $list[] = $object;
        }
        return $list;
        
}

    /*
     * @param PDO $pdo
     * @param int $cp
     * @return array
     */
    
    /// selectTownByCp
    
    public static function selectTownByCp(PDO $pdo, int $cp): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM ville WHERE cp = ?';
            $lrs = $pdo->prepare($sql);
            $lrs->bindValue(1,$cp);
            $lrs->execute();           
            $lrs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $lrs->fetch()) {
                $object = new Ville($record['id_ville'], $record['departement'], $record['ville'], $record['cp'], $record['id_pays']);
                $list[] = $object;
            }
        } catch (PDOException $error) {
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
    
    public static function selectOne(PDO $pdo, $pObject): Ville {
        $object = null;
        try {
            $sql = 'SELECT * FROM ville WHERE id_ville = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdVille());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Ville();
                $object->setIdVille($record['id_ville']);
                $object->setDepartement($record['departement']);
                $object->setVille($record['ville']);
                $object->setCp($record['cp']);
                $object->setIdPays($record['id_pays']);        
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;
       
    }
    
    public static function selectOneByCP(PDO $pdo, $pObject): Ville {
        $object = null;
        try {
            $sql = 'SELECT * FROM ville WHERE cp = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getCp());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Ville();
                $object->setIdVille($record['id_ville']);
                $object->setDepartement($record['departement']);
                $object->setVille($record['ville']);
                $object->setCp($record['cp']);
                $object->setIdPays($record['id_pays']);        
            
                
            } $messageError="Code postal erronné" ;
            
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;
       
    }
    
        public static function selectOneByVille(PDO $pdo, $pObject): Ville {
        $object = null;
        try {
            $sql = 'SELECT * FROM ville WHERE ville = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getVille());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Ville();
                $object->setIdVille($record['id_ville']);
                $object->setDepartement($record['departement']);
                $object->setVille($record['ville']);        
                $object->setCp($record['cp']);
                $object->setIdPays($record['id_pays']);        
            
                
            } $messageError="Code postal erronné";
            
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;       
    }

}
