<?php

class Users extends Controller
{

    public $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    public function index()
    {
    }

    public function signup()
    {

        if (isLoggedIn()) {
            redirect("pages");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'img' => $_FILES['img']['name'],
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'img_err' => '',
            ];

            // Validation Form

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already taken';
                }
            }

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (empty($data['birthday'])) {
                $data['birthday_err'] = 'Please enter your birthday';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please enter your image';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if (empty($data['name_err']) && empty($data['birthday_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['img_err'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                if ($this->userModel->add($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './img/uploads/users/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    redirect("authenticate/login");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('signup', $data);
            }
        } else {
            $data = [
                'name' => '',
                'birthday' => '',
                'email' => '',
                'password' => '',
                'img' => '',
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'img_err' => '',
            ];
            $this->view('signup');
        }
    }

    public function profile($id)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'img' => $_FILES['img']['name'],
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];


            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (empty($data['birthday'])) {
                $data['birthday_err'] = 'Please enter your birthday';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }


            if (empty($data['name_err']) && empty($data['birthday_err']) && empty($data['email_err']) && empty($data['password_err'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                if ($this->userModel->update($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './img/uploads/users/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    redirect("pages");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('profile', $data);
            }
        } else {

            $user = $this->userModel->getLoggedUserInfo();
            $data = [
                "user" => $user,
            ];

            $this->view("profile", $data);
        }
    }
}
