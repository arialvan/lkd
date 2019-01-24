<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
var $acl;
	public function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_counting');
						$this->load->model('M_dosen');
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
						$id = $this->session->userdata('nipp');
            $data['name'] = $this->session->userdata('username');
						$data['nipp'] = $this->session->userdata('nipp');
						$data['all'] = $this->M_counting->all_rencanakerja();
						$data['assesor_1'] = $this->M_counting->all_assesor_1();
						$data['assesor_2'] = $this->M_counting->all_assesor_2();
						$data['kp'] = $this->M_counting->all_ketua_prodi();
						$data['dosen'] = $this->M_counting->all_dosen();
						$data['unitorg'] = $this->M_counting->all_unit();
						$data['unitkerja'] = $this->M_counting->all_unitkerja();
						$data['filter'] = $this->M_dosen->filter($id);
						$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
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
							$point = array("label" => $row['kategori_dosen']."" , "y" => $row['JumlahDosen']);
							array_push($data_points, $point);
				    }
						echo json_encode($data_points, JSON_NUMERIC_CHECK);

        }

public function PieS()
				{
									$data_points = array();
									$query = $this->M_counting->pie_setuju();
									foreach($query as $row)
									{
										$point1 = array("label" => "Assesor 1".":" , "y" => $row['AS1']);
										$point2 = array("label" => "Assesor 2".":" , "y" => $row['AS2']);
										$point3 = array("label" => "Ketua Prodi".":" , "y" => $row['AS3']);
										array_push($data_points, $point1,$point2,$point3 );
									}

								echo json_encode($data_points, JSON_NUMERIC_CHECK);

			        }

public function PieTS()
				{
								$data_points1 = array();
								$query1 = $this->M_counting->pie_tidaksetuju();
								foreach($query1 as $row1)
									{
										$point11 = array("label" => "Assesor 1".":" , "y" => $row1['TS1']);
										$point22 = array("label" => "Assesor 2".":" , "y" => $row1['TS2']);
										$point33 = array("label" => "Ketua Prodi".":" , "y" => $row1['TS3']);
										array_push($data_points1, $point11,$point22,$point33 );
									}
							echo json_encode($data_points1, JSON_NUMERIC_CHECK);
				}

public function PieBP()
								{
												$data_points2 = array();
												$query2 = $this->M_counting->pie_belumperiksa();
												foreach($query2 as $row2)
													{
														$pointa = array("label" => "Assesor 1".":" , "y" => $row2['BP1']);
														$pointb = array("label" => "Assesor 2".":" , "y" => $row2['BP2']);
														$pointc = array("label" => "Ketua Prodi".":" , "y" => $row2['BP3']);
														array_push($data_points2, $pointa,$pointb,$pointc );
													}
											echo json_encode($data_points2, JSON_NUMERIC_CHECK);
								}

public function PieUP()
								{
												$data_points2 = array();
												$query2 = $this->M_counting->pie_uploadlaporan();
												foreach($query2 as $row2)
													{
														$pointa = array("label" => "Sudah Upload".":" , "y" => $row2['UP1']);
														$pointb = array("label" => "Belum Upload".":" , "y" => $row2['UP2']);
														array_push($data_points2, $pointa,$pointb );
													}
											echo json_encode($data_points2, JSON_NUMERIC_CHECK);
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
