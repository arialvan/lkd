<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterBkd extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_masterbkd');
						$this->load->model('M_verifikator');
						$this->load->model('M_pegawai');
            $this->load->helper(array('form', 'url'));
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
		$data['bkd'] = $this->M_masterbkd->show_bkd();
		$data['pendidikan'] = $this->M_masterbkd->show_subbkd_pendidikan();
		$data['penelitian'] = $this->M_masterbkd->show_subbkd_penelitian();
		$data['pengabdian'] = $this->M_masterbkd->show_subbkd_pengabdian();
		$data['penunjang'] = $this->M_masterbkd->show_subbkd_penunjang();
		$data['title'] = 'Master BKD';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/masterbkd_view');
		$this->load->view('layout/footer_datatables');
	}

/*BKD*/
public function FormBkd()
{
      $data['name'] = $this->session->userdata('username');
			//$data['periode'] = $this->M_masterbkd->show_periode();
      $data['title'] = 'Input BKD';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputbkd');
      $this->load->view('layout/footer');
}


function InsertBkd()
{
			$data = array(
                'ket_bkd' => $this->input->post('ket_bkd'),
                'jumlah_sks' => $this->input->post('jumlah_sks'),
                'user_create' => $this->session->userdata('username')
      );
      $this->M_masterbkd->insert_bkd($data, 'bkd');
			redirect('MasterBkd');
}

public function EditBkd($id)
{
        $data['name'] = $this->session->userdata('username');
        $where = array('id_bkd' => $id);
        $data['bkd'] = $this->M_masterbkd->edit_bkd($where, 'bkd')->result();
				$data['periode'] = $this->M_masterbkd->show_periode();
        $data['title'] = 'Edit Pegawai';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/bkd_edit');
        $this->load->view('layout/footer');
}

function UpdateBkd()
{
	$data = array(
									'ket_bkd' => $this->input->post('ket_bkd')
								);
				$where = array('id_bkd' => $this->input->post('id_bkd'));

				$this->M_masterbkd->update_bkd($where, $data, 'bkd');
				echo "Update Succes"; redirect('MasterBkd','refresh');
}

function HapusBkd($id) {
    $where = array('id_bkd' => $id);
    $this->M_masterbkd->hapus_bkd($where, 'bkd');
    redirect('MasterBkd','refresh');
}

/*SUB BKD*/
public function FormSubBkd()
{
      $data['name'] = $this->session->userdata('username');
			$data['bkd'] = $this->M_masterbkd->show_bkd();
			$data['periode'] = $this->M_masterbkd->show_periode();
			$data['bukti'] = $this->M_masterbkd->show_buktifisik();
      $data['title'] = 'Input SUB BKD';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputsubbkd');
      $this->load->view('layout/footer');
}


function InsertSubBkd()
{

	if($this->input->post('syarat_file')!==null) {
		$file = $this->input->post('syarat_file');
		foreach ($file as $key => $value) {
			$files[]=$value;
		}
		$x=implode('#',$files);
		//var_dump($files).'<br />';
		//echo $x;
			$data = array(
											'id_bkd' => $this->input->post('id_bkd'),
											'id_periode' => $this->input->post('id_periode'),
											'kegiatan' => $this->input->post('kegiatan'),
											'syarat' => $this->input->post('syarat'),
											'bkd_hitung' => $this->input->post('bkd_hitung'),
											'bkd_sks' => $this->input->post('bkd_sks'),
											'renum_hitung' => $this->input->post('renum_hitung'),
											'poin' => $this->input->post('poin'),
											'syarat_file' => $x,
											'user_create' => $this->session->userdata('username')
									 );
	}else{
		$data = array(
										'id_bkd' => $this->input->post('id_bkd'),
										'id_periode' => $this->input->post('id_periode'),
										'kegiatan' => $this->input->post('kegiatan'),
										'syarat' => $this->input->post('syarat'),
										'bkd_hitung' => $this->input->post('bkd_hitung'),
										'bkd_sks' => $this->input->post('bkd_sks'),
										'renum_hitung' => $this->input->post('renum_hitung'),
										'poin' => $this->input->post('poin'),
										'user_create' => $this->session->userdata('username')
									);
	}

			$res=$this->M_masterbkd->insert_subbkd($data, 'bkd_kegiatan');
			if($res==true)
			{
			    $this->session->set_flashdata('success', "<h2 class='btn btn-success'>Data Berhasil di Simpan</h2>");
					redirect('MasterBkd/FormSubBkd');
			}else{
			    $this->session->set_flashdata('error', "<h2 class='btn btn-danger'>Gagal Menyimpan Data</h2>");
					redirect('MasterBkd/FormSubBkd');
			}
} // end InsertSubBkd

