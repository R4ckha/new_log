<?php
/**
 *  Class Premium
 * 
 */
class Premium
{
    public $idUserPremium;
    public $name;
    public $lastName;
    public $pseudo;
    public $donationAmount;
    public $paymentDate;
    public $premiumDuration;
    public $endPremium;
    public $isDecisionMaker;
    public $slashBack;
    public $numberHome;

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

    public function setIdUserPremium($id)
    {

    }

    public function setName($name)
    {

    }

    public function setLastName($lastName)
    {

    }

    public function setPseudo($pseudo)
    {

    }

    public function setDonationAmount($donationAmount)
    {

    }

    public function setPaymentDate($paymentDate)
    {

    }

    public function setPremiumDuration($premiumDuration)
    {

    }

    public function setEndPremium($endPremium)
    {

    }

    public function setIsDecisionMaker($isDecisionMaker)
    {

    }

    public function setSlashBack($slashBack)
    {

    }

    public function setNumberHome($numberHome)
    {

    }

    public function getIdUserPremium()
    {

    }
}
