<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $this->view('home');
  }
}