public function EditSubBkd($id)
{
        $data['name'] = $this->session->userdata('username');
        $where = array('id_kegiatan' => $id);
        $data['subbkd'] = $this->M_masterbkd->edit_subbkd($where, 'bkd_kegiatan')->result();
				//$data['bkd'] = $this->M_masterbkd->show_bkd();
				$data['bukti'] = $this->M_masterbkd->show_buktifisik();
        $data['title'] = 'Edit Pegawai';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subbkd_edit');
        $this->load->view('layout/footer');
}

function UpdateSubBkd()
{
	if($this->input->post('syarat_file')!=null) {
		$file = $this->input->post('syarat_file');
		foreach ($file as $key => $value) {
			$files[]=$value;
		}
		$x=implode('#',$files);

		$data = array(
                	'kegiatan' => $this->input->post('kegiatan'),
									'syarat' => $this->input->post('syarat'),
                  'bkd_hitung' => $this->input->post('bkd_hitung'),
									'bkd_sks' => $this->input->post('bkd_sks'),
									'renum_hitung' => $this->input->post('renum_hitung'),
									'poin' => $this->input->post('poin'),
									'syarat_file' => $x
                );
	}else{
		$data = array(
                	'kegiatan' => $this->input->post('kegiatan'),
									'syarat' => $this->input->post('syarat'),
                  'bkd_hitung' => $this->input->post('bkd_hitung'),
									'bkd_sks' => $this->input->post('bkd_sks'),
									'renum_hitung' => $this->input->post('renum_hitung'),
									'poin' => $this->input->post('poin')
                );
	}

				        $where = array('id_kegiatan' => $this->input->post('id_kegiatan'));
				        $res   = $this->M_masterbkd->update_subbkd($where, $data, 'bkd_kegiatan');
								$this->session->set_flashdata('success', "<h2 class='btn btn-success'>Update Data Berhasil</h2>");
								redirect('MasterBkd');

}

function HapusSubBkd($id) {
    $where = array('id_kegiatan' => $id);
    $this->M_masterbkd->hapus_subbkd($where, 'bkd_kegiatan');
    echo "Hapus Sukses"; redirect('MasterBkd','refresh');
}

/* RENUMERASI */
public function Renumerasi()
	{
	 	$data['name'] = $this->session->userdata('username');
		$data['remun'] = $this->M_masterbkd->show_bkd_kegiatan();
		$data['title'] = 'Pengaturan Renumerasi';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/renumerasi_view');
		$this->load->view('layout/footer_datatables');
	}

public function FormRenumerasi()
{
      $data['name'] = $this->session->userdata('username');
			$data['remun'] = $this->M_masterbkd->show_bkd();
      $data['title'] = 'Pengaturan Remunerasi';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/inputsubbkd');
      $this->load->view('layout/footer');
}


function InsertRenumerasi()
{
			$data = array(
                'id_bkd' => $this->input->post('id_bkd'),
                'kegiatan' => $this->input->post('kegiatan'),
                'sks' => $this->input->post('sks'),
								'poin' => $this->input->post('poin'),
                'user_create' => $this->session->userdata('username')
      );
      $this->M_masterbkd->insert_subbkd($data, 'bkd_kegiatan');
			redirect('MasterBkd');
}

public function EditRenumerasi($id)
{
        $data['name'] = $this->session->userdata('username');
        $where = array('id_kegiatan' => $id);
        $data['subbkd'] = $this->M_masterbkd->edit_subbkd($where, 'bkd_kegiatan')->result();
				$data['bkd'] = $this->M_masterbkd->show_bkd();
        $data['title'] = 'Edit Pegawai';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/bkd/subbkd_edit');
        $this->load->view('layout/footer');
}

function UpdateRenumerasi()
{
	$data = array(
                	'id_bkd' => $this->input->post('id_bkd'),
									'kegiatan' => $this->input->post('kegiatan'),
                  'sks' => $this->input->post('sks'),
									'poin' => $this->input->post('poin')
                );
        $where = array('id_kegiatan' => $this->input->post('id_kegiatan'));

        $this->M_masterbkd->update_subbkd($where, $data, 'bkd_kegiatan');
        echo "Update Succes"; redirect('MasterBkd','refresh');
}

function HapusRenumerasi($id) {
    $where = array('id_kegiatan' => $id);
    $this->M_masterbkd->hapus_subbkd($where, 'bkd_kegiatan');
    echo "Hapus Sukses"; redirect('MasterBkd','refresh');
}

