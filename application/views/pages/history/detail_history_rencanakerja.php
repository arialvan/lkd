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
                        foreach($syaratbkd as $dt1);
                        foreach($rekap_dosen as $dt);
                                $ntotal = array(@$dt['Pendidikan'],@$dt['Penelitian'],@$dt['Pengabdian'],@$dt['Penunjang']);
                                $sum_bkd = array_sum($ntotal);
                                //Hasil BKD
                                if(@$dt['Pendidikan'] >= $dt1['Syt_Pendidikan'] ){ $hasilbkd="Memenuhi"; }else{ $hasilbkd="Belum Memenuhi"; }
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
                          <p><b>Angka Poin P2 adalah hasil yang telah di setujui Ketua Prodi, Assesor 1 dan Assesor 2</b></p><br />
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
              </div>
        </div>
        <br /><br />

        <!-- TAB PANEL  -->
        <br /><br />
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <ul class="nav nav-tabs" id="myTab" data-step="1" data-intro="Tab Menu adalah Kegiatan yang sudah di kategorikan. Lanjutkan klik Next">
                            <li class="active"><a data-toggle="tab" href="#pendidikan_tab" class="bg-primary">PENDIDIKAN</a></li>
                            <li><a data-toggle="tab" href="#penelitian_tab" class="bg-primary">PENELITIAN</a></li>
                            <li><a data-toggle="tab" href="#pengabdian_tab" class="bg-primary">PENGABDIAN</a></li>
                            <li><a data-toggle="tab" href="#penunjang_tab" class="bg-primary">PENUNJANG</a></li>
                        </ul>
                      </div>
                  </div>
                  <div class="clearfix"></div>

                  <div class="tab-content">
                      <div id="pendidikan_tab" class="tab-pane fade in active">
                        <div class="x_panel">
                          <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content" data-step="2" data-intro="Tekan Show All untuk menampilkan semua kegiatan yang telah di isi.">

                            <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Kegiatan</th>
                                  <th>SKS</th>
                                  <th>Status</th>
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
                                  <th scope="row">
                                      <?php echo $no++; ?>
                                  </th>
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
                      </div>

<!-- PENELITIAN  -->
                      <div id="penelitian_tab" class="tab-pane fade">
                        <div class="x_panel">
                          <div class="x_title">
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
                                  <th scope="row">
                                      <?php echo $no++; ?>
                                  </th>
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
                      </div>

<!-- PENGABDIAN  -->
                      <div id="pengabdian_tab" class="tab-pane fade">
                        <div class="x_panel">
                          <div class="x_title">
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
                                  <th scope="row">
                                        <?php echo $no++; ?>
                                  </th>
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
                      </div>

<!-- PENUNJANG  -->
                      <div id="penunjang_tab" class="tab-pane fade">
                        <div class="x_panel">
                          <div class="x_title">
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
                                  <th scope="row">
                                      <?php echo $no++; ?>
                                  </th>
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
        </div>
   </div>
