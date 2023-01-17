<?php

class Tasks extends Controller
{

    public $taskModel;

    public function __construct()
    {
        $this->taskModel = $this->model("Task");
    }

    public function index()
    {
        $this->view("tasks");
    }
}
