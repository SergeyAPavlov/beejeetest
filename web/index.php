<?php

use beejeetest\App;
use beejeetest\Router;

try {
    require_once("../vendor/autoload.php");

    $router = new Router();
    $app = new App();
    $controller = $router->get($app);
    $controller->fetch();


} catch (\Error $t) {
    echo $t->getMessage();
}


