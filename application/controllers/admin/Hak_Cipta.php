<?php

class Hak_Cipta extends CI_Controller 
{

  
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_hakcipta');
    $this->load->library('primslib');
  }

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

  public function save()
  {
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
    
    $npwp = null;
    if ($_FILES['npwp']['name'] != null) {
      $npwp = $_FILES['npwp']['name'];
      $npwp = $this->primslib->upload_file('npwp', $npwp, 'jpg|pdf', '1024');
    }

    $ktp = null;
    if ($_FILES['ktp']['name'] != null) {
      $ktp = $_FILES['ktp']['name'];
      $ktp = $this->primslib->upload_file('ktp', $ktp, 'jpg', '512');
    }

    $npwp_prs = null;
    if ($_FILES['npwp_prs']['name'] != null) {
      $npwp_prs = $_FILES['npwp_prs']['name'];
      $npwp_prs = $this->primslib->upload_file('npwp_prs', $npwp_prs, 'jpg|pdf', '1024');
    }

    $akta_prs = null;
    if ($_FILES['akta_prs']['name'] != null) {
      $akta_prs = $_FILES['akta_prs']['name'];
      $akta_prs = $this->primslib->upload_file('akta_prs', $akta_prs, 'jpg|pdf', '1024');
    }

    // DATA DIRI

    $surat_kuasa = null;
    if ($_FILES['surat_kuasa']['name'] != null) {
      $surat_kuasa = $_FILES['surat_kuasa']['name'];
      $surat_kuasa = $this->primslib->upload_file('surat_kuasa', $surat_kuasa, 'jpg|pdf', '1024');
    }

    $surat_pernyataan = null;
    if ($_FILES['surat_pernyataan']['name'] != null) {
      $surat_pernyataan = $_FILES['surat_pernyataan']['name'];
      $surat_pernyataan = $this->primslib->upload_file('surat_pernyataan', $surat_pernyataan, 'jpg|pdf', '1024');
    }

    $surat_hak_pengalihan = null;
    if ($_FILES['surat_hak_pengalihan']['name'] != null) {
      $surat_hak_pengalihan = $_FILES['surat_hak_pengalihan']['name'];
      $surat_hak_pengalihan = $this->primslib->upload_file('surat_hak_pengalihan', $surat_hak_pengalihan, 'jpg|pdf', '1024');
    }

    $file_ciptaan = null;
    if ($_FILES['file_ciptaan']['name'] != null) {
      $file_ciptaan = $_FILES['file_ciptaan']['name'];
      $file_ciptaan = $this->primslib->upload_file('file_ciptaan', $file_ciptaan, 'jpg|pdf|zip', '20480');
    }

    // =================== UPLOAD FILE ====================

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

    $this->model_hakcipta->insert($data, 'hak_cipta');
    redirect('admin/hak_cipta');
  }
  // =================== SAVE ====================

  public function delete($id)
  {
    $where = array('id' => $id);
    $this->model_hakcipta->delete($where, 'hak_cipta');
    redirect('admin/hak_cipta/');
  }
  // =================== DELETE ====================

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

    $this->model_hakcipta->update($where, $data, 'hak_cipta');
    redirect('admin/hak_cipta/edit/' . $id);
  }
  // =================== UPDATE INTI ====================

  public function update_file($file)
  {
    $updated_at = date('Y-m-d H:i:s');
    $npwp = $_FILES[$file]['name'];
    $npwp = $this->primslib->upload_file($file, $npwp, 'jpg|pdf|zip', '20240');
    $id = $this->input->post('id');

    $where= array('id' => $id);
    $data = array(
      $file => $npwp,
      'updated_at' => $updated_at
    );

    $this->model_hakcipta->update($where, $data, 'hak_cipta');
    redirect('admin/hak_cipta/edit/' . $id);
  }
  // =================== UPDATE FILE ====================

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
    redirect('admin/hak_cipta/edit/' . $id);
  }

  // =================== UPDATE COUNTRY ====================

  public function download($folder, $name)
  {
    force_download("./assets/files/$folder/$name", NULL);
  }
}
