<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url() ?>MasterBkd/FormKatDosen" class="btn btn-primary"> + Tambah Kategori Dosen</a>
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
                          <th>Kategori Dosen</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($dosen as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->kategori_dosen; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditKatDosen/'.$dt->id_kat_dosen,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('MasterBkd/HapusKatDosen/'.$dt->id_kat_dosen,'<span class="glyphicon glyphicon-remove" title="Hapus Data" Onclick="return ConfirmDelete()"></span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

<!-- SUB BKD -->
                <div class="x_panel">
                  <div class="x_title">
                    <span>Klik Tombol Atur untuk mengatur skema BKD dan Remunerasi periode aktif.</span><br /><br />
                    <a href="<?php echo base_url() ?>MasterBkd/FormSkema" class="btn btn-primary">Atur Skema</a>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <h5>Skema BKD dan Remunerasi Dosen</h5>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2">#</th>
                          <th rowspan="2">Kategori Dosen</th>
                          <th colspan="4">BKD (sks)</th>
                          <th colspan="4">Remunerasi (poin)</th>
                            <tr>
                                <td>Pendidikan</td>
                                <td>Penelitian</td>
                                <td>Pengabdian</td>
                                <td>Penunjang</td>
                                <td>Pendidikan</td>
                                <td>Penelitian</td>
                                <td>Pengabdian</td>
                                <td>Penunjang</td>
                              </tr>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach($bkdremun as $dt){
                          ?>
                          <tr>
                              <th scope="row"><?php echo $no++; ?></th>
                              <td bgcolor="#FFFFF0">
                                <?php echo anchor('MasterBkd/EditSkema/'.$dt->id_kat_dosen,'<span class="text text-success">'.$dt->kategori_dosen.'</span>'); ?>
                              </td>
                              <td>
                                <?php echo $dt->Pendidikan; ?>
                              </td>
                              <td><?php echo $dt->Penelitian; ?></td>
                              <td><?php echo $dt->Pengabdian; ?></td>
                              <td><?php echo $dt->Penunjang; ?></td>
                              <td><?php echo $dt->Pendidikans; ?></td>
                              <td><?php echo $dt->Penelitians; ?></td>
                              <td><?php echo $dt->Pengabdians; ?></td>
                              <td><?php echo $dt->Penunjangs; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                  </div>
                  <div class="clearfix"></div>
                </div>

              </div>
   </div>
