<?php

use beejeetest\App;
use PHPUnit\Framework\TestCase;
use beejeetest\View;
require_once ("../vendor/autoload.php");

class TestView extends TestCase {
    public function testIt()
    {
        $app = new App();
        $view = new View($app);
        $text = $view->prepare('test', []);

        $this->assertTrue($text == 'проба');

    }
}