<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_counting extends CI_Model{

   function __construct()
    {
        parent::__construct();
    }

// Count All Pegawai
    function all_pegawai(){
      $this->db->select("count(status_aktif) as totals ");
      $this->db->from('tb_pegawai');
      $this->db->where('status_aktif', 1);
      $result = $this->db->get()->result();
      return $result;
    }

// Count All PNS
    function all_pns(){
      $this->db->select("count(status_aktif) as PNS ");
      $this->db->from('tb_pegawai');
      $this->db->where('status_aktif', 1);
      $this->db->where('status_peg', 1);
      $this->db->where('status_profesi', 1);
      $result = $this->db->get()->result();
      return $result;
    }
// Count All Dosen
    function all_dosen(){
      $this->db->select("count(status_aktif) as Dosen ");
      $this->db->from('tb_pegawai');
      $this->db->where('status_aktif', 1);
      $this->db->where('status_peg', 1);
      $this->db->where('status_profesi', 2);
      $result = $this->db->get()->result();
      return $result;
    }
// Count All Pegawai Kontrak
    function all_kontrak(){
      $this->db->select("count(status_aktif) as Kontrak ");
      $this->db->from('tb_pegawai');
      $this->db->where('status_aktif', 1);
      $this->db->where('status_peg', 2);
      $this->db->where('status_profesi', 4);
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function all_unit(){
      $this->db->select("count(id_unit) as Unit ");
      $this->db->from('tb_unit');
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function all_unitkerja(){
      $this->db->select("count(id_unit_kerja) as UnitKerja ");
      $this->db->from('tb_unit_kerja');
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function bar_unit(){
      $select = array(
                'tb_unit.unit_organisasi',
                'count(tb_pegawai_profil.id_unit) as Unit'
                );
      $result =$this->db
                ->select($select)
                ->from('tb_unit')
                ->join('tb_pegawai_profil','tb_pegawai_profil.id_unit = tb_unit.id_unit')
                ->group_by('tb_unit.id_unit')
                ->order_by('tb_unit.id_unit','ASC')
                ->get()
                ->result_array();
      return $result;
    }

}
