<?php

class FormControl
{   
    private $datas;
    public  $errors = [];

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function isValid()
    {   
        if ( $this->isTokenValid() ) {

            if ( $this->checkForm($this->datas) ) {
				// ici on envois à la classe modele qui va faire l'insertion
				$formToBdd = new PremiumFormModel();
				$formToBdd->send($this->datas, 'nl_users_premium');
				//return [true]; // my bad
            } else {
                return [false, $this->errors];
			}
			
        } else {
            return ["errorNo"=>1, "errorMessage"=>"Le jeton d'accès n'est pas valide"];
        }
    }

    private function checkForm($data)
    {
        foreach($data as $key => $value){
            if ($key != 'token' && $key != 'id_user') {
				// On économise une instruction dans le switch case en assignant la même clé au format identique
                $key = $key == 'name' ? 'last_name' : $key;
                $this->checkFormat($value, $key);
            }
		}

		// On vérifie que le tableau d'erreurs ne contient pas d'erreurs 
		if ( empty($this->errors) ) {
			return true;
		} else {
			return false;
		}
    }

    private function checkFormat($value, $key)
    {
        switch ($key) {
            case 'last_name':
                if (!preg_match('/^[\w][\p{L}-]*$/',$value)) {
					array_push($this->errors, ['errorInputNo'=>1, 'errorInputMessage'=>'Le nom ou le prénom n\'est pas dans un format valide']);
                }
                break;
            
            case 'pseudo':
				$value = strip_tags($value);
				if ( empty($value) ) {
					array_push($this->errors, ['errorInputNo'=>2, 'errorInputMessage'=>'Le pseudo contient des caractères interdits']);
				}
                break;
            
            case 'donation_amount':
				$value = (float) preg_replace('/([,. ])/','.',$value);
				if ( !is_numeric($value) || $value <= 0) {
					array_push($this->errors, ['errorInputNo'=>3, 'errorInputMessage'=>'Le montant doit être numérique et supérieur à 0']);
				}
                break;
        }
    }

    private function isTokenValid()
    {   
        return (isset($_SESSION['token']) && $_SESSION['token'] == $this->datas['token']);
    }
}
