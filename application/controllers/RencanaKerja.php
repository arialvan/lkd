<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RencanaKerja extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_rencanakerja');
						$this->load->model('M_pegawai');
						$this->load->model('M_dosen');
						$this->load->model('M_verifikator');
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
		$id = $this->session->userdata('nipp');
		$this->load->library('Pustaka');
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	 	$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['ids'] = $this->session->userdata('kat_dosen');
		$data['profildosen'] = $this->M_rencanakerja->profil();
		$data['bkd_syarat'] = $this->M_rencanakerja->syaratbkd();
		$data['bkd_syarat_ds'] = $this->M_rencanakerja->syaratbkd_ds($id);
		$data['bkd_syarat_dt'] = $this->M_rencanakerja->syaratbkd_dt($id);
		$data['rencanakerja'] = $this->M_rencanakerja->show_rencana_rk($id);
		$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian_rk($id);
		$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian_rk($id);
		$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang_rk($id);
		$data['verifikator'] = $this->M_rencanakerja->show_verifikator();
		$data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
		$data['syaratbkd'] = $this->M_rencanakerja->show_syarat_bkd();
		$data['syaratsubbkd'] = $this->M_rencanakerja->show_syarat_subbkd($id);
		$data['sum_poin_pendidikan'] = $this->M_rencanakerja->show_syarat_subbkd_poin($id);
		$data['syt_pendidikan'] = $this->M_rencanakerja->show_syarat_pendidikan($id);
		$data['syt_penelitian'] = $this->M_rencanakerja->show_syarat_penelitian($id);
		$data['syt_pengabdian'] = $this->M_rencanakerja->show_syarat_pengabdian($id);
		$data['syt_penunjang'] = $this->M_rencanakerja->show_syarat_penunjang($id);
		$data['tanpa_syt_penunjang'] = $this->M_rencanakerja->show_tanpa_syarat_penunjang($id);
		$data['syt_penunjang_poin'] = $this->M_rencanakerja->show_syarat_penunjang_poin($id);
		$data['poinremunerasi'] = $this->M_rencanakerja->show_poin_remunerasi($id);
		$data['poinmaks'] = $this->M_rencanakerja->poin_terbesar($id);
		$data['poinmin'] = $this->M_rencanakerja->poin_terendah($id);
		$data['sksxpoin'] = $this->M_rencanakerja->sksxpoin($id);
		$data['bkd'] = $this->M_rencanakerja->show_bkd();
		$data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
		$data['periode_aktif'] = $this->M_rencanakerja->show_periode_aktif();
		$data['filter_button'] = $this->M_rencanakerja->filter_button();

		$data['title'] = 'Beban Kinerja Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/bkd_view');
		$this->load->view('layout/footer_datatables');
	}

	public function Laporan()
		{
			$auth=$this->M_rencanakerja->cek_survey();
			foreach ($auth as $keys);

			if($keys->isi_survey > 0){

					$ids = $this->session->userdata('nipp');
					$this->load->library('Pustaka');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$id = $this->session->userdata('nipp');
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['ids'] = $this->session->userdata('kat_dosen');
					$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd();
					$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen($id);
					$data['rencanakerja'] = $this->M_rencanakerja->show_rencana($id);
					$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian($id);
					$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian($id);
					$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang($id);
					$data['verifikator'] = $this->M_rencanakerja->show_verifikator();
					$data['dilaporkan'] = $this->M_rencanakerja->show_dilaporkan();
          $data['periode_aktif'] = $this->M_rencanakerja->show_periode_aktif();
					$data['bkd'] = $this->M_rencanakerja->show_bkd();
					$data['listrbkd'] = $this->M_rencanakerja->show_listrbkd($id);
					$data['listlaporan'] = $this->M_rencanakerja->show_listlaporan($id);
					$data['title'] = 'Rekap Rencana Kerja Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/bkd_laporan');
					$this->load->view('layout/footer_datatables');

				}else{

					require FCPATH.'vendor/autoload.php';
					$key = "KQYsG4Hi201ajyEzOSGzr4MVfw==";
					$token = array(
							"email" => $this->session->userdata('email'),
							"fullname" => $this->session->userdata('username'),
							"nip" => $this->session->userdata('nipp'),
							"appAlias" => "BKD"
					);

					$jwt = \Firebase\JWT\JWT::encode($token, $key);
					$decode = \Firebase\JWT\JWT::decode($jwt, $key, array('HS256'));
					//print_r ($decode);


						$ids = $this->session->userdata('nipp');
						$this->load->library('Pustaka');
						$data['filter'] = $this->M_dosen->filter($ids);
						$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
						$id = $this->session->userdata('nipp');
						$data['name'] = $this->session->userdata('username');
						$data['nipp'] = $this->session->userdata('nipp');
						$data['ids'] = $this->session->userdata('kat_dosen');
						$data['token_sso'] = \Firebase\JWT\JWT::encode($token, $key);
						$data['title'] = 'Survey';
						$this->load->view('layout/header_datatables',$data);
						$this->load->view('layout/side_menu');
						$this->load->view('pages/bkd/isi_survey');
						$this->load->view('layout/footer_datatables');
				}
		}

