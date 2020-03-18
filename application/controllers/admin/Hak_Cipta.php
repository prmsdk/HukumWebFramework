<?php

// Controller Hak Cipta yang berarti controller yang mengurus upload, pendaftaran dan persetujuan hak cipta
class Hak_Cipta extends CI_Controller 
{

  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_hakcipta');
    $this->load->library('primslib');
    if ($this->session->userdata('role_id') == '') {
      redirect('admin/auth/login/');
    }
  }

  // method default yang akan dijalankan pertama kali jika menuliskan nama controller pada link
  // berfungsi menampilkan data hakcipta ke dalam tabel
  public function index()
  {
    $data['country'] = $this->load->view('admin/templates/country', NULL, TRUE);
    $data['user'] = $this->model_hakcipta->getAll('user')->result();
    $data['jenis_karya'] = $this->model_hakcipta->getAll('jenis_karya')->result();
    $data['hak_cipta'] = $this->model_hakcipta->getAll('hak_cipta')->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/hak_cipta/index', $data);
    $this->load->view('admin/templates/footer');
  }
  // =================== INDEX ====================

  // method yang akan menampilkan halaman edit berdasarkan id
  public function edit($id)
  {
    $where = array('id' => $id);
    $data['country'] = $this->load->view('admin/templates/country', NULL, TRUE);
    $data['user'] = $this->model_hakcipta->getAll('user')->result();
    $data['jenis_karya'] = $this->model_hakcipta->getAll('jenis_karya')->result();
    $data['hak_cipta'] = $this->model_hakcipta->getEdit($where, 'hak_cipta')->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/hak_cipta/edit', $data);
    $this->load->view('admin/templates/footer');
  }

  // =================== EDIT ====================

  // method yang berfungsi untuk insert data baru
  public function save()
  {
    // code yang berfungsi untuk generate auto number, dengan menggunakan sebuah method pada library PrimsLib
    $old_id = $this->model_hakcipta->getId()->row();
    $row_id = $this->model_hakcipta->getId()->num_rows();

    if($row_id>0){
    $id = $this->primslib->autonumber($old_id->id, 3, 12);
    }else{
    $id = 'HCT000000000001';
    }
    // =================== AUTONUMBER ====================

    $status_trs = $this->input->post('status_trs');
    $created_at = date('Y-m-d H:i:s');

    if ($status_trs == 'DISETUJUI') {
      $approved_at = date('Y-m-d H:i:s');
    }else{
      $approved_at = null;
    }
    
    // code dibawah ini berfungsi untuk mengunggah file dengan method yang berasal dari library PrimsLib
    $npwp = null;
    if ($_FILES['npwp']['name'] != null) {
      $npwp = $_FILES['npwp']['name'];
      $npwp = $this->primslib->upload_file('npwp', $npwp, 'jpg|jpeg|pdf', '1024');
    }

    $ktp = null;
    if ($_FILES['ktp']['name'] != null) {
      $ktp = $_FILES['ktp']['name'];
      $ktp = $this->primslib->upload_file('ktp', $ktp, 'jpg|jpeg', '512');
    }

    $npwp_prs = null;
    if ($_FILES['npwp_prs']['name'] != null) {
      $npwp_prs = $_FILES['npwp_prs']['name'];
      $npwp_prs = $this->primslib->upload_file('npwp_prs', $npwp_prs, 'jpg|jpeg|pdf', '1024');
    }

    $akta_prs = null;
    if ($_FILES['akta_prs']['name'] != null) {
      $akta_prs = $_FILES['akta_prs']['name'];
      $akta_prs = $this->primslib->upload_file('akta_prs', $akta_prs, 'jpg|jpeg|pdf', '1024');
    }

    // DATA DIRI

    $surat_kuasa = null;
    if ($_FILES['surat_kuasa']['name'] != null) {
      $surat_kuasa = $_FILES['surat_kuasa']['name'];
      $surat_kuasa = $this->primslib->upload_file('surat_kuasa', $surat_kuasa, 'jpg|jpeg|pdf', '1024');
    }

    $surat_pernyataan = null;
    if ($_FILES['surat_pernyataan']['name'] != null) {
      $surat_pernyataan = $_FILES['surat_pernyataan']['name'];
      $surat_pernyataan = $this->primslib->upload_file('surat_pernyataan', $surat_pernyataan, 'jpg|jpeg|pdf', '1024');
    }

    $surat_hak_pengalihan = null;
    if ($_FILES['surat_hak_pengalihan']['name'] != null) {
      $surat_hak_pengalihan = $_FILES['surat_hak_pengalihan']['name'];
      $surat_hak_pengalihan = $this->primslib->upload_file('surat_hak_pengalihan', $surat_hak_pengalihan, 'jpg|jpeg|pdf', '1024');
    }

    $file_ciptaan = null;
    if ($_FILES['file_ciptaan']['name'] != null) {
      $file_ciptaan = $_FILES['file_ciptaan']['name'];
      $file_ciptaan = $this->primslib->upload_file('file_ciptaan', $file_ciptaan, 'jpg|jpeg|pdf|zip', '20480');
    }

    // =================== UPLOAD FILE ====================

    // code untuk merekam semua inputan ke dalam array
    $data = array(
      'id' => $id,
      'id_user' => $this->input->post('id_user'),
      'id_jenis' => $this->input->post('id_jenis'),
      'judul' => $this->input->post('judul'),
      'uraian' => $this->input->post('uraian', TRUE),
      'nama_pencipta' => $this->input->post('nama_pencipta'),
      'kewarganegaraan' => $this->input->post('kewarganegaraan'),
      'alamat_pencipta' => $this->input->post('alamat_pencipta', TRUE),
      'npwp' => $npwp,
      'ktp' => $ktp,
      'npwp_prs' => $npwp_prs,
      'akta_prs' => $akta_prs,
      'surat_kuasa' => $surat_kuasa,
      'surat_pernyataan' => $surat_pernyataan,
      'surat_hak_pengalihan' => $surat_hak_pengalihan,
      'file_ciptaan' => $file_ciptaan,
      'status_trs' => $status_trs,
      'created_at' => $created_at,
      'approved_at' => $approved_at
    );

    // sintaks untuk insert data ke database menggunakan method insert() pada model_hakcipta
    $this->model_hakcipta->insert($data, 'hak_cipta');

    // sintaks untuk menampilkan pesan berhasil menambahkan data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Selamat!</strong> Anda berhasil menambahkan data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan halaman ke admin/hak_cipta
    redirect('admin/hak_cipta');
  }
  // =================== SAVE ====================

  // method yang berfungsi untuk menghapus data
  public function delete($id)
  {
    // deklarasi variabel $where untuk kebutuhan proses delete nantinya, array ini berisi id
    $where = array('id' => $id);
    // menjalankan method delete pada model_hakcipta
    $this->model_hakcipta->delete($where, 'hak_cipta');

    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/hak_cipta/');
  }
  // =================== DELETE ====================

  // method yang berfungsi untuk update data
  public function update()
  {
    $status_trs = $this->input->post('status_trs');
    $updated_at = date('Y-m-d H:i:s');
    $id = $this->input->post('id');

    if ($status_trs == 'DISETUJUI') {
      $approved_at = date('Y-m-d H:i:s');
    }else{
      $approved_at = null;
    }

    // deklarasi dan merekam data
    $where= array('id' => $id);
    $data = array(
      'id_user' => $this->input->post('id_user'),
      'id_jenis' => $this->input->post('id_jenis'),
      'judul' => $this->input->post('judul'),
      'uraian' => $this->input->post('uraian', TRUE),
      'nama_pencipta' => $this->input->post('nama_pencipta'),
      'kewarganegaraan' => $this->input->post('kewarganegaraan'),
      'alamat_pencipta' => $this->input->post('alamat_pencipta', TRUE),
      'status_trs' => $status_trs,
      'updated_at' => $updated_at,
      'approved_at' => $approved_at
    );

    // menjalankan method update pada model hakcipta
    $this->model_hakcipta->update($where, $data, 'hak_cipta');

    // pesan berhasil update pada web
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/hak_cipta/edit/' . $id);
  }
  // =================== UPDATE INTI ====================

  // method update file yang telah atau belum diupload
  public function update_file($file)
  {
    $updated_at = date('Y-m-d H:i:s');
    $npwp = $_FILES[$file]['name'];
    $npwp = $this->primslib->upload_file($file, $npwp, 'jpg|jpeg|pdf|zip', '20240');
    $id = $this->input->post('id');

    $where= array('id' => $id);
    $data = array(
      $file => $npwp,
      'updated_at' => $updated_at
    );

    $this->model_hakcipta->update($where, $data, 'hak_cipta');

    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/hak_cipta/edit/' . $id);
  }
  // =================== UPDATE FILE ====================

  // method untuk update kewarganegaraan
  public function update_country()
  {
    $updated_at = date('Y-m-d H:i:s');
    $id = $this->input->post('id');

    $where= array('id' => $id);
    $data = array(
      'kewarganegaraan' => $this->input->post('kewarganegaraan'),
      'updated_at' => $updated_at
    );

    $this->model_hakcipta->update($where, $data, 'hak_cipta');

    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('admin/hak_cipta/edit/' . $id);
  }

  // =================== UPDATE COUNTRY ====================

  // method untuk melakukan download file yg telah terupload
  public function download($folder, $name)
  {
    force_download("./assets/files/$folder/$name", NULL);
  }
}
