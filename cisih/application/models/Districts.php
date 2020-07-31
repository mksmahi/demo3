<?php
defined('BASEPATH') OR exit("direct script access not allowed");

/**
 *
 */
class Districts extends CI_Model
{

  function __construct()
  {
    // code...
    parent:: __construct();
    $this->load->database();
  }

  public function display($state, $district)
  {
    $this->db->select('scheme, allocated_funds, allocation_date, used_funds');
    $this->db->where("state_name", $state);
    $this->db->where('district_name', $district);
    $this->db->from('districts');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


}


?>
