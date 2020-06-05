<?php

use beejeetest\App;
use beejeetest\Models\User;
use beejeetest\Models\Users;

use PHPUnit\Framework\TestCase;
require_once ("../vendor/autoload.php");

class TestUsers extends TestCase {
    public function testLoad()
    {

        $app = new App();
        $db = $app->getDb();

        $user = new User($db);
        $user1 = $user->load(1);

        $this->assertTrue(is_object($user1));

    }

    public function testFind()
    {

        $app = new App();
        $db = $app->getDb();

        $user = new User($db);
        $user1 = $user->find('name', 'admin');

        $this->assertTrue(is_object($user1));

    }

    public function testGetAll()
    {

        $app = new App();
        $db = $app->getDb();

        $user = new User($db);
        $user1 = $user->getAll('name');

        $this->assertTrue(is_array(current($user1)));

    }

    public function testUsers()
    {

        $app = new App();
        $db = $app->getDb();

        $users = new Users($db);
        $user1 = $users->getUsers('name');

        $this->assertTrue(is_object((current($user1))));

    }
}