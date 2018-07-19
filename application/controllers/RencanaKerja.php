<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RencanaKerja extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_rencanakerja');
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
		$data['nipp'] = $this->session->userdata('nipp');
		$data['rencanakerja'] = $this->M_rencanakerja->show_rencana();
		$data['penelitian'] = $this->M_rencanakerja->show_rencana_penelitian();
		$data['pengabdian'] = $this->M_rencanakerja->show_rencana_pengabdian();
		$data['penunjang'] = $this->M_rencanakerja->show_rencana_penunjang();
		$data['verifikator'] = $this->M_rencanakerja->show_verifikator();
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
			$data['laporan'] = $this->M_rencanakerja->show_laporan();
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
    foreach($this->input->post('bkd_kegiatan') as $bkd => $key)
        {
      //  echo $this->input->post('sub_kegiatan')[$bkd].'<br />';
            $data = array(
										'nip' => $this->session->userdata('nipp'),
										'id_bkd' => $this->input->post('bkd')[$bkd],
		                'id_kegiatan' => $key,
		                'sub_kegiatan' => $this->input->post('sub_kegiatan')[$bkd],
										'sks_subkegiatan' => $this->input->post('sks_subkegiatan')[$bkd],
		                'status' => 0,
		                'user_create' => $this->session->userdata('username')
            );
           //var_dump($data);
            $this->M_rencanakerja->insert_rencanakerja($data, 'bkd_subkegiatan');
          //Update Tabel Pegawai
            // $data1 = array('status_bkd' => 1);
            // $where = array('nip' => $this->session->userdata('username'));
            // $this->M_pegawai->update_pegawai($where, $data1, 'tb_pegawai');
        }

            redirect('RencanaKerja');
}

function UpdateRencana()
{
	$data = array('id_subkegiatan' => $this->input->post('id'),
								'sub_kegiatan' => $this->input->post('subkegiatan'),
								'sks_subkegiatan	' => $this->input->post('sks')
							 );
  $where = array('id_subkegiatan' => $this->input->post('id'));
  $this->M_rencanakerja->update_rencana($where, $data, 'bkd_subkegiatan');
	// var_dump($where);
	redirect('RencanaKerja');
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
