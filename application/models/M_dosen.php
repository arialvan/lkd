<?php
class M_dosen extends CI_Model{


   function __construct()
    {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

/*VERIFIKATOR*/
function show_verifikator()
{
    $query = $this->db->get('verifikasi')->result();
    return $query;
}
function insert_dosen($data,$table)
{
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function cek_nip($where,$table)
{
    return $this->db->get_where($table,$where);
}

function update_verifikator($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}
function hapus_verifikator($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}

/* FILTER */
function filter($id)
{
        $this->db->select('*')
                 ->from('verifikator')
                 ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
                 ->where('periode_lkd.status=',1)
                 ->where('verifikator.assesor_1=',$id)
                 ->or_where('verifikator.assesor_2=',$id)
                 // ->or_where('verifikator.ketua_prodi=',$id)
                 ->order_by('verifikator.id_verifikator');
        $query = $this->db->get()->result();
        return $query;
}

function filterketuaprodi($id)
{
        $this->db->select('*')
                 ->from('verifikator')
                 ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
                 ->where('periode_lkd.status=',1)
                 ->where('verifikator.ketua_prodi=',$id)
                 ->order_by('verifikator.id_verifikator');
        $query = $this->db->get()->result();
        return $query;
}

/*DOSEN*/
function show_dosen()
{
        $this->db->select('a.nip,a.nidn,a.id_kat_dosen,b.nama_peg,c.kategori_dosen')
                 ->from('uinar_lkd2.profil_dosen a')
                 ->join('simpeg.tb_pegawai b','a.nip = b.nip')
                 ->join('uinar_lkd2.master_kategori_dosen c','a.id_kat_dosen = c.id_kat_dosen','left')
                 ->where('a.nip!=007')
                 ->where('a.id_kat_dosen!=0')
                 ->order_by('b.nama_peg ASC');
        $query = $this->db->get()->result();
        return $query;
}

function show_dosen_profil()
{
  $this->db->select('a.nip,a.id_kat_dosen,b.nama_peg')
           ->from('uinar_lkd2.profil_dosen a')
           ->join('simpeg.tb_pegawai b','a.nip = b.nip')
           ->where('a.nip!=007')
           ->where('a.id_kat_dosen=0')
           ->order_by('b.nama_peg ASC');
        $query = $this->db->get()->result();
        return $query;
}

function show_kat_dosen()
{
        $this->db->select('*')
                 ->from('master_kategori_dosen')
                 ->where('id_kat_dosen!=0')
                 ->order_by('kategori_dosen ASC');
        $query = $this->db->get()->result();
        return $query;
}

/*PERIODE*/
function show_periode()
{
        $this->db->select('*')
                 ->from('periode_lkd')
                 ->where('status =', 1);
                 //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_assesor1()
{
        $this->dbsimpeg->select('nip,nama_peg')
                       ->from('tb_pegawai')
                       ->where('status_profesi =', 2);
                       //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_assesor2()
{
        $this->dbsimpeg->select('nip,nama_peg')
                       ->from('tb_pegawai')
                       ->where('status_profesi =', 2);
                       //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_ketprodi()
{
        $this->dbsimpeg->select('nip,nama_peg')
                       ->from('tb_pegawai')
                       ->where('status_profesi =', 2);
                       //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function update_dosen($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);

}

function edit_pegawai(){
  $this->db->select('*')
                  ->from('simpeg.tb_pegawai a')
                  ->join('uinar_lkd2.profil_dosen b','a.nip = b.nip')
                  ->where('b.nip=', $this->session->userdata('nipp'));
  $query=$this->db->get()->result();
  return $query;
}

function fakultas_id($id){
  $this->db->select('a.nip,a.id_fakultas,a.id_prodi,b.nama_fakultas,c.nama_prodi')
                  ->from('profil_dosen a')
                  ->join('tbl_mst_fakultas b','a.id_fakultas = b.id_fakultas')
                  ->join('tbl_mst_prodi c','a.id_prodi = c.id_prodi')
                  ->where('a.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}

function jabatan_id($id){
  $this->db->select('a.id_jabatan,b.nm_jabatan')
                  ->from('profil_dosen a')
                  ->join('jabatan_dosen b','a.id_jabatan = b.id_jabatan')
                  ->where('a.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}

}//Close Class
