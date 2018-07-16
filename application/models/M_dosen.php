<?php
class M_dosen extends CI_Model{


   function __construct()
    {
        parent::__construct();
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

/*DOSEN*/
function show_dosen()
{
        $this->db->select('profil_dosen.nip,profil_dosen.nidn,profil_dosen.id_kat_dosen,tb_pegawai.nama_peg,master_kategori_dosen.kategori_dosen')
                 ->from('profil_dosen')
                 ->join('tb_pegawai','profil_dosen.nip = tb_pegawai.nip')
                 ->join('master_kategori_dosen','profil_dosen.id_kat_dosen = master_kategori_dosen.id_kat_dosen','left')
                 ->where('profil_dosen.nip!=007')
                 ->where('profil_dosen.id_kat_dosen!=0')
                 ->order_by('tb_pegawai.nama_peg ASC');
        $query = $this->db->get()->result();
        return $query;
}

function show_dosen_profil()
{
  $this->db->select('profil_dosen.nip,profil_dosen.id_kat_dosen,tb_pegawai.nama_peg')
           ->from('profil_dosen')
           ->join('tb_pegawai','profil_dosen.nip = tb_pegawai.nip')
           ->where('profil_dosen.nip!=007')
           ->where('profil_dosen.id_kat_dosen=0')
           ->order_by('tb_pegawai.nama_peg ASC');
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

function update_dosen($where,$data,$table)
{
    $this->db->where($where);
    $this->db->update($table,$data);
}

}//Close Class
