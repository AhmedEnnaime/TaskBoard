<?php

class User extends Model
{

    protected $table = "users";

    public function __construct()
    {
        parent::__construct();
    }

    public function findUserByEmail($email)
    {
        try {
            $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();

            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function add($data)
    {
        try {
            $query = "INSERT INTO " . $this->table . " (name,birthday,email,password,img) VALUES (:name,:birthday,:email,:password,:img)";
            $this->db->query($query);

            // bind values
            $this->db->bind(":name", $data["name"]);
            $this->db->bind(":birthday", $data["birthday"]);
            $this->db->bind(":email", $data["email"]);
            $this->db->bind(":password", $data["password"]);
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

    public function login($email, $password)
    {
        try {
            $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update($data)
    {
        try {
            if (empty($data["img"])) {
                $query = "UPDATE " . $this->table . " SET name = :name,birthday = :birthday,email = :email,password = :password WHERE id = :id";
                $this->db->query($query);
                $this->db->bind(":id", $data["id"]);
                $this->db->bind(":name", $data["name"]);
                $this->db->bind(":birthday", $data["birthday"]);
                $this->db->bind(":email", $data["email"]);
                $this->db->bind(":password", $data["password"]);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $query = "UPDATE " . $this->table . " SET name = :name,birthday = :birthday,email = :email,password = :password,img = :img WHERE id = :id";
                $this->db->query($query);
                $this->db->bind(":id", $data["id"]);
                $this->db->bind(":name", $data["name"]);
                $this->db->bind(":birthday", $data["birthday"]);
                $this->db->bind(":email", $data["email"]);
                $this->db->bind(":password", $data["password"]);
                $this->db->bind(":img", $data["img"]);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLoggedUserInfo()
    {
        return $this->LoggedInUser();
    }
}
