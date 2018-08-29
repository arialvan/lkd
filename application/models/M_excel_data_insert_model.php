<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_excel_data_insert_model extends CI_Model {

    public function  __construct() {
        parent::__construct();

    }

    public function Add_tbpegawai($data_user){
        $this->db->insert('tb_pegawai', $data_user);
    }

    public function Add_User($data_user){
        $this->db->insert('profil_dosen', $data_user);
    }

    public function Add_Profil_satu($data){
        $this->db->insert('tb_pegawai_profil', $data);
    }

    public function Add_Profil($data_user){
        $this->db->insert('tb_pegawai_profil', $data_user);
    }

    public function Add_Assesor($data_user){
        $this->db->insert('verifikator', $data_user);
    }

    function update_pegawai($where,$data,$table){
      	$this->db->where($where);
      	$this->db->update($table,$data);
    }

}

?>
