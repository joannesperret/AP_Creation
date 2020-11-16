<?php

class Database
{
    private static $dbHost = "mysql-joannesperret.alwaysdata.net";
    private static $dbName = "joannesperret_cours";
    private static $dbUser = "212504";
    private static $dbUserPassword = "P1l0t@ge";
    private static $connection = null; 
    public static function connect()
         {
             try
                       {
                         self::$connection = new PDO("mysql:host=" .self::$dbHost . ";dbname=" .self::$dbName,self::$dbUser,self::$dbUserPassword);
                       }
             catch(PDOException $e)
                       {
                          die($e->getMessage());
                       }
             return self::$connection;
         }
             public static function disconnect()
                       {
                         self::$connection = null;
                       }
}
