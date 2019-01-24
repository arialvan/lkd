<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_master');
						$this->load->model('M_dosen');
            $this->load->helper(array('form', 'url'));
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

public function Admin()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	$data['name'] = $this->session->userdata('username');
	$data['nipp'] = $this->session->userdata('nipp');
	$data['level'] = $this->session->userdata('user_level');
	$data['admin'] = $this->M_master->show_admin();
	$data['title'] = 'Data Admin Fakultas';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/master/admin');
	$this->load->view('layout/footer_datatables');
}

/*PERIODE*/
public function Periode()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
    $data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['periode'] = $this->M_master->show_periode();
    $data['periode_nonaktif'] = $this->M_master->show_periode_nonaktif();
		$data['periode_aktif'] = $this->M_master->show_periode_aktif();
    $data['title'] = 'Periode';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/master/periode_view');
    $this->load->view('layout/footer_datatables');
}

public function FormAdmin()
{
    if($this->session->userdata('user_level')==1){
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['pegawai'] = $this->M_master->show_pegawai();
				$data['fakultas'] = $this->M_master->show_fakultas();
        $data['title'] = 'Form Tambah Admin';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/master/admin_input');
        $this->load->view('layout/footer_datatables');
    }else {
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/tidak_punya_akses');
        $this->load->view('layout/footer');
    }
}

function InsertAdmin()
{
      	$data = array(
                			'nip' => $this->input->post('nip'),
											'id_fakultas' => $this->input->post('id_fakultas'),
                			'user_level' => 4
            				);
      	$this->M_master->insert_admin($data, 'profil_dosen');
        redirect('Master/FormAdmin');
}

/* PERIODE */

public function FormPeriode()
{
    if($this->session->userdata('user_level')==1){
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $data['title'] = 'Form Tambah Periode';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/master/periode_input');
        $this->load->view('layout/footer');
    }else {
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/error.php');
        $this->load->view('layout/footer');
    }
}

function InsertPeriode()
{
            $data = array(
                'periode' => $this->input->post('periode'),
								'ket_periode' => $this->input->post('ket_periode'),
                'status' => $this->input->post('status'),
                'user_create' => $this->session->userdata('username')
            );
            //var_dump($data);
            $this->M_master->insert_periode($data, 'periode_lkd');
            redirect('Master/Periode');
}

public function EditPeriode($id)
{
  if($this->session->userdata('user_level')==1)
  {
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $where = array('id_periode' => $id);
        $data['periode'] = $this->M_master->edit_periode($where, 'periode_lkd')->result();
        $data['title'] = 'Edit Periode';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/master/periode_edit');
        $this->load->view('layout/footer');
  }else
  {
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/error.php');
        $this->load->view('layout/footer');
  }
}

function UpdatePeriode()
{
	$data = array(
                        'periode' => $this->input->post('periode'),
                        'status' => $this->input->post('status')
                     );
        $where = array('id_periode' => $this->input->post('id_periode'));
        $this->M_master->update_periode($where, $data, 'periode_lkd');
        echo "Update Succes"; redirect('Master/Periode','refresh');
}

function UpdateStatusPeriode($id)
{
				$data = array('status' => $this->uri->segment(4));
        $where = array('id_periode' =>$id);
        $this->M_master->update_status_periode($where, $data, 'periode_lkd');
        echo "Update Succes"; redirect('Master/Periode','refresh');
}

function HapusPeriode($id) {
    $where = array('id_periode' => $id);
    $this->M_master->hapus_periode($where, 'periode_lkd');
    redirect('Master/Periode');
}


