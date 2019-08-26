<?php

class FormControl
{   
    private $datas;
    private $name;
    private $lastName;
    private $pseudo;
    private $donationAmount;
    private $paymentDate;
    public  $errors = [];

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function isValid()
    {   
        if ( $this->isTokenValid() ) {
            //$this->hydrate($this->datas);
            if ( $this->checkForm($this->datas) ) {
                // ici on envois à la classe modele qui va faire l'insertion
            } else {
                return ["errorNo"=>2, "errorMessage"=>"Une erreur s'est glissée dans la saisie"];
            }
        } else {
            return ["errorNo"=>1, "errorMessage"=>"Le jeton d'accès n'est pas valide"];
        }
    }

    private function checkForm($data)
    {
        foreach($data as $key => $value){
            if ($key != 'token' && $key != 'id_user') {
                $key = $key == 'name' ? 'last_name' : $key;
                $this->checkFormat($value, $key);
            }
        }
        return true;
    }

    private function checkFormat($value, $key)
    {
        switch ($key) {
            case 'last_name':
                if (!preg_match('/^[\w][\p{L}-]*$/',$value)) {
                    $this->error = ['errorInputNo'=>1, 'errorInputMessage'=>'Le nom ou le prénom n\'est pas dans un format valide'];
                }
                break;
            
            case 'pseudo':
                # code...
                break;
            
            case 'donation_amount':
                # code...
                break;
            
            case 'payment_date':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    private function hydrate($data)
    {        
        foreach($data as $key => $value){
            $method = 'set'.(str_replace('_', '', ucwords($key, '_')));
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setName($name)
    {
        $this->name = (string) ucfirst($name);
    }

    public function setLastName($lastName)
    {
        $this->lastName = (string) ucfirst($lastName);
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = (string) $pseudo;
    }

    public function setDonationAmount($donationAmount)
    {
        if (is_numeric($donationAmount)) {
            $this->donationAmount = (float) preg_replace('/([,. ])/','.',$donationAmount);
        }
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = date('Y-m-d',strToTime(preg_replace('([./ ])','-',$paymentDate)));
    }

    private function isTokenValid()
    {   
        return (isset($_SESSION['token']) && $_SESSION['token'] == $this->datas['token']);
    }
}
