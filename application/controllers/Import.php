<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller
{

        public function __construct() {
                parent::__construct();
                    $this->is_logged_in();
                    $this->load->library('excel');//load PHPExcel library
                    //$this->load->model('upload_model');//To Upload file in a directory
                    $this->load->model('M_excel_data_insert_model');
                    $this->load->model('M_dosen');
                    $this->load->model('M_rencanakerja');
                    $this->acl = $this->session->userdata('acl');
        }

        function ceklink($url) {
                    $headers = @get_headers($url);
                    $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
                    return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }

public function index()
{
    if($this->session->userdata('user_level')==1)
    {
      $id = $this->session->userdata('nipp');
      $data['filter'] = $this->M_dosen->filter($id);
      $data['ketuaprodi'] = $this->M_dosen->filterketuaprodi($id);
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['title'] = 'Import Data Pegawai';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/pegawai/pegawai_import');
        $this->load->view('layout/footer');
    }else{
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

// Import Profil Dosen
public	function ExcelDataPegawai()	{
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
                        $fid           =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $nidn           =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                        $nama_peg	             =$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
                        $alamat             =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                        $id_gol  =$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                        $id_agama         =$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
                        $id_pangkat   =$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
                        $id_mapel        =$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
                        $no_askes      =$objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
                        $telp         =$objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
                        $tempat_lhr        =$objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
                        $tgl_lahir  =$objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
                        $jenis_kel             =$objWorksheet->getCellByColumnAndRow(14,$i)->getValue();
                        $gol_darah         =$objWorksheet->getCellByColumnAndRow(15,$i)->getValue();
                        $status_nikah       =$objWorksheet->getCellByColumnAndRow(16,$i)->getValue();
                        $jumlah_anak     =$objWorksheet->getCellByColumnAndRow(17,$i)->getValue();
                        $status_peg	     =$objWorksheet->getCellByColumnAndRow(18,$i)->getValue();
                        $status_profesi     =$objWorksheet->getCellByColumnAndRow(19,$i)->getValue();
                        $masa_kerja     =$objWorksheet->getCellByColumnAndRow(20,$i)->getValue();
                        $gaji_pokok     =$objWorksheet->getCellByColumnAndRow(21,$i)->getValue();
                        $tmt     =$objWorksheet->getCellByColumnAndRow(22,$i)->getValue();
                        $tgl_pensiun     =$objWorksheet->getCellByColumnAndRow(23,$i)->getValue();
                        $ket     =$objWorksheet->getCellByColumnAndRow(24,$i)->getValue();
                        $foto     =$objWorksheet->getCellByColumnAndRow(25,$i)->getValue();
                        $status_profil     =$objWorksheet->getCellByColumnAndRow(26,$i)->getValue();
                        $status_bkd     =$objWorksheet->getCellByColumnAndRow(27,$i)->getValue();
                        $status_aktif     =$objWorksheet->getCellByColumnAndRow(28,$i)->getValue();
                        $no_kontak     =$objWorksheet->getCellByColumnAndRow(29,$i)->getValue();
                        $email     =$objWorksheet->getCellByColumnAndRow(30,$i)->getValue();

                        $data_user=array(   'nip'=>$nip,
                                            'nip_lama'=>$nip_lama,
                                            'fid'=>$fid,
                                            'nidn'=>$nidn,
                                            'nama_peg'=>$nama_peg,
                                            'alamat'=>$alamat,
                                            'id_gol'=>$id_gol,
                                            'id_agama'=>$id_agama,
                                            'id_pangkat'=>$id_pangkat,
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
                                            'status_bkd'=>$status_bkd,
                                            'status_aktif'=>$status_aktif,
                                            'no_kontak'=>$no_kontak,
                                            'email'=>$email

                                        );

                    $this->M_excel_data_insert_model->Add_tbpegawai($data_user);

                  }
                     unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
                     redirect('Import');
        }


// Import Profil Dosen
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
                        $id_pd          =$objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                        $nip            =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                        $nidn           =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $s1             =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                        $s2             =$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
                        $s3             =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                        $no_sertifikat  =$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                        $id_jf          =$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
                        $id_kat_dosen   =$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
                        $id_ilmu        =$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
                        $id_eselon      =$objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
                        $id_gol         =$objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
                        $id_unit        =$objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
                        $id_unit_kerja  =$objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
                        $hp             =$objWorksheet->getCellByColumnAndRow(14,$i)->getValue();
                        $email          =$objWorksheet->getCellByColumnAndRow(15,$i)->getValue();
                        $password       =$objWorksheet->getCellByColumnAndRow(16,$i)->getValue();
                        $user_level     =$objWorksheet->getCellByColumnAndRow(17,$i)->getValue();


                        $data_user=array(   'id_pd'=>$id_pd,
                                            'nip'=>$nip,
                                            'nidn'=>$nidn,
                                            's1'=>$s1,
                                            's2'=>$s2,
                                            's3'=>$s3,
                                            'no_sertifikat'=>$no_sertifikat,
                                            'id_jf'=>$id_jf,
                                            'id_kat_dosen'=>$id_kat_dosen,
                                            'id_ilmu'=>$id_ilmu,
                                            'id_eselon'=>$id_eselon,
                                            'id_gol'=>$id_gol,
                                            'id_unit'=>$id_unit,
                                            'id_unit_kerja'=>$id_unit_kerja,
                                            'hp'=>$hp,
                                            'email'=>$email,
                                            'password'=>md5($password),
                                            'user_level'=>$user_level

                                        );

                    $this->M_excel_data_insert_model->Add_User($data_user);

                  }
                     unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
                     //redirect(base_url() . "Import");


        }

