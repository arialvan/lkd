<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <?php
                    foreach($syaratbkd as $dt1);
                    foreach($rekap_dosen as $dt);

                            $ntotal = array(@$dt['Pendidikan'],@$dt['Penelitian'],@$dt['Pengabdian'],@$dt['Penunjang']);
                            $sum_bkd = array_sum($ntotal);
                            //Hasil BKD
                            if(@$dt['Pendidikan'] >= $dt1['Syt_Pendidikan']){ $hasilbkd="Memenuhi"; }else{ $hasilbkd="Belum Memenuhi"; }
                            //Syarat P1
                            if(@$dt['id_kat_dosen']==3 || @$dt['id_kat_dosen']==7 || @$dt['id_kat_dosen']==9){
                                    $Syarat_BKD = $dt1['Syt_Pendidikan']+4;
                                    if(@$dt['Pendidikan'] >= $Syarat_BKD && @$dt['Penelitian'] >= $dt1['Syt_Penelitian'] && (@$dt['Pengabdian'] >= $dt1['Syt_Pengabdian'] && @$dt['Penunjang'] >= $dt1['Syt_Penunjang']) && $sum_bkd >= 12 ){
                                        $hasil_p1 = "Memenuhi";
                                    }else{
                                        $hasil_p1 = "Belum Memenuhi";
                                    }

                            }elseif(@$dt['id_kat_dosen']==1 || @$dt['id_kat_dosen']==2 || @$dt['id_kat_dosen']==4){
                                    $Syarat_BKD = $dt1['Syt_Pendidikan']+4;
                                    if(@$dt['Pendidikan'] >= $Syarat_BKD && $sum_bkd >= 12 ){
                                        $hasil_p1 = "Memenuhi";
                                    }else{
                                        $hasil_p1 = "Belum Memenuhi";
                                    }
                            }elseif(@$dt['id_kat_dosen']==6 || @$dt['id_kat_dosen']==8){
                                    $Syarat_BKD = $dt1['Syt_Pendidikan'];
                                    if(@$dt['Pendidikan'] >= $Syarat_BKD){
                                        $hasil_p1 = "Dibayar Melalui Absensi";
                                    }else{
                                        $hasil_p1 = "Belum Memenuhi";
                                    }
                            }else{ $hasil_p1 = "Belum Memenuhi"; }

                            //HASIL P2
                            if(@$dt['id_kat_dosen']==6 || @$dt['id_kat_dosen']==8){
                                    $Syarat_BKD = $dt1['Syt_Pendidikan'];
                                    if(@$dt['Pendidikan'] >= $Syarat_BKD){
                                        $point = "Memenuhi 30% P2";
                                    }else{
                                        $point = "Belum Memenuhi";
                                    }
                            }else{
                                    if(@$dt['Points'] >=28){ $point=28; }else{ $point= max(@$dt['Points'],0); }
                            }
                  ?>
                  <fieldset>
                    <legend></legend>
                  <p><b>Poin P2 merupakan poin yang telah di setujui Ketua Prodi, Assesor 1 dan Assesor 2</b></p><br />
                  <div class="col-sm-2">
                    <label><u><span class="required">SYARAT BKD Anda</span></u></label><br />
                      <table border="0" cellpadding="20" cellspacing="2">
                            <tr>
                              <th>Pendidikan</th>
                              <td><?php echo '= '.$dt1['Syt_Pendidikan']; ?></td>
                            <tr/>
                            <tr>
                              <th>Penelitian</th>
                              <td><?php echo '= '.$dt1['Syt_Penelitian']; ?></td>
                            <tr/>
                            <tr>
                              <th>Pengabdian</th>
                              <td><?php echo '= '.$dt1['Syt_Pengabdian']; ?></td>
                            <tr/>
                            <tr>
                              <th>Penunjang</th>
                              <td><?php echo '= '.$dt1['Syt_Penunjang']; ?></td>
                            <tr/>
                      </table>
                    </div>

                    <div class="col-sm-2">
                      <label><u><span class="required">RBKD</span></u></label><br />
                        <table border="0" cellpadding="20" cellspacing="2">
                              <tr>
                                <th>Pendidikan</th>
                                <td><?php echo '= '.round(@$dt['Pendidikan'],2); ?></td>
                              </tr>
                              <tr>
                                <th>Penelitian</th>
                                <td><?php echo '= '.round(@$dt['Penelitian'],2); ?></td>
                              <tr/>
                              <tr>
                                <th>Pengabdian</th>
                                <td><?php echo '= '.round(@$dt['Pengabdian'],2); ?></td>
                              <tr/>
                              <tr>
                                <th>Penunjang</th>
                                <td><?php echo '= '.round(@$dt['Penunjang'],2); ?></td>
                              <tr/>
                        </table>
                      </div>

                      <div class="col-sm-2">
                        <label><u><span class="required">BKD</span></u></label><br />
                            <span class="required"><?php echo $hasilbkd; ?></span>
                        </div>

                      <div class="col-sm-3">
                        <label><u><span class="required">Pay For Position (P1)</span></u></label><br />
                            <span class="required"><?php echo $hasil_p1; ?></span>
                        </div>

                        <div class="col-sm-3">
                          <label><u><span class="required">Pay For Performance (P2)</span></u></label><br />
                            <span class="required"><?php echo $point; ?></span>
                          </div>
                  </fieldset>

                  <fieldset>
                    <legend></legend>
                      <a class="" href="javascript:void(0);" onclick="javascript:introJs().start();"> <span class="btn btn-md btn-danger">BACA Petunjuk Upload Laporan >></span> </a>
                    </fieldset>

              </div>
            </div>

              <!-- <a href="<?php echo base_url() ?>RencanaKerja/FormRencanaTambahan" class="btn btn-md btn-primary"> + Tambah Kegiatan Baru</a> -->
              <div class="row">
              <div class="form-group">
                <div class="col-sm-12 col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <b>List Rencana BKD</b><br />
                        <span class="text text-danger small">- Klik Tombol <i class="glyphicon glyphicon-arrow-right"></i> Untuk Membuat Laporan </span><br />
                        <span class="text text-danger small">- (<i class="fa fa-times"></i>) Belum di setujui Ketua Prodi </span>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" data-step="2" data-intro="Pilih All untuk menampilkan seluruh Rencana Kerja">
                      <div class="form-group">
                        <table class="table table-striped table-bordered myTable display nowrap" style="width:100%" data-step="1" data-intro="Ini adalah seluruh List Rencana Kerja Anda">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Kegiatan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $no=1; foreach($listrbkd as $option){ ?>
                                <tr>
                                  <th scope="row"><?php echo $no++; ?></th>
                                  <td><?php echo $option->kegiatan; ?></td>
                                  <td data-step="3" data-intro="Jika Laporan telah dibuka, maka status pada kolom ini adalah (Pelaporan BKD telah di buka)">
                                    <?php
                                    if($option->app_ketuaprodi==1 && $option->di_laporkan==1){
                                        echo '<span class="text text-success">Pelaporan BKD telah di buka</span>';
                                    }elseif($option->app_ketuaprodi==1 && $option->di_laporkan==0){
                                        echo '<span class="text text-primary">Telah di setujui Ketua Prodi</span>';
                                    }elseif($option->app_ketuaprodi==1 && $option->di_laporkan==2){
                                        echo '<span class="text text-danger text-sm">Sudah Upload Laporan</span>';
                                    }else{
                                        echo '<span class="text text-danger">Menunggu persetujuan Ketua Prodi</span>';
                                    }
                                    ?>
                                  </td>
                                  <td data-step="4" data-intro="Dan, akan muncul icon panah berwarna Biru. Klik untuk menuju link upload Berkas">
                                    <?php
                                    if($option->app_ketuaprodi==1 && $option->di_laporkan==1){
                                        $attr = array('target'=>'_blank');
                                        echo anchor('RencanaKerja/EditLaporan/'.$option->id_subkegiatan,'<span class="text text-primary" title="Upload Berkas"><i class="glyphicon glyphicon-arrow-right"></i></span>',$attr);
                                    }elseif($option->app_ketuaprodi==1 && $option->di_laporkan==0){ ?>
                                        <a href="#" onClick="return confirm('Maaf Laporan Periode Aktif masih di tutup')"><i class="fa fa-files-o" title="Laporan periode ini masih di tutup"></i></a>
                                    <?php
                                    }elseif($option->app_ketuaprodi==1 && $option->di_laporkan==2){ ?>
                                        <a href="#" onClick="return confirm('Laporan telah di upload, silahkan lihat pada tabel di bawah sesuai kategori BKD')"><i class="fa fa-check-square-o" title="Sudah Upload Laporan"></i></a>
                                    <?php
                                    }else{
                                        echo '<span class="text text-danger"><i class="fa fa-times" title="Menunggu Persetujuan Ketua Prodi"></i></span>';
                                    }
                                    ?>
                                  </td>
                                </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                        <fieldset>
                          <legend></legend>
                              <h5>Apabila sudah selesai melakukan seluruh Pelaporan(Upload File) atau selesai melakukan perbaikan laporan, <br />Silahkan Tekan tombol <b>"Selesai Laporan"</b> di bawah ini.</h5><br />
                              <?php
                                foreach($dilaporkan as $dl);
                                foreach($verifikator as $vr);
                              ?>
                              <?php //if ($dl->di_laporkan==1 && $vr->statuslaporan==0) {
                                if ($vr->lp_dosen==1 && $vr->statuslaporan==0) {
                              ?>
                                  <h5>Apabila sudah selesai melakukan seluruh Pelaporan(Upload File) <br />Silahkan Tekan tombol <b>"Selesai Upload Seluruh Laporan"</b> di bawah ini.</h5><br />
                                  <a href="<?php echo base_url() ?>RencanaKerja/SelesaiLaporan" class="btn btn-md btn-danger" data-step="5" data-intro="Terakhir, Usahakan anda telah upload berkas untuk seluruh kegiatan anda, baru kemudian menekan tombol di bawah." onClick="return confirm('Apakah anda sudah selesai input seluruh laporan?')"> <b>Selesai Upload Seluruh Laporan</b> </a>
                              <?php }elseif ($vr->lp_dosen==1 && $vr->statuslaporan==1) { ?>
                                    <a href="#" class="btn btn-md btn-success" onClick="return confirm('Laporan anda sedang di periksa')"> <b>Laporan anda sedang di periksa</b> </a>
                              <?php }elseif ($vr->p_assesor1==2) { ?>
                                  <h5>Apabila sudah selesai melakukan perbaikan <br />Silahkan Tekan tombol <b>"Selesai Memperbaiki"</b> di bawah ini.</h5><br />
                                  <a href="<?php echo base_url() ?>RencanaKerja/SelesaiLaporan_1" class="btn btn-md btn-danger" onClick="return confirm('Apakah anda sudah selesai memperbaiki laporan?')"> <b>Selesai Perbaikan Laporan</b> </a>
                              <?php }elseif ($vr->p_assesor2==2) { ?>
                                  <h5>Apabila sudah selesai melakukan perbaikan <br />Silahkan Tekan tombol <b>"Selesai Memperbaiki"</b> di bawah ini.</h5><br />
                                  <a href="<?php echo base_url() ?>RencanaKerja/SelesaiLaporan_2" class="btn btn-md btn-danger" onClick="return confirm('Apakah anda sudah selesai memperbaiki laporan?')"> <b>Selesai Perbaikan Laporan</b> </a>
                              <?php }else{ ?>
                                  <h5>Pelaporan masih ditutup</h5><br />
                              <?php } ?>
                          </fieldset>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
          </div>
        </div>

<!-- TAB PANEL  -->
<br /><br />
        <div class="row">
          <fieldset>
            <legend></legend>
                <h2>List Laporan Periode Aktif</h2><br />
            </fieldset>
          <div class="form-group">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#pendidikan_tab" class="bg-primary">PENDIDIKAN</a></li>
                    <li><a data-toggle="tab" href="#penelitian_tab" class="bg-primary">PENELITIAN</a></li>
                    <li><a data-toggle="tab" href="#pengabdian_tab" class="bg-primary">PENGABDIAN</a></li>
                    <li><a data-toggle="tab" href="#penunjang_tab" class="bg-primary">PENUNJANG</a></li>
                </ul>
              </div>
          </div>
          <div class="clearfix"></div>

          <div class="tab-content">
            <!--PENDIDIKAN  -->
                        <div id="pendidikan_tab" class="tab-pane fade in active">
                              <div class="x_panel">
                                <div class="x_title">
                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    + Tambah Kegiatan Baru
                                  </button>
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
                                        <th>BKD SKS</th>
                                        <th>Poin Remunerasi</th>
                                        <th>Bukti Fisik</th>
                                        <th>Laporan</th>
                                        <th>Verifikator</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach($rencanakerja as $dt){
                                        if($dt->bkd_hitung=='1' && $dt->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt->kegiatan."</span></b>";}
                                        if($dt->bkd_hitung=='1' && $dt->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt->kegiatan."</span></b>";}
                                        if($dt->bkd_hitung=='0' && $dt->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt->kegiatan."</span></b>";}
                                        $total[]=$dt->sks_subkegiatan;
                                        $poin[]=$dt->poin_subkegiatan;
                                        $subkegiatan = wordwrap($dt->sub_kegiatan, 65, "<br />\n");
                                      ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td>
                                          <a href="#"><?php echo wordwrap($kegiatans, 75, "<br />\n").'<br /><span>- '.strtolower($subkegiatan).'</span>'; ?></a>
                                        </td>
                                        <td><?php echo $dt->sks_subkegiatan; ?></td>
                                        <td><?php echo $dt->poin_subkegiatan; ?></td>
                                        <td>
                                          <?php
                                          if($dt->status_laporan==0){
                                              echo"- Belum Buat Laporan";
                                          }else{
                                              //$file = $dt->syarat_file;
                                              $file=explode('#',$dt->syarat_file);
                                              $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                                            'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                                foreach ($file as $key => $value) {
                                                    //echo str_replace("/"," ",$value)
                                                    echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt->id_subkegiatan.'-'.str_replace("/","_",$value),'<span>'.$value.'</span><br />',$atts);
                                                }
                                          }
                                          ?>
                                        </td>
                                        <td>
                                            <?php
                                            //Jika salah satu assesor menolak laporan
                                              if($dt->app_assesor1==2){
                                                echo anchor('RencanaKerja/EditLaporan2/'.$dt->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                                echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt->id_subkegiatan."-".$dt->app_assesor1,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                                echo '<br /><span class="text text-danger">Ditolak Assesor 1</span>';
                                                echo '<br />('.wordwrap($dt->komentar, 75, "<br />\n").')';
                                              }elseif($dt->app_assesor2==2){
                                                echo anchor('RencanaKerja/EditLaporan2/'.$dt->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                                echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt->id_subkegiatan."-".$dt->app_assesor2,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                                echo '<br /><span class="text text-danger">Ditolak Assesor 2</span>';
                                                echo '<br />('.wordwrap($dt->komentar, 75, "<br />\n").')';
                                          //Jika assesor 1 setuju dan assesor 2 menolak/belum memeriksa dan sebaliknya
                                              }elseif($dt->app_assesor1==1 && $dt->app_assesor2 !=1){
                                                echo '<br /><span class="text text-danger">Diterima Assesor 1</span>';
                                                echo '<br />('.wordwrap($dt->komentar, 75, "<br />\n").')';
                                              }elseif($dt->app_assesor2==1 && $dt->app_assesor1 !=1){
                                                echo '<br /><span class="text text-danger">Diterima Assesor 2</span>';
                                                echo '<br />('.wordwrap($dt->komentar, 75, "<br />\n").')';
                                        //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload dan lp_dosen =0
                                              }elseif($dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->lp_dosen==0){
                                                echo '<span class="text text-danger">'."laporan belum di buka".'</span>';

                                          //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                              }elseif($dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==0){
                                                echo anchor('RencanaKerja/EditLaporan/'.$dt->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                          //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                              }elseif($dt->app_assesor1==0 && $dt->app_assesor2==0 && $dt->status_laporan==1){
                                                echo anchor('RencanaKerja/EditLaporan2/'.$dt->id_subkegiatan,'<span>Edit File</span>');
                                          //Jika assesor 1 dan 2 menyetujui
                                              }elseif($dt->app_assesor1==1 && $dt->app_assesor2==1){
                                                echo '<span class="text text-danger">Diterima <br /> Assesor 1 & Assesor 2</span>';
                                              }else{
                                                echo '<span class="text text-danger">'-'</span>';
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
                                    <tfoot>
                                      <tr>
                                          <th colspan="2" style="text-align:right">Total:</th>
                                          <th><?php echo @array_sum($total); ?></th>
                                          <th><?php echo @array_sum($poin); ?></th>
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                      </tr>
                                  </tfoot>
                                  </table>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

            <!--PENELITIAN  -->
                        <div id="penelitian_tab" class="tab-pane fade">
                          <div class="x_panel">
                            <div class="x_title">
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                + Tambah Kegiatan Baru
                              </button>
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
                                    <th>BKD SKS</th>
                                    <th>Poin Remunerasi</th>
                                    <th>Bukti Fisik</th>
                                    <th>Laporan</th>
                                    <th>Verifikator</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach($penelitian as $dt1){
                                    if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt1->kegiatan."</span></b>";}
                                    if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt1->kegiatan."</span></b>";}
                                    if($dt1->bkd_hitung=='0' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt1->kegiatan."</span></b>";}
                                    $total1[]=$dt1->sks_subkegiatan;
                                    $poin1[]=$dt1->poin_subkegiatan;
                                    $subkegiatan1 = wordwrap($dt1->sub_kegiatan, 65, "<br />\n");
                                  ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>
                                      <a href="#"><?php echo wordwrap($kegiatans, 75, "<br />\n").'<br /><span>- '.strtolower($subkegiatan1).'</span>'; ?></a>
                                    </td>
                                    <td><?php echo $dt1->sks_subkegiatan; ?></td>
                                    <td><?php echo $dt1->poin_subkegiatan; ?></td>
                                    <td>
                                      <?php
                                      if($dt1->status_laporan==0){
                                          echo"- Belum Buat Laporan";
                                      }else{
                                          //$file = $dt->syarat_file;
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
                                        //Jika salah satu assesor menolak laporan
                                          if($dt1->app_assesor1==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt1->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt1->id_subkegiatan."-".$dt1->app_assesor1,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt1->komentar, 75, "<br />\n").')';
                                          }elseif($dt1->app_assesor2==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt1->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt1->id_subkegiatan."-".$dt1->app_assesor2,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt1->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 setuju dan assesor 2 menolak/belum memeriksa dan sebaliknya
                                          }elseif($dt1->app_assesor1==1 && $dt1->app_assesor2 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt1->komentar, 75, "<br />\n").')';
                                          }elseif($dt1->app_assesor2==1 && $dt1->app_assesor1 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt1->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload dan lp_dosen =0
                                          }elseif($dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->lp_dosen==0){
                                            echo '<span class="text text-danger">'."laporan belum di buka".'</span>';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                          }elseif($dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==0){
                                            echo anchor('RencanaKerja/EditLaporan/'.$dt1->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                          }elseif($dt1->app_assesor1==0 && $dt1->app_assesor2==0 && $dt1->status_laporan==1){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt1->id_subkegiatan,'<span>Edit File</span>');
                                      //Jika assesor 1 dan 2 menyetujui
                                          }elseif($dt1->app_assesor1==1 && $dt1->app_assesor2==1){
                                            echo '<span class="text text-danger">Diterima <br /> Assesor 1 & Assesor 2</span>';
                                          }else{
                                            echo '<span class="text text-danger">'-'</span>';
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
                                <tfoot>
                                  <tr>
                                      <th colspan="2" style="text-align:right">Total:</th>
                                      <th><?php echo @array_sum($total1); ?></th>
                                      <th><?php echo @array_sum($poin1); ?></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </tfoot>
                              </table>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
            <!--PENGABDIAN  -->
                        <div id="pengabdian_tab" class="tab-pane fade">
                          <div class="x_panel">
                            <div class="x_title">
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                + Tambah Kegiatan Baru
                              </button>
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
                                    <th>BKD SKS</th>
                                    <th>Poin Remunerasi</th>
                                    <th>Bukti Fisik</th>
                                    <th>Laporan</th>
                                    <th>Verifikator</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach($pengabdian as $dt2){
                                    if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt2->kegiatan."</span></b>";}
                                    if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt2->kegiatan."</span></b>";}
                                    if($dt2->bkd_hitung=='0' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt2->kegiatan."</span></b>";}
                                    $total2[]=$dt2->sks_subkegiatan;
                                    $poin2[]=$dt2->poin_subkegiatan;
                                    $subkegiatan2 = wordwrap($dt2->sub_kegiatan, 65, "<br />\n");
                                  ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>
                                      <a href="#">
                                          <a href="#"><?php echo wordwrap($kegiatans, 75, "<br />\n").'<br /><span>- '.strtolower($subkegiatan2).'</span>'; ?></a>
                                      </a>
                                    </td>
                                    <td><?php echo $dt2->sks_subkegiatan; ?></td>
                                    <td><?php echo $dt2->poin_subkegiatan; ?></td>
                                    <td>
                                      <?php
                                      if($dt2->status_laporan==0){
                                          echo"- Belum Buat Laporan";
                                      }else{
                                          //$file = $dt->syarat_file;
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
                                        //Jika salah satu assesor menolak laporan
                                          if($dt2->app_assesor1==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt2->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt2->id_subkegiatan."-".$dt2->app_assesor1,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt2->komentar, 75, "<br />\n").')';
                                          }elseif($dt2->app_assesor2==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt2->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt2->id_subkegiatan."-".$dt2->app_assesor2,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt2->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 setuju dan assesor 2 menolak/belum memeriksa dan sebaliknya
                                          }elseif($dt2->app_assesor1==1 && $dt2->app_assesor2 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt2->komentar, 75, "<br />\n").')';
                                          }elseif($dt2->app_assesor2==1 && $dt2->app_assesor1 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt2->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload dan lp_dosen =0
                                          }elseif($dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->lp_dosen==0){
                                            echo '<span class="text text-danger">'."laporan belum di buka".'</span>';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                          }elseif($dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==0){
                                            echo anchor('RencanaKerja/EditLaporan/'.$dt2->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                          }elseif($dt2->app_assesor1==0 && $dt2->app_assesor2==0 && $dt2->status_laporan==1){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt2->id_subkegiatan,'<span>Edit File</span>');
                                      //Jika assesor 1 dan 2 menyetujui
                                          }elseif($dt2->app_assesor1==1 && $dt2->app_assesor2==1){
                                            echo '<span class="text text-danger">Diterima <br /> Assesor 1 & Assesor 2</span>';
                                          }else{
                                            echo '<span class="text text-danger">'-'</span>';
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
                                <tfoot>
                                  <tr>
                                      <th colspan="2" style="text-align:right">Total:</th>
                                      <th><?php echo @array_sum($total2); ?></th>
                                      <th><?php echo @array_sum($poin2); ?></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </tfoot>
                              </table>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>

            <!--PENUNJANG  -->
                        <div id="penunjang_tab" class="tab-pane fade">
                          <div class="x_panel">
                            <div class="x_title">
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                + Tambah Kegiatan Baru
                              </button>
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
                                    <th>BKD SKS</th>
                                    <th>Poin Remunerasi</th>
                                    <th>Bukti Fisik</th>
                                    <th>Laporan</th>
                                    <th>Verifikator</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach($penunjang as $dt3){
                                    if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt3->kegiatan."</span></b>";}
                                    if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt3->kegiatan."</span></b>";}
                                    if($dt3->bkd_hitung=='0' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt3->kegiatan."</span></b>";}
                                    $total3[]=$dt3->sks_subkegiatan;
                                    $poin3[]=$dt3->poin_subkegiatan;
                                    $subkegiatan3 = wordwrap($dt3->sub_kegiatan, 65, "<br />\n");
                                  ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>
                                      <a href="#">
                                          <a href="#"><?php echo wordwrap($kegiatans, 75, "<br />\n").'<br /><span>- '.strtolower($subkegiatan3).'</span>'; ?></a>
                                      </a>
                                    </td>
                                    <td><?php echo $dt3->sks_subkegiatan; ?></td>
                                    <td><?php echo $dt3->poin_subkegiatan; ?></td>
                                    <td>
                                      <?php
                                      if($dt3->status_laporan==0){
                                          echo"- Belum Buat Laporan";
                                      }else{
                                          //$file = $dt->syarat_file;
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
                                        //Jika salah satu assesor menolak laporan
                                          if($dt3->app_assesor1==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt3->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt3->id_subkegiatan."-".$dt3->app_assesor1,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt3->komentar, 75, "<br />\n").')';
                                          }elseif($dt3->app_assesor2==2){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt3->id_subkegiatan,'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                            echo anchor('RencanaKerja/UpdatePerbaikan/'.$dt3->id_subkegiatan."-".$dt3->app_assesor2,'<span class="btn btn-sm btn-primary">Selesai</span>');
                                            echo '<br /><span class="text text-danger">Ditolak Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt3->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 setuju dan assesor 2 menolak/belum memeriksa dan sebaliknya
                                          }elseif($dt3->app_assesor1==1 && $dt3->app_assesor2 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 1</span>';
                                            echo '<br />('.wordwrap($dt3->komentar, 75, "<br />\n").')';
                                          }elseif($dt3->app_assesor2==1 && $dt3->app_assesor1 !=1){
                                            echo '<br /><span class="text text-danger">Diterima Assesor 2</span>';
                                            echo '<br />('.wordwrap($dt3->komentar, 75, "<br />\n").')';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload dan lp_dosen =0
                                          }elseif($dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->lp_dosen==0){
                                            echo '<span class="text text-danger">'."laporan belum di buka".'</span>';
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan belum upload
                                          }elseif($dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==0){
                                            echo anchor('RencanaKerja/EditLaporan/'.$dt3->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                      //Jika assesor 1 belum periksa dan assesor 2 belum periksa dan laporan sudah upload
                                          }elseif($dt3->app_assesor1==0 && $dt3->app_assesor2==0 && $dt3->status_laporan==1){
                                            echo anchor('RencanaKerja/EditLaporan2/'.$dt3->id_subkegiatan,'<span>Edit File</span>');
                                      //Jika assesor 1 dan 2 menyetujui
                                          }elseif($dt3->app_assesor1==1 && $dt3->app_assesor2==1){
                                            echo '<span class="text text-danger">Diterima <br /> Assesor 1 & Assesor 2</span>';
                                          }else{
                                            echo '<span class="text text-danger">'-'</span>';
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
                                <tfoot>
                                  <tr>
                                      <th colspan="2" style="text-align:right">Total:</th>
                                      <th><?php echo @array_sum($total3); ?></th>
                                      <th><?php echo @array_sum($poin3); ?></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </tfoot>
                              </table>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                </div>
                <!-- close Tab Content  -->
              </div>
        </div>
   </div>
