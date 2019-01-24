<?php
class M_pegawai extends CI_Model{

var $tabless = 'pegview';

   function __construct()
    {
        parent::__construct();
        $this->dbsimpeg = $this->load->database('dbsimpeg', TRUE);
    }

//SHOW
function show_golongan($id)
{
  $this->db->select('profil_dosen.nip,profil_dosen.id_gol,tb_golongan.id_gol,tb_golongan.nama_golongan,tb_golongan.nama_jabatan')
                  ->from('profil_dosen')
                  ->join('tb_golongan','profil_dosen.id_gol = tb_golongan.id_gol')
                  ->where('profil_dosen.nip=', $id);
  $query=$this->db->get()->result();
  return $query;
}
// WEB SERVICE
    function show_pegawai_service(){
      $this->dbsimpeg->select('nip,nama_peg,alamat')
                      ->from('tb_pegawai');
      $query = $this->db->get()->result();
      return $query;
    }

    function show_pegawai_services($where,$table){
        $this->db->select('nip,nama_peg,alamat');
        $query=$this->db->get_where($table,$where);
        return $query;

    }

/*PEGAWAI ALL*/
    function show_pegawai(){
      $this->db->select('a.nip,a.s3,b.nama_peg,c.kategori_dosen')
                      ->from('uinar_lkd2.profil_dosen a')
                      ->join('simpeg.tb_pegawai b','a.nip=b.nip')
                      ->join('uinar_lkd2.master_kategori_dosen c','a.id_kat_dosen=c.id_kat_dosen')
                      ->where('a.nip !=', 007)
                      ->order_by('a.nip ASC');
      $query=$this->db->get()->result();
      return $query;
    }

/* INSERT PROFIL PEGAWAI */
    function show_pegawai_setting(){
        $this->dbsimpeg->select('nip,nama_peg,status_peg,status_profesi,status_profil')
                 ->from('tb_pegawai')
                 ->where('nip !=', 007)
                 ->where('status_profesi !=', 2);
        $query = $this->db->get()->result();
        return $query;
    }

/* INSERT PROFIL DOSEN */
    function show_dosen_setting(){
        $this->dbsimpeg->select('nip,nama_peg,status_peg,status_profesi,status_profil')
                 ->from('tb_pegawai')
                 ->where('nip !=', 007)
                 ->where('status_profesi =', 2);
        $query = $this->db->get()->result();
        return $query;
    }

/*PEGAWAI*/
    function show_pegawai_profil(){
        $query = $this->dbsimpeg->get('tb_pegawai_profil')->result();
        return $query;
    }
//show_golongan_select
function show_golongan_select(){
    $query = $this->dbsimpeg->get('tb_golongan')->result();
    return $query;
}
/*PEGAWAI*/
    function show_pegawai_stprof(){
        $this->dbsimpeg->select('*')
                        ->from('tb_pegawai')
                        ->where(array('status_profil' => 0))
                        ->order_by('nip');
        $query=$this->db->get()->result();
        return $query;
    }
 /*PEGAWAI VIEWS*/

    function show_viewpages(){
      $this->db->select('*')
                      ->from('uinar_lkd2.profil_dosen a')
                      ->join('simpeg.tb_pegawai b','a.nip=b.nip', 'LEFT')
                      ->join('uinar_lkd2.master_kategori_dosen c','a.id_kat_dosen=c.id_kat_dosen')
                      ->join('uinar_lkd2.tbl_mst_fakultas d','a.id_fakultas=d.id_fakultas', 'LEFT')
                      ->where('a.id_kat_dosen !=', 0)
                      ->order_by('a.nip ASC');
      $query=$this->db->get()->result();
      return $query;
    }