/*RENCANA KERJA*/
public function FormRencana()
{
	$auth=$this->M_rencanakerja->show_verifikator();
	foreach ($auth as $keys);

	if($keys->rk_dosen == 1){ //Filter
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
      $data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
      $data['bkd'] = $this->M_rencanakerja->show_bkd();
      $data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
      $data['title'] = 'Input Rencana Kerja';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputrencana');
      $this->load->view('layout/footer');
	}else{
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
				$data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['title'] = 'Input Rencana Kerja';
				$this->load->view('layout/header',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/tidak_punya_akses');
				$this->load->view('layout/footer');
	}
}

public function FormRencanaTambahan()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
      $data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
      $data['bkd'] = $this->M_rencanakerja->show_bkd();
      $data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
      $data['title'] = 'Input Rencana Kerja';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputrencanatambahan');
      $this->load->view('layout/footer');
}

function ambil_kegiatan()
{
    $state=$this->input->post('state');
    $query=$this->M_rencanakerja->ambil_tb_kegiatan();
    echo '<option value="">-- Pilih --</option>';
    foreach($query->result() as $row)
    {
			if($row->bkd_hitung=='1' && $row->renum_hitung=='1'){ $kegiatans="<option value='".$row->id_kegiatan."' style='color: #32A759;' >".$row->kegiatan."</option>";}
			if($row->bkd_hitung=='1' && $row->renum_hitung=='0'){ $kegiatans="<option value='".$row->id_kegiatan."' style='color: #C58626;' >".$row->kegiatan."</option>";}
			if($row->bkd_hitung=='0' && $row->renum_hitung=='1'){ $kegiatans="<option value='".$row->id_kegiatan."' style='color: #C32323;' >".$row->kegiatan."</option>";}
     echo $kegiatans;
    //echo "<option value='".$row->id_jabatan."'>".$row->jabatan_struktural."</option>";
    }
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

						$poin_db   = $poin[$bkd];
						if($remunhitung[$bkd]==1){
							$poin_kali = $sks_post * $poin_db;
						}else{
								$poin_kali = 0;
						}

						//APP Ketua Prodi
							$id = $this->session->userdata('nipp');
							$datas = $this->M_rencanakerja->cek_ketuaprodi($id);
							foreach ($datas as $keys);
							if($keys->ketua_prodi !=NULL){
									$app_kp = 1;
							}else{
									$app_kp = 0;
							}


            $data = array(
										'id_periode' => $this->input->post('id_periode'),
										'nip' => $this->session->userdata('nipp'),
										'id_bkd' => $this->input->post('bkd')[$bkd],
		                'id_kegiatan' => $key,
		                'sub_kegiatan' => $this->input->post('sub_kegiatan')[$bkd],
										'sks_post' => $sks_post,
										'sks_subkegiatan' => $sks_kali,
										'poin_subkegiatan' => $poin_kali,
										'app_ketuaprodi' => $app_kp,
		                'user_create' => $this->session->userdata('username')
            );
						// var_dump($data);
						//Insert
            $this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan');
        }

            redirect('RencanaKerja');
}


