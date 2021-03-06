<?php
class M_verifikator extends CI_Model{


   function __construct()
    {
        parent::__construct();
    }

/*VERIFIKATOR*/
function show_verifikator()
{
  $this->db->select('*')
           ->from('verifikasi')
           ->join('tb_pegawai','verifikasi.nip = tb_pegawai.nip')
           ->where('verifikasi.nip!=007')
           ->order_by('verifikasi.nip ASC');
  $query = $this->db->get()->result();
  return $query;
    // $query = $this->db->get('verifikasi')->result();
    // return $query;
}

function show_verifikator_noset()
{
  $this->db->select('*')
           ->from('verifikator')
           ->join('tb_pegawai','verifikator.nip = tb_pegawai.nip')
           ->where('verifikator.nip!=007')
           ->where('verifikator.nip=',0)
           ->or_where('verifikator.assesor_1=', 0)
           ->order_by('verifikator.nip ASC');
  $query = $this->db->get()->result();
  return $query;
}

function insert_verifikator($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function edit_verifikator($id)
{
  $this->db->select('verifikasi.*,tb_pegawai.nip,tb_pegawai.nama_peg')
                  ->from('verifikasi')
                  ->join('tb_pegawai','verifikasi.nip = tb_pegawai.nip')
                  ->where('verifikasi.id_verifikator=', $id);
  $query=$this->db->get()->result();
  return $query;
}

function show_pegawai()
{
    $query = $this->db->get('tb_pegawai')->result();
    return $query;
}

function update_verifikator($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_appketuaprodi($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_appassesor1($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_statuslaporan($where2,$data2,$table2)
{
    $this->db->where($where2);
    $this->db->update($table2,$data2);
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


function update_komentar($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}

/*DOSEN*/
function show_dosen()
{
        $this->db->select('*')
                 ->from('profil_dosen')
                 ->join('verifikator','profil_dosen.nip = verifikator.nip','left outer')
                 ->join('tb_pegawai','profil_dosen.nip = tb_pegawai.nip')
                 ->where('profil_dosen.nip!=007')
                 ->where('verifikator.nip=',NULL)
                 ->order_by('profil_dosen.nip');
        $query = $this->db->get()->result();
        return $query;
}

function show_dosen_profil()
{
        $this->db->select('*')
                 ->from('profil_dosen')
                 ->join('tb_pegawai','profil_dosen.nip = tb_pegawai.nip')
                 ->join('master_kategori_dosen','profil_dosen.id_kat_dosen = master_kategori_dosen.id_kat_dosen')
                 ->where('profil_dosen.nip!=007')
                 ->order_by('profil_dosen.nip ASC');
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

function show_assesor($id)
{
        $this->db->select('assesor_1,assesor_2')
                 ->from('verifikator')
                 ->join('periode_lkd','verifikator.id_periode=verifikator.id_periode')
                 ->where('verifikator.nip =', $id)
                 ->where('periode_lkd.status=',1);
        $query = $this->db->get()->result();
        return $query;
}

function show_assesor1()
{
        $this->db->select('nip,nama_peg')
                 ->from('tb_pegawai')
                 ->where('status_profesi =', 2);
                 //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_assesor2()
{
        $this->db->select('nip,nama_peg')
                 ->from('tb_pegawai')
                 ->where('status_profesi =', 2);
                 //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_ketprodi()
{
        $this->db->select('nip,nama_peg')
                 ->from('tb_pegawai')
                 ->where('status_profesi =', 2);
                 //->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
}

//PENILAIAN
// function show_viewpages(){
//
//   $this->db->select('*')
//                   ->from('verifikator')
//                   ->join('periode_lkd','verifikator.id_periode=periode_lkd.id_periode')
//                   ->join('verifikasi','verifikator.id_verifikator=verifikasi.id_verifikator')
//                   ->where('periode_lkd.status=', 1)
//                   ->where('verifikator.assesor_1=', $this->session->userdata('nipp'))
//                   ->or_where('verifikator.assesor_2=', $this->session->userdata('nipp'))
//                   // ->or_where('verifikator.ketua_prodi=', $this->session->userdata('nipp'))
//                   ->order_by('verifikator.nip ASC');
//   $query=$this->db->get()->result();
//   return $query;
// }

function show_viewpages(){

  $this->db->select('*')
                  ->from('profil_dosen')
                  ->join('verifikator','profil_dosen.nip=verifikator.nip')
                  ->join('master_kategori_dosen','profil_dosen.id_kat_dosen=master_kategori_dosen.id_kat_dosen')
                  ->join('periode_lkd','verifikator.id_periode=periode_lkd.id_periode')
                  ->join('verifikasi','verifikator.id_verifikator=verifikasi.id_verifikator')
                  ->where('periode_lkd.status=', 1)
                  ->where('verifikator.assesor_1=', $this->session->userdata('nipp'))
                  ->or_where('verifikator.assesor_2=', $this->session->userdata('nipp'))
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

function profil_remunerasi($id)
{
  $this->db->select('profil_dosen.id_kat_dosen')
                  ->from('master_kategori_dosen')
                  ->join('profil_dosen','master_kategori_dosen.id_kat_dosen=profil_dosen.id_kat_dosen')
                  ->where('profil_dosen.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}

function profil2($id)
{
  $this->db->select('master_kategori_dosen.kategori_dosen')
                  ->from('master_kategori_dosen')
                  ->join('profil_dosen','master_kategori_dosen.id_kat_dosen=profil_dosen.id_kat_dosen')
                  ->where('profil_dosen.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}

function profil_dosen_diperiksa($id)
{
    $this->db->select('nama_peg')
                    ->from('tb_pegawai')
                    ->where('nip=', $id);
    $query=$this->db->get()->result();
    return $query;
}

function show_viewpages2(){

  $this->db->select('*')
                  ->from('verifikator')
                  ->join('periode_lkd','verifikator.id_periode=periode_lkd.id_periode')
                  ->join('verifikasi','verifikator.id_verifikator=verifikasi.id_verifikator')
                  ->where('periode_lkd.status=', 1)
                  ->where('verifikator.ketua_prodi=', $this->session->userdata('nipp'))
                  ->order_by('verifikator.nip ASC');
  $query=$this->db->get()->result();
  return $query;
}

function show_file($id)
{
  // $ex = explode('#',$id);
	// @$id_kegiatan = $ex[0];
	// @$nama_file   = $ex[1];

  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_subkegiatan_file','bkd_subkegiatan.id_subkegiatan = bkd_subkegiatan_file.id_subkegiatan')
                  ->where('bkd_subkegiatan_file.id_subkegiatan=', $id)
                  // ->where('bkd_subkegiatan_file.nama_file=', $nama_file)
                  ->order_by('bkd_subkegiatan_file.id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_file1($data)
{
  $ex = explode('#',$data);
  $id_kegiatan = $ex[0];
  $nama_file   = $ex[1];

  $this->db->select('*')
                  ->from('bkd_subkegiatan_file')
                  ->where('id_subkegiatan=', $id_kegiatan)
                  ->where('nama_file=', $nama_file);
  $query=$this->db->get()->result();
  return $query;
}


function show_subkegiatan($id)
{
  $this->db->select('a.status,a.nip')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}


function show_pendidikan($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 1)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penelitian($id)
{

  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 2)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_pengabdian($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 3)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penunjang($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statusapp')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 4)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rekap($id)
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->where('b.id_periode=', 2)
                  ->where('a.nip=', $id)
                  ->where('a.app_ketuaprodi=', 1);
  $query=$this->db->get()->result();
  return $query;
}
//Update
function update_pegawai($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function UpdateSL($where2,$data2,$table2)
{
    $this->db->where($where2);
    $this->db->update($table2,$data2);
}

}//Close Class
