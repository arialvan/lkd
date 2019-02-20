<?php
class M_rencanakerja extends CI_Model{


   function __construct()
    {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

/*BKD*/
function show_bkd()
{
    $query = $this->db->get('bkd')->result();
    return $query;
}

function show_periode_aktif()
{
    $this->db->select('*')
                    ->from('periode_lkd')
                    ->where('status=', 1);
    $query=$this->db->get()->result();
    return $query;
}

function filter_button()
{
    $this->db->select('rk_dosen')
                    ->from('verifikator a')
                    ->join('periode_lkd b', 'a.id_periode = b.id_periode')
                    ->where('a.nip=', $this->session->userdata('nipp'))
                    ->where('b.status=', 1);
    $query=$this->db->get()->result();
    return $query;
}

//Baru Ditambah
function show_dilaporkan()
{
  $this->db->select('a.di_laporkan, count(a.id_subkegiatan) AS jumlah')
                  ->from('bkd_subkegiatan a')
                  ->join('periode_lkd b','a.id_periode = b.id_periode')
                  ->where('a.nip',$this->session->userdata('nipp'))
                  ->where('a.di_laporkan',1)
                  ->where('a.app_ketuaprodi',1)
                  ->where('b.status',1);
  $query=$this->db->get()->result();
  return $query;
}

public function ambil_tb_kegiatan()
  {
      $state=$this->input->post("state");
      $sql="select * FROM bkd join bkd_kegiatan "
         . "on bkd.id_bkd=bkd_kegiatan.id_bkd "
         . "join periode_lkd on bkd_kegiatan.id_periode=periode_lkd.id_periode "
         . "where bkd.id_bkd ='$state' AND periode_lkd.status='1'  order by bkd.id_bkd";
      $query=$this->db->query($sql);
      return $query;
  }

  function profil()
  {
      $this->db->select('*')
                      ->from('master_kategori_dosen')
                      ->where('id_kat_dosen=', $this->session->userdata('kat_dosen'));
      $query=$this->db->get()->result();
      return $query;
  }

function syaratbkd()
{
    $this->db->select('*')
                    ->from('bkd_remun_dosen a')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('a.id_kat_dosen=', $this->session->userdata('kat_dosen'));
    $query=$this->db->get()->result();
    return $query;
}

function syaratbkd_ds($id)
{
    $this->db->select('*')
                    ->from('bkd_remun_dosen a')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('a.id_bkd=', 1)
                    ->where('a.id_kat_dosen=', $this->session->userdata('kat_dosen'));
    $query=$this->db->get()->result();
    return $query;
}

function syaratbkd_dt($id)
{
    $this->db->select('*')
                    ->from('bkd_remun_dosen a')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('a.id_bkd=', 1)
                    ->where('a.id_kat_dosen=', $this->session->userdata('kat_dosen'));
    $query=$this->db->get()->result();
    return $query;
}

function show_bkdkegiatan()
{
    // $query = $this->db->get('bkd_kegiatan')->result();
    // return $query;
    $this->db->select('*')
                    ->from('bkd_kegiatan')
                    ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd')
                    ->join('periode_lkd', 'bkd_kegiatan.id_periode = periode_lkd.id_periode')
                    ->where('periode_lkd.status=', 1);
    $query=$this->db->get()->result();
    return $query;
}

// CEK KETUA PRODI
function cek_ketuaprodi($id)
{
  $this->db->select('a.ketua_prodi');
  $this->db->from('verifikator a');
  $this->db->join('periode_lkd b','a.id_periode=b.id_periode');
  $this->db->where('a.ketua_prodi', $id);
  $this->db->where('b.status', 1);
  $this->db->group_by('a.ketua_prodi');

  $query=$this->db->get()->result();
  return $query;
}

// QUERY PERHITUNGAN
function show_syarat_bkd()
{
    $this->db->select('SUM(bkd_remun_dosen.sks_bkd)AS sks')
                    ->from('bkd_remun_dosen')
                    ->join('periode_lkd','bkd_remun_dosen.id_periode = periode_lkd.id_periode', 'LEFT')
                    ->where('bkd_remun_dosen.id_kat_dosen=', $this->session->userdata('kat_dosen'))
                    ->where('periode_lkd.status=',1);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_subbkd($id)
{
    $idbkd =array('1','4');
    $this->db->select('SUM(a.sks_subkegiatan) AS subsks, SUM(a.poin_subkegiatan) AS Poin')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', $idbkd);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_subbkd_poin($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS subsks, SUM(a.poin_subkegiatan) AS Poin')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 1);
    $query=$this->db->get()->result();
    return $query;
}


function show_syarat_pendidikan($id)
{
  $this->db->select('*,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan END),2) AS skspendidikan,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/8 END)-8 ,2) AS poinpendidikan
                    ')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','a.id_periode = c.id_periode', 'INNER')
                  ->where('a.nip', $id)
                  // ->where('b.syarat',1)
                  ->where('c.status',1)
                  ->where('a.id_bkd', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_syarat_penelitian($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS skspenelitan, SUM(a.poin_subkegiatan) AS poinpenelitan')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.syarat=',1)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 2);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_pengabdian($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS skspengabdian, SUM(a.poin_subkegiatan) AS poinpengabdian')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.syarat=',1)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 3);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_penunjang($id)
{
    //$syarat = array('0','1');
    $this->db->select('SUM(a.sks_subkegiatan) AS skspenunjang, SUM(a.poin_subkegiatan) AS poinpenunjang')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    // ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('b.syarat=',1)
                    ->where_in('a.id_bkd', 4);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_penunjang_poin($id)
{
    //$syarat = array('0','1');
    $this->db->select('SUM(a.sks_subkegiatan) AS skspenunjang, SUM(a.poin_subkegiatan) AS poinpenunjang')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 4);
    $query=$this->db->get()->result();
    return $query;
}

function show_poin_remunerasi($id)
{
    // $idbkd =array('1','4');
    $this->db->select('SUM(a.poin_subkegiatan) AS poinremun')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('a.id_bkd',1); //pendidikan
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}


function poin_terbesar($id)
{
    // $idbkd =array('1','4');
    $this->db->select('MAX(b.poin) AS poinmax')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('a.id_bkd',1); //id pendidikan
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function poin_terendah($id)
{
    // $idbkd =array('1','4');
    $this->db->select('MIN(a.poin_subkegiatan) AS poinmin')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.syarat=',1)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('a.id_bkd',4); //id pendidikan
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_rekap_dosen($id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,
                      MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4 END)-8 ,2) AS Points
                    ');
  $this->db->from('uinar_elkd.bkd_subkegiatan a');
  $this->db->join('uinar_simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_elkd.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_elkd.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.nip', $id);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;

}

function show_tanpa_syarat_penunjang($id)
{
    //$syarat = array('0','1');
    $this->db->select('SUM(a.poin_subkegiatan) AS pointanpasyarat')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 4);
    $query=$this->db->get()->result();
    return $query;
}


