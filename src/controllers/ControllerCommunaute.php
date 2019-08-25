<?php

class ControllerCommunaute
{
    private $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager();
        $user = $this->userManager->isConnectedUser();

        if ( $user["isConnected"] ) {
            require_once 'src/views/viewCommunaute.php';
        } else {
            require_once 'src/views/viewErrorConnect.php';
        }
    }
}