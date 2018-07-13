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

function show_bkdkegiatan()
{
    $query = $this->db->get('bkd_kegiatan')->result();
    return $query;
}

//insert
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

//update
function update_bkdsubkegiatan($where,$data,$table)
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
                  // ->where('app_ketuaprodi=', 1)
                  // ->where('app_assesor1=', 2)
                  // ->where('app_assesor2=', 3)
                  ->order_by('id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->where('id_bkd=', 1)
                  ->order_by('id_subkegiatan');
  //$this->db->select_sum('sks_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penelitian()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->where('id_bkd=', 2)
                  ->order_by('id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_pengabdian()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->where('id_bkd=', 3)
                  ->order_by('id_subkegiatan');
  $query=$this->db->get()->result();
  return $query;
}

function show_rencana_penunjang()
{
  $this->db->select('*')
                  ->from('bkd_subkegiatan')
                  ->where('id_bkd=', 4)
                  ->order_by('id_subkegiatan');
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
