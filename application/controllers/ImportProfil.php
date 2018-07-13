<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ImportProfil extends CI_Controller
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
                        $id_profil      =$objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                        $nip            =$objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                        $id_eselon      =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                        $id_gol         =$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                        $id_jabatan     =$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
                        $id_jabatan_atasan =$objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
                        $id_unit        =$objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
                        $id_unit_kerja  =$objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
                        $id_satuan_kerja=$objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
                        $id_jfu         =$objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
                        $id_pendidikan  =$objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
                        $tgl_riwayat    =$objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
                        $password       =$objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
                        $user_level     =$objWorksheet->getCellByColumnAndRow(13,$i)->getValue();

                        $data=array(
                                            'id_profil'=>$id_profil,
                                            'nip'=>$nip,
                                            'id_eselon'=>$id_eselon,
                                            'id_gol'=>$id_gol,
                                            'id_jabatan'=>$id_jabatan,
                                            'id_jabatan_atasan'=>$id_jabatan_atasan,
                                            'id_unit'=>$id_unit,
                                            'id_unit_kerja'=>$id_unit_kerja,
                                            'id_satuan_kerja'=>$id_satuan_kerja,
                                            'id_jfu'=>$id_jfu,
                                            'id_pendidikan'=>$id_pendidikan,
                                            'tgl_riwayat'=>$tgl_riwayat,
                                            'password'=>md5($password),
                                            'user_level'=>$user_level
                                        );
                        //echo "progress".$nip."<br />";
                        $this->M_excel_data_insert_model->Add_Profil($data);

                        $data=array('status_profil' => 1);
                        $where = array('nip' => $nip);
                        $this->M_excel_data_insert_model->update_pegawai($where, $data, 'tb_pegawai');

                  }
                     unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
                     redirect(base_url() . "Pegawai");


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
