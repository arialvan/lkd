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
                <fieldset>
                  <legend></legend>
                    <a class="btn btn-lg btn-danger" href="javascript:void(0);" onclick="javascript:introJs().start();">BACA Petunjuk Penggunaan Ketua Prodi</a>
                </fieldset>
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
                            <li><a data-toggle="tab" href="#selesai_tab" class="bg-primary" data-step="6" data-intro="Ke Menu Selesai dan Tekan Tombol Selesai Memeriksa Rencana Kerja ">SELESAI</a></li>
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
                            <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Verifikator/ApprovalKetuaProdi" id="nameform">
                            <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Kegiatan</th>
                                  <th>Volume/SKS</th>
                                  <th>Remunerasi</th>
                                  <th>Status</th>
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
                                      <input type="checkbox" id="cekbox" name="cekbox[]" value="<?php echo $dt->id_subkegiatan ?>" data-step="3" data-intro="Centang kegiatan yang akan di setujui atau ...." />
                                  </th>
                                  <td><a href="#"><?php echo wordwrap($dt->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan).')</span>'; ?></a></td>
                                  <td><?php echo $dt->sks_subkegiatan; ?></td>
                                  <td><?php echo $dt->poin_subkegiatan; ?></td>
                                  <td>
                                    <?php
                                          if($dt->app_ketuaprodi==1){
                                              echo '<span class="text text-sm text-success">Di Setujui Kaprodi</span>';
                                          }else{
                                              echo '<span class="text text-sm text-danger">Belum di periksa Kaprodi</span>';
                                          }
                                    ?>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            <div data-step="4" data-intro="Klik Select All untuk mencentang semua kegiatan.">
                               <input type="button" onclick="cek_pendidikan(this.form.cekbox)" value="Select All"  class="btn btn-sm btn-danger" />
                               <input type="button" onclick="uncek_pendidikan(this.form.cekbox)" value="Clear All" class="btn btn-sm btn-danger" /> <br /><br />
                               <input type="hidden" name="nip" value="<?php echo $this->uri->segment(3) ?>" />
                            </div>

                              <?php
                                foreach($cek_approve as $ca);
                                if($ca->p_kaprodi==0){
                              ?>
                                <button type="submit" form="nameform" class="btn btn-lg btn-success" value="Submit" data-step="5" data-intro="Tekan tombol Approved untuk menyetujui Rencana Kerja.">Approved Rencana Kerja</button>
                              <?php
                              }else{ echo '<h3>Sudah Diperiksa</h3>';}
                              ?>
                              </form>
                            <div id="result"></div>
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
                            <form method="post" action="<?php echo base_url(); ?>Verifikator/ApprovalKetuaProdi1" >
                            <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Kegiatan</th>
                                  <th>Volume/SKS</th>
                                  <th>Remunerasi</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                foreach($penelitian as $dt1){
                                  $subkegiatan = wordwrap($dt1->sub_kegiatan, 65, "<br />\n");
                                ?>
                                <tr>
                                  <th scope="row">
                                      <input type="checkbox" id="cekbox" name="cekbox1[]" value="<?php echo $dt1->id_subkegiatan ?>" data-step="3" data-intro="Centang kegiatan yang akan di setujui atau ...." />
                                  </th>
                                  <td><a href="#"><?php echo wordwrap($dt1->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan).')</span>'; ?></a></td>
                                  <td><?php echo $dt1->sks_subkegiatan; ?></td>
                                  <td><?php echo $dt1->poin_subkegiatan; ?></td>
                                  <td>
                                    <?php
                                          if($dt1->app_ketuaprodi==1){
                                              echo '<span class="text text-sm text-success">Di Setujui Kaprodi</span>';
                                          }else{
                                              echo '<span class="text text-sm text-danger">Belum di periksa Kaprodi</span>';
                                          }
                                    ?>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                               <input type="button" onclick="cek_penelitian(this.form.cekbox1)" value="Select All"  class="btn btn-sm btn-danger" />
                               <input type="button" onclick="uncek_penelitian(this.form.cekbox1)" value="Clear All" class="btn btn-sm btn-danger" /> <br /><br />
                               <input type="hidden" name="nip" value="<?php echo $this->uri->segment(3) ?>" />
                               <?php
                                 foreach($cek_approve as $ca);
                                 if($ca->p_kaprodi==0){
                               ?>
                                 <button type="submit" class="btn btn-lg btn-success">Approved Rencana Kerja</button>
                               <?php
                               }else{ echo '<h3>Sudah Diperiksa</h3>';}
                               ?>
                            </form>
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
                            <form method="post" action="<?php echo base_url(); ?>Verifikator/ApprovalKetuaProdi2" >
                              <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Kegiatan</th>
                                    <th>Volume/SKS</th>
                                    <th>Remunerasi</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach($pengabdian as $dt2){
                                    $subkegiatan = wordwrap($dt2->sub_kegiatan, 65, "<br />\n");
                                  ?>
                                  <tr>
                                    <th scope="row">
                                        <input type="checkbox" id="cekbox" name="cekbox2[]" value="<?php echo $dt2->id_subkegiatan ?>" data-step="3" data-intro="Centang kegiatan yang akan di setujui atau ...." />
                                    </th>
                                    <td><a href="#"><?php echo wordwrap($dt2->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan).')</span>'; ?></a></td>
                                    <td><?php echo $dt2->sks_subkegiatan; ?></td>
                                    <td><?php echo $dt2->poin_subkegiatan; ?></td>
                                    <td>
                                      <?php
                                            if($dt2->app_ketuaprodi==1){
                                                echo '<span class="text text-sm text-success">Di Setujui Kaprodi</span>';
                                            }else{
                                                echo '<span class="text text-sm text-danger">Belum di periksa Kaprodi</span>';
                                            }
                                      ?>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                               <input type="button" onclick="cek_pengabdian(this.form.cekbox2)" value="Select All"  class="btn btn-sm btn-danger" />
                               <input type="button" onclick="uncek_pengabdian(this.form.cekbox2)" value="Clear All" class="btn btn-sm btn-danger" /> <br /><br />
                               <input type="hidden" name="nip" value="<?php echo $this->uri->segment(3) ?>" />
                               <?php
                                 foreach($cek_approve as $ca);
                                 if($ca->p_kaprodi==0){
                               ?>
                                 <button type="submit" class="btn btn-lg btn-success">Approved Rencana Kerja</button>
                               <?php
                               }else{ echo '<h3>Sudah Diperiksa</h3>';}
                               ?>

                            </form>
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
                            <form method="post" action="<?php echo base_url(); ?>Verifikator/ApprovalKetuaProdi3" >
                              <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Kegiatan</th>
                                    <th>Volume/SKS</th>
                                    <th>Remunerasi</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  foreach($penunjang as $dt3){
                                    $subkegiatan = wordwrap($dt3->sub_kegiatan, 65, "<br />\n");
                                  ?>
                                  <tr>
                                    <th scope="row">
                                        <input type="checkbox" id="cekbox" name="cekbox3[]" value="<?php echo $dt3->id_subkegiatan ?>" data-step="3" data-intro="Centang kegiatan yang akan di setujui atau ...." />
                                    </th>
                                    <td><a href="#"><?php echo wordwrap($dt3->kegiatan, 75, "<br />\n").'<br /><span class="text text-danger">('.strtolower($subkegiatan).')</span>'; ?></a></td>
                                    <td><?php echo $dt3->sks_subkegiatan; ?></td>
                                    <td><?php echo $dt3->poin_subkegiatan; ?></td>
                                    <td>
                                      <?php
                                            if($dt3->app_ketuaprodi==1){
                                                echo '<span class="text text-sm text-success">Di Setujui Kaprodi</span>';
                                            }else{
                                                echo '<span class="text text-sm text-danger">Belum di periksa Kaprodi</span>';
                                            }
                                      ?>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                               <input type="button" onclick="cek_penunjang(this.form.cekbox3)" value="Select All"  class="btn btn-sm btn-danger" />
                               <input type="button" onclick="uncek_penunjang(this.form.cekbox3)" value="Clear All" class="btn btn-sm btn-danger" /> <br /><br />
                               <input type="hidden" name="nip" value="<?php echo $this->uri->segment(3) ?>" />

                               <?php
                                 foreach($cek_approve as $ca);
                                 if($ca->p_kaprodi==0){
                               ?>
                                 <button type="submit" class="btn btn-lg btn-success">Approved Rencana Kerja</button>
                               <?php
                               }else{ echo '<h3>Sudah Diperiksa</h3>';}
                               ?>
                            </form>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>

                      <div id="selesai_tab" class="tab-pane fade">
                        <div class="x_panel">
                          <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <?php
                              foreach($cek_approve as $ca);
                              if($ca->p_kaprodi==0){
                            ?>
                              <a href="<?php echo base_url() ?>Verifikator/ProdiApproved/<?php echo $this->uri->segment(3) ?>" class="btn btn-md btn-success">Klik >> Selesai Memeriksa Rencana Kerja</a>
                            <?php }else{ ?>
                              <a href="<?php echo base_url() ?>Verifikator/ProdiReset/<?php echo $this->uri->segment(3).'/'.$ca->id_periode ?>" class="btn btn-md btn-danger">Klik >> Reset Semua Pemeriksaan</a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
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
