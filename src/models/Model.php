<?php

abstract class Model
{
    private static $bdd;
    
    // Création de la connexion
    private static function setBdd()
    {   
        
        self::$bdd = new PDO("mysql:host=blank;dbname=blank;charset=utf8", 'blank', 'blank', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Récupère la connexion
    protected function getBdd()
    {
        if (self::$bdd == null) {
            self::setBdd();
            return self::$bdd;
        }
    }

    protected function getAll($table, $object)
    {
        
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' ORDER BY id_user desc');
        $req->execute();
        
        while($data = $req->fetch()){
            $var[] = new $object($data);
        }
        $req->closeCursor();
        return $var;

    }
}