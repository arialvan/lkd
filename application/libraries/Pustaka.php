<?php
class Pustaka {

  public function status($st)
    {
        if($st=='1')
        {
            $st='Cek File';
        }
        elseif($st=='2')
        {
            $st='Approval Assesor I';
        }
        elseif($st=='3')
        {
            $st='Approval Assesor II';
        }
        elseif($st=='4')
        {
            $st='Di Tolak';
        }
        else
        {
            $st='Belum Upload File';
        }
        return $st;
    }

//Jenis Kelamin
    public function jk($jk)
      {
          if($jk=='1')
          {
              $jk='Laki-laki';
          }
          else
          {
              $jk='Perempuan';
          }
          return $jk;
      }

//Status Profesi
      public function sp($sp)
        {
            if($sp=='1')
            {
                $sp='PNS';
            }
            elseif ($sp=='2') {
                $sp='Dosen';
            }
            elseif ($sp=='3') {
                $sp='JFT';
            }
            else
            {
                $sp='Kontrak';
            }
            return $sp;
        }

//Status Profesi
            public function nikah($n)
                {
                    if($n=='1')
                    {
                        $n='Menikah';
                    }
                    elseif ($n=='2') {
                        $n='Belum Menikah';
                    }
                    elseif ($n=='3') {
                        $n='Duda';
                    }
                    elseif ($n=='4') {
                        $n='Janda';
                    }
                    else
                    {
                        $n='N/A';
                    }
                    return $n;
                }

//Status Pemeriksaan Ketua Prodi
    public function periksa($p)
      {
      if($p=='1')
      {
        $p='Di Setujui Kaprodi';
      }
      else
      {
        $p='Belum Diperiksa';
      }
return $p;
      }

//Status Pemeriksaan Laporan
          public function p_laporan($pl)
            {
              if($pl=='0') {
                $pl='<span class="text text-danger">Masih di Periksa Prodi</span>';
              }elseif($pl=='1'){
                $pl='<span class="text text-danger">Di Setujui Prodi</span>';
              }elseif($pl=='2'){
                $pl='<span class="text text-success">APP Assesor I</span>';
              }elseif($pl=='3'){
                $pl='<span class="text text-success">APP Assesor II</span>';
              }elseif($pl=='4'){
                $pl='<span class="text text-danger">Di Tolak Assesor I</span>';
              }elseif($pl=='5'){
                $pl='<span class="text text-danger">Di Tolak Assesor II</span>';
              }elseif($pl=='6'){
                $pl='<span class="text text-danger">Perbaikan</span>';
              }else{
                $pl='<span class="text text-danger">Selesai</span>';
              }

      return $pl;
            }

//Status Hitung / Tidak
  public function syarat($syt)
    {
      if($syt=='1') {
          $syt="<span class='glyphicon glyphicon-check' title='Syarat BKD'></span>";
      }else{
          $syt="<span></span>";
      }

  return $syt;
  }

  public function syarat1($syt1)
      {
        if($syt1=='1') {
            $syt1="<span class='glyphicon glyphicon-ok' title='Ya'></span>";
        }else{
            $syt1="<span class='glyphicon glyphicon-remove' title='Tidak'></span>";
        }

    return $syt1;
    }

    public function syarat2($syt2)
        {
          if($syt2=='1') {
              $syt2="<span class='glyphicon glyphicon-ok' title='Ya'></span>";
          }else{
              $syt2="<span class='glyphicon glyphicon-remove' title='Tidak'></span>";
          }

      return $syt2;
      }


      public function laporan($l)
        {
            if($l=='0') {
              $l='<span>Masih di Periksa Prodi</span>';
            }elseif($l=='1'){
              $l='<span class="text text-danger"><b>Sudah Upload Laporan</b></span>';
            }elseif($l=='4'){
              $l='<span class="text text-warning"><b>Di Tolak Assesor I</b></span>';
            }elseif($l=='5'){
              $l='<span class="text text-warning"><b>Di Tolak Assesor II</b></span>';
            }elseif($l=='6'){
              $l='<span class="text text-success"><b>Selesai</b></span>';
            }else{
              $l='<span class="text text-success">Selesai</span>';
            }

        return $l;
        }
}
