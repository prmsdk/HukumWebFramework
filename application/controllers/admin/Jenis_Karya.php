<?php

class Jenis_Karya extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_karya');
  }

  public function index()
  {
    $data['jenis_karya'] = $this->model_karya->getAll()->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jenis_karya/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function edit($id)
  {
    $where = array('id' => $id);
    $data['jenis_karya'] = $this->model_karya->getEdit($where, 'jenis_karya')->result();

    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jenis_karya/edit', $data);
    $this->load->view('admin/templates/footer');
  }

  public function save()
  {
    $old_id = $this->model_karya->getId()->row();

    $row_id = $this->model_karya->getId()->num_rows();
    if($row_id>0){
    $id = $this->primslib->autonumber($old_id->id, 3, 12);
    }else{
    $id = 'KRY000000000001';
    }

    $created_by = "prmsdk";
    $created_at = date('Y-m-d H:i:s');

    $data = array(
      'id' => $id,
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan', true),
      'contoh_file' => $this->input->post('contoh_file', true),
      'format_file' => $this->input->post('format_file', true),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    $this->model_karya->insert($data, 'jenis_karya');
    redirect('admin/jenis_karya');
  }

  public function delete($id)
  {
    $where = array('id' => $id);
    $this->model_karya->delete($where, 'jenis_karya');
    redirect('admin/jenis_karya');
  }

  public function update()
  {
    $updated_by = "prmsdk";
    $updated_at = date('Y-m-d H:i:s');

    $data = array(
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan', true),
      'contoh_file' => $this->input->post('contoh_file', true),
      'format_file' => $this->input->post('format_file', true),
      'updated_by' => $updated_by,
      'updated_at' => $updated_at
    );

    $where = array('id' => $this->input->post('id'));

    $this->model_karya->update($where, $data, 'jenis_karya');
    redirect('admin/jenis_karya');
  }
}
