<?php


namespace beejeetest;


use beejeetest\Services\ServiceLocator;

class App
{
    private $config;
    private $db;
    private $authorize;
    private $router;

    public $root;


    /**
     * App constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $config = $this->config = Config::get();
        $this->db = ServiceLocator::getDb($config['host'], $config['user'], $config['password'], $config['name']);
        $this->authorize = ServiceLocator::getAuth();
        $this->router = $router;
        $this->root = __DIR__ ;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getSole()
    {
        return $this->config['sole'];
    }

    /**
     * @return Services\Authorize
     */
    public function getAuthorize()
    {
        return $this->authorize;
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }



}