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
		$data['verifikator'] = $this->M_laporan->show_verifikator();
		$data['detail_rekap'] = $this->M_laporan->show_detail($id);
		$data['datadosen'] = $this->M_laporan->show_laporan_rekap($id);
		$data['title'] = 'Laporan';
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
			$data['detail_rekap'] = $this->M_laporan->show_detail($id);
			$data['fak_id'] = $this->M_dosen->fakultas_id($id);
			$data['jab_id'] = $this->M_dosen->jabatan_id($id);
			$data['verifikator'] = $this->M_laporan->show_verifikator();
			$data['datadosen'] = $this->M_laporan->show_rekap_dosen($id);

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

	function UpdateLaporan()
	{
		//Cari SKS dan Poin Master
		$where = array('id_kegiatan' => $this->input->post('id_kegiatan'));
		$data = $this->M_laporan->edit_poin($where, 'bkd_kegiatan')->result();
		foreach ($data as $keys);
		$sks   = $this->input->post('sks')*$keys->bkd_sks; //Poin Edit
		$point = $this->input->post('sks')*$keys->poin; //Poin Edit
		$laporbkd = $this->input->post('lapor_as_bkd');

		$data = array('sub_kegiatan' => $this->input->post('subkegiatan'),
									'sks_post' => $this->input->post('sks'),
									'sks_subkegiatan	' => $sks,
									'poin_subkegiatan	' => $point,
									'lapor_sebagai_bkd' => $laporbkd);

	  $where = array('id_subkegiatan' => $this->input->post('id_subkegiatan'));
	  $this->M_laporan->update_rencana($where, $data, 'bkd_subkegiatan_laporan');
		redirect('RencanaKerja/Laporan');
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
			if(empty($this->input->get('fak'))){
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor1();
					$data['fak'] = $this->M_verifikator->fakultas();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor1');
					$this->load->view('layout/footer_datatables_rekap');
			}else{
					$id = $this->input->get('kat');
					$id_fak = $this->input->get('fak');
					$this->load->library('Pustaka');
					if($id==0){
						$id = NULL;
						$database_rekap = $this->M_laporan->show_rekap_asessor1_id($id_fak,$id);
					}else{
						$database_rekap = $this->M_laporan->show_rekap_asessor1_id($id_fak,$id);
					}
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $database_rekap;
					$data['fak'] = $this->M_verifikator->fakultas();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor1');
					$this->load->view('layout/footer_datatables_rekap');
			}
		}

		public function RekapLaporanAssesor2()
		{
			if(empty($this->input->get('fak'))){
					$this->load->library('Pustaka');
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $this->M_laporan->show_rekap_asessor2();
					$data['fak'] = $this->M_verifikator->fakultas();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor2');
					$this->load->view('layout/footer_datatables_rekap');
			}else{
					$id = $this->input->get('kat');
					$id_fak = $this->input->get('fak');
					$this->load->library('Pustaka');
					if($id==0){
						$id = NULL;
						$database_rekap = $this->M_laporan->show_rekap_asessor2_id($id_fak,$id);
					}else{
						$database_rekap = $this->M_laporan->show_rekap_asessor2_id($id_fak,$id);
					}
					$ids = $this->session->userdata('nipp');
					$data['filter'] = $this->M_dosen->filter($ids);
					$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
					$data['name'] = $this->session->userdata('username');
					$data['nipp'] = $this->session->userdata('nipp');
					$data['level'] = $this->session->userdata('user_level');
					$data['datadosen'] = $database_rekap;
					$data['fak'] = $this->M_verifikator->fakultas();
					$data['profildosen'] = $this->M_verifikator->profil();
					$data['title'] = 'Data Dosen';
					$this->load->view('layout/header_datatables',$data);
					$this->load->view('layout/side_menu');
					$this->load->view('pages/bkd/rekap_laporan_asessor2');
					$this->load->view('layout/footer_datatables_rekap');
			}
		}

		public function RekapAssesor1dan2()
		{
			//$this->load->library('encrypt');
			if(empty($this->input->get('fak'))){
				$this->load->library('Pustaka');
				$ids = $this->session->userdata('nipp');
				$data['filter'] = $this->M_dosen->filter($ids);
				$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
				$data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['level'] = $this->session->userdata('user_level');
				$data['datadosen'] = $this->M_laporan->show_rekap_asessor();
				$data['fak'] = $this->M_verifikator->fakultas();
				$data['profildosen'] = $this->M_laporan->kategori_dosen();
				$data['title'] = 'Data Dosen';
				$this->load->view('layout/header_datatables',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/bkd/rekap_laporan_asessor');
				$this->load->view('layout/footer_datatables_rekap');
			}else{

				// $id = $this->encrypt->decode($this->input->get('kat'));
				// $id_fak = $this->encrypt->decode($this->input->get('fak'));
				$id = $this->input->get('kat');
				$id_fak = $this->input->get('fak');
				$this->load->library('Pustaka');
				if($id==0){
					$id = NULL;
					$database_rekap = $this->M_laporan->show_rekap_asessor_id($id_fak,$id);
				}else{
					$database_rekap = $this->M_laporan->show_rekap_asessor_id($id_fak,$id);
				}
				$ids = $this->session->userdata('nipp');
				$data['filter'] = $this->M_dosen->filter($ids);
				$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
				$data['name'] = $this->session->userdata('username');
				$data['nipp'] = $this->session->userdata('nipp');
				$data['level'] = $this->session->userdata('user_level');
				$data['datadosen'] = $database_rekap;
				$data['fak'] = $this->M_verifikator->fakultas();
				$data['profildosen_id'] = $this->M_laporan->kategori_dosen_id($id);
				$data['profildosen'] = $this->M_laporan->kategori_dosen();
				$data['title'] = 'Data Dosen';
				$this->load->view('layout/header_datatables',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/bkd/rekap_laporan_asessor');
				$this->load->view('layout/footer_datatables_rekap');
			}
		}


/* REKAP LAPORAN BKD */
public function RekapLaporanBkdAssesor1()
{
	if(empty($this->input->get('fak'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_laporan->show_rekap_asessor1();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_bkd_asessor1');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if($id==0){
				$id = NULL;
				$database_rekap = $this->M_laporan->show_rekap_asessor1_id($id_fak,$id);
			}else{
				$database_rekap = $this->M_laporan->show_rekap_asessor1_id($id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_bkd_asessor1');
			$this->load->view('layout/footer_datatables_rekap');
	}
}

public function RekapLaporanBkdAssesor2()
{
	if(empty($this->input->get('fak'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_laporan->show_rekap_asessor2();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_bkd_asessor2');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if($id==0){
				$id = NULL;
				$database_rekap = $this->M_laporan->show_rekap_asessor2_id($id_fak,$id);
			}else{
				$database_rekap = $this->M_laporan->show_rekap_asessor2_id($id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_bkd_asessor2');
			$this->load->view('layout/footer_datatables_rekap');
	}
}

public function RekapLaporanBkdAssesor1dan2()
{
	if(empty($this->input->get('fak'))){
		$this->load->library('Pustaka');
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
		$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['level'] = $this->session->userdata('user_level');
		$data['datadosen'] = $this->M_laporan->show_rekap_asessor();
		$data['fak'] = $this->M_verifikator->fakultas();
		$data['profildosen'] = $this->M_laporan->kategori_dosen();
		$data['title'] = 'Data Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/rekap_laporan_bkd_asessor');
		$this->load->view('layout/footer_datatables_rekap');
	}else{
		$id = $this->input->get('kat');
		$id_fak = $this->input->get('fak');
		$this->load->library('Pustaka');
		if($id==0){
			$id = NULL;
			$database_rekap = $this->M_laporan->show_rekap_asessor_id($id_fak,$id);
		}else{
			$database_rekap = $this->M_laporan->show_rekap_asessor_id($id_fak,$id);
		}
		$ids = $this->session->userdata('nipp');
		$data['filter'] = $this->M_dosen->filter($ids);
		$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
		$data['name'] = $this->session->userdata('username');
		$data['nipp'] = $this->session->userdata('nipp');
		$data['level'] = $this->session->userdata('user_level');
		$data['datadosen'] = $database_rekap;
		$data['fak'] = $this->M_verifikator->fakultas();
		$data['profildosen_id'] = $this->M_laporan->kategori_dosen_id($id);
		$data['profildosen'] = $this->M_laporan->kategori_dosen();
		$data['title'] = 'Data Dosen';
		$this->load->view('layout/header_datatables',$data);
		$this->load->view('layout/side_menu');
		$this->load->view('pages/bkd/rekap_laporan_bkd_asessor');
		$this->load->view('layout/footer_datatables_rekap');
	}
}

public function RekapLaporanPerubahan()
{
	if(empty($this->input->get('fak'))){
			$this->load->library('Pustaka');
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $this->M_laporan->show_rekap_perubahan();
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_asessor1');
			$this->load->view('layout/footer_datatables_rekap');
	}else{
			$id = $this->input->get('kat');
			$id_fak = $this->input->get('fak');
			$this->load->library('Pustaka');
			if($id==0){
				$id = NULL;
				$database_rekap = $this->M_laporan->show_rekap_perubahan_id($id_fak,$id);
			}else{
				$database_rekap = $this->M_laporan->show_rekap_perubahan_id($id_fak,$id);
			}
			$ids = $this->session->userdata('nipp');
			$data['filter'] = $this->M_dosen->filter($ids);
			$data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($ids);
			$data['name'] = $this->session->userdata('username');
			$data['nipp'] = $this->session->userdata('nipp');
			$data['level'] = $this->session->userdata('user_level');
			$data['datadosen'] = $database_rekap;
			$data['fak'] = $this->M_verifikator->fakultas();
			$data['profildosen'] = $this->M_verifikator->profil();
			$data['title'] = 'Data Dosen';
			$this->load->view('layout/header_datatables',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/bkd/rekap_laporan_asessor1');
			$this->load->view('layout/footer_datatables_rekap');
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
