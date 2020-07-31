<?php
//defined('BASEPATH') OR exit("direct script access not allowed");

class StateManager extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	//	$this->load->database();
		$this->load->model('States');

		//check session
		if( !($this->session->userdata('s_email') != NULL AND $this->session->userdata('s_role') != NULL AND $this->session->userdata('s_state_name') != NULL AND $this->session->userdata('s_district_name') == NULL AND $this->session->userdata('s_block_name') == NULL AND $this->session->userdata('s_grampanchayat_name') == NULL))
		{
			redirect('auth/index');
		}
}


	//this function loads state's all data

	public function index()
	{

		$state = $this->session->userdata('s_state_name');
		$data = array();
		$data['page_title'] = 'Home: State Manager';
		$data['state'] = $state;
		$data['role'] = 'State Manager';
		$data['managing'] = 'District Managers';

		//get data from model
		$data['db_data'] = $this->States->display($state);
		$this->load->view('inc/header', $data);
		$this->load->view('pages/home', $data);
		$this->load->view('inc/footer');
	}

}
?>
