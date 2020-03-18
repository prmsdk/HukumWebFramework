<?php
// controller yang akan dijalankan pertama kali ketika pada url base->admin
class Dashboard extends CI_Controller 
{
  // method yang dijalankan secara otomatis ketika pertama kali diakses
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role_id') == '') {
      redirect('admin/auth/login/');
    }
  }

  // method yang dijalankan ketika url admin/dashboard dijalankan
  public function index()
  {
    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('admin/templates/footer');
  }
}