function InsertRencanaTambahan()
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

						$poin_db   = $poin[$bkd];
						if($remunhitung[$bkd]==1){
							$poin_kali = $sks_post * $poin_db;
						}else{
								$poin_kali = 0;
						}

            $data = array(
										'id_periode' => $this->input->post('id_periode'),
										'nip' => $this->session->userdata('nipp'),
										'id_bkd' => $this->input->post('bkd')[$bkd],
		                'id_kegiatan' => $key,
		                'sub_kegiatan' => $this->input->post('sub_kegiatan')[$bkd],
										'sks_post' => $sks_post,
										'sks_subkegiatan' => $sks_kali,
										'poin_subkegiatan' => $poin_kali,
										'app_ketuaprodi' => 1,
										'status' => 1,
										'lp_dosen' => 1,
		                'user_create' => $this->session->userdata('username')
            );
						// var_dump($data);
						//Insert
            $this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan_laporan');
        }

            redirect('RencanaKerja/Laporan');
}

// EDIT
public function EditLaporan($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
				$data['kegiatan'] = $this->M_rencanakerja->get_subkegiatan($id);
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan($id);
        $data['title'] = 'Upload Laporan';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan');
        $this->load->view('layout/footer_datatables');
}

public function EditLaporanTambahan($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['kegiatan'] = $this->M_rencanakerja->get_subkegiatan_laporan($id);
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan_tambahan($id);
        $data['title'] = 'Upload Laporan';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan_tambahan');
        $this->load->view('layout/footer_datatables');
}

public function EditLaporan2($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan2($id);
        $data['title'] = 'Update Laporan';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan2');
        $this->load->view('layout/footer_datatables');
}

