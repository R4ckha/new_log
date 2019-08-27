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
				$dataValid = $this->validation->isValid();
                if ( $dataValid[0] ) {
					header("Location:/imperalog/premium");
                } else {
					foreach ($dataValid[1] as $key => $value) {
						if ($key === 0) {
							$content = "<div class='error'>
											<p>{$dataValid[1][$key]['errorInputMessage']}</p>
											<i class='material-icons md-24'>clear</i>
										</div>";
						} else {
							$content .= "<div class='error'>
											<p>{$dataValid[1][$key]['errorInputMessage']}</p>
											<i class='material-icons md-24'>clear</i>
										</div>";
						}
					}
					$content .= $this->premiumForm->insertForm();
                	require_once 'src/views/viewPremiumForm.php';
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