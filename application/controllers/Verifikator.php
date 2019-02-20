<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikator extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_verifikator');
						$this->load->model('M_rencanakerja');
						$this->load->model('M_dosen');
            $this->load->helper(array('form','url','file','directory'));
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

/*VERIFIKATOR*/
public function index()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
		$id = $this->session->userdata('nipp');
    $data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
    $data['verifikator'] = $this->M_verifikator->show_verifikator_aktif();
		$data['verifikator_noset'] = $this->M_verifikator->show_verifikator_noset();
		$data['filter'] = $this->M_dosen->filter($id);
    $data['title'] = 'Setting Verifikator';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/verifikator/verifikator_view');
    $this->load->view('layout/footer_datatables');
}

public function DataInfo()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	// $data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
		$id = $this->session->userdata('nipp');
    $data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['ketuaprodi'] = $this->M_verifikator->show_ketuaprodi_aktif();
		$data['asse1'] = $this->M_verifikator->show_asse1_aktif();
		$data['asse2'] = $this->M_verifikator->show_asse2_aktif();
		$data['filter'] = $this->M_dosen->filter($id);
    $data['title'] = 'Setting Verifikator';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/verifikator/verifikator_data');
    $this->load->view('layout/footer_datatables');
}

public function FormVerifikator()
{
    if($this->session->userdata('user_level')==1){
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name']    = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $data['dosen']   = $this->M_verifikator->show_dosen();
        $data['periode'] = $this->M_verifikator->show_periode();
        $data['assesor1'] = $this->M_verifikator->show_assesor1();
        $data['assesor2'] = $this->M_verifikator->show_assesor2();
        $data['ketprodi'] = $this->M_verifikator->show_ketprodi();

        $data['title'] = 'Pengaturan Verifikator';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/verifikator/verifikator_input');
        $this->load->view('layout/footer_datatables');
    }else {
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

function InsertVerifikator()
{
    foreach($this->input->post('nip') as $nip => $key)
        {
        //echo $key.'<br />';
            $data = array(
                'nip' => $key,
                'id_periode' => $this->input->post('periode'),
                'assesor_1' => $this->input->post('assesor1'),
                'assesor_2' => $this->input->post('assesor2'),
                'ketua_prodi' => $this->input->post('ketua_prodi'),
                'user_create' => $this->session->userdata('username')
            );
            //var_dump($data);
            $this->M_verifikator->insert_verifikator($data, 'verifikator');
            //Update Tabel Pegawai
            $data1 = array('status_profil' => 1);
            $where = array('nip' => $key);
            $this->M_verifikator->update_pegawai($where, $data1, 'tb_pegawai');
        }

            redirect('Verifikator');
}


function AssesorSelesaiMemeriksa($id)
{
	$id = $this->uri->segment(3);
	$nip = $this->session->userdata('nipp');
	//Cek session
	$cek = $this->M_verifikator->CekAssesor_1($nip);
	foreach($cek as $key);
	//echo $key->assesor_1;
	if($key->assesor_1==$nip){
		$data = array('p_assesor1' => 1);
		$where = array('nip' => $id, 'id_periode' => $key->id_periode);
		$this->M_verifikator->selesai_laporan($where, $data, 'verifikator');
		redirect('Verifikator/PeriksaLaporan');
		//var_dump($where);
	}elseif($key->assesor_2==$nip){
		$data = array('p_assesor2' => 1);
		$where = array('nip' => $id, 'id_periode' => $key->id_periode);
		$this->M_verifikator->selesai_laporan($where, $data, 'verifikator');
		redirect('Verifikator/PeriksaLaporan');
		//var_dump($where);
	}else{
		echo '<h2>
							Error....
							Anda tidak berhak mengakses.
					</h2>';
		echo '<h2><a href="'.base_url().'Verifikator/PeriksaLaporan">KEMBALI</a></h2>';
		exit;
	}


}

function ApprovalKetuaProdi()
{
		$nip    = $this->input->post('nip');
    foreach($this->input->post('cekbox') as $id => $key)
        {
        //Update tabel sub_kegiatan
            $data  = array('app_ketuaprodi' => 1, 'status' => 1);
						$where = array('id_subkegiatan' => $key);
            //var_dump($where);
            $this->M_verifikator->update_approval($where, $data, 'bkd_subkegiatan');

				//Update Tabel verifikator

            // $data1  = array('p_kaprodi' => 1);
            // $where1 = array('nip' => $nip);
						// //var_dump($where1);
            // $this->M_verifikator->update_approval($where1, $data1, 'verifikator');
        }
				echo "Update Succes";
				redirect('Verifikator/PeriksaRencanaKerjaDetail/'.$nip);
}

function ApprovalKetuaProdi1()
{
	$nip    = $this->input->post('nip');
    foreach($this->input->post('cekbox1') as $id => $key)
        {
        //Update tabel sub_kegiatan
            $data  = array('app_ketuaprodi' => 1, 'status' => 1);
						$where = array('id_subkegiatan' => $key);
            //var_dump($where);
            $this->M_verifikator->update_approval($where, $data, 'bkd_subkegiatan');

				//Update Tabel verifikator

            // $data1  = array('p_kaprodi' => 1);
            // $where1 = array('nip' => $nip);
						// //var_dump($where1);
            // $this->M_verifikator->update_approval($where1, $data1, 'verifikator');
        }

						echo "Update Succes";
						redirect('Verifikator/PeriksaRencanaKerjaDetail/'.$nip);
}

function ApprovalKetuaProdi2()
{
	$nip    = $this->input->post('nip');
    foreach($this->input->post('cekbox2') as $id => $key)
        {
        //Update tabel sub_kegiatan
            $data  = array('app_ketuaprodi' => 1, 'status' => 1);
						$where = array('id_subkegiatan' => $key);
            //var_dump($where);
            $this->M_verifikator->update_approval($where, $data, 'bkd_subkegiatan');

				//Update Tabel verifikator

            // $data1  = array('p_kaprodi' => 1);
            // $where1 = array('nip' => $nip);
						// //var_dump($where1);
            // $this->M_verifikator->update_approval($where1, $data1, 'verifikator');
        }

						echo "Update Succes";
						redirect('Verifikator/PeriksaRencanaKerjaDetail/'.$nip);
}

function ApprovalKetuaProdi3()
{
	$nip    = $this->input->post('nip');
    foreach($this->input->post('cekbox3') as $id => $key)
        {
        //Update tabel sub_kegiatan
            $data  = array('app_ketuaprodi' => 1, 'status' => 1);
						$where = array('id_subkegiatan' => $key);
            //var_dump($where);
            $this->M_verifikator->update_approval($where, $data, 'bkd_subkegiatan');

				//Update Tabel verifikator

            // $data1  = array('p_kaprodi' => 1);
            // $where1 = array('nip' => $nip);
						// //var_dump($where1);
            // $this->M_verifikator->update_approval($where1, $data1, 'verifikator');
        }

						echo "Update Succes";
						redirect('Verifikator/PeriksaRencanaKerjaDetail/'.$nip);
}

public function EditVerifikator($id)
{
  if($this->session->userdata('user_level')==1)
  {
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        // $where = array('id_verifikator' => $id);
        // $data['verifikator'] = $this->M_verifikator->edit_verifikator($where, 'verifikator')->result();
        $data['verifikator'] = $this->M_verifikator->edit_verifikator($id);
				$data['pegawai'] = $this->M_verifikator->show_pegawai();
        $data['title'] = 'Edit Verifikator';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/verifikator/verifikator_edit');
        $this->load->view('layout/footer_datatables');
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
function UpdateVerifikator()
{
	$data = array(
                        'nip' => $this->input->post('nip'),
                        'id_periode' => $this->input->post('id_periode'),
                        'assesor_1' => $this->input->post('assesor_1'),
                        'assesor_2' => $this->input->post('assesor_2'),
                        'ketua_prodi' => $this->input->post('ketua_prodi'),
                        'user_create' => $this->session->userdata('username')
                     );
        $where = array('id_verifikator' => $this->input->post('id_verifikator'));
        $this->M_master->update_verifikator($where, $data, 'verifikator');
        echo "Update Succes"; redirect('Verifikator','refresh');
}

function UpdateVerifikators()
{
	$data = array(
                        'assesor_1' => $this->input->post('assesor_1'),
                        'assesor_2' => $this->input->post('assesor_2'),
                        'ketua_prodi' => $this->input->post('ketua_prodi'),
                        'user_create' => $this->session->userdata('username')
                     );
        $where = array('id_verifikator' => $this->input->post('id_verifikator'));
        $this->M_verifikator->update_verifikator($where, $data, 'verifikator');
        echo "Update Succes"; redirect('Verifikator','refresh');
}

function HapusVerifikator($id) {
    $where = array('id_verifikator' => $id);
    $this->M_verifikator->hapus_verifikator($where, 'verifikator');
    redirect('Verifikator');
}

//PENILAIAN
public function PeriksaRencana()
{
	$this->load->library('Pustaka');
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_verifikator->show_viewpages2();
	$data['profildosen'] = $this->M_verifikator->profil();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/verifikator/periksa_rencanakerja');
  $this->load->view('layout/footer_datatables');
}

public function PeriksaLaporanProdi()
{
	$this->load->library('Pustaka');
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_verifikator->periksa_laporan_prodi();
	$data['profildosen'] = $this->M_verifikator->profil();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  //$this->load->view('pages/verifikator/periksa_laporan');
  $this->load->view('pages/verifikator/periksa_laporan_prodi');
  $this->load->view('layout/footer_datatables');
}

public function PeriksaLaporanDetailKaprodi($id)
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
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd_rk($id);
	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);
	$data['pendidikan'] = $this->M_verifikator->show_pendidikan_prodi($id);
	$data['penelitian'] = $this->M_verifikator->show_rencana_penelitian_prodi($id);
	$data['pengabdian'] = $this->M_verifikator->show_rencana_pengabdian_prodi($id);
	$data['penunjang'] = $this->M_verifikator->show_rencana_penunjang_prodi($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['cek_approve'] = $this->M_verifikator->cek_sudah_approve($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';

	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/periksa_laporan_detail_prodi');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

public function PeriksaRencanaDetail($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	$this->load->library('Pustaka');
	$data['name'] = $this->session->userdata('username');
	$data['nipp'] = $this->session->userdata('nipp');
	$data['level'] = $this->session->userdata('user_level');
	$data['pendidikan'] = $this->M_verifikator->show_pendidikan($id);
	$data['penelitian'] = $this->M_verifikator->show_rencana_penelitian($id);
	$data['pengabdian'] = $this->M_verifikator->show_rencana_pengabdian($id);
	$data['penunjang'] = $this->M_verifikator->show_rencana_penunjang($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/periksa_rencanakerja_detail');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

public function PeriksaRencanaDetailPDF($id)
{
	$where = array('id_subkegiatan' => $id);
	$data = $this->M_verifikator->show_file($id);
	foreach ($data as $keys){
			$p = explode('_',$keys->file);
			$nip = $p[0];
			$filename = "./uploads/".$nip."/".$keys->file;

			// New Tabbrowser
			header("Content-type: application/pdf");
			header("Content-Length: " . filesize($filename));
			readfile($filename);
			exit();
	}
}

function RencanaApprove($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$data = array('app_ketuaprodi' => 1, 'status' => 1);
        $where = array('id_subkegiatan' => $id_sub);
        $this->M_verifikator->update_appketuaprodi($where, $data, 'bkd_subkegiatan');
        echo "Update Succes"; redirect('Verifikator/PeriksaRencanaDetail/'.$nip);
}

function LaporanApproved_1($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$status = $ex[2];

		$data = array('app_assesor1' => 1);
	  $where = array('id_subkegiatan' => $id_sub);
	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

echo "Update Succes"; redirect('Verifikator/PeriksaLaporanDetailAssesor/'.$nip);
}

function LaporanApproved_2($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$status = $ex[2];

		$data = array('app_assesor2' => 1);
	  $where = array('id_subkegiatan' => $id_sub);
	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

echo "Update Succes"; redirect('Verifikator/PeriksaLaporanDetailAssesor/'.$nip);
}

function LaporanApproved_Kaprodi($id)
{
	$ex = explode("-",$id);
	$id_sub = $ex[0];
	$nip    = $ex[1];
	$status = $ex[2];

		$data = array('applaporan_ketuaprodi' => 1);
	  $where = array('id_subkegiatan' => $id_sub);
	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

echo "Update Succes"; redirect('Verifikator/PeriksaLaporanDetailKaprodi/'.$nip);
}

// function SelesaiLaporan($id)
// {
// 	//Cek Data Tolak KEGIATAN
// 	$datas=$this->M_verifikator->show_subkegiatan($id);
// 	foreach ($datas as $keys){
// 					 $status = $keys->status;
// 					 $nip    = $keys->nip;
// 					 if($status==4){
// 						 //echo '4<br />';
// 							 $data2  = array('statuslaporan' => 4);
// 							 $where2 = array('nip' => $nip);
// 							 $this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');
// 					 }elseif($status==5){
// 						 //echo '5<br />';
// 							 $data2  = array('statuslaporan' => 5);
// 							 $where2 = array('nip' => $nip);
// 							 $this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');
// 					 }else{
// 						 	$datas1=$this->M_verifikator->show_assesor($id);
// 							foreach ($datas1 as $keys1)
// 										 $assesor1 = $keys1->assesor_1;
// 										 $assesor2 = $keys1->assesor_2;
// 										 if($assesor1 == $this->session->userdata('nipp')){
// 											 //echo 'assesor I<br />';
// 											  $data2  = array('p_assesor1' => 1);
// 												$where2 = array('nip' => $nip);
// 												$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');
// 										 }elseif($assesor2 == $this->session->userdata('nipp')){
// 											 //echo 'assesor II<br />';
// 											  $data2  = array('p_assesor2' => 1);
// 											  $where2 = array('nip' => $nip);
// 											  $this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');
// 										 }else{ exit; }
//
// 					 }
// 	}
//
//
// 	// $id = $this->session->userdata('nipp');
// 	// $data = array('statuslaporan	' => 1);
// 	//
//   // $where = array('nip' => $id);
//   // $this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
// 	redirect('Verifikator/PeriksaLaporanDetail/'.$id);
// }

function SelesaiLaporan()
{
	$id = $this->session->userdata('nipp');
	$data = array('p_assesor1' => 1);

  $where = array('nip' => $id);
  $this->M_rencanakerja->selesai_laporan($where, $data, 'verifikator');
	redirect('RencanaKerja/Laporan');
}

function SelesaiLaporan_1($id)
{
	$data = array('p_assesor1' => 1);

  $where = array('nip' => $id);
  $this->M_verifikator->selesai_laporan($where, $data, 'verifikator');
	redirect('Verifikator/PeriksaLaporanDetail/'.$id);
}

function SelesaiLaporan_2($id)
{
	$data = array('p_assesor2' => 1);

  $where = array('nip' => $id);
  $this->M_verifikator->selesai_laporan($where, $data, 'verifikator');
	redirect('Verifikator/PeriksaLaporanDetail/'.$id);
}


public function PeriksaLaporan()
{
	$this->load->library('Pustaka');
	$ids = $this->session->userdata('nipp');
	//Cek Assesor
	$cek = $this->M_verifikator->CekAssesor($ids);
	foreach($cek as $key);
	if($key->assesor_1==$ids || $key->assesor_2==$ids){
			$pegawai = $this->M_verifikator->show_viewpages();
	}elseif($key->assesor_1==$ids){
			$pegawai = $this->M_verifikator->show_viewpages_1();
	}elseif($key->assesor_2==$ids){
			$pegawai = $this->M_verifikator->show_viewpages_2();
	}else{
			$pegawai = $this->M_verifikator->show_viewpages();
	}
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $pegawai;
	$data['profildosen'] = $this->M_verifikator->profil();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/verifikator/periksa_laporan');
  $this->load->view('layout/footer_datatables');
}

//PERIKSA RENCANA KERJA OLEH KETUA PRODI
public function PeriksaRencanaKerjaDetail($id)
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
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd_rk($id);
	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);
	$data['pendidikan'] = $this->M_verifikator->rk_pendidikan_prodi($id);
	$data['penelitian'] = $this->M_verifikator->rk_penelitian_prodi($id);
	$data['pengabdian'] = $this->M_verifikator->rk_pengabdian_prodi($id);
	$data['penunjang'] = $this->M_verifikator->rk_penunjang_prodi($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['cek_approve'] = $this->M_verifikator->cek_sudah_approve($id);
	$data['title'] = 'Rencana Kerja Dosen';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/periksa_rencana_kerja_prodi');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

//PERIKSA laporan OLEH KETUA PRODI
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
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd_rk($id);
	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);
	$data['pendidikan'] = $this->M_verifikator->show_pendidikan_prodi($id);
	$data['penelitian'] = $this->M_verifikator->show_rencana_penelitian_prodi($id);
	$data['pengabdian'] = $this->M_verifikator->show_rencana_pengabdian_prodi($id);
	$data['penunjang'] = $this->M_verifikator->show_rencana_penunjang_prodi($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['cek_approve'] = $this->M_verifikator->cek_sudah_approve($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';
	// if($this->M_verifikator->show_rekap_dosen_rk($id)>0){
	// 	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	// }else{
	// 	$dt = array('Pendidikan' => 0, 'Penelitian' => 0, 'Pengabdian' => 0, 'Penunjang' => 0);
	// 	$data['rekap_dosen'] = $dt;
	// }
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/periksa_laporan_detail');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

public function PeriksaLaporanDetailAssesor($id)
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
	$data['verifikator'] = $this->M_verifikator->show_verifikator_laporandetail($id);
	$data['syaratbkd'] = $this->M_verifikator->show_syarat_bkd_rk($id);
	$data['rekap_dosen'] = $this->M_verifikator->show_rekap_dosen_rk($id);
	$data['sum_poin_pendidikan'] = $this->M_verifikator->show_syarat_subbkd_poin($id);
	$data['pendidikan'] = $this->M_verifikator->show_pendidikan($id);
	$data['penelitian'] = $this->M_verifikator->show_rencana_penelitian($id);
	$data['pengabdian'] = $this->M_verifikator->show_rencana_pengabdian($id);
	$data['penunjang'] = $this->M_verifikator->show_rencana_penunjang($id);
	$data['files'] = $this->M_verifikator->show_file($id);
	$data['cek_approve'] = $this->M_verifikator->CekAssesor($id);
	$data['title'] = 'Rekap Laporan Kerja Dosen';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/periksa_laporan_detail_assesor');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

function Appketuaprodi(){
	$data=$this->M_verifikator->update_periksa_ketuaprodi();
	echo json_encode($data);
}

public function PeriksaLaporanDetailPDF($id)
{
	// echo str_replace("#","/"$id);
	$ex = explode('-',$id);
	$id_kegiatan = $ex[0];
	$nama_file   = urldecode($ex[1]);

	$filename = str_replace("_","/",$nama_file);

	echo $data = $id_kegiatan.'#'.$filename;
	$datas=$this->M_verifikator->show_file1($data);

	foreach ($datas as $keys);
			$p = explode('_',$keys->file);
			$nip = $p[0];
			// $filename = "./uploads/".$nip."/".$keys->file;
			$filename = "./uploads/".$nip."/".date("Y")."/".date("m")."/".$keys->file;

			//New Tabbrowser
			header("Content-type: application/pdf");
			readfile($filename);
}

public function LihatFile($id)
{
	$datas=$this->M_verifikator->show_file2($id);
	foreach ($datas as $keys);
			$p = explode('_',$keys->file);
			$nip = $p[0];
			// echo $filename = "./uploads/".$nip."/".$keys->file;
			$filename = "./uploads/".$nip."/".date("Y")."/".date("m")."/".$keys->file;

			//New Tabbrowser
			header("Content-type: application/pdf");
			readfile($filename);
}
//Komentar Tolak Assesor
function KomentarTolak()
{
	$ex = explode("-",$this->input->post('id_kegiatan'));
	 $id_sub = $ex[0];
	 $nip    = $ex[1];
	 $status = $ex[2];

	$datas=$this->M_verifikator->show_verifikator_app($nip);
 	foreach ($datas as $keys);
 					 $Assesor1 = $keys->assesor_1;
 					 $Assesor2 = $keys->assesor_2;

	 if($Assesor1==$this->session->userdata('nipp') && $status==2){
 		$data = array('app_assesor1' => 2, 'komentar' => $this->input->post('komentar_assesor'));
 	  $where = array('id_subkegiatan' => $id_sub);
 	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

		$data2  = array('p_assesor1' => 2);
 	  $where2 = array('nip' => $nip, 'id_periode' => $keys->id_periode);
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

 	}elseif($Assesor2==$this->session->userdata('nipp') && $status==2){
		$data = array('app_assesor2' => 2, 'komentar' => $this->input->post('komentar_assesor'));
 	  $where = array('id_subkegiatan' => $id_sub);
 	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

		$data2  = array('p_assesor2' => 2);
 	  $where2 = array('nip' => $nip, 'id_periode' => $keys->id_periode);
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}elseif($Assesor1==$this->session->userdata('nipp') && $status==1){
		$data = array('app_assesor1' => 1);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

		// $data2  = array('p_assesor1' => 1);
		// $where2 = array('nip' => $nip);
		// $this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}elseif($Assesor2==$this->session->userdata('nipp') && $status==1){
		$data = array('app_assesor2' => 1);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

		// $data2  = array('p_assesor2' => 1);
		// $where2 = array('nip' => $nip);
		// $this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

 	}else{
 		exit;
 	}

	redirect('Verifikator/PeriksaLaporanDetailAssesor/'.$nip);
}

//Komentar Tolak Ketua Prodi
function KomentarTolakProdi()
{
	$ex = explode("-",$this->input->post('id_kegiatan'));
	 $id_sub = $ex[0];
	 $nip    = $ex[1];
	 $status = $ex[2];

	$datas=$this->M_verifikator->show_verifikator_app($nip);
 	foreach ($datas as $keys);
 					 $Kp = $keys->ketua_prodi;
					 $periode = $keys->id_periode;

	 if($Kp==$this->session->userdata('nipp') && $status==2){
 		$data = array('applaporan_ketuaprodi' => $status, 'komentar' => $this->input->post('komentar_prodi'));
 	  $where = array('id_subkegiatan' => $id_sub);
 	  $this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

		$data2  = array('laporan_app_kaprodi' => 2);
 	  $where2 = array('nip' => $nip, 'id_periode' => $periode);
		$this->M_verifikator->update_statuslaporan($where2, $data2, 'verifikator');

	}elseif($Kp==$this->session->userdata('nipp') && $status==1){
		$data = array('applaporan_ketuaprodi' => $status);
		$where = array('id_subkegiatan' => $id_sub);
		$this->M_verifikator->update_appassesor1($where, $data, 'bkd_subkegiatan_laporan');

 	}else{
 		exit;
 	}

	redirect('Verifikator/PeriksaLaporanDetailKaprodi/'.$nip);
}


//REKAP
public function RekapRencana()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_verifikator->show_viewpages();
  $data['title'] = 'Data Rekap';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  // $this->load->view('pages/verifikator/rekap_rencanakerja');
	$this->load->view('pages/error');
  $this->load->view('layout/footer_datatables');
}

public function RekapLaporan()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_verifikator->show_viewpages();
  $data['title'] = 'Data Rekap';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  // $this->load->view('pages/verifikator/rekap_rencanakerja');
	$this->load->view('pages/error');
  $this->load->view('layout/footer_datatables');
}

public function RekapRencanaDetail($id)
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	$this->load->library('Pustaka');
	$data['name'] = $this->session->userdata('username');
	$data['nipp'] = $this->session->userdata('nipp');
	$data['level'] = $this->session->userdata('user_level');
	$data['rekap'] = $this->M_verifikator->show_rekap($id);
	$data['title'] = 'Rekap Data';
	$this->load->view('layout/header_datatables',$data);
	$this->load->view('layout/side_menu');
	$this->load->view('pages/verifikator/rekap_rencanakerja_detail');
	$this->load->view('layout/footer_datatables');
	//return $a;
}

function UpdateStatusLaporan($id)
{
	$data2  = array('statuslaporan' => 0);
	$where2 = array('id_periode' => 2);
	$this->M_verifikator->UpdateSL($where2, $data2, 'verifikator');
}

function ProdiApproved($id)
{
	$data  = array('p_kaprodi' => 1);
	$where = array('nip' => $id);
	$this->M_verifikator->update_kprodi($where, $data, 'verifikator');
	redirect('Verifikator/PeriksaLaporanDetail/'.$id);
}

function ProdiReset($id,$ids)
{

	$data  = array('p_kaprodi' => 0);
	$where = array('nip' => $id, 'id_periode' => $ids);
	$this->M_verifikator->update_kprodi($where, $data, 'verifikator');

	//Reset Sub Kegiatan

	$data2  = array('app_ketuaprodi' => 0, 'status' => 0);
	$where2 = array('nip' => $id, 'id_periode' => $ids);
	$this->M_verifikator->update_bkdkegiatan($where2, $data2, 'bkd_subkegiatan');
	redirect('Verifikator/PeriksaLaporanDetail/'.$id);
}

function ProdiApprovedLaporan($id)
{
	$data  = array('laporan_app_kaprodi' => 1);
	$where = array('nip' => $id);
	$this->M_verifikator->update_kprodi($where, $data, 'verifikator');
	redirect('Verifikator/PeriksaLaporanDetailKaprodi/'.$id);
}

function ProdiResetLaporan($id,$ids)
{

	$data  = array('laporan_app_kaprodi' => 0);
	$where = array('nip' => $id, 'id_periode' => $ids);
	$this->M_verifikator->update_kprodi($where, $data, 'verifikator');

	//Reset Sub Kegiatan

	$data2  = array('applaporan_ketuaprodi' => 0, 'status' => 0);
	$where2 = array('nip' => $id, 'id_periode' => $ids);
	$this->M_verifikator->update_bkdkegiatan($where2, $data2, 'bkd_subkegiatan_laporan');
	redirect('Verifikator/PeriksaLaporanDetailKaprodi/'.$id);
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
