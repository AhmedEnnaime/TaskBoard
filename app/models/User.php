<?php
require_once "../app/generate_jwt.php";

class User extends Model
{

    protected $table = "users";

    public $id;
    public $name;
    public $birthday;
    public $email;
    public $password;
    public $img;

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

            // sanitize
            $this->name = htmlspecialchars(strip_tags($data["name"]));
            $this->birthday = htmlspecialchars(strip_tags($data["birthday"]));
            $this->email = htmlspecialchars(strip_tags($data["email"]));
            $this->password = htmlspecialchars(strip_tags($data["password"]));
            $this->img = htmlspecialchars(strip_tags($data["img"]));

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
            $this->db->query("SELECT * FROM users WHERE email = :email");
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

    public function getLoggedUserInfo()
    {
        $auth = JWTGenerate::validate();
        try {
            $query = "SELECT * FROM users WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(":id", $auth);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
