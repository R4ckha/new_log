<?php
/**
 *  Class Database
 * 
 */
abstract class Database
{

    private static $bdd;

    // Création de la connexion
    private static function setBdd()
    {   
        self::$bdd = new PDO(DATABASE, USER, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Récupère la connexion
    protected function getBdd()
    {
        if (self::$bdd == null) {
            self::setBdd();
        }
        return self::$bdd;
    }
}
