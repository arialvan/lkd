<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
        var $acl;
	public function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_pegawai');
            $this->load->model('M_master');
            $this->load->helper(array('form','url'));
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

	public function index()
	{
//            $this->output->cache(2);
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_viewpages();
            $data['title'] = 'Data Pegawai';
            $this->load->view('layout/header_datatables',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_view');
            $this->load->view('layout/footer_datatables');
        }

        public function PegawaiAll()
	{
            $this->output->cache(120);
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai();
            $data['title'] = 'Data Pegawai';
            $this->load->view('layout/header_datatables',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_view_all');
            $this->load->view('layout/footer_datatables');
        }
/*PROSES TAMBAH PEGAWAI*/
        public function FormPegawai()
	{
            $this->output->cache(1);
            $data['name'] = $this->session->userdata('username');
            $data['golongan'] = $this->M_master->show_golongan();
            $data['agama'] = $this->M_master->show_agama();
            $data['mapel'] = $this->M_master->show_mapel();
            $data['title'] = 'Data Pegawai';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_input');
            $this->load->view('layout/footer');
        }
/*INSERT PEGAWAI*/
    function InsertPegawai() {
            if(!empty($_FILES['foto']['name'])){
                $config['upload_path'] = 'photo/pegawai/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $this->input->post('nip');

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('foto')){
                    $uploadData = $this->upload->data();
                    $uploadData['file_name'] = $this->input->post('nip').'.jpg';
                    $name = $uploadData['file_name'];
                    $picture = '../../photo/pegawai/'.$name;
                }else{
                    $picture = '';
                }
            }else{
                    $picture = '';
            }
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_peg' => $this->input->post('nama_peg'),
            'alamat' => $this->input->post('alamat'),
            'id_gol' => $this->input->post('id_gol'),
            'id_agama' => $this->input->post('id_agama'),
            'id_mapel' =>  $this->input->post('id_mapel'),
            'no_askes' => $this->input->post('no_askes'),
            'telp' => $this->input->post('telp'),
            'tempat_lhr' => $this->input->post('tempat_lhr'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kel' => $this->input->post('jenis_kel'),
            'gol_darah' => $this->input->post('gol_darah'),
            'status_nikah' => $this->input->post('status_nikah'),
            'jumlah_anak' => $this->input->post('jumlah_anak'),
            'status_peg' => $this->input->post('status_peg'),
            'status_profesi' => $this->input->post('status_profesi'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'gaji_pokok' => $this->input->post('gaji_pokok'),
            'tmt' => $this->input->post('tmt'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'ket' => $this->input->post('ket'),
            'foto' => $picture
        );
        //var_dump($data);
        $this->M_pegawai->insert_pegawai($data, 'tb_pegawai');
        redirect('Pegawai');
    }
/*EDIT PEGAWAI*/
        public function EditPegawai($id) {
            $data['name'] = $this->session->userdata('username');
            $where = array('nip' => $id);
            $data['pegawai'] = $this->M_pegawai->edit_pegawai($where, 'tb_pegawai')->result();
            $data['views'] = $this->M_pegawai->show_viewpages_edit($where, 'pegview')->result();
            $data['golongan'] = $this->M_master->show_golongan();
            $data['agama'] = $this->M_master->show_agama();
            $data['mapel'] = $this->M_master->show_mapel();
            $data['title'] = 'Edit Pegawai';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_edit');
            $this->load->view('layout/footer');
    }
/*UPDATE PEGAWAI*/
    function UpdatePegawai() {
        if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] = 'photo/pegawai/';
            $path =$config['upload_path'];
            $file = $path.$this->input->post('nip').'.jpg';
                    unlink($file);
                    $config['upload_path'] = 'photo/pegawai/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $this->input->post('nip');
                    //Load upload library and initialize configuration
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);

                    $this->upload->do_upload('foto');
                    $uploadData = $this->upload->data();
                    $uploadData['file_name'] = $this->input->post('nip').'.jpg';
                    $name = $uploadData['file_name'];
                    $picture = '../../photo/pegawai/'.$name;

            // Insert Database
                $data = array(
                                'nama_peg' => $this->input->post('nama_peg'),
                                'alamat' => $this->input->post('alamat'),
                                'id_gol' => $this->input->post('id_gol'),
                                'id_agama' => $this->input->post('id_agama'),
                                'id_mapel' =>  $this->input->post('id_mapel'),
                                'no_askes' => $this->input->post('no_askes'),
                                'telp' => $this->input->post('telp'),
                                'tempat_lhr' => $this->input->post('tempat_lhr'),
                                'tgl_lahir' => $this->input->post('tgl_lahir'),
                                'jenis_kel' => $this->input->post('jenis_kel'),
                                'gol_darah' => $this->input->post('gol_darah'),
                                'status_nikah' => $this->input->post('status_nikah'),
                                'jumlah_anak' => $this->input->post('jumlah_anak'),
                                'status_peg' => $this->input->post('status_peg'),
                                'status_profesi' => $this->input->post('status_profesi'),
                                'masa_kerja' => $this->input->post('masa_kerja'),
                                'gaji_pokok' => $this->input->post('gaji_pokok'),
                                'tmt' => $this->input->post('tmt'),
                                'tgl_pensiun' => $this->input->post('tgl_pensiun'),
                                'ket' => $this->input->post('ket'),
                                'foto' => $picture
                            );
                            $where = array('nip' => $this->input->post('nip'));
                            $this->M_pegawai->update_pegawai($where, $data, 'tb_pegawai');
                            echo "Update Succes"; redirect('Pegawai','refresh');
            }else{
                    // Insert Database
                $data = array(
                                'nama_peg' => $this->input->post('nama_peg'),
                                'alamat' => $this->input->post('alamat'),
                                'id_gol' => $this->input->post('id_gol'),
                                'id_agama' => $this->input->post('id_agama'),
                                'id_mapel' =>  $this->input->post('id_mapel'),
                                'no_askes' => $this->input->post('no_askes'),
                                'telp' => $this->input->post('telp'),
                                'tempat_lhr' => $this->input->post('tempat_lhr'),
                                'tgl_lahir' => $this->input->post('tgl_lahir'),
                                'jenis_kel' => $this->input->post('jenis_kel'),
                                'gol_darah' => $this->input->post('gol_darah'),
                                'status_nikah' => $this->input->post('status_nikah'),
                                'jumlah_anak' => $this->input->post('jumlah_anak'),
                                'status_peg' => $this->input->post('status_peg'),
                                'status_profesi' => $this->input->post('status_profesi'),
                                'masa_kerja' => $this->input->post('masa_kerja'),
                                'gaji_pokok' => $this->input->post('gaji_pokok'),
                                'tmt' => $this->input->post('tmt'),
                                'tgl_pensiun' => $this->input->post('tgl_pensiun'),
                                'ket' => $this->input->post('ket')
                            );
                            $where = array('nip' => $this->input->post('nip'));
                            $this->M_pegawai->update_pegawai($where, $data, 'tb_pegawai');
                            echo "Update Succes"; redirect('Pegawai','refresh');
            }

    }

