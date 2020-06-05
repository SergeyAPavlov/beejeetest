<?php

use beejeetest\App;
use beejeetest\Models\Tasks;

use PHPUnit\Framework\TestCase;
require_once ("../vendor/autoload.php");

class TestTasks extends TestCase {

    public function testGetAll()
    {

        $app = new App();
        $db = $app->getDb();

        $class = new Tasks($db);
        $order = 'username';
        $tasks = $class->getTasks($order);

        $this->assertTrue(is_array(current($tasks)));

    }


}