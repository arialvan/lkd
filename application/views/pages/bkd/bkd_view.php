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
                      <?php
                        foreach($verifikator as $d)
                          {
                            echo'<ul><li><h5>Ketua Prodi  =  '.$d->ketuaprodi.'</h5></li>';
                            echo'<li><h5>Assesor I  = '.$d->assesor1.'</h5></li>';
                            echo'<li><h5>Assesor 2  = '.$d->assesor2.'</h5></li></ul>';
                          }
                      ?>
                      <br />
                      <?php
                    //  echo $this->session->userdata('kat_dosen');
                        foreach($syaratbkd as $v); //sks bkd_remundosen
                        foreach($syaratsubbkd as $k); //sks sub_bkdkegiatan
                        // echo $k->subsks.'-'.$v->sks;
                        $poinremun = $k->subsks - $v->sks; //

                        if($poinremun >= $v->sks){ $sks='Memenuhi'; }else{ $sks='Belum Memenuhi'; }
                        $poins = $poinremun;

                      ?>
                      <fieldset>
                        <legend></legend>

                          <div class="col-sm-3">
                            <label><u><span class="required">SYARAT BKD Anda</span></u></label><br />
                              <table border="0" cellpadding="20" cellspacing="2">
                                  <?php
                                      foreach ($bkd_syarat as $x){
                                        $sytbkd[]=$x->sks_bkd;
                                  ?>
                                    <tr>
                                    <th><?php echo $x->ket_bkd; ?></th>
                                    <td><?php echo '= '.$x->sks_bkd; ?></td>
                                    <tr/>
                                  <?php } ?>
                              </table>
                            </div>

                            <div class="col-sm-3">
                              <label><u><span class="required">RBKD</span></u></label><br />
                                <table border="0" cellpadding="20" cellspacing="2">
                                    <?php foreach ($syt_pendidikan as $x1); ?>
                                    <?php foreach ($syt_penelitian as $x2); ?>
                                    <?php foreach ($syt_pengabdian as $x3); ?>
                                    <?php foreach ($syt_penunjang as $x4); ?>
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
                                <label><u><span class="required">HASIL</span></u></label><br />
                                  <table border="0" cellpadding="20" cellspacing="2">
                                    <?php
                                    if(!empty($sytbkd)){
                                      if($x1->skspendidikan >= $sytbkd[0]){ $hasil_pendidikan='OK'; }else{ $hasil_pendidikan='Belum Memenuhi'; }
                                      if($x2->skspenelitan >= $sytbkd[1]){ $hasil_penelitian='OK'; }else{ $hasil_penelitian='Belum Memenuhi'; }
                                      if($x3->skspengabdian >= $sytbkd[2]){ $hasil_pengabdian='OK'; }else{ $hasil_pengabdian='Belum Memenuhi'; }
                                      if($x4->skspenunjang >= $sytbkd[3]){ $hasil_penunjang='OK'; }else{ $hasil_penunjang='Belum Memenuhi'; }
                                    }else{
                                      $hasil_pendidikan='Belum Memenuhi'; $hasil_penelitian='Belum Memenuhi'; $hasil_pengabdian='Belum Memenuhi'; $hasil_penunjang='Belum Memenuhi';
                                    }
                                    ?>
                                        <tr>
                                          <th>Pendidikan</th>
                                          <td><?php echo '= '.$hasil_pendidikan; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Penelitian</th>
                                          <td><?php echo '= '.$hasil_penelitian; ?></td>
                                        <tr/>
                                        <tr>
                                          <th>Pengabdian</th>
                                          <td><?php echo '= '.$hasil_pengabdian; ?></td>
                                        <tr/>
                                        <tr>
                                          <th>Penunjang</th>
                                          <td><?php echo '= '.$hasil_penunjang; ?></td>
                                        <tr/>
                                  </table>
                                </div>

                          <div class="col-sm-3">
                            <label>Poin Remunerasi<span class="required">  : </span></label>
                              <?php if($k->subsks < $v->sks){ ?>
                                <span><strong><?php echo $sks; ?></strong> </span>
                              <?php }else{ ?>
                                <span><strong><?php echo number_format($poins,2); ?></strong> </span>
                              <?php } ?>
                          </div>

                      </fieldset>
              </div>
              <a href="<?php echo base_url() ?>RencanaKerja/FormRencana" class="btn btn-lg btn-primary"> + Pengisian BKD</a>
              <hr />
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
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>App Ketua Prodi</th>
                          <th>Action</th>
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
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt->sub_kegiatan ?>"
                                data-sks="<?php echo $dt->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $kegiatans.'<br /><span>- '.$dt->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td><?php echo $dt->poin_subkegiatan; ?></td>
                          <td><?php echo $this->pustaka->periksa($dt->app_ketuaprodi); ?></td>
                          <td>
                            <?php
                              if($dt->app_ketuaprodi==1){
                                echo '<span class="glyphicon glyphicon-check" title="OK"></span>';
                              }else{
                                echo anchor('RencanaKerja/HapusSubkegiatan/'.$dt->id_subkegiatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data" Onclick="return ConfirmDelete()"></span>');
                              }
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
                        </tr>
                    </tfoot>
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
                    <!-- <table id="datatable-buttons" class="table table-striped table-bordered myTable"> -->
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>App Ketua Prodi</th>
                          <th>Action</th>
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
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt1->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt1->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt1->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt1->sub_kegiatan ?>"
                                data-sks="<?php echo $dt1->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $kegiatans.'<br /><span>- '.$dt1->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt1->sks_subkegiatan; ?></td>
                          <td><?php echo $dt1->poin_subkegiatan; ?></td>
                          <td><?php echo $this->pustaka->periksa($dt1->app_ketuaprodi); ?></td>
                          <td>
                            <?php
                              if($dt1->app_ketuaprodi==1){
                                echo '<span class="glyphicon glyphicon-check" title="OK"></span>';
                              }else{
                                echo anchor('RencanaKerja/HapusSubkegiatan/'.$dt1->id_subkegiatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data" Onclick="return ConfirmDelete()"></span>');
                              }
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
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

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
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>App Ketua Prodi</th>
                          <th>Action</th>
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
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt2->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt2->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt2->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt2->sub_kegiatan ?>"
                                data-sks="<?php echo $dt2->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $kegiatans.'<br /><span>- '.$dt2->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt2->sks_subkegiatan; ?></td>
                          <td><?php echo $dt2->poin_subkegiatan; ?></td>
                          <td><?php echo $this->pustaka->periksa($dt2->app_ketuaprodi); ?></td>
                          <td>
                            <?php
                              if($dt2->app_ketuaprodi==1){
                                echo '<span class="glyphicon glyphicon-check" title="OK"></span>';
                              }else{
                                echo anchor('RencanaKerja/HapusSubkegiatan/'.$dt2->id_subkegiatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data" Onclick="return ConfirmDelete()"></span>');
                              }
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
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>


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
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>App Ketua Prodi</th>
                          <th>Action</th>
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
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt3->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt3->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt3->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt3->sub_kegiatan ?>"
                                data-sks="<?php echo $dt3->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $kegiatans.'<br /><span>- '.$dt3->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt3->sks_subkegiatan; ?></td>
                          <td><?php echo $dt3->poin_subkegiatan; ?></td>
                          <td><?php echo $this->pustaka->periksa($dt3->app_ketuaprodi); ?></td>
                          <td>
                            <?php
                              if($dt3->app_ketuaprodi==1){
                                echo '<span class="glyphicon glyphicon-check" title="OK"></span>';
                              }else{
                                echo anchor('RencanaKerja/HapusSubkegiatan/'.$dt3->id_subkegiatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data" Onclick="return ConfirmDelete()"></span>');
                              }
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
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

          </div>

          <!-- MODAL PENDIDIKAN -->
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-pendidikan" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                            <h4 class="modal-title">Ubah Data</h4>
                                        </div>
                                        <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/UpdateRencana">
                                          <input type="hidden" class="form-control" id="id_kegiatan" name="id_kegiatan" />
                                          <input type="hidden" class="form-control" id="id_subkegiatan" name="id_subkegiatan" />
                                          <div class="modal-body">
                                                  <div class="form-group">
                                                      <label class="col-lg-2 col-sm-2 control-label">Kegiatan</label>
                                                      <div class="col-lg-10">
                                                          <input type="text" class="form-control" id="kegiatan" name="kegiatan" disabled />
                                                      </div>
                                                  </div>
                            	                    <div class="form-group">
                            	                        <label class="col-lg-2 col-sm-2 control-label">Sub Kegiatan</label>
                            	                        <div class="col-lg-10">
                            	                            <input type="text" class="form-control" id="subkegiatan" name="subkegiatan" />
                            	                        </div>
                            	                    </div>
                            	                    <div class="form-group">
                            	                        <label class="col-lg-2 col-sm-2 control-label">SKS</label>
                            	                        <div class="col-lg-10">
                            	                        	<input type="text" class="form-control" id="sks" name="sks" />
                            	                        </div>
                            	                    </div>
                            	                </div>
                            	                <div class="modal-footer">
                            	                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            	                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            	                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                          </div>
   </div>
