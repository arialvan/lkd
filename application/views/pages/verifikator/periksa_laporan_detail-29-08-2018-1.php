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
                  foreach($profildosen1 as $prf);
                  foreach($namadosen as $Nama);
                  echo'<h3>'.$Nama->nama_peg.'</h3>';
                  echo'<h4><u>'.$prf->kategori_dosen.'</u></h4>';
                  ?>
                      <br />
                      <?php
                    //  echo $this->session->userdata('kat_dosen');
                        foreach($syaratbkd as $v); //sks bkd_remundosen
                        foreach($syaratsubbkd as $k); //sks sub_bkdkegiatan
                        foreach($sum_poin_pendidikan as $spp);
                        // echo $k->subsks.'-'.$v->sks;
                        $poin_kegiatan_sum = $spp->Poin;

                      ?>
                      <fieldset>
                        <legend></legend>

                          <div class="col-sm-3">
                            <label><u><span class="required">SYARAT BKD Anda</span></u></label><br />
                              <table border="0" cellpadding="20" cellspacing="2">
                                  <?php
                                      foreach ($bkd_syarat as $x){
                                        if($prf->id_kat_dosen==3 || $prf->id_kat_dosen==7 || $prf->id_kat_dosen==9){
                                            $syaratBKD= $x->sks_bkd;
                                        }elseif($prf->id_kat_dosen==1 || $prf->id_kat_dosen==2 || $prf->id_kat_dosen==4){
                                            $syaratBKD= $x->sks_bkd+$x->sks_remun;
                                        }elseif($prf->id_kat_dosen==6 || $prf->id_kat_dosen==8){
                                            $syaratBKD= $x->sks_bkd+$x->sks_remun;
                                        }else{
                                            $syaratBKD= $x->sks_bkd;
                                        }
                                        $sytbkd[]=$x->sks_bkd;
                                        $sumBKD[]= $x->sks_bkd+$x->sks_remun; //Syarat BKD + REmunerasi + 2 dari manapun
                                  ?>
                                    <tr>
                                    <th><?php echo $x->ket_bkd; ?></th>
                                    <td><?php echo '= '.$syaratBKD; ?></td>
                                    <tr/>
                                  <?php } ?>
                              </table>
                            </div>

                            <div class="col-sm-3">
                              <?php foreach ($syt_pendidikan as $x1); ?>
                              <?php foreach ($syt_penelitian as $x2); ?>
                              <?php foreach ($syt_pengabdian as $x3); ?>
                              <?php foreach ($syt_penunjang as $x4); ?>
                              <label><u><span class="required">RBKD</span></u></label><br />
                                <table border="0" cellpadding="20" cellspacing="2">
                                      <tr>
                                        <th>Pendidikan</th>
                                        <td><?php echo '= '.$x1->skspendidikan; ?></td>
                                      </tr>
                                      <tr>
                                        <th>Penelitian</th>
                                        <td><?php echo '= '.$x2->skspenelitan; ?></td>
                                      <tr/>
                                      <tr>
                                        <th>Pengabdian</th>
                                        <td><?php echo '= '.$x3->skspengabdian; ?></td>
                                      <tr/>
                                      <tr>
                                        <th>Penunjang</th>
                                        <td><?php echo '= '.$x4->skspenunjang; ?></td>
                                      <tr/>
                                </table>
                              </div>

                              <div class="col-sm-3">
                                <label><u><span class="required">HASIL BKD</span></u></label><br />
                                    <?php
                                    // PERHITUNGAN MENURUT KATEGORI DOSEN DAN MAKSIMAL SKS BKD

                                    $ntotal = array($x1->skspendidikan,$x2->skspenelitan,$x3->skspengabdian,$x4->skspenunjang);
                                    $totalbkd = array_sum($ntotal);

                                    //Dosen Biasa (sudah Sertifikasi),Profesor Biasa, Syarat 12 SKS
                                    if($prf->id_kat_dosen==3 || $prf->id_kat_dosen==7 || $prf->id_kat_dosen==9){
                                            // if($x1->skspendidikan >= $sytbkd[0] && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && ($x4->skspenunjang <= $sytbkd[3] || $x4->skspenunjang>=$sytbkd[3]) && $totalbkd>=12){
                                            // $Syarat_BKD = $sytbkd[0]+4;
                                            //&& $x4->skspenunjang >= $sytbkd[3]
                                            $Syarat_BKD = $sytbkd[0];
                                            if($x1->skspendidikan >= $Syarat_BKD && $x2->skspenelitan >= $sytbkd[1] && $x3->skspengabdian >= $sytbkd[2] && $totalbkd >= 12 ){
                                                $hasilbkd = "Memenuhi Syarat BKD";
                                            }else{
                                                $hasilbkd = "Belum Memenuhi Syarat BKD";
                                            }

                                    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
                                    }elseif(($prf->id_kat_dosen==1 || $prf->id_kat_dosen==2 || $prf->id_kat_dosen==4)){
                                            if($totalbkd >=12){$hasilbkd = "Memenuhi Syarat BKD"; }else{ $hasilbkd = "Belum Memenuhi Syarat BKD";  }

                                    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 8 SKS
                                    }elseif(($prf->id_kat_dosen==6 || $prf->id_kat_dosen==8)){
                                            if($x1->skspendidikan >=3){$hasilbkd = "Memenuhi Syarat BKD"; }else{ $hasilbkd = "Belum Memenuhi Syarat BKD";  }

                                    }else{
                                            $hasilbkd = "Belum Memenuhi Syarat BKD";
                                    }

                                    ?>
                                    <span class="required"><?php echo $hasilbkd; ?></span>
                                </div>

                                <div class="col-sm-3">
                                  <label><u><span class="required">POIN REMUNERASI</span></u></label><br />
                                    <?php
                                    foreach ($poinmaks as $pm);
                                    foreach ($syt_penunjang_poin as $k);
                                    foreach($rencanakerja as $dt){ $p_sum[]=$dt->poin_subkegiatan; }

                                    $poin_master = round($pm->poinmax,2); //Poin MAX pendidikan
                                    $syaratBKD=array_sum($sumBKD); //Syarat BKD + Remun
                                    //$pendidikan = $x1->skspendidikan - $syaratBKD;

                                    //Calon Dosen, Dosen Biasa (non Sertifikasi), Dosen Tetap Bukan PNS (non Sertifikasi), Syarat 12 SKS
                                    if($prf->id_kat_dosen==1 || $prf->id_kat_dosen==2 || $prf->id_kat_dosen==4 ){

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
                                                    $points = "Belum Memenuhi";
                                            }

                                      }else{   $points = "Belum Memenuhi";  }

                                                echo $point = round($points,2);
                              /* PROFIL DOSEN 3,7,9 */
                            }elseif($prf->id_kat_dosen==3 || $prf->id_kat_dosen==7 || $prf->id_kat_dosen==9){
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
                                                            $points = "Belum Memenuhi";
                                                            $points_penunjang =  0;
                                                        }

                                              //Jika Pendidikan lebih besar dari syarat pendidikan dan jumlah syarat > 2
                                              }elseif($x1->skspendidikan > $bkd_syarat ){
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

                                                            }elseif($x4->skspenunjang == 4 ){
                                                              foreach ($tanpa_syt_penunjang as $tsp);
                                                              foreach ($poinmin as $p1);
                                                              $points_penunjang =  $tsp->pointanpasyarat - (2*$p1->poinmin);
                                                              $points = $points_penunjang;

                                                            }else{
                                                                //$points = "Belum Memenuhi";
                                                                $points_penunjang =  0;
                                                                $points = $points_penunjang;
                                                            }

                                                }else{
                                                            $points = "Belum Memenuhi";
                                                }
                                                        echo $point = round($points,2);
                                         }

                                      /* Profil 6,8*/
                                            }elseif ($prf->id_kat_dosen==6 || $prf->id_kat_dosen==8) {
                                                $Syarat_BKD = $sytbkd[0];

                                                      if($x1->skspendidikan >= $Syarat_BKD){
                                                          $points = "Syarat Memenuhi";
                                                      }else{
                                                          $points = "Belum Memenuhi";
                                                      }
                                                      echo $point = $points;
                                            }else{
                                                  echo $point = round($points,2);
                                            }

                                    //echo $points;
                                    ?>
                                  </div>
                      </fieldset>
              </div>


              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <fieldset>
                        <legend></legend>
                          <marquee scrollamount="15"><span><h3>Apabila sudah selesai Memeriksa seluruh Laporan atau selesai melakukan revisi perbaikan laporan, Silahkan Tekan tombol <b>"Selesai Laporan"</b> di bawah ini.</h3></span></marquee><br /><br />
                          <?php foreach($verifikator as $vr); ?>
                          <?php foreach($filter as $fl1);  ?>
                              <?php if ($fl1->assesor_1==$this->session->userdata('nipp') && $vr->statuslaporan==1 && $vr->p_assesor1==0) { ?>
                                  <a href="<?php echo base_url() ?>Verifikator/SelesaiLaporan_1/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda sudah selesai memeriksa seluruh laporan?')"> <b>Selesai Memeriksa</b> </a>
                                <?php }elseif ($vr->statuslaporan==1 && $vr->p_assesor2==0) { ?>
                                    <a href="<?php echo base_url() ?>Verifikator/SelesaiLaporan_2/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-warning" onClick="return confirm('Apakah anda sudah selesai memeriksa seluruh laporan?')"> <b>Selesai Memeriksa</b> </a>
                                <?php }elseif ($vr->p_assesor1==2) { ?>
                                    <a href="<?php echo base_url() ?>Verifikator/SelesaiLaporan_1/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-warning" onClick="return confirm('Apakah anda sudah selesai memeriksa laporan?')"> <b>Selesai Memeriksa Perbaikan Laporan</b> </a>
                                <?php }elseif ($vr->p_assesor2==2) { ?>
                                    <a href="<?php echo base_url() ?>Verifikator/SelesaiLaporan_2/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-warning" onClick="return confirm('Apakah anda sudah selesai memeriksa laporan?')"> <b>Selesai Memeriksa Perbaikan Laporan</b> </a>
                                <?php }else{ echo ''; } ?>
                      </fieldset>
              </div>
