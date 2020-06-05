<?php


namespace beejeetest\Services;


use mysqli;
use beejeetest\Services\Db;

class ServiceLocator
{
    public static function getDb($host, $user, $password, $name)
    {
        return new db($host, $user, $password, $name);
    }
}