public function EditLaporanUlang($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['subkegiatan'] = $this->M_rencanakerja->edit_subkegiatan($id);
        $data['title'] = 'Upload Laporan';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subkegiatan_laporan_ulang');
        $this->load->view('layout/footer');
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
								  $directoryname = $this->session->userdata('nipp').'/'.date("Y").'/'.date("m");
									if (!is_dir('uploads/'.$directoryname)) {
											mkdir('./uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m"), 0777, TRUE); //Folder Baru
									}
								// File upload configuration
	                // $uploadPath = 'uploads/'.$this->session->userdata('nipp').'/';
									$uploadPath = 'uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m").'/';
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

								//Cek nama Files
									$ex = explode('.',$this->input->post('nama'));
									$id = $ex[0];
									$where = array('id' => $id);
									$data = $this->M_rencanakerja->cek_file_master($where, 'bkd_buktifisik')->result();
									//print_r($data);
									foreach ($data as $keys);
									$file_name = $keys->id.'.'.$keys->nama_file;

                // Update files data into the database
										$data = array('nama_file' => $file_name, 'file' => $namafile);
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

								//$filenames = $this->session->userdata('nipp').'_'.date('Y-m-d').'_'.rand(1, 100).'.pdf';
								$filenames = $this->session->userdata('nipp').'_'.date('Y-m-d').'_'.$this->input->post('id_subkegiatan').'_'.$this->input->post('no')[$i].'.pdf';
								$namafile[] = $filenames;

                // $_FILES['file']['name']     = $_FILES['files']['name'][$i];

								$_FILES['file']['name']     = $filenames;
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // Konfigurasi Upload File
								//Cek Direktori
                  $directoryname = $this->session->userdata('nipp').'/'.date("Y").'/'.date("m");
									if (!is_dir('./uploads/'.$directoryname)) { //Jika Folder Belum Ada Maka Buat Folder Baru
											mkdir('./uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m"), 0777, TRUE); //Folder Baru
									}

									// Nama Direktori File
									$uploadPath = 'uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m");
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
                }else{
										echo '<h2>
															Upload File Error...
															Pastikan file Anda format PDF.
													</h2>';
										echo '<h2><a href="'.base_url().'RencanaKerja/EditLaporan/'.$this->input->post('id_subkegiatan').'">KEMBALI</a></h2>';
										exit;
								}
            }

                // Insert files data into the database
								foreach ($this->input->post('nama_file') as $keys => $a) {
										$namafile_db = $namafile[$keys];
										$data = array(
															'id_subkegiatan' => $this->input->post('id_subkegiatan'),
															'nama_file' => $a,
															'file' => $namafile_db
										);
										$this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan_file');
										//var_dump($data);
								}

							//	Update Sub Kegiatan
							if(!empty($this->input->post('lapor_sebagai_bkd')))
							{
									$lsb=$this->input->post('lapor_sebagai_bkd');
							}else{
									$lsb=0;
							}
								// $data = array('status_laporan' => 1, 'lapor_sebagai_bkd' => $lsb);
							  // $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
							  // $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');
								// redirect('RencanaKerja/Laporan');
								//Update bkd_subkegiatan(Rencana Kerja)
									$data = array('status_laporan' => 1, 'di_laporkan' => 2, 'lapor_sebagai_bkd' => $lsb);
								  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
								  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');

								//Insert Laporan
								$where2 = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
								$data2 = $this->M_rencanakerja->show_rbkd_to_laporan($where2, 'bkd_subkegiatan')->result();
								foreach ($data2 as $keys);

								$dl = array(
													'id_subkegiatan' => $keys->id_subkegiatan,
													'id_periode' => $keys->id_periode,
													'nip' => $keys->nip,
													'id_bkd' => $keys->id_bkd,
													'id_kegiatan' => $keys->id_kegiatan,
													'sub_kegiatan' => $keys->sub_kegiatan,
													'sks_post' => $keys->sks_post,
													'sks_subkegiatan' => $keys->sks_subkegiatan,
													'poin_subkegiatan' => $keys->poin_subkegiatan,
													'app_ketuaprodi' => $keys->app_ketuaprodi,
													'app_assesor1' => $keys->app_assesor1,
													'app_assesor2' => $keys->app_assesor2,
													'status' => $keys->status,
													'user_create' => $keys->user_create,
													'status_laporan' => $keys->status_laporan,
													'timecreate' => $keys->timecreate,
													'komentar' => $keys->komentar,
													'lapor_sebagai_bkd' => $keys->lapor_sebagai_bkd
								);
								$this->M_rencanakerja->insert_rencanakerja($dl, 'bkd_subkegiatan_laporan');

								//Insert Data Jurnal/Buku
								if(!empty($this->input->post('judul')) ){
										$data = array('nip' => $this->session->userdata('nipp'),
																	'id_subkegiatan' => $this->input->post('id_subkegiatan'),
																	'judul' => $this->input->post('judul'),
																	'link' => $this->input->post('link')
																	);
										$this->M_rencanakerja->insert_rencanakerja($data, 'emis_kemenag');
								}

								echo '<h2>
													Upload File Berhasil....
											</h2>';
											echo '<h2><a href="'.base_url().'RencanaKerja/Laporan">KEMBALI</a></h2>';
								// echo '<h2><a href="#" onclick="window.close()">CLOSE TAB</a></h2>';
        }else{
								redirect('RencanaKerja/EditLaporan/',$this->input->post('id_subkegiatan'));
				}


}


