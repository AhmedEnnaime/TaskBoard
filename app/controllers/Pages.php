<?php
class Pages extends Controller
{
  public $userModel;
  public $workspaceModel;

  public function __construct()
  {
    $this->userModel = $this->model("User");
    $this->workspaceModel = $this->model("Workspace");
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //die("success");
      $user = $this->userModel->getLoggedUserInfo();
      $infos = [
        "title" => trim($_POST["title"]),
        "user_id" => $user->id,
      ];
      $workspaces = $this->workspaceModel->search($infos);
      if (!empty($infos["title"])) {

        $data = [
          "workspaces" => $workspaces,
          "user" => $user,
        ];
        $this->view("home", $data);
      } else {
        redirect("pages");
      }
    } else {
      $user = $this->userModel->getLoggedUserInfo();
      $workspaces = $this->workspaceModel->getWorkspaces();
      $data = [
        'user' => $user,
        'workspaces' => $workspaces,
      ];
      $this->view('home', $data);
      return $workspaces;
    }
  }
}
