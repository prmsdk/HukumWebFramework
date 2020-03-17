<?php

class Home extends CI_Controller 
{
  public function index()
  {
    $this->load->view('user/templates/header');
    $this->load->view('user/index');
    $this->load->view('user/templates/footer');
  }
}
