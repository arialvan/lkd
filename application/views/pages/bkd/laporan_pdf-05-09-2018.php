<?php
foreach($profildosen as $profil);
foreach($biodata as $bd);
foreach($verifikator as $d);


foreach($syaratbkd as $v); //sks bkd_remundosen
foreach($syaratsubbkd as $k); //sks sub_bkdkegiatan
$poinremun = $k->subsks - $v->sks; //
if($poinremun >= $v->sks){ $sks='Memenuhi'; }else{ $sks='Belum Memenuhi'; }
$poins = $poinremun;

foreach($sum_poin_pendidikan as $spp);
$poin_kegiatan_sum = $spp->Poin;


foreach ($bkd_syarat as $x){
    if($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
        $syaratBKD= $x->sks_bkd;
    }elseif($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4){
        $syaratBKD= $x->sks_bkd;
    }elseif($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8){
        $syaratBKD= $x->sks_bkd+$x->sks_remun;
    }else{
        $syaratBKD= $x->sks_bkd;
    }
    $sytbkd[]=$x->sks_bkd;
    $sumBKD[]= $x->sks_bkd+$x->sks_remun; //Syarat BKD + REmunerasi + 2 dari manapun
}

foreach ($syt_pendidikan as $x1);
    if($x1->skspendidikan!=""){$pendidikan_rekap = $x1->skspendidikan;}else{$pendidikan_rekap = 0;}
        foreach ($syt_penelitian as $x2);
            if($x2->skspenelitan!=""){$penelitian_rekap = $x2->skspenelitan;}else{$penelitian_rekap = 0;}
        foreach ($syt_pengabdian as $x3);
            if($x3->skspengabdian!=""){$pengabdian_rekap = $x3->skspengabdian;}else{$pengabdian_rekap = 0;}
        foreach ($syt_penunjang as $x4);
            if($x4->skspenunjang!=""){$penunjang_rekap = $x4->skspenunjang;}else{$penunjang_rekap = 0;}
                $ntotal = array($x1->skspendidikan,$x2->skspenelitan,$x3->skspengabdian,$x4->skspenunjang);
                $totalbkd = array_sum($ntotal);

    //Dosen Biasa (sudah Sertifikasi),Profesor Biasa, Syarat 12 SKS
    if($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
        $Syarat_BKD = $sytbkd[0]; //Tanpa tambah 4
        if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd >= 12 ){
            $hasilbkd = "Memenuhi";
        }else{
            $hasilbkd = "Belum Memenuhi";
        }

    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
    }elseif(($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4)){
        $Syarat_BKD = $sytbkd[0]-3; //Tanpa tambah 4
        if($x1->skspendidikan >= $Syarat_BKD && $totalbkd >= 12 ){
            $hasilbkd = "Memenuhi";
        }else{
            $hasilbkd = "Belum Memenuhi";
        }

    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
    }elseif(($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8)){
        $Syarat_BKD = $sytbkd[0]-3; //Tanpa tambah 4
        if($x1->skspendidikan >= $Syarat_BKD ){
            $hasilbkd = "Memenuhi";
        }else{
            $hasilbkd = "Belum Memenuhi";
        }
    }else{
        $hasilbkd = "Belum Memenuhi";
    }

    $ntotal = array($x1->skspendidikan,$x2->skspenelitan,$x3->skspengabdian,$x4->skspenunjang);
    $totalbkd = array_sum($ntotal);
    //Dosen Biasa (sudah Sertifikasi),Profesor Biasa, Syarat 12 SKS
    if($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
        $Syarat_BKD = $sytbkd[0]+4;
        if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd >= 12 ){
            $hasil_p1 = "Memenuhi";
        }else{
            $hasil_p1 = "Belum Memenuhi";
        }

    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
    }elseif(($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4)){
        $Syarat_BKD = $sytbkd[0]+4;
        if($x1->skspendidikan >= $Syarat_BKD && $totalbkd >=12){
            $hasil_p1 = "Memenuhi";
        }else{
            $hasil_p1 = "Belum Memenuhi";
        }

    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
    }elseif(($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8)){
            $hasil_p1 = "Dibayar Melalui Absensi";
    }else{
            $hasil_p1 = "Belum Memenuhi";
    }

