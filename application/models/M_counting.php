<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_counting extends CI_Model{

   function __construct()
    {
        parent::__construct();
    }

// Count All Pegawai
    function all_rencanakerja(){
      $this->db->select("COUNT(*) As Totals");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1) AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

    function all_rencanakerja_dosen($id){
      $this->db->select("COUNT(*) As Totals");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1 AND a.nip="'.$id.'") AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

    function all_laporan_dosen($id){
      $this->db->select("COUNT(*) As All_Laporan");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan_laporan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1 AND a.nip="'.$id.'") AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

    function app_assesor_1($id){
      $this->db->select("COUNT(*) As app_as1");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan_laporan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1 AND a.nip="'.$id.'" AND a.app_assesor1=1) AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

    function app_assesor_2($id){
      $this->db->select("COUNT(*) As app_as2");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan_laporan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1 AND a.nip="'.$id.'" AND a.app_assesor2=1) AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

    function app_kp($id){
      $this->db->select("COUNT(*) As app_kp");
      $this->db->from('(SELECT DISTINCT a.id_subkegiatan
                          FROM bkd_subkegiatan_laporan AS a
                          INNER JOIN periode_lkd AS c ON a.id_periode=c.id_periode
                          WHERE c.status=1 AND a.nip="'.$id.'" AND a.applaporan_ketuaprodi=1) AS query
                      ');

      $result = $this->db->get()->result();
      return $result;

    }

// Count All Assesor 1
    function all_assesor_1(){
      $this->db->select("COUNT(DISTINCT assesor_1) AS Assesor1");
      $this->db->from('verifikator a');
      $this->db->join('periode_lkd b', 'a.id_periode=b.id_periode');
      $this->db->where('b.status', 1);
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Assesor 2
        function all_assesor_2(){
          $this->db->select("COUNT(DISTINCT assesor_2) AS Assesor2");
          $this->db->from('verifikator a');
          $this->db->join('periode_lkd b', 'a.id_periode=b.id_periode');
          $this->db->where('b.status', 1);
          $result = $this->db->get()->result();
          return $result;
        }

// Count All Ketua Prodi
          function all_ketua_prodi(){
            $this->db->select("COUNT(DISTINCT ketua_prodi) AS KetuaProdi");
            $this->db->from('verifikator a');
            $this->db->join('periode_lkd b', 'a.id_periode=b.id_periode');
            $this->db->where('b.status', 1);
            $result = $this->db->get()->result();
            return $result;
          }

// Count All Dosen
    function all_dosen(){
      $this->db->select("COUNT(DISTINCT nip) AS Dosen");
      $this->db->from('profil_dosen');
      // $this->db->where('user_level', 2);
      $result = $this->db->get()->result();
      return $result;
    }
// Count All Pegawai Kontrak
    function all_kontrak(){
      $this->db->select("count(status_aktif) as Kontrak ");
      $this->db->from('tb_pegawai');
      $this->db->where('status_aktif', 1);
      $this->db->where('status_peg', 2);
      $this->db->where('status_profesi', 4);
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function all_unit(){
      $this->db->select("count(id_unit) as Unit ");
      $this->db->from('tb_unit');
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function all_unitkerja(){
      $this->db->select("count(id_unit_kerja) as UnitKerja ");
      $this->db->from('tb_unit_kerja');
      $result = $this->db->get()->result();
      return $result;
    }

// Count All Pegawai Kontrak
    function bar_unit(){
      $this->db->select('b.kategori_dosen, COUNT(a.id_kat_dosen) AS JumlahDosen');
      $this->db->from('profil_dosen a');
      $this->db->join('.master_kategori_dosen b','a.id_kat_dosen=b.id_kat_dosen');
      $this->db->group_by('a.id_kat_dosen');

      $query=$this->db->get()->result_array();
      return $query;
    }

    function bar_kegiatan($id){
      $this->db->select(' COUNT(CASE WHEN id_bkd = 1 THEN id_bkd END) AS pendidikan,
                          COUNT(CASE WHEN id_bkd = 2 THEN id_bkd END) AS penelitian,
                          COUNT(CASE WHEN id_bkd = 3 THEN id_bkd END) AS pengabdian,
                          COUNT(CASE WHEN id_bkd = 4 THEN id_bkd END) AS penunjang
                        ');
      $this->db->from('bkd_subkegiatan_laporan a');
      $this->db->join('periode_lkd b','a.id_periode=b.id_periode');
      $this->db->where('a.nip', $id);
      $this->db->where('b.status', 1);
      $query=$this->db->get()->result_array();
      return $query;
    }

function pie_ketuaprodi($id){
$this->db->select(' COUNT(CASE WHEN applaporan_ketuaprodi = 1 THEN applaporan_ketuaprodi END) AS Setujui,
                    COUNT(CASE WHEN applaporan_ketuaprodi = 2 THEN applaporan_ketuaprodi END) AS Tolak,
                    COUNT(CASE WHEN applaporan_ketuaprodi = 0 THEN applaporan_ketuaprodi END) AS BelumPeriksa
                  ');
$this->db->from('bkd_subkegiatan_laporan a');
$this->db->join('periode_lkd b','a.id_periode=b.id_periode');
$this->db->where('a.nip', $id);
$this->db->where('b.status', 1);
$query=$this->db->get()->result_array();
return $query;
}

function pie_assesor1($id){
$this->db->select(' COUNT(CASE WHEN app_assesor1 = 1 THEN applaporan_ketuaprodi END) AS Setujui,
                    COUNT(CASE WHEN app_assesor1 = 2 THEN applaporan_ketuaprodi END) AS Tolak,
                    COUNT(CASE WHEN app_assesor1 = 0 THEN applaporan_ketuaprodi END) AS BelumPeriksa
                  ');
$this->db->from('bkd_subkegiatan_laporan a');
$this->db->join('periode_lkd b','a.id_periode=b.id_periode');
$this->db->where('a.nip', $id);
$this->db->where('b.status', 1);
$query=$this->db->get()->result_array();
return $query;
}

function pie_assesor2($id){
$this->db->select(' COUNT(CASE WHEN app_assesor2 = 1 THEN applaporan_ketuaprodi END) AS Setujui,
                    COUNT(CASE WHEN app_assesor2 = 2 THEN applaporan_ketuaprodi END) AS Tolak,
                    COUNT(CASE WHEN app_assesor2 = 0 THEN applaporan_ketuaprodi END) AS BelumPeriksa
                  ');
$this->db->from('bkd_subkegiatan_laporan a');
$this->db->join('periode_lkd b','a.id_periode=b.id_periode');
$this->db->where('a.nip', $id);
$this->db->where('b.status', 1);
$query=$this->db->get()->result_array();
return $query;
}

// Count All Assesor
    function pie_setuju(){
          // $this->db->distinct();
          $this->db->select(' a.id_periode,
                              COUNT(CASE WHEN a.app_assesor1 = 1 THEN 1 ELSE 0 END) AS AS1,
                              COUNT(CASE WHEN a.app_assesor2 = 1 THEN 1 ELSE 0 END) AS AS2,
                              COUNT(CASE WHEN a.app_ketuaprodi = 1 THEN 1 ELSE 0 END) AS AS3
                            ');
          $this->db->from('bkd_subkegiatan a');
          $this->db->join('periode_lkd c','a.id_periode=c.id_periode','INNER');
          $this->db->where('c.status', 1);
          $this->db->where('a.app_assesor1', 1);
          $this->db->where('a.app_assesor2', 1);
          $this->db->where('a.app_ketuaprodi', 1);
          // $this->db->group_by('a.nip');

          $query=$this->db->get()->result_array();
          return $query;
        }


function pie_tidaksetuju(){
              // $this->db->distinct();
              $this->db->select(' a.id_periode,
                                  COUNT(CASE WHEN a.app_assesor1 = 1 THEN 1 ELSE 0 END) AS TS1,
                                  COUNT(CASE WHEN a.app_assesor2 = 1 THEN 1 ELSE 0 END) AS TS2,
                                  COUNT(CASE WHEN a.app_ketuaprodi = 1 THEN 1 ELSE 0 END) AS TS3
                                ');
              $this->db->from('bkd_subkegiatan a');
              $this->db->join('periode_lkd c','a.id_periode=c.id_periode','INNER');
              $this->db->where('c.status', 1);
              $this->db->where('a.app_assesor1', 2);
              $this->db->where('a.app_assesor2', 2);
              $this->db->where('a.app_ketuaprodi', 2);
              // $this->db->group_by('a.nip');

              $query=$this->db->get()->result_array();
              return $query;
            }

function pie_belumperiksa(){
        $this->db->select(' a.id_periode,
                            COUNT(CASE WHEN a.app_assesor1 = 1 THEN 1 ELSE 0 END) AS BP1,
                            COUNT(CASE WHEN a.app_assesor2 = 1 THEN 1 ELSE 0 END) AS BP2,
                            COUNT(CASE WHEN a.app_ketuaprodi = 1 THEN 1 ELSE 0 END) AS BP3
                          ');
        $this->db->from('bkd_subkegiatan a');
        $this->db->join('periode_lkd c','a.id_periode=c.id_periode','INNER');
        $this->db->where('c.status', 1);
        $this->db->where('a.app_assesor1', 0);
        $this->db->where('a.app_assesor2', 0);
        $this->db->where('a.app_ketuaprodi', 0);
        // $this->db->group_by('a.nip');

        $query=$this->db->get()->result_array();
        return $query;
      }

function pie_uploadlaporan(){
            $this->db->select(' a.id_periode,
                                COUNT(CASE WHEN a.status_laporan = 1 THEN 1 ELSE 0 END) AS UP1,
                                COUNT(CASE WHEN a.status_laporan = 0 THEN 1 ELSE 0 END) AS UP2
                            ');
            $this->db->from('bkd_subkegiatan a');
            $this->db->join('periode_lkd c','a.id_periode=c.id_periode','INNER');
            $this->db->where('c.status', 1);
            $this->db->where('a.status_laporan', 1);
            $this->db->group_by('a.nip');

            $query=$this->db->get()->result_array();
            return $query;
      }
}
