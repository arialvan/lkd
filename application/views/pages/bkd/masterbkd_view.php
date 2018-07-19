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
                    <a href="<?php echo base_url() ?>MasterBkd/FormBkd" class="btn btn-primary"> + Tambah BKD</a>
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
                          <th>Kategori BKD</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($bkd as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->ket_bkd; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditBkd/'.$dt->id_bkd,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('MasterBkd/HapusBkd/'.$dt->id_bkd,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
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
                    <a href="<?php echo base_url() ?>MasterBkd/FormSubBkd" class="btn btn-primary"> + Tambah SUB BKD</a>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <h5>Pendidikan</h5>
                    <div class="warning kotak">
                      Tanda centang <span class='glyphicon glyphicon-check' title='Di hitung BKD'></span> menandakan kegiatan tersebut di hitung dalam perhitungan skema BKD
                    </div> <br />
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Sub BKD</th>
                          <th>Hitung BKD</th>
                          <th>Satuan SKS</th>
                          <th>Hitung Remunerasi</th>
                          <th>Satuan Poin</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pendidikan as $dt1){
                        if($dt1->syarat=='1'){ $s="<span class='glyphicon glyphicon-check' title='Di hitung BKD'></span>";}else{ $s="<span></span>"; }
                        if($dt1->bkd_hitung=='1'){ $bkd="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $bkd="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }
                        if($dt1->renum_hitung=='1'){ $remun="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $remun="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$s; ?></th>
                          <td><?php echo $dt1->kegiatan; ?></td>
                          <td><?php echo $bkd; ?></td>
                          <td><?php echo $dt1->bkd_sks; ?></td>
                          <td><?php echo $remun; ?></td>
                          <td><?php echo $dt1->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt1->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt1->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <h5>Penelitian</h5>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Sub BKD</th>
                          <th>Hitung BKD</th>
                          <th>Satuan SKS</th>
                          <th>Hitung Remunerasi</th>
                          <th>Satuan Poin</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penelitian as $dt2){
                        if($dt2->syarat=='1'){ $s="<span class='glyphicon glyphicon-check' title='Di hitung BKD'></span>";}else{ $s="<span></span>"; }
                        if($dt2->bkd_hitung=='1'){ $bkd="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $bkd="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }
                        if($dt2->renum_hitung=='1'){ $remun="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $remun="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$s; ?></th>
                          <td><?php echo $dt2->kegiatan; ?></td>
                          <td><?php echo $bkd; ?></td>
                          <td><?php echo $dt2->bkd_sks; ?></td>
                          <td><?php echo $remun; ?></td>
                          <td><?php echo $dt2->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt2->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt2->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>


                    <h5>Pengabdian</h5>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Sub BKD</th>
                          <th>Hitung BKD</th>
                          <th>Satuan SKS</th>
                          <th>Hitung Remunerasi</th>
                          <th>Satuan Poin</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pengabdian as $dt3){
                        if($dt3->syarat=='1'){ $s="<span class='glyphicon glyphicon-check' title='Di hitung BKD'></span>";}else{ $s="<span></span>"; }
                        if($dt3->bkd_hitung=='1'){ $bkd="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $bkd="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }
                        if($dt3->renum_hitung=='1'){ $remun="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $remun="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$s; ?></th>
                          <td><?php echo $dt3->kegiatan; ?></td>
                          <td><?php echo $bkd; ?></td>
                          <td><?php echo $dt3->bkd_sks; ?></td>
                          <td><?php echo $remun; ?></td>
                          <td><?php echo $dt3->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt3->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt3->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <h5>Penunjang</h5>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Sub BKD</th>
                          <th>Hitung BKD</th>
                          <th>Satuan SKS</th>
                          <th>Hitung Remunerasi</th>
                          <th>Satuan Poin</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penunjang as $dt4){
                        if($dt4->syarat=='1'){ $s="<span class='glyphicon glyphicon-check' title='Di hitung BKD'></span>";}else{ $s="<span></span>"; }
                        if($dt4->bkd_hitung=='1'){ $bkd="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $bkd="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }
                        if($dt4->renum_hitung=='1'){ $remun="<span class='glyphicon glyphicon-ok' title='Ya'></span>";}else{ $remun="<span class='glyphicon glyphicon-remove' title='Tidak'></span>"; }

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$s; ?></th>
                          <td><?php echo $dt4->kegiatan; ?></td>
                          <td><?php echo $bkd; ?></td>
                          <td><?php echo $dt4->bkd_sks; ?></td>
                          <td><?php echo $remun; ?></td>
                          <td><?php echo $dt4->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt4->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt4->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
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
