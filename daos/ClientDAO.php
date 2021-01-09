<?php

/*
  ClientDAO.php
 */
/*
  LE DAO de la table [client] de la BD [joannesperret_api_normalisee]
 */

/* Inclusion du DTO 'client' */
require_once 'entities/Client.php';

class ClientDAO {

    /*
     * @param PDO $pdo
     * @return array
     */
    
	// Toutes les fonctions prennent en paramètre l'objet $pdo afin de factoriser la connexion
    // Fonction de selection de la totalité des clients
	
    
    public static function selectAll(PDO $pdo): array {
        $list = array();
        try {
            $sql = 'SELECT * FROM client';
            $rs = $pdo->query($sql);
			// Avec ce mode, sont associées les en-têtes des colonnes avec les paramètres de notre objet
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            while ($record = $rs->fetch()) {
                $object = new Client($record['id_client'], $record['civilite'], $record['nom'], $record['prenom'], $record['adresse'], $record['email_client'], $record['password'], $record['telephone_client'], $record['date_naissance'], $record['newsletter'], $record['id_ville']);
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
    
     //Fonction de selection d'un client par son id passé en objet.
    
    public static function selectOne(PDO $pdo, $pObject): Client {
        $object = null;
        try {
            $sql = 'SELECT * FROM client WHERE id_client = ?';
            $cmd = $pdo->prepare($sql);
			// Le passage de paramètres en binValue permet d'accroître la sécurité
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
	 
	 // Fonction de selection d'un client par la clef mot de passe et email.
	 
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
                $object = null;

            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $object;
    
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
	 
	  // Fonction de suppression d'un client par son id.
	  
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
       
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
	 
	 // Fonction d'insertion d'un nouveau client.
	 
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
            // Sécurisation du mot de passe
            $cmd->bindValue(7, password_hash($object->getPwdClient(), PASSWORD_DEFAULT));
            $cmd->bindValue(8, $object->getTelephoneClient());
            $cmd->bindValue(9, $object->getDateNaissanceClient());
            $cmd->bindValue(10, $object->getNewsLetterClient());
            $cmd->bindValue(11, $object->getIdVille());

            $cmd->execute();

            $affectedInsert = $cmd->rowcount();
        } catch (PDOException $e) {
            $affectedInsert = -1;            
        }
        return $affectedInsert;
       
    }

    /**
     * 
     * @param PDO $pdo
     * @param Client $object
     * @return int
     */
	 
	 // Fonction de mise à jour d'un client par passage d'un objet contenant les données à modifier.
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
            // Sécurisation du mot de passe
            $cmd->bindValue(6, password_hash($object->getPwdClient(), PASSWORD_DEFAULT));
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

     }

}


