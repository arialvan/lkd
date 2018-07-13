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
        if( empty($username) || empty($password) ){ // Username atau Password
            redirect("Login?msg=1");
        }else {
            $respone = $this->M_login->model_auth();

            if( $respone == 'success'){
                redirect(base_url().'Dashboard');
            }else {
                redirect(base_url().'Login?msg='.$respone);
            }
        }

    }

    public function logout(){
        $dSession = array(
                        'username',
                        'user_level',
                        'is_login'
                        );
        $this->session->unset_userdata($dSession);
        redirect('Login?msg=logout');
    }
}
