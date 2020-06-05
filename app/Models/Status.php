<?php


namespace beejeetest\Models;

use beejeetest\Services\Db;

class Status
{
    use DbOps;
    private $db;
    private $table = 'statuses';
    public $id;
    public $name;

    /**
     * Status constructor.
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }


}