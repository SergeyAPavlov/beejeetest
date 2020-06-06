<?php


namespace beejeetest\Models;

use beejeetest\Services\Db;

class Tasks
{
    use DbOps;
    private $db;
    private $table = 'tasks';
    private $addTable = 'Statuses';
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

    public function getTasks($order = null, $limit = null)
    {
        $orderBy = (empty($order) ? '' : 'ORDER BY ' . $order);
        $rows = [];
        $result = $this->db->query(
            "SELECT username, email, text, name as status
                    FROM $this->table as t1
                    LEFT JOIN $this->addTable as t2 
                    ON t1.status_id = t2.id                    
                    $orderBy $limit"
        );
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row ;
            }
            $result->close();
        } else {
            return null;
        }

        $tasks = [];
        if (is_array($rows)) foreach ($rows as $row) {
            $tasks[] = $row;
        }
        return $tasks;
    }

    public function countTasks()
    {
        $result = $this->db->query(
            "SELECT COUNT(*)
                    FROM $this->table"
        );
        if ($result) {
            $row = $result->fetch_assoc();
            $result->close();
        } else {
            return null;
        }
        return current($row);
    }
}