foreach ($poinmaks as $pm);
foreach ($syt_penunjang_poin as $k);
foreach($rencanakerja as $dt){ $p_sum[]=$dt->poin_subkegiatan; }
$poin_master = round($pm->poinmax,2); //Poin MAX pendidikan
$syaratBKD=array_sum($sumBKD); //Syarat BKD + Remun
$pendidikan = $x1->skspendidikan - $syaratBKD;

    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 12 SKS
    if($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4 ){
            $Syarat_BKD = $sytbkd[0]-3;
        if($x1->skspendidikan >= $Syarat_BKD && $totalbkd>= 12 ){
          foreach ($tanpa_syt_penunjang as $tsp);
                  $poin_pendidikan_remun = $poin_kegiatan_sum;
                  $points_penunjang = $tsp->pointanpasyarat;
                  $point = ($poin_pendidikan_remun+$points_penunjang)-8;
            if($point > 28){$points = 28; }else{$points = $point; }
                  $point = round($points,2);
            }else{
                  $point="Belum Memenuhi";
            }
    /* PROFIL DOSEN 3,7,9 */
    }elseif($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
          foreach ($bkd_syarat_ds as $var);
                $bkd_syarat = $var->sks_bkd+$var->sks_remun; //Syarat BKD (SKS+Remun)
                $sks_poin = $x1->skspendidikan-$var->sks_remun;
                $Syarat_BKD = $sytbkd[0];
            if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd>= 12 ){
            foreach ($tanpa_syt_penunjang as $tsp);
                $poin_pendidikan_remun = $poin_kegiatan_sum;
                $points_penunjang = $tsp->pointanpasyarat;
                $point = ($poin_pendidikan_remun+$points_penunjang)-8;
            if($point > 28){$points = 28; }else{$points = $point; }
                $point = round($points,2);
            }else{
                $point="Belum Memenuhi";
            }

    /* Profil 6,8*/
    }elseif ($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8) {
              $Syarat_BKD = $sytbkd[0]+3;
    if($x1->skspendidikan >= $Syarat_BKD){
              $points = "Memenuhi 30% P2";
    }else{
              $points = "Belum Memenuhi";
    }
              $point = $points;
    }else{
              $point = $points;
    }

?>

<!DOCTYPE html>
   <html lang="en">
     <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <!-- Meta, title, CSS, favicons, etc. -->
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/ico" />
       <style type="text/css">
         body {
                   background: rgb(204,204,204);
                 }
                 page {
                   background: white;
                   display: block;
                   margin: 0 auto;
                   margin-bottom: 0.5cm;
                   box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
                 }
                 page[size="A4"] {
                   width: 21cm;
                   height: 29.7cm;
                 }
                 page[size="A4"][layout="landscape"] {
                   width: 29.7cm;
                   height: 21cm;
                 }
                 page[size="A3"] {
                   width: 29.7cm;
                   height: 42cm;
                 }
                 page[size="A3"][layout="portrait"] {
                   width: 42cm;
                   height: 29.7cm;
                 }
                 page[size="A5"] {
                   width: 14.8cm;
                   height: 21cm;
                 }
                 page[size="A5"][layout="portrait"] {
                   width: 21cm;
                   height: 14.8cm;
                 }
                 @media print {
                   body, page {
                     margin: 0;
                     box-shadow: 0;
                   }
                 }

                 .table1 {
                         font-family: arial, sans-serif;
                         font-size: 10px;
                         border-collapse: collapse;
                         width: 80%;
                     }
                     .table2 {
                             font-family: arial, sans-serif;
                             font-size: 10px;
                             border-collapse: collapse;
                             width: 60%;
                         }
                     td, th {
                         border: 1px solid #dddddd;
                         text-align: left;
                         padding: 8px;
                     }

                     tr:nth-child(even) {
                         /* background-color: #dddddd; */
                }

                label {
                      /* color: #B4886B; */
                      font-weight: bold;
                      font-size: 12px;
                      font-style: normal;
                      display: block;
                      width: 200px;
                      float: left;
                      }
                span {
                      font-weight: bold;
                      font-size: 12px;
                      font-style: normal;
                      }
                #img {
                        padding-right: 10px;
                     }
                h3 {
                      font-style: normal;
                      display: block;
                      padding-top: 1px;
                      float: center;
                      }
       </style>
     </head>
