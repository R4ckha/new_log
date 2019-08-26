<?php

class ControllerPremiumForm
{

    private $userManager;
    private $premiumForm;
    private $validation;


    public function __construct()
    {
        $this->users();
    }

    private function users()
    {
        $this->userManager = new UserManager();
        $user = $this->userManager->isConnectedUser();

        if ( $user["isConnected"] ) {

            $this->premiumForm = new PremiumForm();

            if(!empty($_POST)) {
                $this->validation = new FormControl($_POST);

                if ( $this->validation->isValid() ) {
                    var_dump($this->validation->isValid());
                    require_once 'src/controllers/ControllerPremium.php';
                } else {
                    var_dump("passe pas");
                }
            } else {
                // Si le formulaire n'as pas été envoyé
                $content = $this->premiumForm->insertForm();
                require_once 'src/views/viewPremiumForm.php';
            }
        } else {
            require_once 'src/views/viewErrorConnect.php';
        }
    }
}