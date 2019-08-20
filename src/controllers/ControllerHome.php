<?php

class ControllerHome
{
    private $userManager;
    private $view;

    public function __construct($url)
    {   
        // Si l'url est paramétré et qu'elle contient plus d'un argument
        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            // Appel la méthode qui determine si l'utilisateur à le droit d'afficher la vue
            $this->users();
        }
    }

    private function users()
    {
        $this->userManager = new UserManager();

        // récupère tout les utilisateurs (inutiles ici)
        $usersArray = $this->userManager->getUser();

        // verifie si l'utilisateur est connecté et est admin
        $user = $this->userManager->isConnectedUser();

        if ( $user["isConnected"] ) {
            require_once 'src/views/viewHome.php';
        } else {
            require_once 'src/views/viewErrorConnect.php';
        }
    }
}