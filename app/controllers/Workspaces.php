<?php

class Workspaces extends Controller
{

    public $userModel;
    public $workspaceModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
        $this->workspaceModel = $this->model("Workspace");
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->userModel->getLoggedUserInfo();
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'user_id' => $user->id,
                'img' => $_FILES['img']['name'],
                'title_err' => '',
                'description_err' => '',
                'img_err' => '',
            ];


            // Validation Form

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter your description';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please enter your image';
            }

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['img_err'])) {
                if ($this->workspaceModel->add($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './img/uploads/workspaces/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    redirect("pages");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('home', $data);
            }
        } else {
            $data = [
                'title' => '',
                'description' => '',
                'user_id' => '',
                'img' => '',
                'title_err' => '',
                'description_err' => '',
                'img_err' => '',
            ];
            $this->view('home');
        }
    }

    public function delete($id)
    {
        if ($this->workspaceModel->deleteWorkspace($id)) {
            redirect("pages");
        } else {
            die("Something went wrong");
        }
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->userModel->getLoggedUserInfo();
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'user_id' => $user->id,
                'img' => $_FILES['img']['name'],
                'title_err' => '',
                'img_err' => '',
            ];


            // Validation Form

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please enter your image';
            }

            if (empty($data['title_err']) && empty($data['img_err'])) {
                if ($this->workspaceModel->update($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './img/uploads/workspaces/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    redirect("pages");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('home', $data);
            }
        } else {
            $workspace = $this->workspaceModel->getWorkspaceById($id);
            $data = [
                'id' => $id,
                'title' => $workspace->title,
                'description' => $workspace->description,
                'user_id' => $workspace->user_id,
                'img' => $workspace->img,
                'title_err' => '',
                'description_err' => '',
                'img_err' => '',
            ];
            $this->view('home', $data);
        }
    }
}
