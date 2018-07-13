<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3> <a href="<?php echo base_url() ?>MasterBkd/FormRenumerasi" class="btn btn-primary"> <i class="fa fa-gear"></i> Pengaturan Remunerasi</a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <b></b>
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
                          <th>Periode</th>
                          <th>Keterangan Periode</th>
                          <th>Kegiatan</th>
                          <th>BKD Hitung</th>
                          <th>BKD SKS</th>
                          <th>Renumersi Hitung</th>
                          <th>Renumersi Tarif</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($remun as $dt1){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt1->periode; ?></td>
                          <td><?php echo $dt1->ket_periode; ?></td>
                          <td><?php echo $dt1->kegiatan; ?></td>
                          <td><?php echo $dt1->bkd_hitung; ?></td>
                          <td><?php echo $dt1->bkd_sks; ?></td>
                          <td><?php echo $dt1->renum_hitung; ?></td>
                          <td><?php echo $dt1->renum_tarif; ?></td>
                          <td>
                              <?php echo anchor('MasterBkd/EditRenumerasi/'.$dt1->id_subkegiatan,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('MasterBkd/HapusRenumerasi/'.$dt1->id_subkegiatan,'<span class="glyphicon glyphicon-refresh" title="Reset Password"></span>'); ?>
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
