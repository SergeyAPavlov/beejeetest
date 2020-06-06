<?php


namespace beejeetest\Services;
use mysqli;

class Db
{
    private $db;

    public function __construct($host, $user, $password, $name)
    {
        $this->db = new mysqli($host, $user, $password, $name);
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

    /**
     * @return mysqli
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getAffected()
    {
        return $this->db->affected_rows;
    }


}