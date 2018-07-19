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
                        foreach($verifikator as $d)
                          {
                            echo'<ul><li><h5>Ketua Prodi  =  '.$d->ketuaprodi.'</h5></li>';
                            echo'<li><h5>Assesor I  = '.$d->assesor1.'</h5></li>';
                            echo'<li><h5>Assesor 2  = '.$d->assesor2.'</h5></li></ul>';
                          }
                      ?>
              </div>
              <a href="<?php echo base_url() ?>RencanaKerja/FormRencana" class="btn btn-primary"> + Form Pengisian BKD</a>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>App Ketua Prodi</th>
                          <th>App Assesor 1</th>
                          <th>App Assesor 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($rencanakerja as $dt){
                          $total[]=$dt->sks_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id="<?php echo $dt->id_subkegiatan ?>"
                                data-subkegiatan="<?php echo $dt->sub_kegiatan ?>"
                                data-sks="<?php echo $dt->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan" class="text text-success">
                                <?php echo $dt->sub_kegiatan; ?>
                            </a>
                          </td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td><?php echo $dt->app_ketuaprodi; ?></td>
                          <td><?php echo $dt->app_assesor1; ?></td>
                          <td><?php echo $dt->app_assesor2; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total); ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>

<!-- MODAL PENDIDIKAN -->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-pendidikan" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                  <h4 class="modal-title">Ubah Data</h4>
                              </div>
                              <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/UpdateRencana">
                                <input type="hidden" class="form-control" id="id" name="id" />
                                <div class="modal-body">
                  	                    <div class="form-group">
                  	                        <label class="col-lg-2 col-sm-2 control-label">Kegiatan</label>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>App Ketua Prodi</th>
                          <th>App Assesor 1</th>
                          <th>App Assesor 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penelitian as $dt1){
                          $total1[]=$dt1->sks_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id="<?php echo $dt1->id_subkegiatan ?>"
                                data-subkegiatan="<?php echo $dt1->sub_kegiatan ?>"
                                data-sks="<?php echo $dt1->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan" class="text text-success">
                                <?php echo $dt1->sub_kegiatan; ?>
                            </a>
                          </td>
                          <td><?php echo $dt1->sks_subkegiatan; ?></td>
                          <td><?php echo $dt1->app_ketuaprodi; ?></td>
                          <td><?php echo $dt1->app_assesor1; ?></td>
                          <td><?php echo $dt1->app_assesor2; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total1); ?></th>
                            <th></th>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>App Ketua Prodi</th>
                          <th>App Assesor 1</th>
                          <th>App Assesor 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pengabdian as $dt2){
                          $total2[]=$dt2->sks_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id="<?php echo $dt2->id_subkegiatan ?>"
                                data-subkegiatan="<?php echo $dt2->sub_kegiatan ?>"
                                data-sks="<?php echo $dt2->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan" class="text text-success">
                                <?php echo $dt2->sub_kegiatan; ?>
                            </a>
                          </td>
                          <td><?php echo $dt2->sks_subkegiatan; ?></td>
                          <td><?php echo $dt2->app_ketuaprodi; ?></td>
                          <td><?php echo $dt2->app_assesor1; ?></td>
                          <td><?php echo $dt2->app_assesor2; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total2); ?></th>
                            <th></th>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>App Ketua Prodi</th>
                          <th>App Assesor 1</th>
                          <th>App Assesor 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penunjang as $dt3){
                          $total3[]=$dt3->sks_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id="<?php echo $dt3->id_subkegiatan ?>"
                                data-subkegiatan="<?php echo $dt3->sub_kegiatan ?>"
                                data-sks="<?php echo $dt3->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan" class="text text-success">
                                <?php echo $dt3->sub_kegiatan; ?>
                            </a>
                          </td>
                          <td><?php echo $dt3->sks_subkegiatan; ?></td>
                          <td><?php echo $dt3->app_ketuaprodi; ?></td>
                          <td><?php echo $dt3->app_assesor1; ?></td>
                          <td><?php echo $dt3->app_assesor2; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total3); ?></th>
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
   </div>
