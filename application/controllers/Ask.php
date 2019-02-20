<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ask extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_laporan');
						$this->load->model('M_pegawai');
						$this->load->model('M_dosen');
						$this->load->model('M_master');
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
		$data['filter'] = $this->M_laporan->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
	 	$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['ids'] = $this->session->userdata('kat_dosen');

		$data['title'] = 'Tanya Permasalahan';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/tanya/input_tanya');
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
