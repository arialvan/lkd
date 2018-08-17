<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_dosen');
            $this->load->helper(array('form', 'url'));
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
	$id = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($id);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
  $data['name'] = $this->session->userdata('username');
	$data['nipp'] = $this->session->userdata('nipp');
  $data['dosen'] = $this->M_dosen->show_dosen();
	$data['kategoridosen'] = $this->M_dosen->show_kat_dosen();
  $data['title'] = 'Profil Dosen';
  $this->load->view('layout/header_datatables',$data);
  $this->load->view('layout/side_menu');
  $this->load->view('pages/dosen/setprofil_view');
  $this->load->view('layout/footer_datatables');
}

public function FormDosen()
{
    if($this->session->userdata('user_level')==1){
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name']    = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $data['dosen']   = $this->M_dosen->show_dosen_profil();
        $data['katdosen'] = $this->M_dosen->show_kat_dosen();

        $data['title'] = 'Pengaturan Profil Dosen';
        $this->load->view('layout/header_datatables',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/dosen/dosen_input');
        $this->load->view('layout/footer_datatables');
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
function InsertDosen()
{
    foreach($this->input->post('nip') as $nip => $key)
        {
            $data = array('id_kat_dosen' => $this->input->post('id_kat_dosen'));
            $where = array('nip' => $key);
            $this->M_dosen->update_dosen($where, $data, 'profil_dosen');
						// var_dump($where);
        }
				redirect('Dosen');
}

function UpdateDosen()
{
	$data = array('id_kat_dosen' => $this->input->post('id_kat_dosen'));
  $where = array('nip' => $this->input->post('nip'));
  $this->M_dosen->update_dosen($where, $data, 'profil_dosen');
	// var_dump($where);
	redirect('Dosen');
}


public function EditVerifikator($id)
{
  if($this->session->userdata('user_level')==1)
  {
		$id = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($id);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
        $where = array('id_verifikator' => $id);
        $data['verifikator'] = $this->M_verifikator->edit_verifikator($where, 'verifikator')->result();
        $data['title'] = 'Edit Verifikator';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/master/verifikator_edit');
        $this->load->view('layout/footer');
  }else
  {
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
function HapusVerifikator($id) {
    $where = array('id_verifikator' => $id);
    $this->M_master->hapus_verifikator($where, 'verifikator');
    redirect('Verifikator');
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
