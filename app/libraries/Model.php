<?php

class Model
{
    protected $db;
    protected $table = "";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTable()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getRowsNum()
    {
        $this->db->query("SELECT COUNT(*) as total FROM $this->table");
        $row = $this->db->single();
        return $row;
    }

    public function getElementById($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id = :id");
        $this->db->bind(":id", $id);
        $row = $this->db->single();
        return $row;
    }

    public function delete($id)
    {
        try {
            $this->db->query("DELETE FROM $this->table WHERE id = :id");
            $this->db->bind(":id", $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
