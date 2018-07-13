<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function model_auth() {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        // Prep the query
        // $this->db->where(array('nip' => $username, 'password' => md5($password)));
        // $query = $this->db->get('tb_pegawai_profil')->row();
        $this->db->select('tb_pegawai_profil.nip,tb_pegawai_profil.password,tb_pegawai_profil.user_level,tb_pegawai.nama_peg');
        $this->db->from('tb_pegawai_profil');
        $this->db->join('tb_pegawai', 'tb_pegawai_profil.nip = tb_pegawai.nip', 'left');
        $this->db->where('tb_pegawai_profil.nip', $username);
        $this->db->where('tb_pegawai_profil.password', md5($password));
        $query = $this->db->get()->row();
        var_dump($query);
              if ($query) {
                  //GET ACL
                  $qAcl = $this->db->where('nip',$username)->get('tb_pegawai_profil')->row();
                          if($qAcl){
                                    $acl  = array('username'=>$qAcl->nip);
                                    $sess = array(
                                                    'nipp' => $query->nip,
                                                    'username' => $query->nama_peg,
                                                    'user_level' => $query->user_level,
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
        return $msg;
    }

}
