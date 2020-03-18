<?php

class Model_Auth extends CI_Model 
{
  public function cek_login($user, $pass)
  {
    $username = $user;
    $password = $pass;

    $result = $this->db->where('username', $username)
    ->where('password', $password)
    ->limit(1)
    ->get('admin');

    if ($result->num_rows() > 0) {
      return $result->row();
    }else{
      return array();
    }
  }
}
