<?php
class M_master extends CI_Model{


   function __construct()
    {
        parent::__construct();
    }

//Admin Fakultas
function show_admin()
    {
      $this->db->select('a.nip,a.id_fakultas,b.nama_peg,c.nama_fakultas')
               ->from('profil_dosen a')
               ->join('tb_pegawai b','a.nip=b.nip','LEFT')
               ->join('tbl_mst_fakultas c','a.id_fakultas = c.id_fakultas','LEFT')
               ->where('a.user_level=', 4)
               ->order_by('a.nip');
      $query = $this->db->get()->result();
      return $query;
    }
/*PERIODE*/
function show_periode()
{
    $query = $this->db->get('periode_lkd')->result();
    return $query;
}

/* Pegawai */
function show_pegawai()
{
    $query = $this->db->get('tb_pegawai')->result();
    return $query;
}

/* Fakultas */
function show_fakultas()
{
    $query = $this->db->get('tbl_mst_fakultas')->result();
    return $query;
}
/*Golongan*/
function show_golongan()
{
    $query = $this->db->get('tb_golongan')->result();
    return $query;
}

function show_agama()
{
    $query = $this->db->get('tb_agama')->result();
    return $query;
}

function show_mapel()
{
    $query = $this->db->get('tb_mapel')->result();
    return $query;
}

function show_periode_aktif()
{
        $this->db->select('*')
                 ->from('periode_lkd')
                 ->where('status=',1);
        $query = $this->db->get()->result();
        return $query;
}

function show_dosen()
{
        $this->db->select('a.id_verifikator,a.nip,a.id_periode,a.rk_dosen,b.nama_peg')
                 ->from('verifikator a')
                 ->join('tb_pegawai b','a.nip = b.nip')
                 ->join('periode_lkd c','a.id_periode = c.id_periode')
                 ->where('c.status=',1)
                 ->order_by('b.nama_peg ASC');
        $query = $this->db->get()->result();
        return $query;
}

function show_viewpages(){

  $this->db->select('*')
                  ->from('profil_dosen')
                  ->join('verifikator','profil_dosen.nip=verifikator.nip')
                  ->join('master_kategori_dosen','profil_dosen.id_kat_dosen=master_kategori_dosen.id_kat_dosen')
                  ->join('periode_lkd','verifikator.id_periode=periode_lkd.id_periode')
                  ->join('verifikasi','verifikator.id_verifikator=verifikasi.id_verifikator')
                  ->where('periode_lkd.status=', 1)
                  // ->where('profil_dosen.user_level=', 1)
                  // ->or_where('verifikator.assesor_2=', $this->session->userdata('nipp'))
                  // ->or_where('verifikator.ketua_prodi=', $this->session->userdata('nipp'))
                  ->order_by('verifikator.nip ASC');
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

/*UNIT*/
function show_unit(){
    $query = $this->db->get('tb_unit')->result();
    return $query;
}

function insert_admin($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function insert_periode($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function edit_periode($where,$table)
{
    return $this->db->get_where($table,$where);
}
function update_periode($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}
function update_status_periode($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_status_rk($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function hapus_periode($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}


function edit_poin($where,$table){
    return $this->db->get_where($table,$where);
}

function update_appassesor($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_statuslaporan($where2,$data2,$table2)
{
    $this->db->where($where2);
    $this->db->update($table2,$data2);
}

function update_rencana($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_laporan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_admin_periksa($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function syaratbkd_ds($id2)
{
    $this->db->select('*')
                    ->from('bkd_remun_dosen a')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('a.id_bkd=', 1)
                    ->where('a.id_kat_dosen=', $id2);
    $query=$this->db->get()->result();
    return $query;
}

function syaratbkd_dt($id2)
{
    $this->db->select('*')
                    ->from('bkd_remun_dosen a')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('a.id_bkd=', 1)
                    ->where('a.id_kat_dosen=', $id2);
    $query=$this->db->get()->result();
    return $query;
}

}//Close Class
