<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$data['profildosen'] = $this->M_laporan->profil();
		$data['biodata'] = $this->M_laporan->biodata();
		$data['bkd_syarat'] = $this->M_laporan->syaratbkd();
		$data['bkd_syarat_ds'] = $this->M_laporan->syaratbkd_ds($id);
		$data['bkd_syarat_dt'] = $this->M_laporan->syaratbkd_dt($id);
		$data['rencanakerja'] = $this->M_laporan->show_rencana($id);
		$data['penelitian'] = $this->M_laporan->show_rencana_penelitian($id);
		$data['pengabdian'] = $this->M_laporan->show_rencana_pengabdian($id);
		$data['penunjang'] = $this->M_laporan->show_rencana_penunjang($id);
		$data['verifikator'] = $this->M_laporan->show_verifikator();
		$data['bkdkegiatan'] = $this->M_laporan->show_bkdkegiatan();
		$data['syaratbkd'] = $this->M_laporan->show_syarat_bkd();
		$data['syaratsubbkd'] = $this->M_laporan->show_syarat_subbkd($id);
		$data['sum_poin_pendidikan'] = $this->M_laporan->show_syarat_subbkd_poin($id);
		$data['syt_pendidikan'] = $this->M_laporan->show_syarat_pendidikan($id);
		$data['syt_penelitian'] = $this->M_laporan->show_syarat_penelitian($id);
		$data['syt_pengabdian'] = $this->M_laporan->show_syarat_pengabdian($id);
		$data['syt_penunjang'] = $this->M_laporan->show_syarat_penunjang($id);
		$data['tanpa_syt_penunjang'] = $this->M_laporan->show_tanpa_syarat_penunjang($id);
		$data['syt_penunjang_poin'] = $this->M_laporan->show_syarat_penunjang_poin($id);
		$data['poinremunerasi'] = $this->M_laporan->show_poin_remunerasi($id);
		$data['poinmaks'] = $this->M_laporan->poin_terbesar($id);
		$data['poinmin'] = $this->M_laporan->poin_terendah($id);
		$data['sksxpoin'] = $this->M_laporan->sksxpoin($id);
		$data['detail_rekap'] = $this->M_laporan->show_detail($id);
		$data['title'] = 'Beban Kinerja Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/laporan_rekap');
		$this->load->view('layout/footer_datatables');
	}

		// for generate pdf
		public function save_pdf()
		{
			//$pdf = new Dompdf();
			$this->load->library('Pdf');
			$id = $this->session->userdata('nipp');
			$data['filter'] = $this->M_laporan->filter($id);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
		 	$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['ids'] = $this->session->userdata('kat_dosen');
			$data['profildosen'] = $this->M_laporan->profil();
			$data['biodata'] = $this->M_laporan->biodata();
			$data['bkd_syarat'] = $this->M_laporan->syaratbkd();
			$data['bkd_syarat_ds'] = $this->M_laporan->syaratbkd_ds($id);
			$data['bkd_syarat_dt'] = $this->M_laporan->syaratbkd_dt($id);
			$data['rencanakerja'] = $this->M_laporan->show_rencana($id);
			$data['penelitian'] = $this->M_laporan->show_rencana_penelitian($id);
			$data['pengabdian'] = $this->M_laporan->show_rencana_pengabdian($id);
			$data['penunjang'] = $this->M_laporan->show_rencana_penunjang($id);
			$data['verifikator'] = $this->M_laporan->show_verifikator();
			$data['bkdkegiatan'] = $this->M_laporan->show_bkdkegiatan();
			$data['syaratbkd'] = $this->M_laporan->show_syarat_bkd();
			$data['syaratsubbkd'] = $this->M_laporan->show_syarat_subbkd($id);
			$data['sum_poin_pendidikan'] = $this->M_laporan->show_syarat_subbkd_poin($id);
			$data['syt_pendidikan'] = $this->M_laporan->show_syarat_pendidikan($id);
			$data['syt_penelitian'] = $this->M_laporan->show_syarat_penelitian($id);
			$data['syt_pengabdian'] = $this->M_laporan->show_syarat_pengabdian($id);
			$data['syt_penunjang'] = $this->M_laporan->show_syarat_penunjang($id);
			$data['tanpa_syt_penunjang'] = $this->M_laporan->show_tanpa_syarat_penunjang($id);
			$data['syt_penunjang_poin'] = $this->M_laporan->show_syarat_penunjang_poin($id);
			$data['poinremunerasi'] = $this->M_laporan->show_poin_remunerasi($id);
			$data['poinmaks'] = $this->M_laporan->poin_terbesar($id);
			$data['poinmin'] = $this->M_laporan->poin_terendah($id);
			$data['sksxpoin'] = $this->M_laporan->sksxpoin($id);
			$data['detail_rekap'] = $this->M_laporan->show_detail($id);
			$data['data'] = $this->M_laporan->show_detail($id);
			$data['fak_id'] = $this->M_dosen->fakultas_id($id);
			$data['jab_id'] = $this->M_dosen->jabatan_id($id);

	    $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->set_option('isRemoteEnabled', TRUE);
	    $this->pdf->filename = "laporan_".$id."_".date('Y-m-d').".pdf";
	    $this->pdf->load_view('pages/bkd/laporan_pdf',$data);
			// $this->load->view('pages/bkd/laporan_pdf',$data);
		}

	public function FormLaporan()
	{
							$ids = $this->session->userdata('nipp');
							$data['filter'] = $this->M_laporan->filter($ids);
							$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
							$data['profildosen'] = $this->M_laporan->profil();
			        $data['name'] = $this->session->userdata('username');
			        $data['nipp'] = $this->session->userdata('nipp');
			        $data['pegawai'] = $this->M_laporan->edit_pegawai();
							$data['fakultas'] = $this->M_laporan->show_fakultas();
							$data['jabatan'] = $this->M_laporan->show_jabatan();
			        $data['title'] = 'Edit Pegawai';
			        $this->load->view('layout/header_datatables',$data);
			        $this->load->view('layout/side_menu');
			        $this->load->view('pages/bkd/laporan_input');
			        $this->load->view('layout/footer_datatables');
	}

