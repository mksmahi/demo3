<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('session');
	 }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function practice()
	{
		echo $this->session->has_userdata('s_email')." email: ".$this->session->userdata('s_email')."<br>";
		echo $this->session->has_userdata('s_role')." role: ".$this->session->userdata('s_role')."<br>";
		echo $this->session->has_userdata('s_state_name')." state: ".$this->session->userdata('s_state_name')."<br>";
		echo $this->session->has_userdata('s_district_name')." district: ".$this->session->userdata('s_district_name')."<br>";
		echo $this->session->has_userdata('s_block_name')." block: ".$this->session->userdata('s_block_name')."<br>";
		echo $this->session->has_userdata('s_grampanchayat_name')." Grampanchayat: ".$this->session->userdata('s_grampanchayat_name')."<br>";
		echo $this->session->has_userdata('deepak kumar')."de";
	}
}
