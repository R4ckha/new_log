<?php

class Router
{
    private $control;
    private $view;

    public function routeRequest()
    {

        try {
            $url = '';
            // Controleur chargé selon action utilisateur
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass =  'Controller'.$controller;
                $controllerFile = 'src/controllers/'.$controllerClass.'.php';
                
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->control = new $controllerClass($url);
                } else {
                    throw new Exception('Page introuvable');
                }
            } else {
                require_once 'src/controllers/ControllerHome.php';
                $this->control = new ControllerHome($url);
            }
        // Gestion des erreurs
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            require_once('src/views/viewError.php');
        }
    }
}