<?php
class M_pegawai extends CI_Model{

   function __construct()
    {
        parent::__construct();
    }

// WEB SERVICE
    function show_pegawai_service(){
      $this->db->select('nip,nama_peg,alamat')
               ->from('tb_pegawai');
      $query = $this->db->get()->result();
      return $query;
    }

    function show_pegawai_services($where,$table){
        //return $this->db->get_where($table,$where);
        $this->db->select('nip,nama_peg,alamat');
        $query=$this->db->get_where($table,$where);
        return $query;

    }

/*PEGAWAI ALL*/
    function show_pegawai(){
      $this->db->select('*')
                      ->from('tb_pegawai')
                      ->where('nip !=', 007)
                      ->order_by('nip');
      $query=$this->db->get()->result();
      return $query;
    }

/* INSERT PROFIL PEGAWAI */
    function show_pegawai_setting(){
        $this->db->select('nip,nama_peg,status_peg,status_profesi,status_profil')
                 ->from('tb_pegawai')
                 ->where('nip !=', 007)
                 ->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
    }

/* INSERT PROFIL DOSEN */
    function show_dosen_setting(){
        $this->db->select('nip,nama_peg,status_peg,status_profesi,status_profil')
                 ->from('tb_pegawai')
                 ->where('nip !=', 007)
                 ->where('status_profesi =', 2);
        $query = $this->db->get()->result();
        return $query;
    }

/*PEGAWAI*/
    function show_pegawai_profil(){
        $query = $this->db->get('tb_pegawai_profil')->result();
        return $query;
    }
/*PEGAWAI*/
    function show_pegawai_stprof(){
        $this->db->select('*')
                        ->from('tb_pegawai')
                        ->where(array('status_profil' => 0))
                        ->order_by('nip');
        $query=$this->db->get()->result();
        return $query;
    }
 /*PEGAWAI VIEWS*/

    function show_viewpages(){
      $this->db->select('*')
                      ->from('pegview')
                      ->where('nip !=', 007)
                      ->order_by('nip');
      $query=$this->db->get()->result();
      return $query;
    }

