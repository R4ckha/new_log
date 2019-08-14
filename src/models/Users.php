<?php

class Users
{
    private $id;
    private $name;
    private $idCategorie;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Ici set.ucfirst fout la merde
    // A demain, bisous
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setId($id)
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

    public function setIdCategorie($idCategorie)
    {
        $idCategorie = (int) $idCategorie;

        if ($idCategorie > 0) {
            $this->idCategorie = $idCategorie;
        }
    }

    public function getId()
    {
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
}