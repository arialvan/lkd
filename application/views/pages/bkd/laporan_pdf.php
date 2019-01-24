<?php
foreach($profildosen as $profil);
foreach($biodata as $bd);

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
                   display:block;
                   margin: 0 auto;
                   margin-bottom: auto;
                   box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
                   height: auto;
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
                        align:center;
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

                     .column {
                              float: left;
                              padding: 10px;
                              height: 150px; /* Should be removed. Only for demonstration */
                          }

                    .left {
                            width: 20%;
                          }

                    .right {
                            width: 80%;
                          }

                    .row:after {
                          display:flex;
                          clear: both;
                          overflow: auto;
                          }


                      .kiri {
                               width: 40%;
                               text-align: center;
                             }
                      .kanan {
                              width: 40%;
                              text-align: center;
                            }
                      .satukolom {
                              width: 80%;
                              text-align: center;
                            }
                      .tengah {
                                text-align: center;
                              }
                      .signature {
                              border: 0;
                              border-bottom: 1px solid #000;
                              width: 40%;
                              text-align: center;
                          }
       </style>
     </head>
<body>

<?php
foreach($fak_id as $dt);
foreach($jab_id as $dt1);
?>
<page size="A4">
<div class="row">
    <div class="column left">
      <img src="<?php echo base_url() ?>./photo/logo.png" alt="" class="img-thumbnail profile_img" width="150" height="160">
    </div>
    <div class="column right">
      <h4>KEMENTRIAN AGAMA REPUBLIK INDONESIA<br />UNIVERSITAS ISLAM NEGRI AR-RANIRY BANDA ACEH</h4>
      <h5>Jalan Syeikh Abdul Rauf, Kopelma Darussalam Banda Aceh <br />Telepon : 0651-7552921 - 7551857 Fax. 0651-7552922<br />
          Situs: <i class="text text-primary">www.ar-raniry.ac.id</i> Email: uin@ar-raniry.ac.id</h5>
    </div>
</div>
<hr />

