<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

    public function model_auth() {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        //Cek TB PEGAWAI
        // $querys = $this->dbsimpeg->query("select status_profesi from tb_pegawai where nip='".$username."'");
        // foreach ($querys->result() as $row);
        //           $status_profesi = $row->status_profesi;
        // if($status_profesi==2 || $status_profesi==0){
            $this->db->select('a.nip,a.password,a.user_level,a.id_kat_dosen,b.nama_peg');
            $this->db->from('uinar_elkd.profil_dosen a');
            $this->db->join('uinar_simpeg.tb_pegawai b', 'a.nip = b.nip', 'left');
            $this->db->where('a.nip', $username);
            $this->db->where('a.password', md5($password));
            $query = $this->db->get()->row();
        //var_dump($query);
              if ($query) {
                  //GET ACL
                  $qAcl = $this->db->where('nip',$username)->get('profil_dosen')->row();
                          if($qAcl){
                                    $acl  = array('username'=>$qAcl->nip);
                                    $sess = array(
                                                    'nipp' => $query->nip,
                                                    'username' => $query->nama_peg,
                                                    'user_level' => $query->user_level,
                                                    'kat_dosen' => $query->id_kat_dosen,
                                                    'is_login' => TRUE
                                                  );
                                    $this->session->set_userdata($sess);
                                    $msg = 'success';

                          }else {
                              $msg = 'error';
                          }
              } else {
                  $msg = 'error';
              }

        // }else{
        //     $msg = 1;
        //     echo "<h2>Maaf status anda bukan Dosen</h2>";
        //
        // }

        $this->db->close();
        return $msg;
    }

}