<body>
<!--
<page size="A4">

</page> -->
<?php
foreach($fak_id as $dt);
foreach($jab_id as $dt1);
?>
<page size="A4">
<!-- <img src="http://localhost/lkd/photo/logo.png" width="80" height="80"><br /> -->
<img src="<?php echo base_url() ?>./photo/logo.png" id="img"  alt="" class="img-thumbnail profile_img" width="100" height="110">
<h2>KEMENTRIAN AGAMA REPUBLIK INDONESIA</h2>
<br />
<label for="name">Nama</label><span><?php echo ': '.$bd->nama_peg; ?></span><br />
<label for="name">Nip</label><span><?php echo ': '.$bd->nip; ?></span><br />
<label for="name">No Sertifikat</label><span><?php echo ': '.$bd->no_sertifikat; ?></span><br />
<label for="name">Perguruan Tinggi</label><span><?php echo ': UIN AR-RANIRY'; ?></span><br />
<label for="name">Status</label><span><?php echo ': '.$profil->kategori_dosen; ?></span><br />
<label for="name">Alamat PT</label><span><?php echo ': Banda Aceh'; ?></span><br />
<label for="name">Fakultas</label><span><?php echo ': '.$dt->nama_fakultas; ?></span><br />
<label for="name">Prodi</label><span><?php echo ': '.$dt->nama_prodi; ?></span><br />
<label for="name">Jabatan Fungsional/Gol.</label><span><?php echo ': '.$dt1->nm_jabatan; ?></span><br />
<label for="name">Tempat/Tgl.Lahir</label><span><?php echo ': '.$bd->tempat_lhr.', '.$bd->tgl_lahir; ?></span><br />
<label for="name">No.Hp</label><span><?php echo ': '.$bd->hp; ?></span><br />
<label for="name">Email</label><span><?php echo ': '.$bd->email; ?></span><br />

<br />
  <table class="table1">
    <thead>
      <tr>
        <th colspan="4">Laporan</th>
        <th colspan="0">Kesimpulan</th>
        <th colspan="2">Remunerasi</th>
            <tr>
              <td>Pendidikan</td>
              <td>Penelitian</td>
              <td>Pengabdian</td>
              <td>Penunjang</td>
              <td>BKD</td>
              <td>P 1</td>
              <td>P 2</td>
            </tr>
        </tr>
    </thead>
    <tbody>
        <tr>
                <td><?php echo $pendidikan_rekap; ?></td>
                <td><?php echo $penelitian_rekap; ?></td>
                <td><?php echo $pengabdian_rekap; ?></td>
                <td><?php echo $penunjang_rekap; ?></td>
            <td><?php echo $hasilbkd; ?></td>
            <td><?php echo $hasil_p1; ?></td>
            <td><?php echo $point ?></td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</page>

<page size="A4" layout="landscape">
  <table class="table2">
    <thead>
  <tr>
    <th colspan="7">Detail Kagiatan</th>
    <th>Volume/SKS</th>
  </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($detail_rekap as $dt){
      $subkegiatan = wordwrap($dt->sub_kegiatan, 65, "<br />\n");
      $total[]=$dt->sks_subkegiatan;
    ?>
    <tr>
    <th colspan="7">
      <?php echo wordwrap($dt->kegiatan, 90, "<br />\n").'<br /><span>- '.strtolower($subkegiatan).'</span>'; ?>
    </th>
    <td><?php echo $dt->sks_subkegiatan; ?></td>
  </tr>
  <?php } ?>
  </tbody>
  </table>

</page>
</body>
</html>
