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
                      <a href="<?php echo base_url() ?>Master/FormPeriode" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah Periode</a>
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
                          <th>Periode</th>
                          <th>Edit</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($periodelkd as $dt){
                          //  if($dt->status==1){$status="Aktif";}else {$status="Tidak Aktif";}
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->periode.' - '.$dt->ket_periode; ?></td>
                          <td>
                              <?php echo anchor('Master/EditPeriode/'.$dt->id_periode,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php //echo anchor('Master/HapusPeriode/'.$dt->id_periode,'<span class="glyphicon glyphicon-remove" title="Hapus Periode"></span>'); ?>
                          </td>
                          <td>
                              <?php if($dt->status==1){ ?>
                                <a href="<?php echo base_url() ?>Master/UpdateStatusPeriode/<?php echo $dt->id_periode.'/'. 0; ?> " class="btn btn-primary" title="Status Saat Ini Aktif" onclick="return confirm('Apakah Anda Ingin Menonaktifkan Periode Ini ?')">Aktif</a>
                              <?php }else{ ?>
                                <a href="<?php echo base_url() ?>Master/UpdateStatusPeriode/<?php echo $dt->id_periode.'/'. 1; ?> " class="btn btn-danger" title="Status Saat Ini Aktif" onclick="return confirm('Apakah Anda Ingin Aktifkan Periode Ini ?')">Non Aktif</a>
                              <?php } ?>
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
