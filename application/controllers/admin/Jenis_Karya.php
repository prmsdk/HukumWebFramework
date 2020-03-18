<?php
// controller yang berfungsi untuk mengurus segala hal pada jenis karya
class Jenis_Karya extends CI_Controller 
{
  // method yang dijalankan otomatis ketika controller diakses
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_karya');
    if ($this->session->userdata('role_id') == '') {
      redirect('admin/auth/login/');
    }
  }

  // method yang dijalankan ketika hanya mengakses controller tanpa method, menampilkan tabel jenis karya
  public function index()
  {
    $data['jenis_karya'] = $this->model_karya->getAll()->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jenis_karya/index', $data);
    $this->load->view('admin/templates/footer');
  }

  // method yang berfungsi menampilkan fungsi edit berdasarkan id
  public function edit($id)
  {
    $where = array('id' => $id);
    $data['jenis_karya'] = $this->model_karya->getEdit($where, 'jenis_karya')->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jenis_karya/edit', $data);
    $this->load->view('admin/templates/footer');
  }

  // method yang berfungsi untuk menyimpan data baru
  public function save()
  {
    // generate autonumber
    $old_id = $this->model_karya->getId()->row();

    $row_id = $this->model_karya->getId()->num_rows();
    if($row_id>0){
    $id = $this->primslib->autonumber($old_id->id, 3, 12);
    }else{
    $id = 'KRY000000000001';
    }

    // membuat created by dan created at
    $created_by = "prmsdk";
    $created_at = date('Y-m-d H:i:s');

    // merekam data array yang diinputkan
    $data = array(
      'id' => $id,
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan', true),
      'contoh_file' => $this->input->post('contoh_file', true),
      'format_file' => $this->input->post('format_file', true),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan method insert pada model_karya
    $this->model_karya->insert($data, 'jenis_karya');

    // pesan berhasil menambahkan data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Selamat!</strong> Anda berhasil menambahkan data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/jenis_karya');
  }

  // method yang berfungsi menghapus data
  public function delete($id)
  {
    // deklarasi $where by id
    $where = array('id' => $id);
    // menjalankan fungsi delete pada model_karya
    $this->model_karya->delete($where, 'jenis_karya');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/jenis_karya');
  }

  // method yang berfungsi untuk melakukan update data
  public function update()
  {
    $updated_by = "prmsdk";
    $updated_at = date('Y-m-d H:i:s');

    // merekam data dalam array
    $data = array(
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan', true),
      'contoh_file' => $this->input->post('contoh_file', true),
      'format_file' => $this->input->post('format_file', true),
      'updated_by' => $updated_by,
      'updated_at' => $updated_at
    );

    // deklarasi $where by id
    $where = array('id' => $this->input->post('id'));

    // menjalankan method update pada model karya
    $this->model_karya->update($where, $data, 'jenis_karya');

    // mengirim pesan berhasil update data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/jenis_karya');
  }
}
