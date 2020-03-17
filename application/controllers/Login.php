<?php

class Login extends CI_Controller 
{
  public function index()
  {
    $this->load->view('user/templates/header');
    $this->load->view('user/akun/login_user');
    $this->load->view('user/templates/footer');
  }
}
