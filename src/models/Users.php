<?php

class Users
{   
    public $id;
    public $name;
    public $idCategorie;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {        
        foreach($data as $key => $value){
            $method = 'set'.(str_replace('_', '', ucwords($key, '_')));
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setIdUser($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    public function setFkNlUsersCategories($idCategorie)
    {
        $idCategorie = (int) $idCategorie;

        if ($idCategorie > 0) {
            $this->idCategorie = $idCategorie;
        }
    }
    /*
    public function getId()
    {   
        var_dump($this->id);
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }
    */
}