<?php
/**
 *
 */
class Auths extends CI_Model
{

  function __construct()
  {
    parent:: __construct();
  }

  public function login_validate($email, $password)
  {

    $this->db->select();
    $this->db->where("email", $email);
    $this->db->from('managers');
    $query = $this->db->get();
    $result = $query->row();
    return $result;
  }
}

 ?>
