<?php


namespace beejeetest;


use beejeetest\Services\ServiceLocator;

class App
{
    private $config;
    private $db;

    public $root;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $config = $this->config = Config::get();
        $this->db = ServiceLocator::getDb($config['host'], $config['user'], $config['password'], $config['name']);
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



}