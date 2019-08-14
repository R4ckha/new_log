<?php

abstract class Model
{
    private static $bdd;
    
    // Création de la connexion
    private static function setBdd()
    {   
        
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