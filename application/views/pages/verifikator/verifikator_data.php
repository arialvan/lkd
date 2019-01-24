<div class="right_col" role="main">
          <div class="">

            <div class="form-group">
              <div class="col-sm-12 col-md-12 col-xs-12" data-step="1" data-intro="Ini adalah Tab Menu Rencana Kerja yang sudah di kategorikan">
                  <ul class="nav nav-tabs" id="myTab">
                      <li class="active"><a data-toggle="tab" href="#ketuap" class="bg-primary">Ketua Prodi</a></li>
                      <li><a data-toggle="tab" href="#assesorsatu" class="bg-primary">Assesor 1</a></li>
                      <li><a data-toggle="tab" href="#assesordua" class="bg-primary">Assesor 2</a></li>
                  </ul>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="tab-content">
              <!--Ketua Prodi  -->
                          <div id="ketuap" class="tab-pane fade in active">
                            <div class="col-md-12 col-sm-12 col-xs-12">
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
                                          <th>Nip</th>
                                          <th>Nama</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($ketuaprodi as $dt){
                                        ?>
                                        <tr>
                                          <th scope="row"><?php echo $no++; ?></th>
                                          <td><?php echo $dt->ketua_prodi; ?></td>
                                          <td><?php echo $dt->ketuaprodi; ?></td>
                                        </tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                          </div>
                        </div>

                        <div id="assesorsatu" class="tab-pane fade">
                          <div class="col-md-12 col-sm-12 col-xs-12">
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
                                        <th>Nip</th>
                                        <th>Nama</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach($asse1 as $dt1){
                                      ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $dt1->assesor_1; ?></td>
                                        <td><?php echo $dt1->assesor1; ?></td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div id="assesordua" class="tab-pane fade">
                          <div class="col-md-12 col-sm-12 col-xs-12">
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
                                        <th>Nip</th>
                                        <th>Nama</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach($asse2 as $dt2){
                                      ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $dt2->assesor_2; ?></td>
                                        <td><?php echo $dt2->assesor2; ?></td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>

                    </div>
          </div>
   </div>
