<?php
class M_riwayat extends CI_Model{
    
   function __construct()
    {
        parent::__construct();
    }

/* RIWAYAT PENDIDIKAN */
    function insert_riwayatpendidikan($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
    
/* RIWAYAT JABATAN */
    function insert_riwayatjabatan($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
    
/* RIWAYAT DIKLAT */
    function insert_riwayatdiklat($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }   

/* RIWAYAT SEMINAR */
    function insert_riwayatseminar($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
    
/*EDIT PEGAWAI*/
    function edit_pegawai($where,$table){	
        return $this->db->get_where($table,$where); 
    }
/*UPDATE PEGAWAI*/
    function update_pegawai($where,$data,$table){
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
	$this->db->where($where);
	$this->db->update($table,$data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }    
/*HAPUS DATA PEGAWAI*/
    function hapus_pegawai($where,$table){
        $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
	$this->db->where($where);
	$this->db->delete($table);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
    }
}