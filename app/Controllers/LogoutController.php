<?php


namespace beejeetest\Controllers;


class LogoutController extends BaseController implements Controller
{
    public function fetch()
    {
        $this->app->getAuthorize()->removeAuth();
        header("Location:/auth");
        exit();
    }

}