<?php
class M_rencanakerja extends CI_Model{


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

public function ambil_tb_kegiatan()
  {
      $state=$this->input->post("state");
      $sql="select * FROM bkd join bkd_kegiatan "
         . "on bkd.id_bkd=bkd_kegiatan.id_bkd "
         . "where bkd.id_bkd ='$state' order by bkd.id_bkd";
      $query=$this->db->query($sql);
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


function show_syarat_pendidikan($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS skspendidikan, SUM(a.poin_subkegiatan) AS poinpendidikan')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 1);
                    // ->or_where('a.id_bkd=',4);
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
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 3);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}

function show_syarat_penunjang($id)
{
    $this->db->select('SUM(a.sks_subkegiatan) AS skspenunjang, SUM(a.poin_subkegiatan) AS poinpenunjang')
                    ->from('bkd_subkegiatan a')
                    ->join('bkd_kegiatan b','a.id_kegiatan = b.id_kegiatan')
                    ->join('periode_lkd c','b.id_periode = c.id_periode')
                    ->where('a.nip=', $id)
                    ->where('c.status=',1)
                    ->where_in('a.id_bkd', 4);
                    // ->or_where('a.id_bkd=',4);
    $query=$this->db->get()->result();
    return $query;
}
//CLOSE QUERY PERHITUNGAN

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

  function edit_subkegiatan2($id)
{
    $this->db->select('*')
                    ->from('bkd_subkegiatan_file')
                    ->join('bkd_subkegiatan','bkd_subkegiatan_file.id_subkegiatan = bkd_subkegiatan.id_subkegiatan')
                    ->where('bkd_subkegiatan_file.id_subkegiatan=', $id);
    $query=$this->db->get()->result();
    return $query;

}

function update_bkdsubkegiatan($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

function cek_kegiatan($where,$table){
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

function show_rencana()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                  ->where('bkd_subkegiatan.id_bkd=', 1)
                  ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
                  ->order_by('bkd_subkegiatan.id_subkegiatan');
  //$this->db->select_sum('sks_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penelitian()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                  ->where('bkd_subkegiatan.id_bkd=', 2)
                  ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
                  ->order_by('bkd_subkegiatan.id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_pengabdian()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                  ->where('bkd_subkegiatan.id_bkd=', 3)
                  ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
                  ->order_by('bkd_subkegiatan.id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penunjang()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->join('bkd_kegiatan','bkd_subkegiatan.id_kegiatan = bkd_kegiatan.id_kegiatan')
                  ->where('bkd_subkegiatan.id_bkd=', 4)
                  ->where('bkd_subkegiatan.nip=', $this->session->userdata('nipp'))
                  ->order_by('bkd_subkegiatan.id_subkegiatan');
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

}//Close Class
