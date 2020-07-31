<?php
defined('BASEPATH') OR exit("direct script access not allowed");
/**
 *
 */
class BlockManager extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Blocks');
    //check session
		if( !($this->session->userdata('s_email') != NULL AND $this->session->userdata('s_role') != NULL AND $this->session->userdata('s_state_name') != NULL AND $this->session->userdata('s_district_name') != NULL AND $this->session->userdata('s_block_name') != NULL AND $this->session->userdata('s_grampanchayat_name') == NULL))
		{
			redirect('auth/index');
		}
  }

  public function index()
  {
    $state = $this->session->userdata('s_state_name');
    $district = $this->session->userdata('s_district_name');;
    $block = $this->session->userdata('s_block_name');

    $data = array();
    $data['page_title'] = 'Home: Block Manager';
    $data['state'] = $block;
    $data['role'] = 'Block Manager';
    $data['managing'] = 'Gram Panchayat Managers';
    $data['db_data'] = $this->Blocks->display($state, $district, $block);

    //load the views
    $this->load->view('inc/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('inc/footer', $data);
  }
}

 ?>