public function CopyData()
{

	if($this->input->post('id') == "subkegiatan"){
			$dt = $this->input->post('periode_lama');
			$query=$this->M_master->show_subkegiatan($dt);
				foreach($query as $row )
		    {

				 $data = array(
											 'id_bkd' => $row->id_bkd,
											 'id_periode' => $this->input->post('periode_baru'),
											 'kegiatan' => $row->kegiatan,
											 'syarat' => $row->syarat,
											 'bkd_hitung' => $row->bkd_hitung,
											 'bkd_sks' => $row->bkd_sks,
											 'renum_hitung' => $row->renum_hitung,
											 'poin' => $row->poin,
											 'renum_tarif' => $row->renum_tarif,
											 'syarat_file' => $row->syarat_file,
											 'user_create' => $this->session->userdata('nipp')
				 					 		);

				 // echo '<pre>' . var_export($data, true) . '</pre>';
				 // Insert Copy Data
				 $this->M_master->insert_copy_data($data, 'bkd_kegiatan');
				 //Update Status CopyData
				 $datas = array('copy_subkegiatan' => 1);
			         $where = array('id_periode' =>$this->input->post('periode_baru'));
			         $this->M_master->update_status_periode($where, $datas, 'periode_lkd');
		    }
				echo '<h2>Copy Data Kegiatan Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';

	}elseif($this->input->post('id') == "verifikator"){
		$dt = $this->input->post('periode_lama');
		$query=$this->M_master->show_verifikator($dt);
			foreach($query as $row )
			{
			 $data = array(
										 'nip' => $row->nip,
										 'id_periode' => $this->input->post('periode_baru'),
										 'assesor_1' => $row->assesor_1,
										 'assesor_2' => $row->assesor_2,
										 'ketua_prodi' => $row->ketua_prodi,
										 'user_create' => $this->session->userdata('nipp'),
										 'statuslaporan' => 0,
										 'p_assesor1' => 0,
										 'p_assesor2' => 0,
										 'p_kaprodi' => 0,
										 'rk_dosen' => 1,
										 'lp_dosen' => 0
										);

			 //echo '<pre>' . var_export($data, true) . '</pre>';
			 // Insert Copy Data
			 $this->M_master->insert_copy_data($data, 'verifikator');
			 //Update Status CopyData
			 $datas = array('copy_verifikator' => 1);
						 $where = array('id_periode' =>$this->input->post('periode_baru'));
						 $this->M_master->update_status_periode($where, $datas, 'periode_lkd');
			}
			echo '<h2>Copy Data Verifikator Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';


	}elseif($this->input->post('id') == "skema"){
		$dt = $this->input->post('periode_lama');
		$query=$this->M_master->show_skema($dt);
			foreach($query as $row )
			{
			 $data = array(
										 'id_kat_dosen' => $row->id_kat_dosen,
										 'id_bkd' => $row->id_bkd,
										 'id_remun' => $row->id_remun,
										 'sks_bkd' => $row->sks_bkd,
										 'sks_remun' => $row->sks_remun,
										 'poin_remun' => $row->poin_remun,
										 'id_periode' => $this->input->post('periode_baru'),
										 'user_create' => $this->session->userdata('nipp')
										);

			 //echo '<pre>' . var_export($data, true) . '</pre>';
			 // Insert Copy Data
			 $this->M_master->insert_copy_data($data, 'bkd_remun_dosen');
			 //Update Status CopyData
			 $datas = array('copy_skema' => 1);
						 $where = array('id_periode' =>$this->input->post('periode_baru'));
						 $this->M_master->update_status_periode($where, $datas, 'periode_lkd');
			}
			echo '<h2>Copy Data Skema Perhitungan Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';

	}else{
			echo '<h2>Tidak ada Data di Copy <a href="'.base_url().'Master/Periode">Kembali</a></h2>';
	}

}


function Reset() {
		$id_periode = $this->uri->segment(3);
		$segment    = $this->uri->segment(4);

		if($segment=="subkegiatan"){
				$where = array('id_periode' => $id_periode);
		    $this->M_master->hapus_copy($where, 'bkd_kegiatan');
				//Update Status CopyData
				$datas = array('copy_subkegiatan' => 0);
							$where = array('id_periode' =>$id_periode);
							$this->M_master->update_status_periode($where, $datas, 'periode_lkd');

		    echo '<h2>Reset Data Kegiatan Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';

		}elseif($segment=="verifikator"){
			$where = array('id_periode' => $id_periode);
			$this->M_master->hapus_copy($where, 'verifikator');
			//Update Status CopyData
			$datas = array('copy_verifikator' => 0);
						$where = array('id_periode' =>$id_periode);
						$this->M_master->update_status_periode($where, $datas, 'periode_lkd');

			echo '<h2>Reset Data Verifikator Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';

		}elseif($segment=="skema"){
			$where = array('id_periode' => $id_periode);
			$this->M_master->hapus_copy($where, 'bkd_remun_dosen');
			//Update Status CopyData
			$datas = array('copy_skema' => 0);
						$where = array('id_periode' =>$id_periode);
						$this->M_master->update_status_periode($where, $datas, 'periode_lkd');

			echo '<h2>Reset Data Skema Perhitungan Berhasil <a href="'.base_url().'Master/Periode">Kembali</a></h2>';

		}else{
			echo '<h2>Reset Data Gagal <a href="'.base_url().'Master/Periode">Kembali</a></h2>';
		}


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