    function show_viewpages_edit($where,$table){
        return $this->db->get_where($table,$where);
    }


/*INSERT PEGAWAI*/
    function insert_pegawai($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }

/*INSERT PROFIL PEGAWAI*/
    function insert_profil_pegawai($data,$table) {
        $this->db->insert($table, $data);
    }
/*INSERT PROFIL DOSEN*/
    function insert_profil_dosen($data,$table) {
        $this->db->insert($table, $data);
    }
/*EDIT PEGAWAI*/
    function edit_pegawai($where,$table){
        return $this->db->get_where($table,$where);
    }
/*UPDATE PEGAWAI*/
    function update_pegawai($where,$data,$table){
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
      	$this->db->where($where);
      	$this->db->update($table,$data);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
/*UPDATE PEGAWAI PROFIL*/
    function update_pegawai_profil($where,$data,$table){
            	$this->db->where($where);
            	$this->db->update($table,$data);
    }

/*UPDATE PEGAWAI ATASAN*/
    function update_pegawai_atasan($where,$data,$table){
    	$this->db->where($where);
    	$this->db->update($table,$data);
    }
/*HAPUS DATA PEGAWAI*/
    function hapus_pegawai($where,$table){
        $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
	$this->db->where($where);
	$this->db->delete($table);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
    }

/* RIWAYAT PENDIDIKAN JOIN PENDIDIKAN */
    function riwayatpendidikan($id){
        $this->db->select('*');
        $this->db->from('tb_riwayatpendidikan');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_riwayatpendidikan.id_pendidikan');
        //$this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_riwayatpendidikan.nip','left');
        $this->db->where('tb_riwayatpendidikan.nip', $id);
        $query = $this->db->get()->result();

        return $query;
    }
/* RIWAYAT JABATAN JOIN JABATAN */
    function riwayatjabatan($id){
        $this->db->select('tb_riwayatjabatan_pegawai.id_riwayat_jabatan,tb_riwayatjabatan_pegawai.nip,tb_riwayatjabatan_pegawai.id_jabatan,YEAR(tb_riwayatjabatan_pegawai.tgl_riwayat) AS Tahun,tb_jabatan_struktural.jabatan_struktural');
        $this->db->from('tb_riwayatjabatan_pegawai');
        $this->db->join('tb_jabatan_struktural', 'tb_jabatan_struktural.id_jabatan = tb_riwayatjabatan_pegawai.id_jabatan');
        //$this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_riwayatjabatan.nip','left');
        $this->db->where('tb_riwayatjabatan_pegawai.nip', $id);
        $query = $this->db->get()->result();
        return $query;
    }
/* RIWAYAT DIKLAT*/
    function riwayatdiklat($where,$table){
       return $this->db->get_where($table,$where);
    }
/* RIWAYAT SEMINAR*/
    function riwayatseminar($where,$table){
       return $this->db->get_where($table,$where);
    }

/*INSERT ORGANISASI */
    function insert_organisasi($data,$table) {
        $this->db->insert($table, $data);
    }

/*SHOW ORGANISASI */
    function show_organisasi(){
        $query = $this->db->get('organisasi')->result();
        return $query;
    }

/*AMBIL UNIT */
    function ambil_unit() {
	$sql=$this->db->get('tb_unit');
	if($sql->num_rows()>0){
		foreach ($sql->result_array() as $row)
			{
				$result['-']= '- Pilih Unit -';
				$result[$row['id_unit']]= ucwords(strtolower($row['unit_organisasi']));
			}
			return $result;
		}
	}

/*AMBIL UNIT KERJA*/
    public function ambil_jabatan($id){
        $this->db->select('*');
        $this->db->from('tb_kelompok_organisasi');
        $this->db->join('tb_jabatan_struktural', 'tb_kelompok_organisasi.id_jabatan = tb_jabatan_struktural.id_jabatan');
        $this->db->where('tb_kelompok_organisasi.id_unit', $id);
	$this->db->group_by('tb_kelompok_organisasi.id_jabatan');
	$sql=$this->db->get('tb_jabatan_struktural');
	if($sql->num_rows()>0){
		foreach ($sql->result_array() as $row)
        {
            $result[$row['id_jabatan']]= ucwords(strtolower($row['jabatan_struktural']));
        }
		} else {
		   $result['-']= '- Belum Ada Jabatan -';
		}
        return $result;
	}


      public function ambil_tb_jabatan()
        {
            $state=$this->input->post("state");
            $sql="select * FROM tb_kelompok_organisasi join tb_jabatan_struktural "
               . "on tb_kelompok_organisasi.id_jabatan=tb_jabatan_struktural.id_jabatan "
               . "where tb_kelompok_organisasi.id_unit ='$state' group by tb_kelompok_organisasi.id_jabatan";
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_unitkerja()
        {
            $state          = $this->input->post("state");
            $ex             = explode('#',$state);
            $id_jabatan     = $ex[0];
            $id_unit        = $ex[1];

            $sql="select * FROM tb_kelompok_organisasi join tb_unit_kerja on tb_kelompok_organisasi.id_unit_kerja=tb_unit_kerja.id_unit_kerja
                  where tb_kelompok_organisasi.id_jabatan ='$id_jabatan' and tb_kelompok_organisasi.id_unit='$id_unit'
                  group by tb_kelompok_organisasi.id_unit_kerja ";
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_satuankerja()
        {
            $state          = $this->input->post("state");
            $ex             = explode('#',$state);
            $id_unit_kerja  = $ex[0];
            $id_unit        = $ex[1];
            $id_jabatan     = $ex[2];
            $sql="select * FROM tb_kelompok_organisasi join tb_satuan_kerja on tb_kelompok_organisasi.id_satuan_kerja=tb_satuan_kerja.id_satuan_kerja
                    where tb_kelompok_organisasi.id_unit_kerja ='$id_unit_kerja' and tb_kelompok_organisasi.id_unit='$id_unit'
                    and tb_kelompok_organisasi.id_jabatan='$id_jabatan'
                    group by tb_kelompok_organisasi.id_satuan_kerja "; //
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_jfu()
        {
            $state          = $this->input->post("state");
            $ex             = explode('#',$state);
            $id_satuan_kerja= $ex[0];
            $id_unit        = $ex[2];
            $sql="select * FROM tb_kelompok_organisasi join tb_jabatan_jfu on tb_kelompok_organisasi.id_jfu=tb_jabatan_jfu.id_jfu
                  where tb_kelompok_organisasi.id_satuan_kerja ='$id_satuan_kerja'
                  and tb_kelompok_organisasi.id_unit ='$id_unit'
                  order by tb_kelompok_organisasi.id_jfu ";
            $query=$this->db->query($sql);
            return $query;
        }

/*EDIT AND UPDATE PASSWORD */
function edit_password($where,$table){
    return $this->db->get_where($table,$where);
}
function update_password($where,$data,$table){
        	$this->db->where($where);
        	$this->db->update($table,$data);
}

/*EDIT AND UPDATE PROFIL */
function edit_profil($where,$table){
    return $this->db->get_where($table,$where);
}
function update_profil($where,$data,$table){
        	$this->db->where($where);
        	$this->db->update($table,$data);
}


}
