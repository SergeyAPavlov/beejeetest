<?php


namespace beejeetest\Controllers;


use beejeetest\App;
use beejeetest\View;

class BaseController
{
    protected $app;
    protected $db;
    protected $view;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->app = new App();
        $this->db = $this->app->getDb();
        $this->view = new View($this->app);
    }


    public function fetch()
    {

    }

    public function fetchAll()
    {

    }


}