// Import Data ASSESOR
        public	function ExcelDataAssesor()	{
        //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)
                 $configUpload['upload_path'] = FCPATH.'uploads/excel/';
                 $configUpload['allowed_types'] = 'xls|xlsx|csv';
                 $configUpload['max_size'] = '10000';
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
                        $id_verifikator =$objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                        $nip            =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                        $id_periode     =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $assesor_1      =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                        $assesor_2      =$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
                        $ketua_prodi    =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                        $user_create    =$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                        $time_create    =$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
                        $statuslaporan  =$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
                        $p_assesor1     =$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
                        $p_assesor2     =$objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
                        $p_kaprodi      =$objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
                        $rk_dosen       =$objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
                        $lp_dosen       =$objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
                        $admin_periksa  =$objWorksheet->getCellByColumnAndRow(14,$i)->getValue();

                        $data_user=array(   'id_verifikator'=>$id_verifikator,
                                            'nip'=>$nip,
                                            'id_periode'=>$id_periode,
                                            'assesor_1'=>$assesor_1,
                                            'assesor_2'=>$assesor_2,
                                            'ketua_prodi'=>$ketua_prodi,
                                            'user_create'=>$user_create,
                                            'time_create'=>$time_create,
                                            'statuslaporan'=>$statuslaporan,
                                            'p_assesor1'=>$p_assesor1,
                                            'p_assesor2'=>$p_assesor2,
                                            'p_kaprodi'=>$p_kaprodi,
                                            'rk_dosen'=>$rk_dosen,
                                            'lp_dosen'=>$lp_dosen,
                                            'admin_periksa'=>$admin_periksa
                                        );
                    //echo '<pre>' . var_export($data_user, true) . '</pre>';
                    $this->M_excel_data_insert_model->Add_Assesor($data_user);

                  }
                    unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
                     //redirect(base_url() . "Import");

        }

//UPDATE DATA ASSESOR
        public	function ExcelUpdateAssesor()	{
          $periode = $this->M_rencanakerja->show_periode_aktif();
          foreach ($periode as $keys);
          $id_periode   = $keys->id_periode; //Periode Aktif
        //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)
                 $configUpload['upload_path'] = FCPATH.'uploads/excel/';
                 $configUpload['allowed_types'] = 'xls|xlsx|csv';
                 $configUpload['max_size'] = '10000';
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
                        $assesor_1      =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                        $assesor_2      =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $ketua_prodi    =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();

                        $data_user=array(   'assesor_1'=>$assesor_1,
                                            'assesor_2'=>$assesor_2,
                                            'ketua_prodi'=>$ketua_prodi
                                        );
                        $where = array('nip' => $nip, 'id_periode' => $id_periode);
                    echo '<pre>' . var_export($data_user, true) . '</pre>';
                    $this->M_rencanakerja->update_rencana($where, $data_user, 'verifikator');

                  }
                    unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
                     //redirect(base_url() . "Import");

        }

//IMPORT UPDATE FAKULTAS DOSEN
public	function UpdateFakultasDosen()	{
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
                $id_fakultas    =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();

                $data=array('id_fakultas'=>$id_fakultas);
                $where = array('nip'=>$nip);
                $query = $this->M_excel_data_insert_model->update_fakultas_dosen($where, $data, 'profil_dosen');
                if($query > 0){
                  var_dump($nip,"Error");
                  echo "<br />";
                }else{
                  var_dump($nip,"Success");
                  echo "<br />";
                }
          }
             unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
             echo'<br /><br /><a href="'.base_url().'Pegawai" class="btn btn-primary">Ke Data Pegawai</a>';
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
