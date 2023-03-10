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
        $section = [
            "workspace_id" => $workspace->id,
        ];
        $TodoTasks = $this->taskModel->getToDoTasks($section);
        $DoingTasks = $this->taskModel->getDoingTasks($section);
        $DoneTasks = $this->taskModel->getDoneTasks($section);

        foreach ($TodoTasks as $todo) {
            $TodoTaskMembers = $this->taskModel->getTaskMembers($todo->id);
        }

        foreach ($DoingTasks as $doing) {
            $DoingTaskMembers = $this->taskModel->getTaskMembers($doing->id);
        }

        foreach ($DoneTasks as $done) {
            $DoneTaskMembers = $this->taskModel->getTaskMembers($done->id);
        }

        /*$TodoTaskMembers = [];
        $DoingTaskMembers = [];
        $DoneTaskMembers = [];
        
        foreach ($TodoTasks as $todo) {
            array_push($TodoTaskMembers, $this->taskModel->getTaskMembers($todo->id));
        }

        foreach ($DoingTasks as $doing) {
            array_push($DoingTaskMembers, $this->taskModel->getTaskMembers($doing->id));
        }

        foreach ($DoneTasks as $done) {
            array_push($DoneTaskMembers, $this->taskModel->getTaskMembers($done->id));
        }*/


        $data = [
            'user' => $user,
            'workspace' => $workspace,
            'ToDo' => $TodoTasks,
            'Doing' => $DoingTasks,
            'Done' => $DoneTasks,
            'TodoTaskMembers' => $TodoTaskMembers,
            'DoingTaskMembers' => $DoingTaskMembers,
            'DoneTaskMembers' => $DoneTaskMembers,
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
                    redirect("pages");
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

    public function delete($id)
    {
        if ($this->taskModel->deleteTask($id)) {
            redirect("pages");
        } else {
            die("Something went wrong");
        }
    }

    public function updateSection()
    {
        if ($this->taskModel->updateSection($_POST["id"], $_POST["section"])) {
            redirect("pages");
        } else {
            die("Something went wrong");
        }
    }

    public function updateTask()
    {
        if ($this->taskModel->updateTask($_POST["id"], $_POST["title"], $_POST["deadline"])) {
            redirect("pages");
        } else {
            die("Something went wrong");
        }
    }
}
