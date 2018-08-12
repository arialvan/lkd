<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikator extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_verifikator');
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
    $data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
    $data['verifikator'] = $this->M_verifikator->show_verifikator();
    $data['title'] = 'Verifikator';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/verifikator/verifikator_view');
    $this->load->view('layout/footer_datatables');
}

public function FormVerifikator()
{
    if($this->session->userdata('user_level')==1){
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
public function EditVerifikator($id)
{
  if($this->session->userdata('user_level')==1)
  {
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
    $this->M_master->hapus_verifikator($where, 'verifikator');
    redirect('Verifikator');
}

//PENILAIAN
public function PeriksaRencana()
{
  $data['name'] = $this->session->userdata('username');
  $data['nipp'] = $this->session->userdata('nipp');
  $data['level'] = $this->session->userdata('user_level');
  $data['pegawai'] = $this->M_verifikator->show_viewpages();
  $data['title'] = 'Data Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/verifikator/periksa_rencanakerja');
  $this->load->view('layout/footer_datatables');
}

public function PeriksaRencanaDetail($id)
{
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
	//var_dump($data);
	// $this->load->library('CustomFPDF');
  //   $pdf = $this->customfpdf->getInstance($data[0]);
	//
  //   $pdf->AliasNbPages();
  //   $pdf->AddPage();
  //   $pdf->header('Arial');
  //   $pdf->SetFont('Times','',12);
  //   // for($i=1;$i<=40;$i++)
  //   $pdf->Cell(0,10,0,1);
  //   $pdf->Output();
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