//INSERT KEGIATAN TAMBAHAN
function InsertLaporanTambahan()
{
			$data = array();
        // If file upload form submitted
        if(!empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){

								//$filenames = $this->session->userdata('nipp').'_'.date('Y-m-d').'_'.rand(1, 100).'.pdf';
								$filenames = $this->session->userdata('nipp').'_'.date('Y-m-d').'_'.$this->input->post('id_subkegiatan').'_'.$this->input->post('no')[$i].'.pdf';
								$namafile[] = $filenames;

                // $_FILES['file']['name']     = $_FILES['files']['name'][$i];

								$_FILES['file']['name']     = $filenames;
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // Konfigurasi Upload File
								//Cek Direktori
									$directoryname = $this->session->userdata('nipp').'/'.date("Y").'/'.date("m");
									if (!is_dir('./uploads/'.$directoryname)) { //Jika Folder Belum Ada Maka Buat Folder Baru
										  mkdir('./uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m"), 0777, TRUE); //Folder Baru
									}

									// Nama Direktori File
	                $uploadPath = 'uploads/'.$this->session->userdata('nipp').'/'.date("Y").'/'.date("m");
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
                }else{
										echo '<h2>
															Upload File Error...
															Pastikan file Anda format PDF.
													</h2>';
										echo '<h2><a href="'.base_url().'RencanaKerja/EditLaporanTambahan/'.$this->input->post('id_subkegiatan').'">KEMBALI</a></h2>';
										exit;
								}
            }

                // Insert files data into the database
								foreach ($this->input->post('nama_file') as $keys => $a) {
										$namafile_db = $namafile[$keys];
										$data = array(
															'id_subkegiatan' => $this->input->post('id_subkegiatan'),
															'nama_file' => $a,
															'file' => $namafile_db
										);
										$this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan_file');
										//var_dump($data);
								}

							//	Update Sub Kegiatan
							if(!empty($this->input->post('lapor_sebagai_bkd')))
							{
									$lsb=$this->input->post('lapor_sebagai_bkd');
							}else{
									$lsb=0;
							}
							//Update bkd_subkegiatan(Rencana Kerja)
								$data = array('status_laporan' => 1, 'lapor_sebagai_bkd' => $lsb, 'lp_dosen' => 0);
							  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
							  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan_laporan');

											//Insert Data Jurnal/Buku
											if(!empty($this->input->post('judul')) ){
													$data = array('nip' => $this->session->userdata('nipp'),
																				'id_subkegiatan' => $this->input->post('id_subkegiatan'),
																				'judul' => $this->input->post('judul'),
																				'link' => $this->input->post('link')
																				);
													$this->M_rencanakerja->insert_rencanakerja($data, 'emis_kemenag');
											}


								echo '<h2>
												Upload File Selesai....
										</h2>';
										echo '<h2><a href="'.base_url().'RencanaKerja/Laporan">KEMBALI</a></h2>';
        }else{
								redirect('RencanaKerja/EditLaporanTambahan/',$this->input->post('id_subkegiatan'));
				}

}

//UPDATE
function UpdateSurvey()
{
	//From API Survey
	require FCPATH.'vendor/autoload.php';
	$key = "KQYsG4Hi201ajyEzOSGzr4MVfw==";
	$jwt = $this->uri->segment(3);
	$decode = \Firebase\JWT\JWT::decode($jwt, $key, array('HS256'));
	//Cek Validasi
	if($decode->appAlias=="BKD"){
			$periode = $this->M_rencanakerja->show_periode_aktif();
			foreach ($periode as $keys);
			$id_periode   = $keys->id_periode; //Periode Aktif

			$data = array('isi_survey' => 1);

			$where = array('nip' => $this->session->userdata('nipp'), 'id_periode' => $id_periode);
			$this->M_rencanakerja->update_rencana($where, $data, 'verifikator');
			echo '<h2>
								Anda Sudah melakukan Survey Dosen... <br />
								Selanjutnya Anda akan di bawa ke halaman pengisian Laporan. <br />
								Bacalah petunjuk pada saat mengisi Laporan.
						</h2>';
			echo '<h2><a href="'.base_url().'RencanaKerja/Laporan">Dashboard Laporan</a></h2>';
			exit;
		}else{
			echo "Pengisian Survey belum tuntas.";
			echo '<h2><a href="'.base_url().'RencanaKerja/Laporan">Kembali ke Dashboard Laporan</a></h2>';
		}

}

function UpdateRencana()
{
	//Cari SKS dan Poin Master
	$where = array('id_kegiatan' => $this->input->post('id_kegiatan'));
	$data = $this->M_rencanakerja->edit_poin($where, 'bkd_kegiatan')->result();
	foreach ($data as $keys);
	$sks   = $this->input->post('sks')*$keys->bkd_sks; //Poin Edit
	$point = $this->input->post('sks')*$keys->poin; //Poin Edit

	$data = array('sub_kegiatan' => $this->input->post('subkegiatan'),
								'sks_post' => $this->input->post('sks'),
								'sks_subkegiatan	' => $sks,
								'poin_subkegiatan	' => $point);

  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');
	redirect('RencanaKerja');
}


