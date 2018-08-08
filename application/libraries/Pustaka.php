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
}
