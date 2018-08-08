<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RencanaKerja extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_rencanakerja');
						$this->load->model('M_pegawai');
            $this->load->helper(array('form', 'url'));
						$this->load->library('session');
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

/*INDEX*/
public function index()
	{
	 	$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['ids'] = $this->session->userdata('kat_dosen');
		$data['rencanakerja'] = $this->M_rencanakerja->show_rencana();
		$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian();
		$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian();
		$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang();
		$data['verifikator'] = $this->M_rencanakerja->show_verifikator();
		$data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
		$data['syaratbkd'] = $this->M_rencanakerja->show_syarat_bkd();
		$data['syaratsubbkd'] = $this->M_rencanakerja->show_syarat_subbkd();

		$data['title'] = 'Beban Kinerja Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/bkd_view');
		$this->load->view('layout/footer_datatables');
	}

	public function Laporan()
		{

			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['ids'] = $this->session->userdata('kat_dosen');
			$data['rencanakerja'] = $this->M_rencanakerja->show_rencana();
			$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian();
			$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian();
			$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang();
			$data['verifikator'] = $this->M_rencanakerja->show_verifikator();
			$data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
			$data['syaratbkd'] = $this->M_rencanakerja->show_syarat_bkd();
			$data['syaratsubbkd'] = $this->M_rencanakerja->show_syarat_subbkd();
			$data['title'] = 'Rekap Rencana Kerja Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/bkd_laporan');
			$this->load->view('layout/footer_datatables');
		}

/*RENCANA KERJA*/
public function FormRencana()
{
      $data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
      $data['bkd'] = $this->M_rencanakerja->show_bkd();
      $data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
      $data['title'] = 'Input Rencana Kerja';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputrencana');
      $this->load->view('layout/footer');
}

/*INSERT RENCANA KERJA*/
function InsertRencana()
{
/* Mencari Nilai SKS dan Poin dari Database */
foreach ($this->input->post('bkd_kegiatan') as $key => $value) {
	$where = array('id_kegiatan' => $value);
	$data = $this->M_rencanakerja->cek_kegiatan($where, 'bkd_kegiatan')->result();
	//print_r($data);
	foreach ($data as $keys);
	$sks[]				 = $keys->bkd_sks;
	$poin[]				 = $keys->poin;
	$bkdhitung[]   = $keys->bkd_hitung;
	$remunhitung[] = $keys->renum_hitung;
}

    foreach($this->input->post('bkd_kegiatan') as $bkd => $key)
        {
						//SKS dan POIN
						$sks_post = $this->input->post('sks_subkegiatan')[$bkd];
						$sks_db   = $sks[$bkd];
						if($bkdhitung[$bkd]==1){
								$sks_kali = $sks_post * $sks_db;
						}else{
								$sks_kali = 0;
						}

						//POIN
						// $poin_post = $this->input->post('sks_subkegiatan')[$bkd];
						$poin_db   = $poin[$bkd];
						if($remunhitung[$bkd]==1){
								$poin_kali = $sks_post * $poin_db;
						}else{
								$poin_kali = 0;
						}

            $data = array(
										'nip' => $this->session->userdata('nipp'),
										'id_bkd' => $this->input->post('bkd')[$bkd],
		                'id_kegiatan' => $key,
		                'sub_kegiatan' => $this->input->post('sub_kegiatan')[$bkd],
										'sks_subkegiatan' => $sks_kali,
										'poin_subkegiatan' => $poin_kali,
		                'status' => 0,
		                'user_create' => $this->session->userdata('username')
            );
						//Insert
            $this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan');
        }

            redirect('RencanaKerja');
}

// EDIT
public function EditLaporan($id)
{
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan($id);
        $data['title'] = 'Upload Laporan';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan');
        $this->load->view('layout/footer');
}

public function EditLaporan2($id)
{
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan2($id);
        $data['title'] = 'Update Laporan';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan2');
        $this->load->view('layout/footer_datatables');
}

