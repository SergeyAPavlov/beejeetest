<?php


namespace beejeetest\Controllers;


use beejeetest\App;
use beejeetest\Services\Authorize;
use beejeetest\View;
use http\Header;

abstract class AuthorizedController extends BaseController
{

    public function checkAuth()
    {
        $check = $this->app->getAuthorize()->check(($this->app->getSole()));
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