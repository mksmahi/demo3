<?php
defined('BASEPATH') OR exit("direct script access not allowed");
/**
 *
 */
class Grampanchayats extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function display($state, $district, $block, $grampanchayat)
  {
    $this->db->select('scheme, allocated_funds, allocation_date, used_funds');
    $this->db->where('state_name', $state);
    $this->db->where('district_name', $district);
    $this->db->where('block_name', $block);
    $this->db->where('grampanchayat_name', $grampanchayat);
    $this->db->from('grampanchayats');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
}

 ?>
