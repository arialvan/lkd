<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');
    }
	
    public function index()
    {
        $this->load->view('pages/login');
    }
    
    public function login_auth() {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
//        $this->session->set_flashdata('pesan', 'This is my message');
        // After that you need to used redirect function instead of load view such as 
        
        if( empty($username) || empty($password) ){ // Username atau Password 
            redirect("Login?msg=1");
        }else { 
            $respone = $this->M_login->model_auth();
            
            if( $respone == 'success'){ 
                redirect(base_url().'Pegawai');
            }else { 
                redirect(base_url().'Login?msg='.$respone);
            }
        }
      
    }
    
    public function logout(){ 
        $dSession = array(
                        'username', 
                        'is_login'
                        );
        $this->session->unset_userdata($dSession);
        redirect('Login?msg=logout');
    }
}



