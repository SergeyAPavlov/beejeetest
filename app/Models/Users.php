<?php


namespace beejeetest\Models;


use beejeetest\Services\Db;

class Users
{
    use DbOps;
    private $db;
    private $table = 'users';

    /**
     * User constructor.
     * @param $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getUsers($order = null)
    {
        $results = $this->getAll($order);
        $users = [];
        if (is_array($results)) foreach ($results as $result) {
            $user = new User($this->db);
            $users[] = $user->cast($result);
        }
        return $users;
    }
}