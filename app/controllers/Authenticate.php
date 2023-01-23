<?php
require_once "../app/generate_jwt.php";
require_once 'vendor/autoload.php';

class Authenticate extends Controller
{
    public $jwt;
    public $token;
    public $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    public function index()
    {
    }

    public function login()
    {
        if (isLoggedIn()) {
            redirect("pages");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];


            // Validation Form

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }


            if (empty($data['email_err']) && empty($data['password_err'])) {

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                $userId = $loggedInUser->id;

                if ($loggedInUser) {
                    $jwt = new JWTGenerate();
                    $token = $jwt->generate($userId);
                    $cookie = setcookie("jwt", $token, 0, '/', '', false, true);
                    redirect("pages");
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('login', $data);
                }
            } else {
                $this->view('login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('login');
        }
    }

    public function validate_jwt()
    {
        if (JWTGenerate::validate()) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        if (isset($_COOKIE["jwt"])) {
            setcookie("jwt", $this->token, time() - 3600, '/', '', false, true);
            unset($_COOKIE["jwt"]);
            unset($_COOKIE);
            redirect("authenticate/login");
        } else {
            die("No token in the cookies");
        }
    }
}
