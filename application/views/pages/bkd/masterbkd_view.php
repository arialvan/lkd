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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                    <h5>PENDIDIKAN</h5>
                  </div>
                  <div class="x_content">
                    <div class="warning kotak">
                      Tanda centang <span class='glyphicon glyphicon-check' title='Di hitung BKD'></span> menandakan kegiatan tersebut di hitung dalam perhitungan skema BKD
                    </div> <br />
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                          if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt1->kegiatan."</span></b>";}
                          if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt1->kegiatan."</span></b>";}
                          if($dt1->bkd_hitung=='0' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt1->kegiatan."</span></b>";}

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$this->pustaka->syarat($dt1->syarat); ?></th>
                          <td><?php echo $kegiatans; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt1->bkd_hitung); ?></td>
                          <td><?php echo $dt1->bkd_sks; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt1->renum_hitung); ?></td>
                          <td><?php echo $dt1->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt1->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt1->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_panel">
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <h5>PENELITIAN</h5>
              </div>
              <div class="x_content">
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                          if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt2->kegiatan."</span></b>";}
                          if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt2->kegiatan."</span></b>";}
                          if($dt2->bkd_hitung=='0' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt2->kegiatan."</span></b>";}

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$this->pustaka->syarat($dt2->syarat); ?></th>
                          <td><?php echo $kegiatans; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt2->bkd_hitung); ?></td>
                          <td><?php echo $dt2->bkd_sks; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt2->renum_hitung); ?></td>
                          <td><?php echo $dt2->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt2->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt2->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              <div class="clearfix"></div>
            </div>


            <div class="x_panel">
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <h5>PENGABDIAN</h5>
              </div>
              <div class="x_content">
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                          if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt3->kegiatan."</span></b>";}
                          if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt3->kegiatan."</span></b>";}
                          if($dt3->bkd_hitung=='0' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt3->kegiatan."</span></b>";}

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$this->pustaka->syarat($dt3->syarat); ?></th>
                          <td><?php echo $kegiatans; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt3->bkd_hitung); ?></td>
                          <td><?php echo $dt3->bkd_sks; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt3->renum_hitung); ?></td>
                          <td><?php echo $dt3->poin; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditSubBkd/'.$dt3->id_kegiatan,'<span class="btn-sm btn-success">Edit</span>'); ?>
                              <?php echo anchor('MasterBkd/HapusSubBkd/'.$dt3->id_kegiatan,'<span class="btn-sm btn-danger">Hapus</span>'); ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              <div class="clearfix"></div>
            </div>

            <div class="x_panel">
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <h5>PENUNJANG</h5>
              </div>
              <div class="x_content">
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                          if($dt4->bkd_hitung=='1' && $dt4->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt4->kegiatan."</span></b>";}
                          if($dt4->bkd_hitung=='1' && $dt4->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt4->kegiatan."</span></b>";}
                          if($dt4->bkd_hitung=='0' && $dt4->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt4->kegiatan."</span></b>";}

                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++.'&nbsp;&nbsp;'.$this->pustaka->syarat($dt4->syarat); ?></th>
                          <td><?php echo $kegiatans; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt4->bkd_hitung); ?></td>
                          <td><?php echo $dt4->bkd_sks; ?></td>
                          <td><?php echo $this->pustaka->syarat1($dt4->renum_hitung); ?></td>
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
