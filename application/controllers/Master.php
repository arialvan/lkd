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

/*PERIODE*/
public function Periode()
{
	$ids = $this->session->userdata('nipp');
	$data['filter'] = $this->M_dosen->filter($ids);
	$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
    $data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
    $data['periodelkd'] = $this->M_master->show_periode();
    $data['title'] = 'Periode';
    $this->load->view('layout/header_datatables',$data);
    $this->load->view('layout/side_menu');
    $this->load->view('pages/master/periode_view');
    $this->load->view('layout/footer_datatables');
}
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
function HapusPeriode($id) {
    $where = array('id_periode' => $id);
    $this->M_master->hapus_periode($where, 'periode_lkd');
    redirect('Master/Periode');
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
