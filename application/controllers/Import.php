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
    if($this->session->userdata('user_level')==1)
    {
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $data['title'] = 'Import Data Pegawai';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/pegawai/pegawai_import');
        $this->load->view('layout/footer');
    }else{
        $data['name'] = $this->session->userdata('username');
        $data['nipp'] = $this->session->userdata('nipp');
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/error.php');
        $this->load->view('layout/footer');
    }
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
                        //$id_pd          =$objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
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


                        $data_user=array(
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
