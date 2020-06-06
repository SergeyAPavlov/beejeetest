<?php

namespace beejeetest;

use beejeetest\Controllers\Controller;
use beejeetest\Controllers\LogoutController;
use beejeetest\Controllers\NoneController;
use beejeetest\Controllers\AuthController;
use beejeetest\Controllers\TasksController;

class Router
{
    public $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = [
            '/auth'=>AuthController::class,
            '/logout'=>LogoutController::class,
            '/'=>TasksController::class
        ];
    }


    public function getRoute($request, App $app)
    {

        $key =  $request['uri'];
        if (empty($this->routes[$key])) return new NoneController($app);
        $name = $this->routes[$key];
        return new $name($app);

    }


    public static function getRequest()
    {
        $uriArray = explode('?', $_SERVER['REQUEST_URI']);
        $uri = current($uriArray);
        if ($uri == '') $uri = '/';
        $request = ['get'=>$_GET, 'post'=>$_POST, 'uri'=>$uri, 'query'=>$_SERVER['QUERY_STRING']];

        return $request;
    }

    public function get(App $app)
    {
        return $this->getRoute(self::getRequest(), $app);
    }

}