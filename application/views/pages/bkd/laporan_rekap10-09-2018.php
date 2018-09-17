<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php foreach($profildosen as $profil); ?>
                  <?php foreach($biodata as $bd);?>
                      <?php foreach($verifikator as $d); ?>
                      <br />
                      <?php
                        foreach($syaratbkd as $v); //sks bkd_remundosen
                        foreach($syaratsubbkd as $k); //sks sub_bkdkegiatan
                        foreach($sum_poin_pendidikan as $spp);
                        $poin_kegiatan_sum = $spp->Poin;
                        $poinremun = $k->subsks - $v->sks; //

                        if($poinremun >= $v->sks){ $sks='Memenuhi'; }else{ $sks='Belum Memenuhi'; }
                        $poins = $poinremun;

                      ?>

                          <div class="col-sm-2">
                                  <?php
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
                                    } ?>
                            </div>

                            <div class="col-sm-2">
                              <?php
                                foreach ($syt_pendidikan as $x1);
                                if($x1->skspendidikan!=""){$pendidikan_rekap = $x1->skspendidikan;}else{$pendidikan_rekap = 0;}
                              ?>
                              <?php
                                foreach ($syt_penelitian as $x2);
                                if($x2->skspenelitan!=""){$penelitian_rekap = $x2->skspenelitan;}else{$penelitian_rekap = 0;}
                              ?>
                              <?php
                                foreach ($syt_pengabdian as $x3);
                                if($x3->skspengabdian!=""){$pengabdian_rekap = $x3->skspengabdian;}else{$pengabdian_rekap = 0;}
                              ?>
                              <?php
                                foreach ($syt_penunjang as $x4);
                                if($x4->skspenunjang!=""){$penunjang_rekap = $x4->skspenunjang;}else{$penunjang_rekap = 0;}
                              ?>
                              </div>

                              <div class="col-sm-2">
                                    <?php
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

                                    ?>
                                </div>

                              <div class="col-sm-3">
                                    <?php
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

                                    ?>
                                </div>

                                <div class="col-sm-3">
                                    <?php
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
                                  </div>
                                  <a href="<?php echo base_url() ?>Laporan/save_pdf" class="btn btn-lg btn-primary"> CETAK LAPORAN AKHIR </a>

                                  <hr />

                <div class="x_panel">
                  <div class="x_title">
                    <b>REKAP LAPORAN KINERJA DOSEN</b>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                        <thead>
                          <tr>
                            <th rowspan="2">NIP</th>
                            <th rowspan="2">Nama</th>
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
                                <th scope="row"><?php echo $this->session->userdata('nipp'); ?></th>
                                <td bgcolor="#FFFFF0"><?php echo $this->session->userdata('username'); ?></td>
                                    <td><?php echo $pendidikan_rekap; ?></td>
                                    <td><?php echo $penelitian_rekap; ?></td>
                                    <td><?php echo $pengabdian_rekap; ?></td>
                                    <td><?php echo $penunjang_rekap; ?></td>
                                <td><?php echo $hasilbkd; ?></td>
                                <td><?php echo $hasil_p1; ?></td>
                                <td><?php echo @$point ?></td>
                            </tr>

                            <tr>
                              <th colspan="9" bgcolor="grey"></th>
                            </tr>

                            <tr>
                              <th colspan="7">Detail Kagiatan</th>
                              <th>Volume/SKS</th>
                              <th>Verifikator</th>
                              <?php
                              $no = 1;
                              foreach($detail_rekap as $dt){
                                // $kegiatans="<span class='text text-grey'>".$dt->kegiatan."</span>";
                                $subkegiatan = wordwrap($dt->sub_kegiatan, 65, "<br />\n");
                                $total[]=$dt->sks_subkegiatan;
                              ?>
                              <tr>
                              <th colspan="7">
                                <?php echo wordwrap($dt->kegiatan, 90, "<br />\n").'<br /><span>- '.strtolower($subkegiatan).'</span>'; ?>
                              </th>
                              <td><?php echo $dt->sks_subkegiatan; ?></td>
                              <td>
                                <?php
                                      if($dt->app_ketuaprodi==1){echo 'Ketua Prodi <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Ketua Prodi <span class="glyphicon glyphicon-remove"></span><br />';}
                                      if($dt->app_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                      if($dt->app_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                                ?>
                              </td>
                            </tr>
                            </tr>
                            <?php } ?>

                        </tbody>
                      </table>
                  </div>
                    <div class="clearfix"></div>
                  </div>
              </div>
        </div>
   </div>
