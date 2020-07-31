<?php
defined('BASEPATH') OR exit("direct script access not allowed");
/**
 *
 */
class States extends CI_Model
{

	function __construct()
	{
		// code...
		parent::__construct();
		$this->load->database();
	}

	public function display($state)
	{
		$this->db->select('scheme, allocated_funds, allocation_date, used_funds');
		$this->db->where('state_name', $state);
		$query = $this->db->get('states');
		$result = $query->result();
		return $result;
	}
}

 ?>
