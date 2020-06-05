<?php


namespace beejeetest;


class Config
{
    public static function get()
    {
        $config = ['host'=>'localhost', 'user'=>'beejeetest', 'password'=>'beejeetest', 'name'=>'beejeetest'];
        return $config;
    }
}