/*PROSES TAMBAH PROFIL PEGAWAI*/
        public function InputProfilPegawai()
	{

            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai_setting();
            $data['eselon'] = $this->M_master->show_eselon();
            $data['golongan'] = $this->M_master->show_golongan();
            $data['jabatan'] = $this->M_master->show_jabatan();
            $data['unit'] = $this->M_master->show_unit();
            $data['unitkerja'] = $this->M_master->show_unit_kerja();
            $data['satuankerja'] = $this->M_master->show_satuan_kerja();
            $data['pendidikan'] = $this->M_master->show_pendidikan();
            $data['jfu'] = $this->M_master->show_jfu();
            $data['title'] = 'Input Profil Pegawai';
            $this->load->view('layout/header_datatables',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_input_profil');
            $this->load->view('layout/footer_datatables');
        }

        function ambil_jabatan()
	{
	        $state=$this->input->post('state');
                $query=$this->M_pegawai->ambil_tb_jabatan();
	        echo '<option value="">Pilih Jabatan</option>';
                foreach($query->result() as $row)
                {
                 echo "<option value='".$row->id_jabatan.'#'.$row->id_unit."'>".$row->jabatan_struktural."</option>";
                //echo "<option value='".$row->id_jabatan."'>".$row->jabatan_struktural."</option>";
                }

	}

        function ambil_unitkerja()
	{
	       // $state=$this->input->post('state');
                $query=$this->M_pegawai->ambil_tb_unitkerja();
                //echo '<option value="">Pilih Unit Kerja</option>';
                foreach($query->result() as $row)
                {
                 echo "<option value='".$row->id_unit_kerja.'#'.$row->id_unit.'#'.$row->id_jabatan."'>".$row->unit_kerja."</option>";
                }

                // $querys=$this->M_pegawai->ambil_tb_satuankerja();
                // foreach($querys->result() as $rows)
                // {
                //  echo "<option value='".$rows->id_satuan_kerja.'#'.$rowget->id_atasan."'>".$rows->satuan_kerja.' - '.$rowget->id_atasan."</option>";
                // }
	}

        function ambil_satuankerja()
	{
	        $state=$this->input->post('state');
                $sql=$this->M_pegawai->ambil_tb_satuankerja();
                //echo '<option value="">Pilih Satuan</option>';
                foreach($sql->result() as $rowget)
                {
                 echo "<option value='".$rowget->id_satuan_kerja.'#'.$rowget->id_atasan.'#'.$rowget->id_unit."'>".$rowget->satuan_kerja."</option>";

                }

	}

        function ambil_jfu()
	{
	        $state=$this->input->post('state');
                $sqli=$this->M_pegawai->ambil_tb_jfu();
                //echo '<option value="">Pilih Satuan</option>';
                foreach($sqli->result() as $rowgets)
                {
                 echo "<option value='".$rowgets->id_jfu.'#'.$rowgets->id_atasan."'>".$rowgets->jfu."</option>";
                }
	}

    function InsertProfilPegawai() {

        if(!empty($this->input->post('id_jfu'))){

            /* id_satuan_kerja */
                $idsk_post      = $this->input->post('id_satuan_kerja');
                $idsk_explode   = explode('#',$idsk_post);
                $idsatuankerja  = $idsk_explode[0];
            /* id_jfu */
                $jfu_post       = $this->input->post('id_jfu');
                $jfu_explode    = explode('#',$jfu_post);
                $jfu            = $jfu_explode[0];
                $atasan         = $jfu_explode[1];
          /* id_jabatan */
              $jbt_post       = $this->input->post('id_jabatan');
              $jbt_explode    = explode('#',$jbt_post);
              $id_jabatan     = $jbt_explode[0];
              //$atasan         = $jbt_explode[1];
          /* id_unit_kerja */
              $uk_post       = $this->input->post('id_unit_kerja');
              $uk_explode    = explode('#',$uk_post);
              $id_unit_kerja = $uk_explode[0];
            }else{

            /* ID Atasan Non JFU */
                $idsk_post      = $this->input->post('id_satuan_kerja');
                $idsk_explode   = explode('#',$idsk_post);
                $idsatuankerja  = $idsk_explode[0];
                $atasan         = $idsk_explode[1];
            /* id_jabatan */
                $jbt_post       = $this->input->post('id_jabatan');
                $jbt_explode    = explode('#',$jbt_post);
                $id_jabatan     = $jbt_explode[0];
            /* id_unit_kerja */
                $uk_post       = $this->input->post('id_unit_kerja');
                $uk_explode    = explode('#',$uk_post);
                $id_unit_kerja = $uk_explode[0];

                $jfu            = 0;
            }

            $data = array(
                    'nip' => $this->input->post('nip'),
                    'id_eselon' => $this->input->post('id_eselon'),
                    'id_gol' => $this->input->post('id_gol'),
                    'id_jabatan' => $id_jabatan,
                    'id_jabatan_atasan' => $atasan,
                    'id_unit' => $this->input->post('id_unit'),
                    'id_unit_kerja' => $id_unit_kerja,
                    'id_satuan_kerja' => $idsatuankerja,
                    'id_jfu' => $jfu,
                    'id_pendidikan' =>  $this->input->post('id_pendidikan'),
                    'tgl_riwayat' =>  date('Y-m-d')
            );
            //var_dump($data);
            $this->M_pegawai->insert_profil_pegawai($data, 'tb_pegawai_profil');
            //Update Status Profil
            $data1 = array('status_profil' => 1);
            $where = array('nip' => $this->input->post('nip'));
            $this->M_pegawai->update_pegawai($where, $data1, 'tb_pegawai');
            echo 'Insert Success';
    }
/*UPDATE PROFIL PEGAWAI*/
    function UpdateProfilPegawai() {
         if(!empty($this->input->post('id_jfu1'))){

            /* id_satuan_kerja */
                $idsk_post      = $this->input->post('id_satuan_kerja');
                $idsk_explode   = explode('#',$idsk_post);
                $idsatuankerja  = $idsk_explode[0];
           /* id_jfu dan atasan */
                $jfu_post       = $this->input->post('id_jfu1');
                $jfu_explode    = explode('#',$jfu_post);
                $jfu            = $jfu_explode[0];
                $atasan         = $jfu_explode[1];
          /* id_jabatan */
              $jbt_post       = $this->input->post('id_jabatan');
              $jbt_explode    = explode('#',$jbt_post);
              $id_jabatan     = $jbt_explode[0];
          /* id_unit_kerja */
              $uk_post       = $this->input->post('id_unit_kerja');
              $uk_explode    = explode('#',$uk_post);
              $id_unit_kerja = $uk_explode[0];
            }else{

                /* ID Atasan Non JFU */
                    $idsk_post      = $this->input->post('id_satuan_kerja');
                    $idsk_explode   = explode('#',$idsk_post);
                    $idsatuankerja  = $idsk_explode[0];
                    $atasan         = $idsk_explode[1];
                /* id_jabatan */
                    $jbt_post       = $this->input->post('id_jabatan');
                    $jbt_explode    = explode('#',$jbt_post);
                    $id_jabatan     = $jbt_explode[0];
                /* id_unit_kerja */
                    $uk_post       = $this->input->post('id_unit_kerja');
                    $uk_explode    = explode('#',$uk_post);
                    $id_unit_kerja = $uk_explode[0];

                    $jfu            = 0;
            }
            $data = array(
                    'id_eselon' => $this->input->post('id_eselon'),
                    'id_gol' => $this->input->post('id_gol'),
                    'id_jabatan' => $id_jabatan,
                    'id_jabatan_atasan' => $atasan,
                    'id_unit' => $this->input->post('id_unit'),
                    'id_unit_kerja' =>$id_unit_kerja,
                    'id_satuan_kerja' => $idsatuankerja,
                    'id_jfu' => $jfu,
                    'id_pendidikan' =>  $this->input->post('id_pendidikan'),
                    'tgl_riwayat' =>  date('Y-m-d')
            );

            //var_dump($data);
            $where = array('nip' => $this->input->post('nip'));
            $this->M_pegawai->update_pegawai_profil($where, $data, 'tb_pegawai_profil');

            echo 'Update Success';
    }

/*RIWAYAT PEGAWAI*/
        public function ProfilPegawai($id) {
            // $this->output->cache(20);
            $data['name'] = $this->session->userdata('username');
            $where = array('nip' => $id);
            $data['pegawai'] = $this->M_pegawai->edit_pegawai($where, 'tb_pegawai')->result();
            $data['riw_pendidikan'] = $this->M_pegawai->riwayatpendidikan($id);
            $data['riw_jabatan'] = $this->M_pegawai->riwayatjabatan($id);
            $data['riw_diklat'] = $this->M_pegawai->riwayatdiklat($where, 'tb_riwayatdiklat')->result();
            $data['riw_seminar'] = $this->M_pegawai->riwayatseminar($where, 'tb_riwayatseminar')->result();
            $data['title'] = 'Profil Pegawai';
            $this->load->view('layout/header_datatables',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_profil');
            $this->load->view('layout/footer_datatables');
    }

/*PROSES SETTING ORGANISASI */

    public function SetOrganisasi()
	{
            $data['name'] = $this->session->userdata('username');
            $data['organisasi'] = $this->M_pegawai->show_organisasi();
            $data['jabatan'] = $this->M_master->show_jabatan();
            $data['unit'] = $this->M_master->show_unit();
            $data['unitkerja'] = $this->M_master->show_unit_kerja();
            $data['satuankerja'] = $this->M_master->show_satuan_kerja();
            $data['jfu'] = $this->M_master->show_jfu();
            $data['title'] = 'Setting Organisasi';
            $this->load->view('layout/header_datatables',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_organisasi');
            $this->load->view('layout/footer_datatables');
        }

    function InsertSetOrganisasi() {
            if(!empty($this->input->post('id_jfu'))){
                $jfu = $this->input->post('id_jfu');
            }else{
                $jfu = 0;
            }
            $data = array(
                    'id_unit' => $this->input->post('id_unit'),
                    'id_jabatan' => $this->input->post('id_jabatan'),
                    'id_atasan' => $this->input->post('id_atasan'),
                    'id_unit_kerja' => $this->input->post('id_unit_kerja'),
                    'id_satuan_kerja' => $this->input->post('id_satuan_kerja'),
                    'id_jfu' => $this->input->post('id_jfu')
            );
            $this->M_pegawai->insert_organisasi($data, 'tb_kelompok_organisasi');
            echo 'Insert Success';
            redirect('Pegawai/SetOrganisasi');
    }

/*HAPUS PEGAWAI*/
    function HapusPegawai($id) {
        $where = array('nip' => $id);
        $this->M_pegawai->hapus_pegawai($where, 'tb_pegawai');
        redirect('Pegawai');
    }

//LOGOUT
    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_login');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('Login?msg=9');
            die();
        }
    }
}
