<?php


namespace beejeetest;


class Config
{
    public static function get()
    {
        $config = [
            'host'=>'localhost',
            'user'=>'beejeetest',
            'password'=>'beejeetest',
            'name'=>'beejeetest',
            'sole'=>'beejeetest'
        ];
        return $config;
    }
}