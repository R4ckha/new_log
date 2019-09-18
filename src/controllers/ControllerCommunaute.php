<?php

class ControllerCommunaute
{
    public function __construct()
    {
        $user = $this->userManager->isConnectedUser();

        if ( $user["isConnected"] ) {
            require_once 'src/views/viewCommunaute.php';
        } else {
            require_once 'src/views/viewErrorConnect.php';
        }
    }
}