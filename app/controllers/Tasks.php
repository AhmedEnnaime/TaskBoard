<?php

class Tasks extends Controller
{

    public $taskModel;
    public $userModel;
    public $workspaceModel;

    public function __construct()
    {
        $this->taskModel = $this->model("Task");
        $this->userModel = $this->model("User");
        $this->workspaceModel = $this->model("Workspace");
    }

    public function index($id)
    {
        $user = $this->userModel->getLoggedUserInfo();
        $workspace = $this->workspaceModel->getWorkspaceById($id);
        $data = [
            'user' => $user,
            'workspace' => $workspace,
        ];
        $this->view("tasks", $data);
    }

    public function add($id)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $workspace = $this->workspaceModel->getWorkspaceById($id);
            $data = [
                'title' => trim($_POST['title']),
                'deadline' => trim($_POST['deadline']),
                'workspace_id' => $workspace->id,
                'members_num' => $_POST['members_num'],
                'section' => "ToDo",
                'name' => $_POST['name'],
                'title_err' => '',
                'deadline_err' => '',
                'members_num_err' => '',
            ];


            // Validation Form

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (empty($data['deadline'])) {
                $data['deadline_err'] = 'Please enter deadline';
            }

            if (empty($data['members_num'])) {
                $data['members_num_err'] = 'Please enter number of members';
            }

            if (empty($data['title_err']) && empty($data['deadline_err']) && empty($data['members_num_err'])) {

                if ($this->taskModel->add($data)) {
                    redirect("tasks");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('tasks', $data);
            }
        } else {
            $data = [
                'title' => '',
                'deadline' => '',
                'workspace_id' => '',
                'members_num' => '',
                'section' => '',
                'name' => '',
                'title_err' => '',
                'deadline_err' => '',
                'members_num_err' => '',
            ];
            $this->view('tasks');
        }
    }

    public function tasks()
    {
    }
}
