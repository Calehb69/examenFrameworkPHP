<?php
namespace Database;

class PdoMySQL 
{


    /**
    * Retourne un objet PDO pour intéragir avec la base de données
    * 
    * @return \PDO
    * 
    * 
    */
 public static function getPdo():\PDO{
   
        //Ici mettre Id et Password pour accèder à la BDD
           $pdo = new \PDO("mysql:host=localhost;dbname=nomDeLaDB;charset=utf8", "nomDeLUtilisateur","password", [
                   \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                   \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
           ]);
   
           return $pdo;
   
   }
}
