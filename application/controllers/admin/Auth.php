<?php
// controller yang akan menangani authentication (login) 
class Auth extends CI_Controller 
{
  // method logout yang dijalankan untuk menghancurkan session
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin/auth/login');
  }

  // method login yang dijalankan ketika hendak login
  public function login()
  {
    // jika sudah login, diarahkan ke dashboard
    if ($this->session->userdata('role_id') != '') {
      redirect('admin/');
    }
    // form validation
    $this->form_validation->set_rules('username', ' Username', 'required', [
      'required' => 'Username Wajib diisi!!'
    ]);
    $this->form_validation->set_rules('password', ' Password', 'required');

    // jika validation salah kembali ke login
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header');
      $this->load->view('admin/auth/login');
      $this->load->view('admin/templates/footer');
    }else{
      // jika benar, lanjut ke pengecekan database
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $auth = $this->model_auth->cek_login($username, $password);

      // jika data yang dimasukkan tidak ada dalam database, munculkan pesan
      if ($auth == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          Username atau Password Anda Salah.
        </div>');
        redirect('admin/auth/login');
      }else{
        // jika benar masuk ke dashboard dan buat session
        $this->session->set_userdata('username', $auth->username);
        $this->session->set_userdata('role_id', $auth->role_id);

        redirect('admin/dashboard');
      }
    }
  }
}
