<?php

class ControllerHome
{
    private $userManager;
    private $view;

    public function __construct($url)
    {   
        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->users();
        }
    }

    private function users()
    {
        $this->userManager = new UserManager();
        $users = $this->userManager->getUsers();
        require_once 'src/views/viewHome.php';
    }

}