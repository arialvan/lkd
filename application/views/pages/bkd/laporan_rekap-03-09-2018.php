<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <h3><u><?php //echo $title; ?></u></h3>
                  <?php
                    foreach($profildosen as $profil);
                    echo'<h3><u>'.$profil->kategori_dosen.'</u></h3>';
                  ?>
                      <br />
                      <?php
                    //  echo $this->session->userdata('kat_dosen');
                        foreach($syaratbkd as $v); //sks bkd_remundosen
                        foreach($syaratsubbkd as $k); //sks sub_bkdkegiatan
                        foreach($sum_poin_pendidikan as $spp);
                        // echo $k->subsks.'-'.$v->sks;
                        $poin_kegiatan_sum = $spp->Poin;
                        $poinremun = $k->subsks - $v->sks; //

                        if($poinremun >= $v->sks){ $sks='Memenuhi'; }else{ $sks='Belum Memenuhi'; }
                        $poins = $poinremun;

                      ?>
                          <div class="col-sm-3">
                                  <?php
                                      foreach ($bkd_syarat as $x){
                                        if($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
                                            $syaratBKD= $x->sks_bkd;
                                        }elseif($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4){
                                            $syaratBKD= $x->sks_bkd+$x->sks_remun;
                                        }elseif($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8){
                                            $syaratBKD= $x->sks_bkd+$x->sks_remun;
                                        }else{
                                            $syaratBKD= $x->sks_bkd;
                                        }
                                        $sytbkd[]=$x->sks_bkd;
                                        $sumBKD[]= $x->sks_bkd+$x->sks_remun; //Syarat BKD + REmunerasi + 2 dari manapun
                                   } ?>
                            </div>

                            <div class="col-sm-3">
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

                              <div class="col-sm-3">
                                <?php
                                    /* PERHITUNGAN MENURUT KATEGORI DOSEN DAN MAKSIMAL SKS BKD */
                                    $ntotal = array($x1->skspendidikan,$x2->skspenelitan,$x3->skspengabdian,$x4->skspenunjang);
                                    $totalbkd = array_sum($ntotal);

                                    //Dosen Biasa (sudah Sertifikasi),Profesor Biasa, Syarat 12 SKS
                                    if($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
                                            $Syarat_BKD = $sytbkd[0];
                                            if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd >= 12 ){
                                                $hasilbkd = "Memenuhi Syarat";
                                            }else{
                                                $hasilbkd = "Belum Memenuhi Syarat";
                                            }

                                    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
                                    }elseif(($profil->id_kat_dosen==1 || $profil->id_kat_dosen==2 || $profil->id_kat_dosen==4)){
                                            if($totalbkd >=12){$hasilbkd = "Memenuhi Syarat"; }else{ $hasilbkd = "Belum Memenuhi Syarat";  }

                                    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
                                    }elseif(($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8)){
                                            if($x1->skspendidikan >=3){$hasilbkd = "Memenuhi Syarat"; }else{ $hasilbkd = "Belum Memenuhi Syarat";  }

                                    }else{
                                            $hasilbkd = "Belum Memenuhi Syarat";
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

                                      $Syarat_BKD = $sytbkd[0]+4;
                                      if($x1->skspendidikan >= $Syarat_BKD && $totalbkd>= 12 ){

                                      if($x1->skspendidikan >=10 ){
                                            if($x2->skspenelitan+$x3->skspengabdian+$x4->skspenunjang ==1 ){
                                                    foreach ($poinremunerasi as $b);
                                                    $point_penunjang = $k->poinpenunjang; //Point Penunjang
                                                    $point_pendidikan = ($b->poinremun-11);
                                                    $points = $point_pendidikan+$point_penunjang;
                                            }elseif($x2->skspenelitan+$x3->skspengabdian+$x4->skspenunjang >=2 ){
                                                    foreach ($poinremunerasi as $b);
                                                    $point_penunjang = $k->poinpenunjang; //Point Penunjang
                                                    $point_pendidikan = ($b->poinremun-10);
                                                    $points = $point_pendidikan+$point_penunjang;
                                            }elseif($x2->skspenelitan+$x3->skspengabdian+$x4->skspenunjang ==0 ){
                                                    foreach ($poinremunerasi as $b);
                                                    $point_penunjang = $k->poinpenunjang; //Point Penunjang
                                                    $point_pendidikan = ($b->poinremun-12);
                                                    $points = $point_pendidikan+$point_penunjang;

                                            }else{
                                                    $points = "Belum Memenuhi Syarat";
                                            }

                                      }else{   $points = "Belum Memenuhi Syarat";  }

                                               $point = round($points,2);

                                }
                              /* PROFIL DOSEN 3,7,9 */
                            }elseif($profil->id_kat_dosen==3 || $profil->id_kat_dosen==7 || $profil->id_kat_dosen==9){
                                            foreach ($bkd_syarat_ds as $var);
                                            $bkd_syarat = $var->sks_bkd+$var->sks_remun; //Syarat BKD (SKS+Remun)
                                            $sks_poin = $x1->skspendidikan-$var->sks_remun;
                                            $Syarat_BKD = $sytbkd[0]+4;

                                 if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd>= 12 ){
                                            if($x1->skspendidikan == 10){
                                                        if($x2->skspenelitan+$x3->skspengabdian >= 6){
                                                           foreach ($tanpa_syt_penunjang as $tsp);
                                                           $poin_pendidikan_remun = $poin_kegiatan_sum-10;
                                                           $points_penunjang = $tsp->pointanpasyarat;
                                                           $point = $points_penunjang+$poin_pendidikan_remun;
                                                           if($point > 28){$points = 28; }else{$points = $point; }

                                                        }elseif($x2->skspenelitan+$x3->skspengabdian == 5){
                                                           // foreach ($poinmin as $p1);
                                                           // $points =  $x4->poinpenunjang - (1*$p1->poinmin);
                                                           // $points_penunjang = $x4->poinpenunjang - (1*$p1->poinmin);
                                                           foreach ($tanpa_syt_penunjang as $tsp);
                                                           $poin_pendidikan_remun = $poin_kegiatan_sum-10;
                                                           $points_penunjang = $tsp->pointanpasyarat;
                                                           $point = $points_penunjang+$poin_pendidikan_remun;
                                                           if($point > 28){$points = 28; }else{$points = $point; }

                                                        }elseif($x4->skspenunjang ==4 ){
                                                          foreach ($poinmin as $p1);
                                                          $points =  $x4->poinpenunjang - (2*$p1->poinmin);
                                                          $points_penunjang =  $x4->poinpenunjang - (2*$p1->poinmin);

                                                        }else{
                                                            $points = "Belum Memenuhi Syarat";
                                                            $points_penunjang =  0;
                                                        }

                                              //Jika Pendidikan lebih besar dari syarat pendidikan dan jumlah syarat > 2
                                              }elseif($x1->skspendidikan > $Syarat_BKD ){
                                                            foreach ($poinremunerasi as $b);

                                                            if($x2->skspenelitan+$x3->skspengabdian >= 6){
                                                              foreach ($tanpa_syt_penunjang as $tsp);
                                                              //$points =  $tsp->pointanpasyarat;
                                                              $poin_pendidikan_remun = $poin_kegiatan_sum-10;
                                                              $points_penunjang = $tsp->pointanpasyarat;
                                                              $point = $points_penunjang+$poin_pendidikan_remun;
                                                              if($point > 28){$points = 28; }else{$points = $point; }

                                                            }elseif($x2->skspenelitan+$x3->skspengabdian == 5){
                                                               foreach ($tanpa_syt_penunjang as $tsp);

                                                               $poin_pendidikan_remun = $poin_kegiatan_sum-10;
                                                               $points_penunjang = $tsp->pointanpasyarat;
                                                               $point = $points_penunjang+$poin_pendidikan_remun;
                                                               if($point > 28){$points = 28; }else{$points = $point; }

                                                            }elseif($x4->skspenunjang >= 4 ){
                                                              // foreach ($tanpa_syt_penunjang as $tsp);
                                                              // foreach ($poinmin as $p1);
                                                              // $points_penunjang =  $tsp->pointanpasyarat - (2*$p1->poinmin);
                                                              // $points = $points_penunjang;
                                                              foreach ($tanpa_syt_penunjang as $tsp);
                                                              $poin_pendidikan_remun = $poin_kegiatan_sum-10;
                                                              $points_penunjang = $tsp->pointanpasyarat;
                                                              $point = $points_penunjang+$poin_pendidikan_remun;
                                                              if($point > 28){$points = 28; }else{$points = $point; }

                                                            }else{
                                                                //$points = "Belum Memenuhi";
                                                                $points_penunjang =  0;
                                                                $points = $points_penunjang;
                                                            }

                                                }else{
                                                            $points = "Belum Memenuhi Syarat";
                                                }
                                                            $point = round($points,2);
                                         }

                                      /* Profil 6,8*/
                                            }elseif ($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8) {
                                                $Syarat_BKD = $sytbkd[0];

                                                      if($x1->skspendidikan >= $Syarat_BKD){
                                                          $points = "Syarat Memenuhi";
                                                      }else{
                                                          $points = "Belum Memenuhi Syarat";
                                                      }
                                                          $point = $points;
                                            }else{
                                                          $point = round($points,2);
                                            }
                                    ?>
                                  </div>
                                  <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/InsertRencana">
                                    <input type="text" id="nip" name="nip" value="<?php echo $this->session->userdata('nipp'); ?>" />
                                    <input type="text" id="nama" name="nama" value="<?php echo $this->session->userdata('username'); ?>" />
                                    <input type="text" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan_rekap; ?>" />
                                    <input type="text" id="penelitian" name="penelitian" value="<?php echo $penelitian_rekap; ?>" />
                                    <input type="text" id="pengabdian" name="pengabdian" value="<?php echo $pengabdian_rekap; ?>" />
                                    <input type="text" id="penunjang" name="penunjang" value="<?php echo $penunjang_rekap; ?>" />
                                    <input type="text" id="kesimpulan_bkd" name="kesimpulan_bkd" value="<?php echo $hasilbkd; ?>" />
                                    <input type="text" id="remun_p1" name="remun_p1" value="<?php echo $hasilbkd; ?>" />
                                    <input type="text" id="remun_p2" name="remun_p2" value="<?php echo $point; ?>" />

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                        <button type="submit" class="btn btn-primary">Simpan Hasil Laporan </button>
                                      </div>
                                    </div>
                                  </form>
                            </div>
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
                    <?php if ($profil->id_kat_dosen==6 || $profil->id_kat_dosen==8){ ?>

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
                                <td><?php echo $point ?></td>
                            </tr>
                        </tbody>
                      </table>

                  <?php }else { ?>
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
                              <td bgcolor="#FFFFF0"><?php echo $this->session->userdata('username') ?></td>
                                  <td><?php echo $pendidikan_rekap; ?></td>
                                  <td><?php echo $penelitian_rekap; ?></td>
                                  <td><?php echo $pengabdian_rekap; ?></td>
                                  <td><?php echo $penunjang_rekap; ?></td>
                              <td><?php echo $hasilbkd; ?></td>
                              <td><?php echo $hasilbkd; ?></td>
                              <td><?php echo $point ?></td>
                          </tr>
                      </tbody>
                    </table>
                  <?php } ?>
                  </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_panel">
                    <div class="x_title">
                      <b>Detail Kegiatan DOSEN</b>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kegiatan</th>
                            <th>Volume/SKS</th>
                            <th>Verifikator</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach($detail_rekap as $dt){
                            $kegiatans="<b><span class='text text-primary'>".$dt->kegiatan."</span></b>";
                            $subkegiatan = wordwrap($dt->sub_kegiatan, 65, "<br />\n");
                            $total[]=$dt->sks_subkegiatan;
                          ?>
                          <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td>
                              <a href="#"><?php echo wordwrap($kegiatans, 75, "<br />\n").'<br /><span>- '.strtolower($subkegiatan).'</span>'; ?></a>
                            </td>
                            <td><?php echo $dt->sks_subkegiatan; ?></td>
                            <td>
                              <?php
                                    if($dt->app_ketuaprodi==1){echo 'Ketua Prodi <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Ketua Prodi <span class="glyphicon glyphicon-remove"></span><br />';}
                                    if($dt->app_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                    if($dt->app_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                              ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                              <th colspan="2" style="text-align:right">Total:</th>
                              <th><?php echo @array_sum($total); ?></th>
                              <th></th>
                          </tr>
                      </tfoot>
                      </table>
                    </div>
                      <div class="clearfix"></div>
                    </div>
              </div>
        </div>
   </div>