function ambil_fakultas()
	{
	    $state=$this->input->post('state');
	    $query=$this->M_laporan->ambil_tb_fakultas();
	    echo '<option value="">-- Pilih Prodi --</option>';
	    foreach($query->result() as $row)
	    {
	     echo "<option value='".$row->id_prodi."'>".$row->nama_prodi."</option>";
	    }
	}


	function InsertLaporan()
	{
	    if(!empty($_FILES['foto']['name'])){
	        $config['upload_path'] = 'photo/pegawai/';
	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
	        $config['file_name'] = $this->input->post('nip');
	        //Load upload library and initialize configuration
	        $this->load->library('upload',$config);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('foto')){
	            $uploadData = $this->upload->data();
	            $uploadData['file_name'] = $this->input->post('nip').'.jpg';
	            $name = $uploadData['file_name'];
	            $picture = '../../photo/pegawai/'.$name;
	        }
	        else{
	            $picture = '';
	        }
	    }else{
	            $picture = '';
	    }
	        $data = array(
	            'nip' => $this->input->post('nip'),
	            'nama_peg' => $this->input->post('nama_peg'),
	            'alamat' => $this->input->post('alamat'),
	            'id_gol' => $this->input->post('id_gol'),
	            'id_agama' => $this->input->post('id_agama'),
	            'id_mapel' =>  $this->input->post('id_mapel'),
	            'no_askes' => $this->input->post('no_askes'),
	            'telp' => $this->input->post('telp'),
	            'tempat_lhr' => $this->input->post('tempat_lhr'),
	            'tgl_lahir' => $this->input->post('tgl_lahir'),
	            'jenis_kel' => $this->input->post('jenis_kel'),
	            'gol_darah' => $this->input->post('gol_darah'),
	            'status_nikah' => $this->input->post('status_nikah'),
	            'jumlah_anak' => $this->input->post('jumlah_anak'),
	            'status_peg' => $this->input->post('status_peg'),
	            'status_profesi' => $this->input->post('status_profesi'),
	            'masa_kerja' => $this->input->post('masa_kerja'),
	            'gaji_pokok' => $this->input->post('gaji_pokok'),
	            'tmt' => $this->input->post('tmt'),
	            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
	            'ket' => $this->input->post('ket'),
	            'foto' => $picture
	        );
	        $this->M_pegawai->insert_pegawai($data, 'tb_pegawai');
	        redirect('Pegawai');
	}

