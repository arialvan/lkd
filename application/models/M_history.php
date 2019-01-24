<?php
class M_history extends CI_Model{


   function __construct()
    {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

//Admin Fakultas
function show_admin()
    {
      $this->db->select('a.nip,a.id_fakultas,b.nama_peg,c.nama_fakultas')
               ->from('uinar_lkd2.profil_dosen a')
               ->join('simpeg.tb_pegawai b','a.nip=b.nip','LEFT')
               ->join('uinar_lkd2.tbl_mst_fakultas c','a.id_fakultas = c.id_fakultas','LEFT')
               ->where('a.user_level=', 4)
               ->order_by('a.nip');
      $query = $this->db->get()->result();
      return $query;
    }
/*PERIODE*/
function show_periode()
{
    $this->db->select('*')
             ->from('periode_lkd')
             ->where('status!=', 1);
    $query = $this->db->get()->result();
    return $query;
}

function show_pendidikan($id,$uri)
{

  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 1)
                  ->where('a.nip=', $id)
                  ->where('a.id_periode', $uri);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penelitian($id,$uri)
{

  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 2)
                  ->where('a.nip=', $id)
                  ->where('a.id_periode', $uri);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_pengabdian($id,$uri)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 3)
                  ->where('a.nip=', $id)
                  ->where('a.id_periode', $uri);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penunjang($id,$uri)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 4)
                  ->where('a.nip=', $id)
                  ->where('a.id_periode', $uri);
  $query=$this->db->get()->result();
  return $query;
}

function show_rekap_asessor1(){
  $this->db->select('a.nip,a.id_periode,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.id_periode', 1);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor1_all($id_periode,$id_fak,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  $this->db->where('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor1_id($id_periode){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.id_periode', $id_periode);
  // $this->db->where('c.id_fakultas', $id_fak);
  // $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor1_fak($id_periode,$id_fak){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  // $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor1_kat($id_periode,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

// =======================================================================
// ASSESOR 2
// =======================================================================

function show_rekap_asessor2(){
  $this->db->select('a.nip,a.id_periode,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', 1);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor2_all($id_periode,$id_fak,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  $this->db->where('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor2_id($id_periode){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  // $this->db->where('c.id_fakultas', $id_fak);
  // $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor2_fak($id_periode,$id_fak){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  // $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor2_kat($id_periode,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

// ================================================================================
// ASSESOR 1 DAN 2
// ================================================================================

function show_rekap_asessor12(){
  $this->db->select('a.nip,a.id_periode,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', 1);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor12_all($id_periode,$id_fak,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  $this->db->where('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor12_id($id_periode){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor12_fak($id_periode,$id_fak){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->where('c.id_fakultas', $id_fak);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_asessor12_kat($id_periode,$id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,c.id_fakultas,e.nama_fakultas,f.kategori_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 2 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenelitian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 3 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPengabdian,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 4 THEN a.poin_subkegiatan/4/2 END),2) AS DetailPenunjang,

                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan_laporan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.tbl_mst_fakultas e','c.id_fakultas=e.id_fakultas', 'LEFT');
  $this->db->join('uinar_lkd2.master_kategori_dosen f','c.id_kat_dosen=f.id_kat_dosen', 'LEFT');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.id_periode', $id_periode);
  $this->db->like('c.id_kat_dosen', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;
}


function show_viewpages($id){
  $this->db->distinct();
  $this->db->select('*')
                  ->from('uinar_lkd2.bkd_subkegiatan a')
                  ->join('simpeg.tb_pegawai b','a.nip=b.nip')
                  ->where('a.id_periode=', $id)
                  ->group_by('a.nip');
  $query=$this->db->get()->result();
  return $query;
}

function profil()
{
    $this->db->select('*')
                    ->from('master_kategori_dosen');
    $query=$this->db->get()->result();
    return $query;
}


}//Close Class
