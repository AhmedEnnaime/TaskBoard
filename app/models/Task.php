<?php

class Task extends Model
{

    protected $table = "tasks";

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {

        try {
            $query = "INSERT INTO " . $this->table . " (title,members_num,deadline,workspace_id,section) VALUES (:title,:members_num,:deadline,:workspace_id,:section)";
            $this->db->query($query);

            // bind values
            $this->db->bind(":title", $data["title"]);
            $this->db->bind(":members_num", $data["members_num"]);
            $this->db->bind(":deadline", $data["deadline"]);
            $this->db->bind(":workspace_id", $data["workspace_id"]);
            $this->db->bind(":section", $data["section"]);

            if ($this->db->execute()) {
                $this->db->query("SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 1");
                $row = $this->db->single();
                if (!$this->db->execute())
                    return false;
                for ($i = 0; $i < $data["members_num"]; $i++) {
                    $this->db->query("INSERT INTO members (name,task_id) VALUES(:name,:task_id)");
                    $this->db->bind(":name", $data["name"][$i]);
                    $this->db->bind(":task_id", $row->id);
                    $this->db->execute();
                }
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTasks()
    {
        return $this->getTable();
    }

    public function getTaskById($id)
    {
        return $this->getElementById($id);
    }

    public function deleteTask($id)
    {
        return $this->delete($id);
    }

    public function getTasksByWorkspace($id)
    {
        try {
            $this->db->query("SELECT * FROM " . $this->table . " WHERE workspace_id = :workspace_id");
            $this->db->bind(":workspace_id", $id);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getToDoTasks()
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE section = 'ToDo'";
            $this->db->query($query);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDoingTasks()
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE section = 'Doing'";
            $this->db->query($query);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDoneTasks()
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE section = 'Done'";
            $this->db->query($query);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateWorkspace($id)
    {
    }
}
