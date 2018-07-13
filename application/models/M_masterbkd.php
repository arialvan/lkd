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
    $query = $this->db->get('master_kategori_dosen')->result();
    return $query;
}

function show_bkdremun()
{
  /*
  SELECT p.*
   , group_concat(CASE f.name WHEN 'telephone' THEN fp.value END) telephone
   , group_concat(CASE f.name WHEN 'address'   THEN fp.value END) address
FROM person p
JOIN field f
  LEFT JOIN fieldPerson fp
    ON    fp.personId = p.id
      AND fp.fieldId = f.id
GROUP BY p.id
  */
    // SELECT *,
    //    CASE
    //      WHEN master_kategori_dosen.id_kat_dosen = '1' AND master_kategori_dosen.id_bkd = '1' THEN 'sks_bkd'
    //      WHEN table1.event = 't' AND table1.name = 'smith' THEN 'very low'
    //      ELSE (SELECT table2.risk FROM table2 WHERE table2.value <= table1.value
    //            ORDER BY table2.value DESC LIMIT 1)
    //    END AS risk
    // FROM table1
    // ORDER BY FIELD( table1.event, 'r', 'f', 't' ), table1.value DESC


    //


      /*
      SELECT *,
                                        group_concat(CASE f.id_bkd WHEN '1' THEN fp.sks_bkd END) Pendidikan,
                                        group_concat(CASE f.id_bkd WHEN '2' THEN fp.sks_bkd END) Penelitian,
                                        group_concat(CASE f.id_bkd WHEN '3' THEN fp.sks_bkd END) Pengabdian,
                                        group_concat(CASE f.id_bkd WHEN '4' THEN fp.sks_bkd END) Penunjang,
                                        group_concat(CASE ff.id_remun WHEN '1' THEN fp.sks_remun END) Pendidikans,
                                        group_concat(CASE ff.id_remun WHEN '2' THEN fp.sks_remun END) Penelitians,
                                        group_concat(CASE ff.id_remun WHEN '3' THEN fp.sks_remun END) Pengabdians,
                                        group_concat(CASE ff.id_remun WHEN '4' THEN fp.sks_remun END) Penunjangs,
                                        group_concat(CASE ff.id_remun WHEN '1' THEN fp.poin_remun END) PoinPendidikan,
                                        group_concat(CASE ff.id_remun WHEN '2' THEN fp.poin_remun END) PoinPenelitian,
                                        group_concat(CASE ff.id_remun WHEN '3' THEN fp.poin_remun END) PoinPengabdian,
                                        group_concat(CASE ff.id_remun WHEN '4' THEN fp.poin_remun END) PoinPenunjang
                                FROM master_kategori_dosen b
                                JOIN bkd f
                                JOIN remunerasi ff
                                LEFT JOIN bkd_remun_dosen fp
                                      ON fp.id_kat_dosen = b.id_kat_dosen
                                      AND fp.id_bkd      = f.id_bkd
                                      AND fp.id_remun    = ff.id_remun
                                GROUP BY fp.id_kat_dosen

      */
  //
  // $query = $this->db->query("SELECT *,
  //                                   group_concat(CASE WHEN fp.id_bkd='1' AND fp.id_kat_dosen='1' THEN fp.sks_bkd END) Pendidikan,
  //                                   group_concat(CASE WHEN fp.id_bkd='2' AND fp.id_kat_dosen='1' THEN fp.sks_bkd END) Penelitian,
  //                                   group_concat(CASE WHEN fp.id_bkd='3' AND fp.id_kat_dosen='1' THEN fp.sks_bkd END) Pengabdian,
  //                                   group_concat(CASE WHEN fp.id_bkd='4' AND fp.id_kat_dosen='1' THEN fp.sks_bkd END) Penunjang,
  //                                   group_concat(CASE ff.id_remun WHEN '1' THEN fp.sks_remun END) Pendidikans,
  //                                   group_concat(CASE ff.id_remun WHEN '2' THEN fp.sks_remun END) Penelitians,
  //                                   group_concat(CASE ff.id_remun WHEN '3' THEN fp.sks_remun END) Pengabdians,
  //                                   group_concat(CASE ff.id_remun WHEN '4' THEN fp.sks_remun END) Penunjangs,
  //                                   group_concat(CASE ff.id_remun WHEN '1' THEN fp.poin_remun END) PoinPendidikan,
  //                                   group_concat(CASE ff.id_remun WHEN '2' THEN fp.poin_remun END) PoinPenelitian,
  //                                   group_concat(CASE ff.id_remun WHEN '3' THEN fp.poin_remun END) PoinPengabdian,
  //                                   group_concat(CASE ff.id_remun WHEN '4' THEN fp.poin_remun END) PoinPenunjang
  //                           FROM master_kategori_dosen b
  //                           JOIN bkd f
  //                           JOIN remunerasi ff
  //                           LEFT JOIN bkd_remun_dosen fp
  //                                 ON fp.id_kat_dosen = b.id_kat_dosen
  //                                 AND fp.id_bkd      = f.id_bkd
  //                                 AND fp.id_remun    = ff.id_remun
  //                           GROUP BY fp.id_kat_dosen ");
  $this->db->select('*,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 1 THEN bkd_remun_dosen.sks_bkd END) AS pendidikan,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 2 THEN bkd_remun_dosen.sks_bkd END) AS penelitian,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 3 THEN bkd_remun_dosen.sks_bkd END) AS pengabdian,
                      MAX(CASE WHEN bkd_remun_dosen.id_bkd = 4 THEN bkd_remun_dosen.sks_bkd END) AS penunjang,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 1 THEN bkd_remun_dosen.sks_remun END) AS pendidikans,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 2 THEN bkd_remun_dosen.sks_remun END) AS penelitians,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 3 THEN bkd_remun_dosen.sks_remun END) AS pengabdians,
                      MAX(CASE WHEN bkd_remun_dosen.id_remun = 4 THEN bkd_remun_dosen.sks_remun END) AS penunjangs
                    ')
                  ->from('bkd_remun_dosen')
                  ->join('master_kategori_dosen','bkd_remun_dosen.id_kat_dosen = master_kategori_dosen.id_kat_dosen')
                  ->group_by('bkd_remun_dosen.id_kat_dosen')
                  ->order_by('bkd_remun_dosen.id');
  $query=$this->db->get();
  return $query;
}

function edit_katdosen($where,$table)
{
    return $this->db->get_where($table,$where);
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
