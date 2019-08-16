<?php
/**
 *  Class Users
 * 
 */
class Users
{   
    /** @var int $id */
    private $id;

    /** @var str $name */
    private $name;

    /** @var int $idCategorie */
    private $idCategorie;


    /**
     * Users constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    /**
     * @param array[string]mixed $data
     */
    public function hydrate(array $data)
    {
        foreach($data as $key => $value){
            $method = 'set'.(str_replace('_', '', ucwords($key, '_')));
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param int $id
     */
    public function setIdUser(int $id): void
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    /**
     * @param int $id
     */
    public function setFkNlUsersCategories(int $idCategorie): void
    {
        $idCategorie = (int) $idCategorie;

        if ($idCategorie > 0) {
            $this->idCategorie = $idCategorie;
        }
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getIdCategorie(): int
    {
        return $this->idCategorie;
    }
}