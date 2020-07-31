<?php
defined('BASEPATH') OR exit("direct script access not allowed");
/**
 *
 */
class DistrictManager extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Districts");

    //check session
		if( !($this->session->userdata('s_email') != NULL AND $this->session->userdata('s_role') != NULL AND $this->session->userdata('s_state_name') != NULL AND $this->session->userdata('s_district_name') != NULL AND $this->session->userdata('s_block_name') == NULL AND $this->session->userdata('s_grampanchayat_name') == NULL))
		{
			redirect('auth/index');
		}
  }

  public function index()
  {
    $state = $this->session->userdata('s_state_name');
    $district = $this->session->userdata('s_district_name');

    $data = array();
    $data['page_title'] = 'Home: District Manager';
    $data['state'] = $district;
    $data['role'] = 'District Manager';
    $data['managing'] = 'Block Managers';

    //get data from model
    $data['db_data'] = $this->Districts->display($state, $district);

    //loading views
    $this->load->view('inc/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('inc/footer', $data);
  }
}

 ?>
