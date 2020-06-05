<?php


namespace beejeetest\Services;

class ServiceLocator
{
    public static function getDb($host, $user, $password, $name)
    {
        return new db($host, $user, $password, $name);
    }

    public static function getAuth()
    {
        return new Authorize();
    }
}