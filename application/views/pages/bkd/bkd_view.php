<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3> <a href="<?php echo base_url() ?>RencanaKerja/FormRencana" class="btn btn-primary"> + Form Pengisian BKD</a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                          <td><?php echo $dt->sub_kegiatan; ?></td>
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
                </div>

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
                          <td><?php echo $dt1->sub_kegiatan; ?></td>
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
                          <td><?php echo $dt2->sub_kegiatan; ?></td>
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
                          <td><?php echo $dt3->sub_kegiatan; ?></td>
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
