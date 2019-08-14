<?php

class Router
{
    private $control;
    private $view;

    public function routeRequest()
    {
       
        try {
            
            // Autoloading des classes models
            spl_autoload_register(function($class){
                require_once 'src/models/'.$class.'.php';
            });

            $url = '';
            
            // Controleur chargé selon action utilisateur
            if (isset($_GET['url'])) {
                var_dump("setted url");
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass =  'Controller'.$controller;
                $controllerFile = 'src/controllers/'.$controllerClass.'.php';

                if (file_exist($controllerFile)) {
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