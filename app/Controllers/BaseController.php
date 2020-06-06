<?php


namespace beejeetest\Controllers;


use beejeetest\App;
use beejeetest\Services\Authorize;
use beejeetest\View;

abstract class BaseController implements Controller
{
    protected $app;
    protected $db;
    protected $view;
    protected $request;


    /**
     * BaseController constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->db = $this->app->getDb();
        $this->view = new View($this->app);
        $this->request = $app->getRouter()->getRequest();
    }


    public function fetch()
    {
        return '';
    }

    public function fetchAll()
    {
        $vars['content'] = $this->fetch();
        $text = $this->view->prepare('main', $vars);
        echo  $text;

    }



}