<?php

use beejeetest\App;
use PHPUnit\Framework\TestCase;
use beejeetest\View;
use beejeetest\Router;
require_once ("../vendor/autoload.php");

class TestRoute extends TestCase {
    public function testIt()
    {
        $request = ['get'=>'', 'post'=>'', 'uri'=>'/auth'];
        $router = new Router();
        $app = new App();

        $controller = $router->getRoute($request, $app);
        $this->assertTrue(is_object($controller));

    }
}