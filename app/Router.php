<?php

namespace beejeetest;

use beejeetest\Controllers\Controller;
use beejeetest\Controllers\LogoutController;
use beejeetest\Controllers\NoneController;
use beejeetest\Services\Authorize;
use beejeetest\Controllers\AuthController;

class Router
{
    public $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = [
            'g:/auth'=>AuthController::class,
            'a:/auth'=>AuthController::class,
            'g:/logout'=>LogoutController::class,
            'a:/logout'=>LogoutController::class,
        ];
    }


    public function getRoute($request, App $app)
    {
        $check = Authorize::check(($app->getSole()));
        $key = ($check ? 'a' : 'g') . ':' . $request['uri'];
        if (empty($this->routes[$key])) return new NoneController($app);
        $name = $this->routes[$key];
        return new $name($app);

    }


    public static function getRequest()
    {
        $request = ['get'=>$_GET, 'post'=>$_POST, 'uri'=>$_SERVER['REQUEST_URI']];
        if ($request['uri'] == '') $request['uri'] = '/';
        return $request;
    }

    public function get(App $app)
    {
        return $this->getRoute(self::getRequest(), $app);
    }

}