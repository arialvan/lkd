<?php
class M_masterbkd extends CI_Model{


   function __construct()
    {
        parent::__construct();
    }

/*BKD*/
function show_bkd()
{
    $query = $this->db->get('bkd')->result();
    return $query;
}

function show_syarat()
{
    $query = $this->db->get('bkd_buktifisik')->result();
    return $query;
}

function show_remun()
{
    $query = $this->db->get('remunerasi')->result();
    return $query;
}

function show_subbkd_pendidikan()
{
  $this->db->select('*')
                  ->from('bkd_kegiatan')
                  ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd')
                  ->join('periode_lkd', 'bkd_kegiatan.id_periode = periode_lkd.id_periode')
                  ->where('bkd.id_bkd=', 1)
                  ->where('periode_lkd.status=', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_subbkd_penelitian()
{
  $this->db->select('*')
                  ->from('bkd_kegiatan')
                  ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd')
                  ->join('periode_lkd', 'bkd_kegiatan.id_periode = periode_lkd.id_periode')
                  ->where('bkd.id_bkd=', 2)
                  ->where('periode_lkd.status=', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_subbkd_pengabdian()
{
  $this->db->select('*')
                  ->from('bkd_kegiatan')
                  ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd')
                  ->join('periode_lkd', 'bkd_kegiatan.id_periode = periode_lkd.id_periode')
                  ->where('bkd.id_bkd=', 3)
                  ->where('periode_lkd.status=', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_subbkd_penunjang()
{
  $this->db->select('*')
                  ->from('bkd_kegiatan')
                  ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd')
                  ->join('periode_lkd', 'bkd_kegiatan.id_periode = periode_lkd.id_periode')
                  ->where('bkd.id_bkd=', 4)
                  ->where('periode_lkd.status=', 1);
  $query=$this->db->get()->result();
  return $query;
}

function show_periode()
{
    $this->db->select('*')
                    ->from('periode_lkd')
                    ->where('status=', 1)
                    ->order_by('id_periode');
    $query=$this->db->get()->result();
    return $query;
}

function show_buktifisik()
{
    $this->db->select('*')
                    ->from('bkd_buktifisik')
                    ->order_by('id');
    $query=$this->db->get()->result();
    return $query;
}

function show_perhitunganrenumerasi()
{
    $this->db->select('*')
                    ->from('perhitungan_renumerasi')
                    ->join('periode_lkd', 'perhitungan_renumerasi.periode = periode_lkd.periode')
                    ->where('periode_lkd.status=', 1);
    $query=$this->db->get()->result();
    return $query;
}

function show_bkd_kegiatan()
{
  $this->db->select('*')
                  ->from('bkd_kegiatan')
                  ->join('bkd', 'bkd_kegiatan.id_bkd = bkd.id_bkd');
  $query=$this->db->get()->result();
  return $query;
}


/*DOSEN*/
function show_katdosen()
{
    $this->db->select('*')
                    ->from('master_kategori_dosen')
                    ->where('id_kat_dosen!=0');
    $query=$this->db->get()->result();
    return $query;
    // $query = $this->db->get('master_kategori_dosen')->result();
    // return $query;
}

function show_edit_skema()
{
    return $this->db->get_where($table,$where);
}

function show_bkdremun()
{
  $this->db->select('*,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 1 THEN bkd_remun_dosen.sks_bkd END) AS Pendidikan,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 2 THEN bkd_remun_dosen.sks_bkd END) AS Penelitian,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 3 THEN bkd_remun_dosen.sks_bkd END) AS Pengabdian,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 4 THEN bkd_remun_dosen.sks_bkd END) AS Penunjang,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 1 THEN bkd_remun_dosen.sks_remun END) AS Pendidikans,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 2 THEN bkd_remun_dosen.sks_remun END) AS Penelitians,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 3 THEN bkd_remun_dosen.sks_remun END) AS Pengabdians,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 4 THEN bkd_remun_dosen.sks_remun END) AS Penunjangs
                    ')
                  ->from('bkd_remun_dosen')
                  ->join('master_kategori_dosen','bkd_remun_dosen.id_kat_dosen = master_kategori_dosen.id_kat_dosen')
                  ->join('periode_lkd','bkd_remun_dosen.id_periode = periode_lkd.id_periode')
                  ->where('periode_lkd.status=', 1)
                  ->group_by('bkd_remun_dosen.id_kat_dosen');
  $query=$this->db->get();
  return $query;
}

function edit_katdosen($where,$table)
{
    return $this->db->get_where($table,$where);
}

function edit_bkd_remun($id)
{
    // return $this->db->get_where($table,$where);
    $this->db->select('*')
                    ->from('bkd_remun_dosen')
                    ->join('master_kategori_dosen', 'bkd_remun_dosen.id_kat_dosen = master_kategori_dosen.id_kat_dosen')
                    ->join('periode_lkd', 'bkd_remun_dosen.id_periode = periode_lkd.id_periode')
                    ->join('bkd', 'bkd_remun_dosen.id_bkd = bkd.id_bkd')
                    ->where('bkd_remun_dosen.id_kat_dosen',$id)
                    ->where('periode_lkd.status',1);
    $query=$this->db->get();
    return $query;
}

function edit_kat_dosen($id)
{
    // return $this->db->get_where($table,$where);
    $this->db->select('*')
                    ->from('master_kategori_dosen')
                    ->where('id_kat_dosen',$id);
    $query=$this->db->get();
    return $query;
}

function update_bkdremun($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_katdosen($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function hapus_katdosen($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}

function insert_katdosen($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

// Edit Table Skema
// function update_skema1($id_kat_dosen,$id_bkd,$fields)
// {
//   $this ->db
//         ->where('id_kat_dosen',$id_kat_dosen)
//         ->where('id_bkd',$id_bkd)
//         ->update('bkd_remun_dosen',$fields);
// }

function update_skema1($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema2($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema3($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema4($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema5($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema6($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema7($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

function update_skema8($id,$fields)
{
  $this ->db
        ->where('id',$id)
        ->update('bkd_remun_dosen',$fields);
}

// INSERT
function insert_bkd($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function insert_syarat($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function insert_subbkd($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}

function insert_skema($data,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
    $this->db->insert($table, $data);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
}
// EDIT
function edit_bkd($where,$table)
{
    return $this->db->get_where($table,$where);
}

function edit_subbkd($where,$table)
{
    return $this->db->get_where($table,$where);
}

public function get_by_id($id)
  {

    $this->db->select('*');
    $this->db->from('bkd_remun_dosen');
    // $this->db->join('pegview', 'tb_pegawai_profil.nip = pegview.nip');
    $this->db->where('id_kat_dosen', $id);
    $query = $this->db->get();
    return $query->row();
  }

// UPDATE
function update_bkd($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_subbkd($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_syaratfile($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function update_kegiatan($id,$fields)
{
  $this ->db
        ->where('id_kegiatan',$id)
        ->update('bkd_kegiatan',$fields);
}

function update_bkdhitung($id,$fields)
{
  $this ->db
        ->where('id_kegiatan',$id)
        ->update('bkd_kegiatan',$fields);
}

function update_bkdhitung1($id,$fields)
{
  $this ->db
        ->where('id_kegiatan',$id)
        ->update('bkd_kegiatan',$fields);
}

function update_bkdhitung2($id,$fields)
{
  $this ->db
        ->where('id_kegiatan',$id)
        ->update('bkd_kegiatan',$fields);
}

function update_bkdhitung3($id,$fields)
{
  $this ->db
        ->where('id_kegiatan',$id)
        ->update('bkd_kegiatan',$fields);
}
//HAPUS
function hapus_bkd($where,$table)
{
    $this->db->where($where);
    $query=$this->db->delete($table);
}

function hapus_subbkd($where,$table)
{
    $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
    $this->db->where($where);
    $this->db->delete($table);
    if($this->db->affected_rows() < 1 )
        {
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
}

}//Close Class
