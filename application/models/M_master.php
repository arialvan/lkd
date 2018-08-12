<?php
class M_master extends CI_Model{


   function __construct()
    {
        parent::__construct();
    }

/*PERIODE*/
function show_periode()
{
    $query = $this->db->get('periode_lkd')->result();
    return $query;
}

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

}//Close Class