    function show_viewpages_edit($id){
      $this->dbsimpeg->select('*')
                      ->from('pegview')
                      ->where('nip=', $id);
      $query=$this->dbsimpeg->get()->result();
      return $query;
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
    function edit_pegawai($id){
      $this->db->select('*')
                      ->from('simpeg.tb_pegawai a')
                      ->join('uinar_lkd2.profil_dosen b','a.nip = b.nip')
                      ->where('b.nip=', $id);
      $query=$this->db->get()->result();
      return $query;
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
/*UPDATE KATEGORI Dosen */
    public function get_by_id($id)
    	{

        $this->dbsimpeg->select('*');
        $this->dbsimpeg->from('tb_pegawai_profil');
        $this->dbsimpeg->join('pegview', 'tb_pegawai_profil.nip = pegview.nip');
        $this->dbsimpeg->where('tb_pegawai_profil.nip', $id);
        $query = $this->dbsimpeg->get();

    		return $query->row();
    	}

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

/* KATEGORI DOSEN */
        function show_kategori_dosen(){
          $this->db->select('*');
          $this->db->from('master_kategori_dosen');
          $query = $this->db->get()->result();

          return $query;
        }

/* RIWAYAT PENDIDIKAN JOIN PENDIDIKAN */
    function riwayatpendidikan($id){
        $this->db->select('*');
        $this->db->from('simpeg.tb_riwayatpendidikan');
        $this->db->join('simpeg.tb_pendidikan', 'simpeg.tb_pendidikan.id_pendidikan = simpeg.tb_riwayatpendidikan.id_pendidikan');
        $this->db->where('simpeg.tb_riwayatpendidikan.nip', $id);
        $query = $this->db->get()->result();

        return $query;
    }
/* RIWAYAT JABATAN JOIN JABATAN */
    function riwayatjabatan($id){
        $this->db->select('simpeg.tb_riwayatjabatan_pegawai.id_riwayat_jabatan,simpeg.tb_riwayatjabatan_pegawai.nip,
                           simpeg.tb_riwayatjabatan_pegawai.id_jabatan,YEAR(simpeg.tb_riwayatjabatan_pegawai.tgl_riwayat) AS Tahun,
                           simpeg.tb_jabatan_struktural.jabatan_struktural');
        $this->db->from('simpeg.tb_riwayatjabatan_pegawai');
        $this->db->join('simpeg.tb_jabatan_struktural', 'simpeg.tb_jabatan_struktural.id_jabatan = simpeg.tb_riwayatjabatan_pegawai.id_jabatan');
        $this->db->where('simpeg.tb_riwayatjabatan_pegawai.nip', $id);
        $query = $this->db->get()->result();
        return $query;
    }
/* RIWAYAT DIKLAT*/
    function riwayatdiklat($id){
      $this->db->select('*');
      $this->db->from('simpeg.tb_riwayatdiklat');
      $this->db->where('simpeg.tb_riwayatdiklat.nip', $id);
      $query = $this->db->get()->result();

      return $query;
    }
/* RIWAYAT SEMINAR*/
    function riwayatseminar($id){
      $this->db->select('*');
      $this->db->from('simpeg.tb_riwayatseminar');
      $this->db->where('simpeg.tb_riwayatseminar.nip', $id);
      $query = $this->db->get()->result();

      return $query;
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

function update_pass($where,$data,$table){
        	$this->db->where($where);
        	$this->db->update($table,$data);
}

function update_kat_dosen($where,$data,$table){
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

public function model_loginas($id) {
    $nip = $id;
        $this->db->select('a.nip,a.user_level,a.id_kat_dosen,b.nama_peg');
        $this->db->from('uinar_lkd2.profil_dosen a');
        $this->db->join('simpeg.tb_pegawai b', 'a.nip = b.nip', 'left');
        $this->db->where('a.nip', $nip);
        $query = $this->db->get()->row();
    //var_dump($query);
          if ($query) {
              //GET ACL
              $qAcl = $this->db->where('nip',$nip)->get('profil_dosen')->row();
                      if($qAcl){
                                $acl  = array('username'=>$qAcl->nip);
                                $sess = array(
                                                'nipp' => $query->nip,
                                                'username' => $query->nama_peg,
                                                'user_level' => $query->user_level,
                                                'kat_dosen' => $query->id_kat_dosen,
                                                'is_login' => TRUE
                                              );
                                $this->session->set_userdata($sess);
                                $msg = 'success';

                      }else {
                          $msg = 'error';
                      }
          } else {
              $msg = 'error';
          }

    $this->db->close();
    return $msg;
}

}
