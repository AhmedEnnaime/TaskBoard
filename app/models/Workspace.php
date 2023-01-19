<?php

class Workspace extends Model
{

    protected $table = "workspaces";

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        try {
            $query = "INSERT INTO " . $this->table . " (title,description,user_id,img) VALUES (:title,:description,:user_id,:img)";
            $this->db->query($query);

            // bind values
            $this->db->bind(":title", $data["title"]);
            $this->db->bind(":description", $data["description"]);
            $this->db->bind(":user_id", $data["user_id"]);
            $this->db->bind(":img", $data["img"]);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getWorkspaces()
    {
        try {
            $user = $this->LoggedInUser();
            $this->db->query("SELECT * FROM " . $this->table . " WHERE user_id = :user_id");
            $this->db->bind(":user_id", $user->id);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getWorkspaceById($id)
    {
        return $this->getElementById($id);
    }

    public function deleteWorkspace($id)
    {
        return $this->delete($id);
    }

    public function search($data)
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE title LIKE :title AND user_id = :user_id";
            $this->db->query($query);
            $this->db->bind(":title", $data["title"]);
            $this->db->bind(":user_id", $data["user_id"]);
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
