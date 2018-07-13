<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model {

    function __construct() {
        parent::__construct();
        // $this->dbm = $this->load->database('db2',TRUE);
        
    }

    public function model_auth() {
        // grab user input

        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));

        // Prep the query
        $this->db->where(array('username' => $username, 'password' => md5($password)));
        $query = $this->db->get('tb_admin')->row();

        if ($query) {
            
            //GET ACL
            $qAcl = $this->db->where('username',$username)->get('tb_admin')->row();
            if($qAcl){
            $acl  = array('username'=>$qAcl->username);
            $sess = array(
                'username' => $query->username,
                'is_login' => TRUE
            );

            $this->session->set_userdata($sess);
            $msg = 'success';
            }else { 
                $msg = 2;
            }
        } else {
            $msg = 1;
        }
        $this->db->close();
        // If the previous process did not validate
        // then return false.
        return $msg;
    }

}