//REKAP LAPORAN DOSEN
	public function RekapLaporan()
	{
		$this->load->library('Pustaka');
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
		$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['level'] = $this->session->userdata('user_level');
		$data['pegawai'] = $this->M_laporan->show_viewpages();
		$data['profildosen'] = $this->M_verifikator->profil();
		$data['title'] = 'Data Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/rekap_laporan');
		$this->load->view('layout/footer_datatables');
	}

	function ambil_data_asessor()
		{
		    $state=$this->input->post('state');
		    $query=$this->M_laporan->ambil_laporan();
				echo '<option value="">-- Pilih --</option>';
		    foreach($query->result() as $row)
		    {
		     echo "<option value='".$row->id_verifikator."'>".$row->pegawai."</option>";
		    }
					// foreach($query->result() as $dt){
					// 	echo '<tr>
					// 						<th scope="row">'.$no++.'</th>
					// 						<td>'.$dt->nip.'</td>
					// 						<td>'.$dt->pegawai.'<br /><span class="text text-danger">'.$dt->kategori_dosen.'</span></td>
					// 						<td>
					// 								<span class="text">1.'.$dt->assesor1.'</span><br />
					// 								<span class="text">2.'.$dt->assesor2.'</span>
					// 						</td>
					// 					</tr>';
			    // }
		}

		public function RekapLaporanAssesor1()
		{
			if(empty($this->input->get('id_kat_dosen'))){
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor1();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor1');
					$this->load->view('layout/footer_datatables');
			}else{
					$id = $this->input->get('id_kat_dosen');
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor1_id($id);
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor1');
					$this->load->view('layout/footer_datatables');
			}
		}

		public function RekapLaporanAssesor2()
		{
			if(empty($this->input->get('id_kat_dosen'))){
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor2();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor2');
					$this->load->view('layout/footer_datatables');
			}else{
					$id = $this->input->get('id_kat_dosen');
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor2_id($id);
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor2');
					$this->load->view('layout/footer_datatables');
			}
		}

		public function RekapAssesor1dan2()
		{
			if(empty($this->input->get('id_kat_dosen'))){
				$this->load->library('Pustaka');
				$ids = $this->session->userdata('nipp');
				$data['filter'] = $this->M_dosen->filter($ids);
				$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
				$data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['level'] = $this->session->userdata('user_level');
				$data['datadosen'] = $this->M_laporan->show_rekap_asessor();
				$data['profildosen'] = $this->M_laporan->kategori_dosen();
				$data['title'] = 'Data Dosen';
				$this->load->view('layout/header_datatables',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/bkd/rekap_laporan_asessor');
				$this->load->view('layout/footer_datatables');
			}else{
				$id = $this->input->get('id_kat_dosen');
				$this->load->library('Pustaka');
				$ids = $this->session->userdata('nipp');
				$data['filter'] = $this->M_dosen->filter($ids);
				$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
				$data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['level'] = $this->session->userdata('user_level');
				$data['datadosen'] = $this->M_laporan->show_rekap_asessor_id($id);
				$data['profildosen_id'] = $this->M_laporan->kategori_dosen_id($id);
				$data['profildosen'] = $this->M_laporan->kategori_dosen();
				$data['title'] = 'Data Dosen';
				$this->load->view('layout/header_datatables',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/bkd/rekap_laporan_asessor');
				$this->load->view('layout/footer_datatables');
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