function sksxpoin($id)
{
    // $idbkd =array('1','4');
    $this->db->select('*,(a.sks_subkegiatan*b.poin) AS skskalipoin')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('a.id_bkd',1);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}
//CLOSE QUERY PERHITUNGAN


function show_laporan_perbaikan($id_sub)
{
    $this->db->select('app_assesor1,app_assesor2,applaporan_ketuaprodi')
                    ->from('bkd_subkegiatan_laporan')
                    ->where('id_subkegiatan',$id_sub);
    $query=$this->db->get()->result();
    return $query;
}


function show_file()
{
    $query = $this->db->get('bkd_buktifisik')->result();
    return $query;
}

//insert
// function insert_rencanakerja($data,$table)
// {
//     $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
//     $this->db->insert($table, $data);
//     if($this->db->affected_rows() < 1 )
//         {
//             $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
//         }
//         return $msg;
// }

function insert_rencanakerja($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function insert_laporan($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}
//show edit
function edit_bkdsubkegiatan($where,$table)
{
    return $this->db->get_where($table,$where);
}

function edit_subkegiatan($id)
{
    $this->db->select('*')
                    ->from('bkd_subkegiatan')
                    ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                    ->where('bkd_subkegiatan.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

function edit_subkegiatan_tambahan($id)
{
    $this->db->select('*')
                    ->from('bkd_subkegiatan_laporan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->where('a.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

function get_subkegiatan($id)
{
    $this->db->select('a.sub_kegiatan, b.kegiatan')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->where('a.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

function get_subkegiatan_laporan($id)
{
    $this->db->select('a.sub_kegiatan, b.kegiatan')
                    ->from('bkd_subkegiatan_laporan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->where('a.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

  function edit_subkegiatan2($id)
{
    $this->db->select('*')
                    ->from('bkd_subkegiatan_file a')
                    ->join('bkd_subkegiatan b','a.id_subkegiatan = b.id_subkegiatan')
                    ->where('a.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

function edit_poin($where,$table){
    return $this->db->get_where($table,$where);
}

function show_rbkd_to_laporan($where,$table){
    return $this->db->get_where($table,$where);
}

function update_bkdsubkegiatan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_perbaikan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_perbaikan2($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function selesai_laporan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function cek_kegiatan($where,$table){
    return $this->db->get_where($table,$where);
}

function cek_file_master($where,$table){
    return $this->db->get_where($table,$where);
}
//update
function update_rencana($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

//hapus
function hapus_bkdsubkegiatan($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}


/*BKD SUB KEGIATAN*/
function show_laporan()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                  ->where('bkd_subkegiatan.id_bkd=', 1)
                  ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
                  ->order_by('bkd_subkegiatan.id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_listrbkd($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status_laporan) AS statuslaporan')
  // $this->db->select('*')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','a.id_periode = c.id_periode')
                  ->where('a.nip=', $id)
                  ->where('a.app_ketuaprodi=', 1)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_listlaporan($id)
{
  $this->db->select('a.*,b.*,c.*,d.*, (a.status_laporan) AS statuslaporan')
  // $this->db->select('*')
                  ->from('bkd_subkegiatan_laporan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->join('bkd d','b.id_bkd = d.id_bkd','LEFT')
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_rk($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status_laporan) AS statuslaporan')
  // $this->db->select('*')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 1)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penelitian_rk($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 2)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_pengabdian_rk($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 3)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penunjang_rk($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan')
                  ->from('bkd_subkegiatan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 4)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana($id)
{
  $this->db->select('a.*,b.*,c.*, (a.status_laporan) AS statuslaporan, FORMAT(a.sks_subkegiatan,2) AS sks_subkegiatan, FORMAT(a.poin_subkegiatan,2) AS poin_subkegiatan')
  // $this->db->select('*')
                  ->from('bkd_subkegiatan_laporan a')
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
  // $this->db->select('*')
  //                 ->from('bkd_subkegiatan')
  //                 ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
  //                 ->where('bkd_subkegiatan.id_bkd=', 2)
  //                 ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
  //                 ->order_by('bkd_subkegiatan.id_subkegiatan');
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan, FORMAT(a.sks_subkegiatan,2) AS sks_subkegiatan, FORMAT(a.poin_subkegiatan,2) AS poin_subkegiatan')
                  ->from('bkd_subkegiatan_laporan a')
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
  // $this->db->select('*')
  //                 ->from('bkd_subkegiatan')
  //                 ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
  //                 ->where('bkd_subkegiatan.id_bkd=', 3)
  //                 ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
  //                 ->order_by('bkd_subkegiatan.id_subkegiatan');
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan, FORMAT(a.sks_subkegiatan,2) AS sks_subkegiatan, FORMAT(a.poin_subkegiatan,2) AS poin_subkegiatan')
                  ->from('bkd_subkegiatan_laporan a')
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
  // $this->db->select('*')
  //                 ->from('bkd_subkegiatan')
  //                 ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
  //                 ->where('bkd_subkegiatan.id_bkd=', 4)
  //                 ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
  //                 ->order_by('bkd_subkegiatan.id_subkegiatan');
  $this->db->select('a.*,b.*,c.*, (a.status) AS statuslaporan, FORMAT(a.sks_subkegiatan,2) AS sks_subkegiatan, FORMAT(a.poin_subkegiatan,2) AS poin_subkegiatan')
                  ->from('bkd_subkegiatan_laporan a')
                  ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                  ->join('periode_lkd c','b.id_periode = c.id_periode','LEFT')
                  ->where('a.id_bkd=', 4)
                  ->where('a.nip=', $id)
                  ->where('c.status', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_verifikator()
{
  $this->db->select('*')
                  ->from('verifikator')
                  ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
                  ->join('verifikasi','verifikasi.id_verifikator = verifikator.id_verifikator')
                  ->where('verifikasi.nip',$this->session->userdata('nipp'))
                  ->where('periode_lkd.status',1)
                  ->order_by('verifikasi.id_verifikator');
  $query=$this->db->get()->result();
  return $query;
}

function insert_bkdkegiatan($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function edit_bkdkegiatan($where,$table)
{
    return $this->db->get_where($table,$where);
}

function update_bkdkegiatan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_file($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function hapus_bkdkegiatan($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}

function cek_survey()
{
  $this->db->select('isi_survey')
                  ->from('verifikator')
                  ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
                  ->where('verifikator.nip',$this->session->userdata('nipp'))
                  ->where('periode_lkd.status',1);
  $query=$this->db->get()->result();
  return $query;
}

}//Close Class
