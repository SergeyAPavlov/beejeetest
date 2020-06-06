<?php

use beejeetest\App;
use beejeetest\Router;

try {
    require_once("../vendor/autoload.php");

    $router = new Router();
    $app = new App($router);
    $controller = $router->get($app);
    $controller->fetchAll();


} catch (\Error $t) {
    echo $t->getMessage();
}


