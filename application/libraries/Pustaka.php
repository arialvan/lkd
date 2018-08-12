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
}
