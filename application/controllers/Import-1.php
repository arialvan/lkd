<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller
{
 
        public function __construct() {
                parent::__construct();
                    $this->is_logged_in();
                    $this->load->library('excel');//load PHPExcel library 
                    //$this->load->model('upload_model');//To Upload file in a directory
                    $this->load->model('M_excel_data_insert_model');
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
            $data['title'] = 'Import Data Pegawai';
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/pegawai/pegawai_import');
            $this->load->view('layout/footer');
        }
	
        public	function ExcelDataAdd()	{  
        //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
                 $configUpload['upload_path'] = FCPATH.'uploads/excel/';
                 $configUpload['allowed_types'] = 'xls|xlsx|csv';
                 $configUpload['max_size'] = '5000';
                 $this->load->library('upload', $configUpload);
                 $this->upload->do_upload('userfile');	
                 $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                 $file_name = $upload_data['file_name']; //uploded file name
                 $extension=$upload_data['file_ext'];    // uploded file extension

            //$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
                $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
            //Set to read only
                $objReader->setReadDataOnly(true); 		  
            //Load excel file
                $objPHPExcel=$objReader->load(FCPATH.'uploads/excel/'.$file_name);		 
                $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
                $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
            //loop from first data untill last data
                  for($i=2;$i<=$totalrows;$i++)
                  {
                        $nip            =$objWorksheet->getCellByColumnAndRow(0,$i)->getValue();			
                        $nip_lama       =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                        $fid            =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $nama_peg       =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                        $alamat         =$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); 
                        $id_gol         =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                        $id_agama       =$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                        $id_mapel       =$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
                        $no_askes       =$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
                        $telp           =$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
                        $tempat_lhr     =$objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
                        $tgl_lahir      =$objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
                        $jenis_kel      =$objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
                        $gol_darah      =$objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
                        $status_nikah   =$objWorksheet->getCellByColumnAndRow(14,$i)->getValue();
                        $jumlah_anak    =$objWorksheet->getCellByColumnAndRow(15,$i)->getValue();
                        $status_peg     =$objWorksheet->getCellByColumnAndRow(16,$i)->getValue();
                        $status_profesi =$objWorksheet->getCellByColumnAndRow(17,$i)->getValue();
                        $masa_kerja     =$objWorksheet->getCellByColumnAndRow(18,$i)->getValue();
                        $gaji_pokok     =$objWorksheet->getCellByColumnAndRow(19,$i)->getValue();
                        $tmt            =$objWorksheet->getCellByColumnAndRow(20,$i)->getValue();
                        $tgl_pensiun    =$objWorksheet->getCellByColumnAndRow(21,$i)->getValue();
                        $ket            =$objWorksheet->getCellByColumnAndRow(22,$i)->getValue();
                        $foto           =$objWorksheet->getCellByColumnAndRow(23,$i)->getValue();
                        $status_profil  =$objWorksheet->getCellByColumnAndRow(24,$i)->getValue();
                        $status_atasan  =$objWorksheet->getCellByColumnAndRow(25,$i)->getValue();
                        
                        
                        $data_user=array(
                                            'nip'=>$nip, 
                                            'nip_lama'=>$nip_lama,
                                            'fid'=>$fid,
                                            'nama_peg'=>$nama_peg, 
                                            'alamat'=>$alamat,
                                            'id_gol'=>$id_gol,
                                            'id_agama'=>$id_agama,
                                            'id_mapel'=>$id_mapel,
                                            'no_askes'=>$no_askes,
                                            'telp'=>$telp,
                                            'tempat_lhr'=>$tempat_lhr,
                                            'tgl_lahir'=>$tgl_lahir,
                                            'jenis_kel'=>$jenis_kel,
                                            'gol_darah'=>$gol_darah,
                                            'status_nikah'=>$status_nikah,
                                            'jumlah_anak'=>$jumlah_anak,
                                            'status_peg'=>$status_peg,
                                            'status_profesi'=>$status_profesi,
                                            'masa_kerja'=>$masa_kerja,
                                            'gaji_pokok'=>$gaji_pokok,
                                            'tmt'=>$tmt,
                                            'tgl_pensiun'=>$tgl_pensiun,
                                            'ket'=>$ket,
                                            'foto'=>$foto,
                                            'status_profil'=>$status_profil,
                                            'status_atasan'=>$status_atasan                      
                            
                                        );
                        $this->M_excel_data_insert_model->Add_User($data_user);


                  }
                     unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
                     redirect(base_url() . "Pegawai/PegawaiAll");


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
?>