<?php


namespace beejeetest\Controllers;


use beejeetest\App;
use beejeetest\Services\Authorize;
use beejeetest\View;
use http\Header;

class AuthorizedController extends BaseController
{

    public function checkAuth()
    {
        $check = Authorize::check(($this->app->getConfig())['sole']);
        if (!$check) {
            header("Location:/auth");
            exit();
        }
    }

    public function fetch()
    {

    }

    public function fetchAll()
    {
        $this->checkAuth();
        $this->fetch();
    }

}