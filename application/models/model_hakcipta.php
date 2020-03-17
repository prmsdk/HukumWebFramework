<?php

class Model_HakCipta extends CI_Model
{
  public function getAll($table)
  {
    return $this->db->get($table);
  }

  public function getEdit($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function getId()
  {
    return $this->db->query("SELECT * FROM hak_cipta ORDER BY id DESC LIMIT 1");
  }

  public function insert($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function delete($where, $table)
  {
    $this->db->delete($table, $where);
  }

  public function update($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
