<?php

/*
  ClientDAO.php
 */
/*
  LE DAO de la table [client] de la BD [projet]
 */

require_once 'entities/Client.php';

class ClientDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
    /// selectALL
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM client';
            $rs = $pdo->query($sql);
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Client($record['id_client'], $record['civilite'], $record['nom'], $record['prenom'], $record['adresse'], $record['email_client'], $record['password'], $record['telephone_client'], $record['date_naissance'], $record['newsletter'], $record['id_ville']);
                //$object = new Client($record['id_client'], $record['civilite'], $record['nom'], $record['prenom'], $record['adresse'], $record['email_client'], $record['password'], $record['telephone_client'], $record['date_naissance'], $record['newsletter'], $record['id_ville']);
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
    
    public static function selectOne(PDO $pdo, $pObject): Client {
        $object = null;
        try {
            $sql = 'SELECT * FROM client WHERE id_client = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getIdClient());
            $rs = $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                $object = new Client();
                $object->setIdClient($record['id_client']);
                $object->setCiviliteClient($record['civilite']);
                $object->setNomClient($record['nom']);
                $object->setPrenomClient($record['prenom']);
                $object->setAdresseClient($record['adresse']);
                $object->setEmailClient($record['email_client']);
                $object->setPwdClient($record['password']);
                $object->setTelephoneClient($record['telephone_client']);
                $object->setDateNaissanceClient($record['date_naissance']);
                $object->setEmailClient($record['newsletter']);
                $object->setIdVille($record['id_ville']);               
                
            }
        } catch (PDOException $e) {
            $object = null;
        }
        return $object;
       
    }
                                                            // A FAIRE 
    /**
     * 
     * @param PDO $pdo
     * @param Client $pObject
     * @return \Client
     */
    public static function selectOneByEmailAndPwd(PDO $pdo, $pObject) {
        $object = null;
        try {
            $sql = 'SELECT * FROM client WHERE email_client = ? AND password = ?';
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $pObject->getEmailClient());
            $cmd->bindValue(2, $pObject->getPwdClient());
            $cmd->execute();
            $record = $cmd->fetch(PDO::FETCH_ASSOC);
            if ($record != null) {
                // echo "Client trouvé";
                $object = new Client();
                $object->setIdClient($record['id_client']);
                $object->setCiviliteClient($record['civilite']);
                $object->setNomClient($record['nom']);
                $object->setPrenomClient($record['prenom']);
                $object->setAdresseClient($record['adresse']);
                $object->setEmailClient($record['email_client']);
                $object->setPwdClient($record['password']);
                $object->setTelephoneClient($record['telephone_client']);
                $object->setDateNaissanceClient($record['date_naissance']);
                $object->setNewsLetterClient($record['newsletter']);
                $object->setIdVille($record['id_ville']);
                
            } else {
                // echo "Client introuvable<br>";
                //$object = null;
//                $object = new Client();
//                $object->setNomClient("Authentification ratée");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
//            $object = new Client();
//            $object->setNomClient("Erreur système ...");
            //$object = null;
        }
        return $object;
        /// selectOneByEmailAndPwd
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
    public static function delete(PDO $pdo, $object): int {
        $affected = 0;
        try {
            $sql = "DELETE FROM client WHERE id_client = ?";
            $cmd = $pdo->prepare($sql);
            $cmd->bindValue(1, $object->getIdClient());
            $cmd->execute();
            $affected = $cmd->rowcount();
            echo "$affected<br>";
        } catch (PDOException $e) {
            $affected = -1;
            echo $e->getMessage();
        }
        return $affected;
        /// delete
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
    public static function insert(PDO $pdo, $object): int {
        $affectedInsert = 0;
        try {
            $sql = "INSERT INTO client(id_client,civilite,nom,prenom,adresse,email_client,password,telephone_client,date_naissance,newsletter,id_ville) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $cmd = $pdo->prepare($sql);

            $cmd->bindValue(1, $object->getIdClient());
            $cmd->bindValue(2, $object->getCiviliteClient());
            $cmd->bindValue(3, $object->getNomClient());
            $cmd->bindValue(4, $object->getPrenomClient());
            $cmd->bindValue(5, $object->getAdresseClient());
            $cmd->bindValue(6, $object->getEmailClient());
            $cmd->bindValue(7, $object->getPwdClient());
            $cmd->bindValue(8, $object->getTelephoneClient());
            $cmd->bindValue(9, $object->getDateNaissanceClient());
            $cmd->bindValue(10, $object->getNewsLetterClient());
            $cmd->bindValue(11, $object->getIdVille());

            $cmd->execute();

            $affectedInsert = $cmd->rowcount();
        } catch (PDOException $e) {
            $affectedInsert = -1;
            //echo "<hr>" . $e->getMessage() . "<hr>";
        }
        return $affectedInsert;
        /// insert
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
    public static function update(PDO $pdo, $object): int {
        $affected = 0;
        try {
            $sql = "UPDATE client SET civilite=?,nom=?,prenom=?,adresse=?,email_client=?,password=?,telephone_client=?,date_naissance=?,newsletter=?,id_ville=? WHERE id_client=?";
            $cmd = $pdo->prepare($sql);
           
            $cmd->bindValue(1, $object->getCiviliteClient());
            $cmd->bindValue(2, $object->getNomClient());
            $cmd->bindValue(3, $object->getPrenomClient());
            $cmd->bindValue(4, $object->getAdresseClient());
            $cmd->bindValue(5, $object->getEmailClient());
            $cmd->bindValue(6, $object->getPwdClient());
            $cmd->bindValue(7, $object->getTelephoneClient());
            $cmd->bindValue(8, $object->getDateNaissanceClient());
            $cmd->bindValue(9, $object->getNewsLetterClient());
            $cmd->bindValue(10, $object->getIdVille());
            $cmd->bindValue(11, $object->getIdClient());
            
            $cmd->execute();
            $affected = $cmd->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;

        /// update
    }

/// class
}


