<?php


namespace beejeetest\Models;
use beejeetest\Models\Castable;

trait DbOps
{
    use Castable;

    public function load($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        if (empty($this->id)) {
            return null;
        }
        $result = $this->db->query("SELECT * FROM $this->table WHERE id=$this->id");
        if ($result) {
            $row = $result->fetch_assoc();
            $result->close();
            $this->cast($row);
            return $this;
        } else {
            return null;
        }
    }

    public function find($field, $value)
    {
        if (empty($field)) {
            return null;
        }
        $result = $this->db->query("SELECT * FROM $this->table WHERE `$field`='$value'");
        if ($result) {
            $row = $result->fetch_assoc();
            $result->close();
            $this->cast($row);
            return $this;
        } else {
            return null;
        }
    }

    public function getAll($order = null)
    {

        $orderBy = (empty($order) ? '' : 'ORDER BY ' . $order);
        $rows = [];
        $result = $this->db->query("SELECT * FROM $this->table $orderBy");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row ;
            }
            $result->close();
        } else {
            return null;
        }
        return $rows;
    }

}