function UpdateFile()
{
		// If file upload form submitted
        if(!empty($_FILES['files']['name'])){

								$filenames = $this->input->post('nama_file');
								$namafile = $filenames;
                // $_FILES['file']['name']     = $_FILES['files']['name'][$i];
								$_FILES['file']['name']     = $filenames;
                $_FILES['file']['type']     = $_FILES['files']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                $_FILES['file']['error']     = $_FILES['files']['error'];
                $_FILES['file']['size']     = $_FILES['files']['size'];

								//Check Directory
									$directoryname = $this->session->userdata('nipp');
									if (!is_dir('uploads/'.$directoryname)) {
										  mkdir('./uploads/' . $this->session->userdata('nipp'), 0777, TRUE);
									}
								// File upload configuration
	                $uploadPath = 'uploads/'.$this->session->userdata('nipp').'/';
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'pdf';
									unlink($uploadPath.$filenames);
	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);

                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData['nama_file'] = $namafile;
                    $uploadData['uploaded_on'] = date("Y-m-d H:i:s");
                }
                // Update files data into the database
										$data = array('file' => $namafile);
										$where = array('id' => $this->input->post('id_file'));
									  $this->M_rencanakerja->update_file($where, $data, 'bkd_subkegiatan_file');
								// var_dump($data);
                //Upload status message
                $statusMsg = 'Files uploaded successfully.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
								redirect("RencanaKerja/EditLaporan2/".$this->input->post('id_subkegiatan'));
        }else{
								$statusMsg = 'Upload File Gagal.';
								$this->session->set_flashdata('statusMsg',$statusMsg);
								redirect("RencanaKerja/EditLaporan2/".$this->input->post('id_subkegiatan'));
				}

}

function InsertLaporan()
{
			$data = array();
        // If file upload form submitted
        if(!empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){

								$filenames = $this->session->userdata('nipp').'_'.date('Y-m-d').'_'.rand(1, 100).'.pdf';
								$namafile[] = $filenames;
                // $_FILES['file']['name']     = $_FILES['files']['name'][$i];
								$_FILES['file']['name']     = $filenames;
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // File upload configuration
								//Check Directory
									$directoryname = $this->session->userdata('nipp');
									if (!is_dir('uploads/'.$directoryname)) {
										  mkdir('./uploads/' . $this->session->userdata('nipp'), 0777, TRUE);
									}
	                $uploadPath = 'uploads/'.$this->session->userdata('nipp').'/';
	                $config['upload_path'] = $uploadPath;
	                $config['allowed_types'] = 'pdf';

	                // Load and initialize upload library
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);

                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $this->session->userdata('nipp').'_'.time();
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                }
            }

                // Insert files data into the database
								foreach ($this->input->post('nama_file') as $keys => $a) {
										$data = array(
															'id_subkegiatan' => $this->input->post('id_subkegiatan'),
															'nama_file' => $a,
															'file' => $namafile[$keys]
										);
										$this->M_rencanakerja->insert_file($data, 'bkd_subkegiatan_file');
								}

								//Update Sub Kegiatan
								$data = array(
															'status' => 1,
															'status_laporan' => 1
														 );
							  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
							  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');

                //Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);

        }
redirect('RencanaKerja/Laporan');
}

//UPDATE
function UpdateRencana()
{
	$data = array('sub_kegiatan' => $this->input->post('subkegiatan'),
								'sks_subkegiatan	' => $this->input->post('sks')
								// 'poin_subkegiatan	' => $this->input->post('poin_subkegiatan')
							 );
  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');
	// var_dump($where);
	redirect('RencanaKerja');
}

/* HAPUS SUB KEGIATAN */
function HapusSubkegiatan($id) {
    $where = array('id_subkegiatan' => $id);
    $this->M_rencanakerja->hapus_bkdsubkegiatan($where, 'bkd_subkegiatan');
    redirect('RencanaKerja','refresh');
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
