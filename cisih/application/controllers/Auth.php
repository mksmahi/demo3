<?php
defined("BASEPATH") OR exit("direct script access not allowed");
/**
 *
 */
class Auth extends CI_Controller
{

  function __construct()
  {
    parent:: __construct();
    $this->load->model('Auths');
    //check session
    if($this->session->userdata('s_email') != NULL AND $this->session->userdata('s_role') != NULL) 
    {
      if($this->session->userdata('role') == 'State Manager'){ redirect('statemanager/index'); }
      if($this->session->userdata('role') == 'District Manager'){ redirect('districtmanager/index'); }
      if($this->session->userdata('role') == 'Block Manager'){ redirect('blockmanager/index'); }
      if($this->session->userdata('role') == 'Grampanchayat Manager'){ redirect('grampanchayatmanager/index'); }
    }
  }

  //this function display login form
  public function index()
  {
    $this->load->view('auth/login');
  }

  //this function verify login details
  public function verify()
  {
    //get data from of
    //if(isset($this->input->post('submit')))

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $validate = $this->Auths->login_validate($email, $password);
      if($password == $validate->password)
      {
        $sessiondata = array('s_email' => $validate->email, 's_role' => $validate->role, 's_state_name' => $validate->state_name, 's_district_name' => $validate->district_name, 's_block_name' => $validate->block_name, 's_grampanchayat_name' => $validate->grampanchayat_name);
        $this->session->set_userdata($sessiondata);
         if($validate->role == 'State Manager')
         {
           redirect('statemanager/index');
         }
         if($validate->role == 'District Manager')
         {
           redirect ('districtmanager/index');
         }
         if($validate->role == 'Block Manager')
         {
           redirect('blockmanager/index');
         }
         if($validate->role == 'Grampanchayat Manager')
         {
           redirect('grampanchayatmanager/index');
         }
         else {
           echo "<script language='javascript'>";
           echo "alert('Role of This Manager is not specified yet. Contact your admin')";
           echo "</script>";
           redirect('auth/logout');
         }

      }
      else {
        echo "<script language='javascript'>";
        echo "alert('Invalid E-mail or password')";
        echo "</script>";
        redirect('auth/index');
      }

  }

  public function logout()
  {
    $sessiondata = array('s_email', 's_role', 's_state_name', 's_district_name', 's_block_name', 's_grampanchayat_name');
    $this->session->unset_userdata($sessiondata);
    echo "<script language='javascript'>";
    echo "alert('You are successfully logged out. Please Login again to continue')";
    echo "</script>";
    redirect('auth/index');
  }
}

 ?>