<!--
=========================
PENDIDIKAN
=========================
-->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENDIDIKAN</b>
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
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Laporan</th>
                          <th>Verifikator</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pendidikan as $dt){
                          $subkegiatan = wordwrap($dt->sub_kegiatan, 65, "<br />\n");
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><a href="#"><?php echo wordwrap($dt->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan).')</span>'; ?></a></td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt->status); ?></u><br />
                            <?php
                            if($dt->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                //$file = $dt->syarat_file;
                                $file=explode('#',$dt->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt->id_subkegiatan.'-'.str_replace("/","_",$value),'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              $nip_dosen = $this->uri->segment(3);
                              $assesor_1 = $fl->assesor_1;
                              $assesor_2 = $fl->assesor_2;
                              //Jika assesor 1 belum periksa dan assesor 2 != menolak dan laporan sudah upload
                                if(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==0 && $dt->app_assesor2 ==1 && $dt->status_laporan==1){ ?>
                                    <a href="javascript:;"
                                        data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                        data-toggle="modal" data-target="#tolak">
                                        <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                    </a>
                                    <?php
                                        echo anchor('Verifikator/LaporanApproved_1/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                        echo '<br />'.wordwrap($dt->komentar, 75, "<br />\n");
                              //Jika assesor 2 belum periksa dan assesor 1 != menolak dan laporan sudah upload
                            }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor2!=1 && $dt->app_assesor1 ==1 && $dt->status_laporan==1){ ?>
                                        <a href="javascript:;"
                                          data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                          data-toggle="modal" data-target="#tolak">
                                          <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                      </a>
                                      <?php
                                          echo anchor('Verifikator/LaporanApproved_2/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                          echo '<br />'.wordwrap($dt->komentar, 75, "<br />\n");

                            //Jika assesor 1 setuju dan assesor 2 !=setuju
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==1 && $dt->app_assesor2 !=1){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 1</span>';

                            //Jika assesor 2 setuju dan assesor 1 !=setuju
                                }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor2==1 && $dt->app_assesor1 !=1){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==2 && $dt->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==2 && $dt->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor2==2 && $dt->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';
                                }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor2==2 && $dt->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==2 && $dt->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen)&& $dt->app_assesor2==2 && $dt->app_assesor1==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                }elseif(($fl->assesor_1==$this->session->userdata('nipp') && $dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==0) || ($fl->assesor_2==$this->session->userdata('nipp') && $dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==0)){
                                            echo '<span class="text text-sm text-danger">Diproses Prodi</span>';
                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==1){
                          ?>
                                           <a href="javascript:;"
                                               data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                               data-toggle="modal" data-target="#tolak">
                                               <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                           </a>
                                           <?php
                                               echo anchor('Verifikator/LaporanApproved_1/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                               echo '<br />'.wordwrap($dt->komentar, 75, "<br />\n");

                            //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                          }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==1){
                          ?>
                                            <a href="javascript:;"
                                                data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                                data-toggle="modal" data-target="#tolak">
                                                <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                            </a>
                                            <?php
                                                echo anchor('Verifikator/LaporanApproved_2/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                                echo '<br />'.wordwrap($dt->komentar, 75, "<br />\n");
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif(($assesor_1==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==1 && $dt->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif(($assesor_2==$this->session->userdata('nipp') && $fl->nip = $nip_dosen) && $dt->app_assesor1==1 && $dt->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                                }else{
                                  echo $this->pustaka->p_laporan($dt->statusapp);
                                }
                              ?>
                          </td>
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
                    </table>
                  </div>
                  <div class="clearfix"></div>
              </div>
<!--
  =========================
  PENELTIAN
  =========================
-->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENELITIAN</b>
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
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Laporan</th>
                          <th>Verifikator</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penelitian as $dt1){
                          $subkegiatan1 = wordwrap($dt1->sub_kegiatan, 65, "<br />\n");
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><a href="#"><?php echo wordwrap($dt1->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan1).')</span>'; ?></a></td>
                          <td><?php echo $dt1->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt1->status); ?></u><br />
                            <?php
                            if($dt1->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                //$file = $dt1->syarat_file;
                                $file=explode('#',$dt1->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt1->id_subkegiatan.'-'.str_replace("/","_",$value),'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Jika assesor 1 belum periksa dan assesor 2 != menolak dan laporan sudah upload
                                if(($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==0 && $dt1->app_assesor2 ==1 && $dt1->status_laporan==1)){ ?>
                                    <a href="javascript:;"
                                        data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                        data-toggle="modal" data-target="#tolak">
                                        <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                    </a>
                                    <?php
                                        echo anchor('Verifikator/LaporanApproved_1/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                        echo '<br />'.wordwrap($dt1->komentar, 75, "<br />\n");
                              //Jika assesor 2 belum periksa dan assesor 1 != menolak dan laporan sudah upload
                            }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor2==0 && $dt1->app_assesor1 ==1 && $dt1->status_laporan==1)){ ?>
                                        <a href="javascript:;"
                                          data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                          data-toggle="modal" data-target="#tolak">
                                          <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                      </a>
                                      <?php
                                          echo anchor('Verifikator/LaporanApproved_2/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                          echo '<br />'.wordwrap($dt1->komentar, 75, "<br />\n");

                            //Jika assesor 1 setuju dan assesor 2 !=setuju
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==1 && $dt1->app_assesor2 !=1){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 1</span>';

                            //Jika assesor 2 setuju dan assesor 1 !=setuju
                                }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor2==1 && $dt1->app_assesor1 !=1)){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==2 && $dt1->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor1==2 && $dt1->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor2==2 && $dt1->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor2==2 && $dt1->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==2 && $dt1->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor2==2 && $dt1->app_assesor1==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                }elseif(($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==0) || ($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==0)){
                                            echo '<span class="text text-sm text-danger">Diproses Prodi</span>';
                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==1){
                          ?>
                                           <a href="javascript:;"
                                               data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                               data-toggle="modal" data-target="#tolak">
                                               <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                           </a>
                                           <?php
                                               echo anchor('Verifikator/LaporanApproved_1/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                               echo '<br />'.wordwrap($dt1->komentar, 75, "<br />\n");
                            //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor2==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==1){
                          ?>
                                            <a href="javascript:;"
                                                data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                                data-toggle="modal" data-target="#tolak">
                                                <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                            </a>
                                            <?php
                                                echo anchor('Verifikator/LaporanApproved_2/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                                echo '<br />'.wordwrap($dt1->komentar, 75, "<br />\n");
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt1->app_assesor1==1 && $dt1->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->app_assesor1==1 && $dt1->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                                }else{
                                  echo $this->pustaka->p_laporan($dt->statusapp);
                                }
                              ?>
                          </td>
                          <td>
                            <?php
                                  if($dt1->app_ketuaprodi==1){echo 'Ketua Prodi <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Ketua Prodi <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt1->app_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt1->app_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                            ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
<!-- PENGABDIAN  -->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENGABDIAN</b>
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
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Laporan</th>
                            <th>Verifikator</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pengabdian as $dt2){
                          $subkegiatan2 = wordwrap($dt2->sub_kegiatan, 65, "<br />\n");
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><a href="#"><?php echo  wordwrap($dt2->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan2).')</span>'; ?></a></td>
                          <td><?php echo $dt2->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt2->status); ?></u><br />
                            <?php
                            if($dt2->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                //$file = $dt2->syarat_file;
                                $file=explode('#',$dt2->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt2->id_subkegiatan.'-'.str_replace("/","_",$value),'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Jika assesor 1 belum periksa dan assesor 2 != menolak dan laporan sudah upload
                                if(($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==0 && $dt2->app_assesor2 ==1 && $dt2->status_laporan==1)){ ?>
                                    <a href="javascript:;"
                                        data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                        data-toggle="modal" data-target="#tolak">
                                        <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                    </a>
                                    <?php
                                        echo anchor('Verifikator/LaporanApproved_1/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                        echo '<br />'.wordwrap($dt2->komentar, 75, "<br />\n");
                              //Jika assesor 2 belum periksa dan assesor 1 != menolak dan laporan sudah upload
                            }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor2==0 && $dt2->app_assesor1 ==1 && $dt2->status_laporan==1)){ ?>
                                        <a href="javascript:;"
                                          data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                          data-toggle="modal" data-target="#tolak">
                                          <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                      </a>
                                      <?php
                                          echo anchor('Verifikator/LaporanApproved_2/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                          echo '<br />'.wordwrap($dt2->komentar, 75, "<br />\n");

                            //Jika assesor 1 setuju dan assesor 2 !=setuju
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==1 && $dt2->app_assesor2 !=1){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 1</span>';

                            //Jika assesor 2 setuju dan assesor 1 !=setuju
                                }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor2==1 && $dt2->app_assesor1 !=1)){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==2 && $dt2->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor1==2 && $dt2->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor2==2 && $dt2->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor2==2 && $dt2->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==2 && $dt2->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor2==2 && $dt2->app_assesor1==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                }elseif(($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==0) || ($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==0)){
                                            echo '<span class="text text-sm text-danger">Diproses Prodi</span>';
                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==1){
                          ?>
                                           <a href="javascript:;"
                                               data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                               data-toggle="modal" data-target="#tolak">
                                               <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                           </a>
                                           <?php
                                               echo anchor('Verifikator/LaporanApproved_1/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                               echo '<br />'.wordwrap($dt2->komentar, 75, "<br />\n");
                            //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor2==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==1){
                          ?>
                                            <a href="javascript:;"
                                                data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                                data-toggle="modal" data-target="#tolak">
                                                <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                            </a>
                                            <?php
                                                echo anchor('Verifikator/LaporanApproved_2/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                                echo '<br />'.wordwrap($dt2->komentar, 75, "<br />\n");
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt2->app_assesor1==1 && $dt2->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->app_assesor1==1 && $dt2->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                                }else{
                                  echo $this->pustaka->p_laporan($dt2->statusapp);
                                }
                              ?>
                          </td>
                          <td>
                            <?php
                                  if($dt2->app_ketuaprodi==1){echo 'Ketua Prodi <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Ketua Prodi <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt2->app_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt2->app_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                            ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

<!-- PENUNJANG  -->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENUNJANG</b>
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
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Laporan</th>
                            <th>Verifikator</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penunjang as $dt3){
                          $subkegiatan3 = wordwrap($dt3->sub_kegiatan, 65, "<br />\n");
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><a href="#"><?php echo wordwrap($dt3->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan3).')</span>'; ?></a></td>
                          <td><?php echo $dt3->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt3->status); ?></u><br />
                            <?php
                            if($dt3->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                //$file = $dt3->syarat_file;
                                $file=explode('#',$dt3->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt3->id_subkegiatan.'-'.str_replace("/","_",$value),'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Jika assesor 1 belum periksa dan assesor 2 != menolak dan laporan sudah upload
                                if(($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==0 && $dt3->app_assesor2 ==1 && $dt3->status_laporan==1)){ ?>
                                    <a href="javascript:;"
                                        data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                        data-toggle="modal" data-target="#tolak">
                                        <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                    </a>
                                    <?php
                                        echo anchor('Verifikator/LaporanApproved_1/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                        echo '<br />'.wordwrap($dt3->komentar, 75, "<br />\n");
                              //Jika assesor 2 belum periksa dan assesor 1 != menolak dan laporan sudah upload
                            }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor2==0 && $dt3->app_assesor1 ==1 && $dt3->status_laporan==1)){ ?>
                                        <a href="javascript:;"
                                          data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                          data-toggle="modal" data-target="#tolak">
                                          <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                      </a>
                                      <?php
                                          echo anchor('Verifikator/LaporanApproved_2/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                          echo '<br />'.wordwrap($dt3->komentar, 75, "<br />\n");

                            //Jika assesor 1 setuju dan assesor 2 !=setuju
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==1 && $dt3->app_assesor2 !=1){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 1</span>';

                            //Jika assesor 2 setuju dan assesor 1 !=setuju
                                }elseif(($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor2==1 && $dt3->app_assesor1 !=1)){
                                            echo '<span class="text text-sm text-danger">Diterima Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==2 && $dt3->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor1==2 && $dt3->app_assesor2==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor2==2 && $dt3->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor2==2 && $dt3->app_assesor1==0){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                            //Jika salah satu menolak
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==2 && $dt3->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 1</span>';
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor2==2 && $dt3->app_assesor1==1){
                                            echo '<span class="text text-sm text-danger">Ditolak Assesor 2</span>';

                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                }elseif(($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==0) || ($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==0)){
                                            echo '<span class="text text-sm text-danger">Diproses Prodi</span>';
                           //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==1){
                          ?>
                                           <a href="javascript:;"
                                               data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                               data-toggle="modal" data-target="#tolak">
                                               <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                           </a>
                                           <?php
                                               echo anchor('Verifikator/LaporanApproved_1/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                               echo '<br />'.wordwrap($dt3->komentar, 75, "<br />\n");
                            //jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor2==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==1){
                          ?>
                                            <a href="javascript:;"
                                                data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'2' ?>"
                                                data-toggle="modal" data-target="#tolak">
                                                <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                            </a>
                                            <?php
                                                echo anchor('Verifikator/LaporanApproved_2/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."1",'<span class="btn btn-sm btn-primary">Terima</span>');
                                                echo '<br />'.wordwrap($dt3->komentar, 75, "<br />\n");
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_1==$this->session->userdata('nipp') && $dt3->app_assesor1==1 && $dt3->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                          //jika assesor 1 terima dan assesor 2 terima
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->app_assesor1==1 && $dt3->app_assesor2==1){
                                            echo '<span class="text text-sm text-danger">Di Terima<br /> Assesor 1 & Assesor 2</span>';
                                }else{
                                  echo $this->pustaka->p_laporan($dt->statusapp);
                                }
                              ?>
                          </td>
                          <td>
                            <?php
                                  if($dt3->app_ketuaprodi==1){echo 'Ketua Prodi <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Ketua Prodi <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt3->app_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt3->app_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                            ?>
                          </td>
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

   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tolak" class="modal fade">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                   <h4 class="modal-title">Ubah Data</h4>
               </div>
               <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Verifikator/KomentarTolak">
                 <input type="hidden" class="form-control" id="id_kegiatan" name="id_kegiatan" />
                 <div class="modal-body">
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label">Komentar</label>
                             <div class="col-lg-10">
                               <textarea name="komentar_assesor" class="form-control" required="required"> </textarea>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-info" type="submit"> Submit&nbsp;</button>
                         <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                     </div>
                   </form>
               </div>
           </div>
       </div>
