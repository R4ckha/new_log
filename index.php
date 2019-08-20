<?php
session_start();
require 'src/conf.php';
require 'src/controllers/Router.php';

$router = new Router();
$router->routeRequest();
