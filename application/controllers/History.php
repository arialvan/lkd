<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_master');
						$this->load->model('M_dosen');
						$this->load->model('M_history');
						$this->load->model('M_verifikator');
						$this->load->model('M_rencanakerja');
            $this->load->helper(array('form', 'url'));
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

public function RencanaKerja()
{
if(empty($this->input->get('id'))){
	$id = 2;
	$this->load->library('Pustaka');
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_history->show_viewpages($id);
	$data['profildosen'] = $this->M_master->profil();
	$data['periode'] = $this->M_history->show_periode();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/history/history_rencana_kerja');
  $this->load->view('layout/footer_datatables');
}else{
		$id = $this->input->get('id');
		$this->load->library('Pustaka');
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	  $data['name'] = $this->session->userdata('username');
	  $data['nipp'] = $this->session->userdata('nipp');
	  $data['level'] = $this->session->userdata('user_level');
	  $data['pegawai'] = $this->M_history->show_viewpages($id);
		$data['profildosen'] = $this->M_master->profil();
		$data['periode'] = $this->M_history->show_periode();
	  $data['title'] = 'Data Dosen';
	  $this->load->view('layout/header_datatables',$data);
	  $this->load->view('layout/side_menu');
	  $this->load->view('pages/history/history_rencana_kerja');
	  $this->load->view('layout/footer_datatables');
}

}

public function Cek_RencanaKerja($id)
{
	$uri = $this->uri->segment(4);
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_verifikator->filter($id);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	$this->load->library('Pustaka');
	$data['name'] = $this->session->userdata('username');
	$data['nipp'] = $this->session->userdata('nipp');
	$data['level'] = $this->session->userdata('user_level');
	$data['count'] = $this->M_verifikator->count_subkegiatan($id);
	$data['namadosen'] = $this->M_verifikator->profil_dosen_diperiksa($id);
	$data['profildosen1'] = $this->M_verifikator->profil2($id);
	$data['profildosen'] = $this->M_verifikator->profil_remunerasi($id);
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd_rk($id);
	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);

	$data['pendidikan'] = $this->M_history->show_pendidikan($id,$uri);
	$data['penelitian'] = $this->M_history->show_rencana_penelitian($id,$uri);
	$data['pengabdian'] = $this->M_history->show_rencana_pengabdian($id,$uri);
	$data['penunjang'] = $this->M_history->show_rencana_penunjang($id,$uri);

	$data['files'] = $this->M_verifikator->show_file($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/history/detail_history_rencanakerja');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

public function RekapLaporanAssesor1()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor1();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as1');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor1_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor1_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor1_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor1_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as1');
			$this->load->view('layout/footer_datatables_rekap');
	}
}

public function RekapLaporanAssesor2()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor2();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as2');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor2_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor2_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor2_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor2_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as2');
			$this->load->view('layout/footer_datatables_rekap');
	}
}

public function RekapAssesor1dan2()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor12();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as12');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor12_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor12_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor12_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor12_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_laporan_as12');
			$this->load->view('layout/footer_datatables_rekap');
	}
}

// LAPORAN LENGKAP BKD
public function RekapBkdAssesor1()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor1();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as1');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor1_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor1_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor1_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor1_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as1');
			$this->load->view('layout/footer_datatables_rekap');
	}
}


public function RekapBkdAssesor2()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor2();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as2');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor2_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor2_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor2_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor2_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as2');
			$this->load->view('layout/footer_datatables_rekap');
	}
}


public function RekapBkdAssesor1dan2()
{
	if(empty($this->input->get('id_periode'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_history->show_rekap_asessor12();
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as12');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id_periode = $this->input->get('id_periode');
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if(empty($id) && empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor12_id($id_periode);
			}elseif(empty($id)){
				$database_rekap = $this->M_history->show_rekap_asessor12_fak($id_periode,$id_fak);
			}elseif(empty($id_fak)){
				$database_rekap = $this->M_history->show_rekap_asessor12_kat($id_periode,$id);
			}else{
				$database_rekap = $this->M_history->show_rekap_asessor12_all($id_periode,$id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['per'] = $this->M_history->show_periode();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/history/h_rekap_bkd_as12');
			$this->load->view('layout/footer_datatables_rekap');
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