function UpdatePerbaikan($id)
{
	 $ex = explode("-",$id);
	 $id_sub = $ex[0];
	 $assesor= $ex[1];

	  $datas=$this->M_rencanakerja->show_laporan_perbaikan($id_sub);
  	foreach ($datas as $keys);
  					 $assesor1 = $keys->app_assesor1;
  					 $assesor2 = $keys->app_assesor2;
						 $kaprodi  = $keys->applaporan_ketuaprodi;

	if($assesor1 == $assesor){
		//update sub kegiatan
		$data = array('app_assesor1' => 0);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_rencanakerja->update_perbaikan($where, $data, 'bkd_subkegiatan_laporan');
		//update status verifikator
		$data2  = array('p_assesor1' => 0);
 	  $where2 = array('nip' => $this->session->userdata('nipp'));
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}elseif($assesor2 == $assesor){
		//update sub kegiatan
		$data = array('app_assesor2' => 0);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_rencanakerja->update_perbaikan($where, $data, 'bkd_subkegiatan_laporan');
		//update status verifikator
		$data2  = array('p_assesor2' => 0);
 	  $where2 = array('nip' => $this->session->userdata('nipp'));
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}elseif($kaprodi == $assesor){
		//update sub kegiatan
		$data = array('applaporan_ketuaprodi' => 0);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_rencanakerja->update_perbaikan($where, $data, 'bkd_subkegiatan_laporan');
		//update status verifikator
		$data2  = array('laporan_app_kaprodi' => 0);
 	  $where2 = array('nip' => $this->session->userdata('nipp'));
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}else{ exit; }

	redirect('RencanaKerja/Laporan');
}

function UpdatePerbaikan2($id)
{
	$data = array('status	' => 2,
								'status_laporan	' => 2);

  $where = array('id_subkegiatan' => $id);
  $this->M_rencanakerja->update_perbaikan2($where, $data, 'bkd_subkegiatan');
	redirect('RencanaKerja/Laporan');
}


function SelesaiLaporan()
{
	$id 			= $this->session->userdata('nipp');
	$segment3 = $this->uri->segment(3);
	if($segment3==1){
		 	$data = array('statuslaporan' => $segment3);
			$where = array('nip' => $id);
			$this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
		 	redirect('RencanaKerja/Laporan');
	}elseif($segment3==0){
			$id = $this->session->userdata('nipp');
			$data = array('statuslaporan' => $segment3);
			$where = array('nip' => $id);
			$this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
			redirect('RencanaKerja/Laporan');
	}else{
			echo '<h2><a href="'.base_url().'RencanaKerja/Laporan">No Segment, Kembali ke Dashboard Laporan</a></h2>';
	}
}

function SelesaiLaporan_1()
{
	$id = $this->session->userdata('nipp');
	$data = array('p_assesor1' => 0);

  $where = array('nip' => $id);
  $this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
	redirect('RencanaKerja/Laporan');
}

function SelesaiLaporan_2()
{
	$id = $this->session->userdata('nipp');
	$data = array('p_assesor2' => 0);

  $where = array('nip' => $id);
  $this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
	redirect('RencanaKerja/Laporan');
}

/* HAPUS SUB KEGIATAN */
function HapusSubkegiatan($id) {
    $where = array('id_subkegiatan' => $id);
    $this->M_rencanakerja->hapus_bkdsubkegiatan($where, 'bkd_subkegiatan');
    redirect('RencanaKerja','refresh');
}

function HapusLaporan($id) {
    $where = array('id_subkegiatan' => $id);
    $this->M_rencanakerja->hapus_bkdsubkegiatan($where, 'bkd_subkegiatan_laporan');
    redirect('RencanaKerja/Laporan','refresh');
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
