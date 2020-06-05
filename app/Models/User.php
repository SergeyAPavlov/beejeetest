<?php


namespace beejeetest\Models;

use beejeetest\Services\Db;

class User
{
    use DbOps;
    private $db;
    private $table = 'users';
    public $id;
    public $name;
    public $password;
    public $role;

    /**
     * User constructor.
     * @param $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }


}