<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
var $acl;
	public function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_counting');
            $this->load->helper(array('form','url'));
            $this->acl = $this->session->userdata('acl');
        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }
	public function index()
	{
            $data['name'] = $this->session->userdata('username');
						$data['all'] = $this->M_counting->all_pegawai();
						$data['pns'] = $this->M_counting->all_pns();
						$data['dosen'] = $this->M_counting->all_dosen();
						$data['kontrak'] = $this->M_counting->all_kontrak();
						$data['unitorg'] = $this->M_counting->all_unit();
						$data['unitkerja'] = $this->M_counting->all_unitkerja();
            $this->load->view('layout/header_one',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('dashboard');
            $this->load->view('layout/footer_one');
						//var_dump($data);
  }

	public function BarChart()
	{
						$data_points = array();
						$query = $this->M_counting->bar_unit();
						foreach($query as $row)
				    {
							$point = array("label" => $row['unit_organisasi']."" , "y" => $row['Unit']);
							array_push($data_points, $point);
				    }
						echo json_encode($data_points, JSON_NUMERIC_CHECK);

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
