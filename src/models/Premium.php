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
        $id = (int) $id;
        if ($id > 0) {
            $this->idUserPremium = $id;
        }
    }

    public function setName($name)
    {
        $this->name = (string) $name;
    }

    public function setLastName($lastName)
    {
        $this->lastName = (string) $lastName;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = (string) $pseudo;
    }

    public function setDonationAmount($donationAmount)
    {
        if (is_numeric($donationAmount)) {
            $this->donationAmount = (float) $donationAmount;
        }

    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setPremiumDuration($premiumDuration)
    {
        if ($premiumDuration > 0) {
            $this->premiumDuration = (int) $premiumDuration;
        }
    }

    public function setEndPremium($endPremium)
    {
        $this->endPremium = $endPremium;
    }

    public function setIsDecisionMaker($isDecisionMaker)
    {
        $this->isDecisionMaker = (boolean) $isDecisionMaker;
    }

    public function setSlashBack($slashBack)
    {
        $this->slashBack = (boolean) $slashBack;
    }

    public function setNumberHome($numberHome)
    {
        if ($numberHome > 0) {
            $this->numberHome = (int) $numberHome;
        }
    }
}
