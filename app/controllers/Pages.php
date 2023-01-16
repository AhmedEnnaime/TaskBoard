<?php
class Pages extends Controller
{
  public $userModel;

  public function __construct()
  {
    $this->userModel = $this->model("User");
  }

  public function index()
  {
    $user = $this->userModel->getLoggedUserInfo();
    $data = [
      'user' => $user,
    ];
    $this->view('home', $data);
  }
}