// EDIT TABLE
function Kegiatan()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'kegiatan' => $title,
								);

			$this->M_masterbkd->update_kegiatan($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function EditTable()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'bkd_hitung' => $title,
								);

			$this->M_masterbkd->update_bkdhitung($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function EditTable1()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'bkd_sks' => $title,
								);

			$this->M_masterbkd->update_bkdhitung1($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function EditTable2()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'renum_hitung' => $title,
								);

			$this->M_masterbkd->update_bkdhitung2($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function EditTable3()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'renum_tarif' => $title,
								);

			$this->M_masterbkd->update_bkdhitung3($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

/*PROFIL DOSEN*/
public function ProfilDosen()
	{
	 	$data['name'] = $this->session->userdata('username');
		$data['dosen'] = $this->M_masterbkd->show_katdosen();
		$data['bkdremun'] = $this->M_masterbkd->show_bkdremun()->result();

		$data['title'] = 'Kategori Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/kategoridosen_view');
		$this->load->view('layout/footer_datatables');
	}

	public function FormKatDosen()
	{
	      $data['name'] = $this->session->userdata('username');
	      $data['title'] = 'Input Kategori Dosen';
	      $this->load->view('layout/header',$data);
	      $this->load->view('layout/side_menu');
	      $this->load->view('pages/bkd/kategoridosen_input');
	      $this->load->view('layout/footer');
	}

	function InsertKatDosen()
	{
				$data = array(
	                'kategori_dosen' => $this->input->post('kategori_dosen'),
	                'singkatan' => $this->input->post('singkatan')
	      );
	      $this->M_masterbkd->insert_katdosen($data, 'master_kategori_dosen');
				redirect('MasterBkd/ProfilDosen');
	}

	public function EditKatDosen($id)
	{
	        $data['name'] = $this->session->userdata('username');
	        $where = array('id_kat_dosen' => $id);
	        $data['dosen'] = $this->M_masterbkd->edit_katdosen($where, 'master_kategori_dosen')->result();
	        $data['title'] = 'Edit Kategori Dosen';
	        $this->load->view('layout/header',$data);
	        $this->load->view('layout/side_menu');
	        $this->load->view('pages/bkd/kategoridosen_edit');
	        $this->load->view('layout/footer');
	}

	function UpdateKatDosen()
	{
		$data = array(
	                	'kategori_dosen' => $this->input->post('kategori_dosen'),
	                  'singkatan' => $this->input->post('singkatan')
	                );
	        $where = array('id_kat_dosen' => $this->input->post('id_kat_dosen'));

	        $this->M_masterbkd->update_katdosen($where, $data, 'master_kategori_dosen');
	        echo "Update Succes"; redirect('MasterBkd/ProfilDosen','refresh');
	}

	function HapusKatDosen($id) {
	    $where = array('id_kat_dosen' => $id);
	    $this->M_masterbkd->hapus_katdosen($where, 'master_kategori_dosen');
	    echo "Hapus Sukses"; redirect('MasterBkd/ProfilDosen','refresh');
	}

/* INSERT SKEMA BKD DAN REMUNERASI */
public function FormSkema()
{
      $data['name']  = $this->session->userdata('username');
			$data['dosen'] = $this->M_masterbkd->show_katdosen();
			$data['bkd']   = $this->M_masterbkd->show_bkd();
			$data['remun'] = $this->M_masterbkd->show_remun();
			$data['periode'] = $this->M_masterbkd->show_periode();

      $data['title'] = 'Pengaturan Skema';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/bkd/skema_input');
      $this->load->view('layout/footer2');
}

function InsertSkema()
{

    foreach($this->input->post('id_kat_dosen') as $bkd => $key)
        {
      //  echo $this->input->post('sub_kegiatan')[$bkd].'<br />';
            $data = array(
                'id_kat_dosen' => $key,
                'id_bkd' => $this->input->post('id_bkd')[$bkd],
                'id_remun' => $this->input->post('id_remun')[$bkd],
								'sks_bkd' => $this->input->post('sks_bkd')[$bkd],
								'sks_remun' => $this->input->post('sks_remun')[$bkd],
								'id_periode' => $this->input->post('id_periode'),
                'user_create' => $this->session->userdata('username')
            );
           //var_dump($data);
          $this->M_masterbkd->insert_skema($data, 'bkd_remun_dosen');

        }
				redirect('MasterBkd/FormSkema');
}

/* Edit Table SKEMA */
function Skema1()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}
			// $ids = explode('#',$this->input->post('id',true));
			// $id_kat_dosen = $ids[0];
			// $id_bkd       = $ids[1];

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			//$this->M_masterbkd->update_skema1($id_kat_dosen,$id_bkd,$fields);
			$this->M_masterbkd->update_skema1($id,$fields);
			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema2()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema2($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema3()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema3($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema4()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema4($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema5()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema5($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema6()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema6($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema7()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema7($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

function Skema8()
{
	If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
					redirect('MasterBkd/ProfilDosen');
			}

			$id = $this->input->post('id',true);
			$title = $this->input->post('title',true);

			$fields = array(
									'sks_bkd' => $title,
								);

			$this->M_masterbkd->update_skema8($id,$fields);

			echo "Update Succes"; redirect('MasterBkd','refresh');

}

// SET UP PROFIL DOSEN
public function SetProfil()
{
    $data['name'] = $this->session->userdata('username');
    $data['dosen'] = $this->M_verifikator->show_dosen();
		$data['profil'] = $this->M_verifikator->show_dosen_profil();
    $data['title'] = 'Profil Dosen';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/verifikator/setprofil_view');
    $this->load->view('layout/footer_datatables');
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
