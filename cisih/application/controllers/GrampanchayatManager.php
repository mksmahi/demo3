<?php
defined('BASEPATH') OR exit("direct script access not allowed");
/**
 *
 */
class GrampanchayatManager extends CI_Controller
{

  public function __construct()
  {
    parent:: __construct();
    $this->load->model('Grampanchayats');
    //check session
		if( !($this->session->userdata('s_email') != NULL AND $this->session->userdata('s_role') != NULL AND $this->session->userdata('s_state_name') != NULL AND $this->session->userdata('s_district_name') != NULL AND $this->session->userdata('s_block_name') != NULL AND $this->session->userdata('s_grampanchayat_name') != NULL))
		{
			redirect('auth/index');
		}
  }

  public function index()
  {
    $state= $this->session->userdata('s_state_name');
    $district = $this->session->userdata('s_district_name');
    $block = $this->session->userdata('s_block_name');
    $grampanchayat = $this->session->userdata('s_grampanchayat_name');

    $data = array();
    $data['page_title'] = 'Home: Grampanchayat Manager';
    $data['state'] = $grampanchayat;
    $data['role'] = 'Grampanchayat Manager';
    $data['managing'] = '';

    $data['db_data'] = $this->Grampanchayats->display($state, $district, $block, $grampanchayat);

    //load views
    $this->load->view('inc/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('inc/footer', $data);
  }
}

 ?>