<label for="name">Nama</label><span><?php echo ': '.$bd->nama_peg; ?></span><br />
<label for="name">Nip</label><span><?php echo ': '.$bd->nip; ?></span><br />
<label for="name">No Sertifikat</label><span><?php echo ': '.$bd->no_sertifikat; ?></span><br />
<label for="name">Perguruan Tinggi</label><span><?php echo ': UIN AR-RANIRY'; ?></span><br />
<label for="name">Status</label><span><?php echo ': '.$profil->kategori_dosen; ?></span><br />
<label for="name">Alamat PT</label><span><?php echo ': Banda Aceh'; ?></span><br />
<label for="name">Fakultas</label><span><?php echo ': '.@$dt->nama_fakultas; ?></span><br />
<label for="name">Prodi</label><span><?php echo ': '.@$dt->nama_prodi; ?></span><br />
<label for="name">Jabatan Fungsional/Gol.</label><span><?php echo ': '.@$dt1->nm_jabatan; ?></span><br />
<label for="name">Tempat/Tgl.Lahir</label><span><?php echo ': '.$bd->tempat_lhr.', '.$bd->tgl_lahir; ?></span><br />
<label for="name">No.Hp</label><span><?php echo ': '.$bd->hp; ?></span><br />
<label for="name">Email</label><span><?php echo ': '.$bd->email; ?></span>

  <table class="table1">
    <thead>
      <tr>
        <th colspan="4">Syarat BKD</th>
        <th colspan="4">Laporan(Volume/SKS)</th>
        <th colspan="1">Kesimupulan</th>
        <th colspan="2">Remunerasi</th>
            <tr>
              <td>Pendidikan</td>
              <td>Penelitian</td>
              <td>Pengabdian</td>
              <td>Penunjang</td>
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
      <?php
        foreach($datadosen as $dt){
          $ntotal = array($dt['Pendidikan'],$dt['Penelitian'],$dt['Pengabdian'],$dt['Penunjang']);
          $sum_bkd = array_sum($ntotal);
          //Hasil BKD
          if($dt['Pendidikan'] >= $dt['Syt_Pendidikan'] ){ $hasilbkd="Memenuhi"; }else{ $hasilbkd="Tidak Memenuhi"; }
          //Syarat P1
          if($dt['id_kat_dosen']==3 || $dt['id_kat_dosen']==7 || $dt['id_kat_dosen']==9){
                  $Syarat_BKD = $dt['Syt_Pendidikan']+4;
                  if($dt['Pendidikan'] >= $Syarat_BKD && $dt['Penelitian'] >= $dt['Syt_Penelitian'] && ($dt['Pengabdian'] >= $dt['Syt_Pengabdian'] && $dt['Penunjang'] >= $dt['Syt_Penunjang']) && $sum_bkd >= 12 ){
                      $hasil_p1 = "Memenuhi";
                  }else{
                      $hasil_p1 = "Belum Memenuhi";
                  }

          }elseif($dt['id_kat_dosen']==1 || $dt['id_kat_dosen']==2 || $dt['id_kat_dosen']==4){
                  $Syarat_BKD = $dt['Syt_Pendidikan']+4;
                  if($dt['Pendidikan'] >= $Syarat_BKD && $sum_bkd >= 12 ){
                      $hasil_p1 = "Memenuhi";
                  }else{
                      $hasil_p1 = "Belum Memenuhi";
                  }
          }elseif($dt['id_kat_dosen']==6 || $dt['id_kat_dosen']==8){
                  $Syarat_BKD = $dt['Syt_Pendidikan'];
                  if($dt['Pendidikan'] >= $Syarat_BKD){
                      $hasil_p1 = "Dibayar Melalui Absensi";
                  }else{
                      $hasil_p1 = "Belum Memenuhi";
                  }
          }else{ $hasil_p1 = "Belum Memenuhi"; }

          //HASIL P2
          if($dt['id_kat_dosen']==6 || $dt['id_kat_dosen']==8){
                  $Syarat_BKD = $dt['Syt_Pendidikan'];
                  if($dt['Pendidikan'] >= $Syarat_BKD){
                      $point = "Memenuhi 30% P2";
                  }else{
                      $point = "Belum Memenuhi";
                  }
          }else{
                  if($dt['Points'] >=28){ $point=28; }else{ $point= max($dt['Points'],0); }
          }
      ?>
        <tr>
                <td><?php echo $dt['Syt_Pendidikan']; ?></td>
                <td><?php echo $dt['Syt_Penelitian']; ?></td>
                <td><?php echo $dt['Syt_Pengabdian']; ?></td>
                <td><?php echo $dt['Syt_Penunjang']; ?></td>
                <td><?php echo $dt['Pendidikan']; ?></td>
                <td><?php echo $dt['Penelitian']; ?></td>
                <td><?php echo $dt['Pengabdian']; ?></td>
                <td><?php echo $dt['Penunjang']; ?></td>
                <td><?php echo $hasilbkd; ?></td>
                <td><?php echo $hasil_p1; ?></td>
                <td><?php echo $point; ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
<?php  foreach($verifikator as $vr1); ?>
<div class="row">
    <div class="column satukolom">
      <h5>Disetujui,<br />Ketua Prodi<br /><?php echo $vr1->ketuaprodi;  ?></h5><br />

      <p style="text-decoration: underline;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </p>
    </div>
</div>

<div class="row">
    <div class="column kiri">
      <h5>Diperiksa,<br /> Assesor I<br /><?php echo $vr1->assesor1;  ?></h5><br />

      <p style="text-decoration: underline;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </p>
    </div>

    <div class="column kanan">
      <h5>Diperiksa,<br />Assesor II<br /><?php echo $vr1->assesor2;  ?></h5><br />

      <p style="text-decoration: underline;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </p>
    </div>
</div>

<label for="name"></label><span></span><br />


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
