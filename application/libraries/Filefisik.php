<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filefisik extends CI_Controller{

	public function nama_file(){
    $this->load->model('M_rencanakerja');
    $data = $this->M_rencanakerja->show_file();

    foreach ($data as $keys){
             $nama= $keys->nama_file;
    }
    $data['namafile']=$nama;
	}
}
