<?php
session_start();
require 'src/conf.php';
require 'src/Autoloader.php';

$router = new Router();
$router->routeRequest();
