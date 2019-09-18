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
            $this->donationAmount = number_format($donationAmount, 2) . " €";
        }

    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = date('d-m-Y', strtotime($paymentDate));
    }

    public function setPremiumDuration($premiumDuration)
    {
        if ($premiumDuration > 0) {
            $this->premiumDuration = (int) $premiumDuration . " mois";
        }
    }

    public function setEndPremium($endPremium)
    {
        $this->endPremium = date('d-m-Y', strtotime($endPremium));
    }

    public function setIsDecisionMaker($isDecisionMaker)
    {   
        $this->isDecisionMaker = (boolean) $isDecisionMaker ? "oui" : "non";
        
    }

    public function setSlashBack($slashBack)
    {
        $this->slashBack = (boolean) $slashBack ? "oui" : "non";
    }

    public function setNumberHome($numberHome)
    {
        if ($numberHome > 0) {
            $this->numberHome = (int) $numberHome;
        }
    }
}
