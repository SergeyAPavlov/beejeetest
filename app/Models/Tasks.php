<?php


namespace beejeetest\Models;

use beejeetest\Services\Db;

class Tasks
{
    use DbOps;
    private $db;
    private $table = 'tasks';
    private $addTable = 'statuses';
    public $id;

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
        $query = "SELECT t1.id as id, username, email, text, name as status, edited
                    FROM $this->table as t1
                    LEFT JOIN $this->addTable as t2 
                    ON t1.status_id = t2.id                    
                    $orderBy $limit";
        $result = $this->db->query(
            $query
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

    public function addTask($task)
    {
        $task = (object)$task;
        foreach ($task as $key=>$item) {
            $task->$key = mysqli_real_escape_string($this->db->getDb(), $item);
        }
        $query = "INSERT INTO $this->table (`username`, `email`, `text`, `status_id`) VALUES ('$task->username', '$task->email', '$task->text', 1)";
        $result = $this->db->query($query);
        return $this->db->getAffected();
    }

    public function updateTask($task)
    {
        $task = (object)$task;
        if (empty($task->id)) return false;

        foreach ($task as $key=>$item) {
            if (!is_object($item)) $task->$key = mysqli_real_escape_string($this->db->getDb(), $item);
        }

        $query = "UPDATE `$this->table` SET `username`='$task->username', `email`='$task->email', `text`='$task->text', `status_id`=$task->status_id, `edited`=$task->edited WHERE `$this->table`.`id` = $task->id";
        $result = $this->db->query($query);
        return $result;
    }

}