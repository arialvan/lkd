<?php
class M_verifikator extends CI_Model{


   function __construct()
    {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

/*VERIFIKATOR*/
function show_verifikator()
{
  $this->db->select('*');
  $this->db->from('verifikasi');
  $this->db->where('verifikasi.nip!=',007);
  $this->db->order_by('verifikasi.nip ASC');
  $query = $this->db->get()->result();
  return $query;
}

function show_verifikator_aktif()
{
  $this->db->select('*');
  $this->db->from('verifikasi a');
  $this->db->join('verifikator b','a.id_verifikator=b.id_verifikator','LEFT');
  $this->db->join('periode_lkd c','b.id_periode=c.id_periode');
  $this->db->where('c.status', 1);

  $query=$this->db->get()->result();
  return $query;
}

function show_ketuaprodi_aktif()
{
  $this->db->distinct();
  $this->db->select('b.ketua_prodi,a.ketuaprodi');
  $this->db->from('verifikasi a');
  $this->db->join('verifikator b','a.id_verifikator=b.id_verifikator','LEFT');
  $this->db->join('periode_lkd c','b.id_periode=c.id_periode');
  $this->db->where_not_in('b.ketua_prodi', 0);
  $this->db->where('c.status', 1);
  $this->db->group_by('b.ketua_prodi');
  $query=$this->db->get()->result();
  return $query;
}

function show_asse1_aktif()
{
  $this->db->distinct();
  $this->db->select('b.assesor_1,a.assesor1');
  $this->db->from('verifikasi a');
  $this->db->join('verifikator b','a.id_verifikator=b.id_verifikator','LEFT');
  $this->db->join('periode_lkd c','b.id_periode=c.id_periode');
  $this->db->where_not_in('b.assesor_1', 0);
  $this->db->where('c.status', 1);
  $this->db->group_by('b.assesor_1');
  $query=$this->db->get()->result();
  return $query;
}

function show_asse2_aktif()
{
  $this->db->distinct();
  $this->db->select('b.assesor_2,a.assesor2');
  $this->db->from('verifikasi a');
  $this->db->join('verifikator b','a.id_verifikator=b.id_verifikator','LEFT');
  $this->db->join('periode_lkd c','b.id_periode=c.id_periode');
  $this->db->where_not_in('b.assesor_2', 0);
  $this->db->where('c.status', 1);
  $this->db->group_by('b.assesor_2');
  $query=$this->db->get()->result();
  return $query;
}

function count_subkegiatan($id)
{
  $this->db->select('count(id_subkegiatan)AS countid, sum(app_assesor1) AS sum_1, sum(app_assesor2) AS sum_2')
           ->from('bkd_subkegiatan')
           ->where('nip=', $id);
  $query = $this->db->get()->result();
  return $query;
}

function show_verifikator_noset()
{
  $sql="select * FROM uinar_lkd2.verifikator As T1 join simpeg.tb_pegawai AS T2 "
     . "on T1.nip=T2.nip "
     . "where T1.nip !='007' AND T1.assesor_1='0' OR T1.assesor_2='0' order by T1.nip ASC";
  $query=$this->db->query($sql)->result();
  return $query;

}

function show_verifikator_app($id)
{
  $this->db->select('assesor_1,assesor_2')
           ->from('verifikator')
           ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
           ->where('verifikator.nip=',$id);
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
  $sql="select * FROM uinar_lkd2.verifikasi As T1 join simpeg.tb_pegawai AS T2 "
     . "on T1.nip=T2.nip "
     . "where T1.id_verifikator =$id";
  $query=$this->db->query($sql)->result();
  return $query;
}

function show_pegawai()
{
    $query = $this->dbsimpeg->get('tb_pegawai')->result();
    return $query;
}

function update_verifikator($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_approval($where,$data,$table)
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
        // $this->db->select('*')
        //          ->from('profil_dosen')
        //          ->join('verifikator','profil_dosen.nip = verifikator.nip','left outer')
        //          ->join('tb_pegawai','profil_dosen.nip = tb_pegawai.nip')
        //          ->where('profil_dosen.nip!=007')
        //          ->where('verifikator.nip=',NULL)
        //          ->order_by('profil_dosen.nip');
        // $query = $this->db->get()->result();
        // return $query;

        $sql="select * FROM uinar_lkd2.profil_dosen As T1 left join uinar_lkd2.verifikator AS T2 "
             . "on T1.nip=T2.nip "
             . "join simpeg.tb_pegawai AS T3 "
             . "on T1.nip=T3.nip "
             . "where T1.nip !='007' order by T1.nip DESC";
        $query=$this->db->query($sql)->result();
        return $query;
}

function show_dosen_profil()
{
        $this->db->select('*')
                 ->from('uinar_lkd2.profil_dosen a')
                 ->join('simpeg.tb_pegawai b','a.nip = b.nip')
                 ->join('uinar_lkd2.master_kategori_dosen c','a.id_kat_dosen = c.id_kat_dosen')
                 ->where('a.nip!=007')
                 ->order_by('a.nip ASC');
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
        $this->dbsimpeg->select('nip,nama_peg')
                       ->from('tb_pegawai')
                       ->where('status_profesi =', 2);
        $query = $this->db->get()->result();
        return $query;
}

function show_assesor2()
{
        $this->dbsimpeg->select('nip,nama_peg')
                       ->from('tb_pegawai')
                       ->where('status_profesi =', 2);
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


/* FILTER */
function show_verifikator_laporandetail($id)
{
  $this->db->select('*')
                  ->from('verifikator')
                  ->join('periode_lkd','verifikator.id_periode = periode_lkd.id_periode')
                  ->where('verifikator.nip',$id)
                  ->where('periode_lkd.status',1);
  $query=$this->db->get()->result();
  return $query;
}

function filter($id)
{
        $this->db->select('*')
                 ->from('verifikator a')
                 ->join('periode_lkd b','a.id_periode = b.id_periode')
                 ->where('b.status=',1)
                 ->where('a.nip=',$id)
                 ->order_by('a.id_verifikator');
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

function fakultas()
{
    $this->db->select('*')
                    ->from('tbl_mst_fakultas');
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
  $this->db->select('master_kategori_dosen.id_kat_dosen,master_kategori_dosen.kategori_dosen')
                  ->from('master_kategori_dosen')
                  ->join('profil_dosen','master_kategori_dosen.id_kat_dosen=profil_dosen.id_kat_dosen')
                  ->where('profil_dosen.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}

function profil_dosen_diperiksa($id)
{
    $this->db->select('a.nama_peg')
                    ->from('simpeg.tb_pegawai a')
                    ->where('a.nip=', $id);
    $query=$this->db->get()->result();
    return $query;
}

function show_viewpages2(){

  // $this->db->select('*')
  //                 ->from('verifikator a')
  //                 ->join('periode_lkd b','a.id_periode=b.id_periode')
  //                 ->join('verifikasi c','a.id_verifikator=b.id_verifikator')
  //                 ->where('b.status=', 1)
  //                 ->where('a.ketua_prodi=', $this->session->userdata('nipp'))
  //                 ->order_by('a.nip ASC');
  // $query=$this->db->get()->result();
  // return $query;
  $this->db->select('*')
                  ->from('profil_dosen')
                  ->join('verifikator','profil_dosen.nip=verifikator.nip')
                  ->join('master_kategori_dosen','profil_dosen.id_kat_dosen=master_kategori_dosen.id_kat_dosen')
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

function show_file2($id)
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan_file')
                  ->where('id=', $id);
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

function show_syarat_subbkd_poin($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS subsks, SUM(a.poin_subkegiatan) AS Poin')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('c.status=',1)
                    ->where('a.app_assesor1=',1)
                    ->where('a.app_assesor2=',1)
                    ->where('a.id_bkd', 1);
    $query=$this->db->get()->result();
    return $query;
}

function show_tanpa_syarat_penunjang($id)
{
    $this->db->select('SUM(a.poin_subkegiatan) AS pointanpasyarat')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('b.renum_hitung=',1)
                    ->where('c.status=',1)
                    ->where('a.app_assesor1=',1)
                    ->where('a.app_assesor2=',1)
                    ->where_in('a.id_bkd', 4);
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

function selesai_laporan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_periksa_ketuaprodi(){
  $id = $this->input->post('languages');
  foreach($id as $keys => $value){
    $this->db->set('app_ketuaprodi', 1);
    $this->db->where('id_subkegiatan', $value);
    $result=$this->db->update('bkd_subkegiatan');
    return $result;
  }
}


function syaratbkd($id)
{
    $this->db->select('a.id_kat_dosen,a.sks_bkd,a.sks_remun,b.ket_bkd')
                    ->from('bkd_remun_dosen a')
                    ->join('profil_dosen d', 'a.id_kat_dosen = d.id_kat_dosen')
                    ->join('bkd b', 'a.id_bkd = b.id_bkd')
                    ->join('periode_lkd c', 'a.id_periode = c.id_periode')
                    ->where('c.status=', 1)
                    ->where('d.nip=', $id);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_bkd_rk($id){
  $this->db->select(' MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang
                    ');
  $this->db->from('profil_dosen c');
  $this->db->join('bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('periode_lkd e','d.id_periode=e.id_periode', 'INNER');
  $this->db->where('e.status', 1);
  $this->db->where('c.nip', $id);
  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_dosen_rk($id){
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4/2 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4/2 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4/2 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4/2 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4/2 END)-8 ,2) AS Points
                    ');
                    // $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,
                    //                     FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4 END),2) AS Pendidikan,
                    //                     SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4 END) AS Penelitian,
                    //                     SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4 END) AS Pengabdian,
                    //                     SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4 END) AS Penunjang,
                    //                     FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4 END)-8 ,2) AS Points
                    //                   ');
  $this->db->from('uinar_lkd2.bkd_subkegiatan a');
  $this->db->join('simpeg.tb_pegawai b','a.nip=b.nip');
  $this->db->join('uinar_lkd2.profil_dosen c','a.nip=c.nip');
  $this->db->join('uinar_lkd2.bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('uinar_lkd2.periode_lkd e','a.id_periode=a.id_periode', 'INNER');
  $this->db->where('a.nip', $id);
  $this->db->where('a.nip is NOT NULL', NULL, FALSE);
  $this->db->where('e.status', 1);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;

}

function show_syarat_bkd(){
  $this->db->select(' MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
                      MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
                      MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
                      MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang
                    ');
  $this->db->from('profil_dosen c');
  $this->db->join('bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->join('periode_lkd e','d.id_periode=e.id_periode', 'INNER');
  $this->db->where('c.id_kat_dosen', $this->session->userdata('kat_dosen'));
  $this->db->where('e.status', 1);
  // $this->db->group_by('a.nip');
  $query=$this->db->get()->result_array();
  return $query;
}

function show_rekap_dosen($id){
  // MAX(CASE WHEN d.id_bkd = 1 THEN d.sks_bkd ELSE 0 END) AS Syt_Pendidikan,
  // MAX(CASE WHEN d.id_bkd = 2 THEN d.sks_bkd ELSE 0 END) AS Syt_Penelitian,
  // MAX(CASE WHEN d.id_bkd = 3 THEN d.sks_bkd ELSE 0 END) AS Syt_Pengabdian,
  // MAX(CASE WHEN d.id_bkd = 4 THEN d.sks_bkd ELSE 0 END) AS Syt_Penunjang,
  $this->db->select('a.nip,b.nama_peg,c.id_kat_dosen,
                      FORMAT(SUM(CASE WHEN a.id_bkd = 1 THEN a.sks_subkegiatan/4 END),2) AS Pendidikan,
                      SUM(CASE WHEN a.id_bkd = 2 THEN a.sks_subkegiatan/4 END) AS Penelitian,
                      SUM(CASE WHEN a.id_bkd = 3 THEN a.sks_subkegiatan/4 END) AS Pengabdian,
                      SUM(CASE WHEN a.id_bkd = 4 THEN a.sks_subkegiatan/4 END) AS Penunjang,
                      FORMAT(SUM(CASE WHEN a.id_bkd IN ("1","4") THEN a.poin_subkegiatan/4 END)-8 ,2) AS Points
                    ');
  $this->db->from('bkd_subkegiatan_laporan a');
  $this->db->join('tb_pegawai b','a.nip=b.nip');
  $this->db->join('profil_dosen c','a.nip=c.nip');
  $this->db->join('bkd_remun_dosen d','c.id_kat_dosen=d.id_kat_dosen', 'INNER');
  $this->db->where('a.app_assesor1', 1);
  $this->db->where('a.app_assesor2', 1);
  $this->db->where('a.nip', $id);
  // $this->db->where('Pendidikan IS NOT NULL', NULL, FALSE);
  $this->db->group_by('a.nip');

  $query=$this->db->get()->result_array();
  return $query;

}

}//Close Class
