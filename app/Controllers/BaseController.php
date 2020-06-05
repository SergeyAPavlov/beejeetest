<?php


namespace beejeetest\Controllers;


use beejeetest\App;
use beejeetest\View;

abstract class BaseController implements Controller
{
    protected $app;
    protected $db;
    protected $view;


    /**
     * BaseController constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->db = $this->app->getDb();
        $this->view = new View($this->app);
    }


    public function fetch()
    {

    }

    public function fetchAll()
    {
        return $this->fetch();
    }


}