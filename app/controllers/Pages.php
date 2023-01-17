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
