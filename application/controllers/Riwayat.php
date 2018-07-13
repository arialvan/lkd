<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
        var $acl;
	public function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_pegawai');
            $this->load->model('M_master');
            $this->load->model('M_riwayat');
            $this->load->helper(array('form','url'));
            $this->acl = $this->session->userdata('acl');
        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }
        
/* RIWAYAT PENDIDIKAN */         
	public function index()
	{
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai();
            $data['pendidikan'] = $this->M_master->show_pendidikan();
            $data['title'] = 'Input Riwayat Pendidikan';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/riwayat/riwayat_pendidikan');
            $this->load->view('layout/footer');
        }
   
        function InsertRiwayatPendidikan() {
            $data = array(
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'nip' => $this->input->post('nip'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'no_sttb' => $this->input->post('no_sttb'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_lulus' => $this->input->post('tahun_lulus')
            );
            //var_dump($data);
            $this->M_riwayat->insert_riwayatpendidikan($data, 'tb_riwayatpendidikan');
            redirect('Riwayat');
        }
        
/* RIWAYAT JABATAN */  
        public function RiwayatJabatan()
	{
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai();
            $data['jabatan'] = $this->M_master->show_jabatan();
            $data['title'] = 'Input Riwayat Jabatan';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/riwayat/riwayat_jabatan');
            $this->load->view('layout/footer');
        }
        
        function InsertRiwayatJabatan() {
            $data = array(
                'id_jabatan' => $this->input->post('id_jabatan'),
                'nip' => $this->input->post('nip'),
                'tahun' => $this->input->post('tahun')
            );
            //var_dump($data);
            $this->M_riwayat->insert_riwayatjabatan($data, 'tb_riwayatjabatan');
            redirect('Riwayat/RiwayatJabatan');
        }
        
/* RIWAYAT DIKLAT */  
        public function RiwayatDiklat()
	{
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai();
            $data['title'] = 'Input Riwayat Diklat';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/riwayat/riwayat_diklat');
            $this->load->view('layout/footer');
        }
        
        function InsertRiwayatDiklat() {
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama_diklat' => $this->input->post('nama_diklat'),
                'penyelenggara' => $this->input->post('penyelenggara'),
                'tgl_diklat' => $this->input->post('tgl_diklat'),
                'lama_diklat' => $this->input->post('lama_diklat'),
                'tempat_diklat' => $this->input->post('tempat_diklat'),
                'keterangan' => $this->input->post('keterangan')
            );
            //var_dump($data);
            $this->M_riwayat->insert_riwayatdiklat($data, 'tb_riwayatdiklat');
            redirect('Riwayat/RiwayatDiklat');
        }
        
 /* RIWAYAT SEMINAR */  
        public function RiwayatSeminar()
	{
            $data['name'] = $this->session->userdata('username');
            $data['pegawai'] = $this->M_pegawai->show_pegawai();
            $data['title'] = 'Input Riwayat Seminar';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/riwayat/riwayat_seminar');
            $this->load->view('layout/footer');
        }
        
        function InsertRiwayatSeminar() {
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama_seminar' => $this->input->post('nama_seminar'),
                'peranan' => $this->input->post('peranan'),
                'tgl_seminar' => $this->input->post('tgl_seminar'),
                'penyelenggara' => $this->input->post('penyelenggara'),
                'tempat' => $this->input->post('tempat'),
                'keterangan' => $this->input->post('keterangan')
            );
            //var_dump($data);
            $this->M_riwayat->insert_riwayatseminar($data, 'tb_riwayatseminar');
            redirect('Riwayat/RiwayatSeminar');
        }      
        
        
/*EDIT PEGAWAI*/      
        public function EditPegawai($id) {
            $data['name'] = $this->session->userdata('username');
            $where = array('nip' => $id);
            $data['pegawai'] = $this->M_pegawai->edit_pegawai($where, 'tb_pegawai')->result();
            $data['views'] = $this->M_pegawai->show_viewpages();
            $data['golongan'] = $this->M_master->show_golongan();
            $data['agama'] = $this->M_master->show_agama();
            $data['pangkat'] = $this->M_master->show_pangkat();
            $data['mapel'] = $this->M_master->show_mapel();
            //$data['sex'] = $this->load->helper('Pustaka');
            $data['title'] = 'Data Pegawai';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_edit');
            $this->load->view('layout/footer');
    }
/*UPDATE PEGAWAI*/    
    function UpdatePegawai() {

        $data = array(
            'nama_peg' => $this->input->post('nama_peg'),
            'alamat' => $this->input->post('alamat'),
            'id_gol' => $this->input->post('id_gol'),
            'id_agama' => $this->input->post('id_agama'),
            'id_pangkat' => $this->input->post('id_pangkat'),
            'id_mapel' =>  $this->input->post('id_mapel'),
            'no_askes' => $this->input->post('no_askes'),
            'telp' => $this->input->post('telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tempat_lhr' => $this->input->post('tempat_lhr'),
            'jenis_kel' => $this->input->post('jenis_kel'),
            'gol_darah' => $this->input->post('gol_darah'),
            'jumlah_anak' => $this->input->post('jumlah_anak'),
            'status_peg' => $this->input->post('status_peg'),
            'status_profesi' => $this->input->post('status_profesi'),
            'masa_kerja' => $this->input->post('masa_kerja'),
            'gaji_pokok' => $this->input->post('gaji_pokok'),
            'tmt' => $this->input->post('tmt'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'ket' => $this->input->post('ket')
        );
       // var_dump($data);

        $where = array('nip' => $this->input->post('nip'));

        $this->M_pegawai->update_pegawai($where, $data, 'tb_pegawai');
        redirect('Pegawai');
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
