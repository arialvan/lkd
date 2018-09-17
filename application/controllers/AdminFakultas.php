<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFakultas extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_master');
						$this->load->model('M_dosen');
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

public function Index()
{
	$this->load->library('Pustaka');
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_master->show_viewpages();
	$data['profildosen'] = $this->M_master->profil();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/master/periksa_laporan');
  $this->load->view('layout/footer_datatables');
}

public function PeriksaLaporanDetail($id)
{
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

	$p_dosen = $this->M_verifikator->profil_remunerasi($id);
	foreach ($p_dosen as $dt);
	$id2 = $dt->id_kat_dosen;

	$data['bkd_syarat'] = $this->M_verifikator->syaratbkd($id);
	$data['bkd_syarat_ds'] = $this->M_master->syaratbkd_ds($id2);
	$data['bkd_syarat_dt'] = $this->M_rencanakerja->syaratbkd_dt($id2);

	$data['rencanakerja'] = $this->M_rencanakerja->show_rencana($id);
	$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian($id);
	$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian($id);
	$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang($id);
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['bkdkegiatan'] = $this->M_rencanakerja->show_bkdkegiatan();
	$data['syaratbkd'] = $this->M_rencanakerja->show_syarat_bkd();
	$data['syaratsubbkd'] = $this->M_rencanakerja->show_syarat_subbkd($id);
	$data['syt_pendidikan'] = $this->M_rencanakerja->show_syarat_pendidikan($id);
	$data['syt_penelitian'] = $this->M_rencanakerja->show_syarat_penelitian($id);
	$data['syt_pengabdian'] = $this->M_rencanakerja->show_syarat_pengabdian($id);
	$data['syt_penunjang'] = $this->M_rencanakerja->show_syarat_penunjang($id);
	$data['tanpa_syt_penunjang'] = $this->M_verifikator->show_tanpa_syarat_penunjang($id);
	$data['syt_penunjang_poin'] = $this->M_rencanakerja->show_syarat_penunjang_poin($id);
	$data['poinremunerasi'] = $this->M_rencanakerja->show_poin_remunerasi($id);
	$data['poinmaks'] = $this->M_rencanakerja->poin_terbesar($id);
	$data['poinmin'] = $this->M_rencanakerja->poin_terendah($id);
	$data['sksxpoin'] = $this->M_rencanakerja->sksxpoin($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);
	$data['pendidikan'] = $this->M_verifikator->show_pendidikan($id);
	$data['penelitian'] = $this->M_verifikator->show_rencana_penelitian($id);
	$data['pengabdian'] = $this->M_verifikator->show_rencana_pengabdian($id);
	$data['penunjang'] = $this->M_verifikator->show_rencana_penunjang($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/master/periksa_laporan_detail');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

function UpdateRencana()
{
	//Cari SKS dan Poin Master
	$where = array('id_kegiatan' => $this->input->post('id_kegiatan'));
	$data = $this->M_master->edit_poin($where, 'bkd_kegiatan')->result();
	foreach ($data as $keys);
	$sks   = $this->input->post('sks')*$keys->bkd_sks; //Poin Edit
	$point = $this->input->post('sks')*$keys->poin; //Poin Edit

	$data = array('sub_kegiatan' => $this->input->post('subkegiatan'),
								'sks_subkegiatan	' => $sks,
								'poin_subkegiatan	' => $point);

  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
  $this->M_master->update_rencana($where, $data, 'bkd_subkegiatan');
	redirect("AdminFakultas/PeriksaLaporanDetail/".$this->input->post('uri'));
}

function LaporanApproved_1($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$status = $ex[2];

		$data = array('app_assesor1' => 1, 'app_assesor2' => 1);
	  $where = array('id_subkegiatan' => $id_sub);
	  $this->M_master->update_appassesor($where, $data, 'bkd_subkegiatan');

		$data2  = array('p_assesor1' => 1, 'p_assesor2' => 1);
 	  $where2 = array('nip' => $nip);
		$this->M_master->update_statuslaporan($where2, $data2, 'verifikator');

echo "Update Succes"; redirect('AdminFakultas/PeriksaLaporanDetail/'.$nip);
}

function LaporanApproved_2($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$status = $ex[2];

		$data = array('app_assesor1' => 2, 'app_assesor2' => 2);
	  $where = array('id_subkegiatan' => $id_sub);
	  $this->M_master->update_appassesor($where, $data, 'bkd_subkegiatan');

		$data2  = array('p_assesor1' => 2, 'p_assesor2' => 2);
 	  $where2 = array('nip' => $nip);
		$this->M_master->update_statuslaporan($where2, $data2, 'verifikator');

echo "Update Succes"; redirect('AdminFakultas/PeriksaLaporanDetail/'.$nip);
}


function SelesaiPeriksa($id)
{
//Update Tabel Sub Kegiatan
	// $data = array('app_assesor1' => 1,
	// 							'app_assesor2' => 1);
  // $where = array('nip' => $id);
  // $this->M_master->update_laporan($where, $data, 'bkd_subkegiatan');

	// $data1 = array('statuslaporan' => 1,
	// 							'p_assesor1' => 1,
	// 							'p_assesor2' => 1,
	// 							'admin_periksa' => 1);
	$data1 = array('admin_periksa' => 1);
	$where1 = array('nip' => $id);
	$this->M_master->update_admin_periksa($where1, $data1, 'verifikator');

	// redirect("AdminFakultas/PeriksaLaporanDetail/".$id);
	redirect("AdminFakultas");
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
