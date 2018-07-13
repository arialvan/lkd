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
                      <a href="<?php echo base_url() ?>Verifikator/Formverifikator" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah Verifikator</a>
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
                          <th>Nama</th>
                          <th>Assesor I</th>
                          <th>Assesor II</th>
                          <th>Ketua Prodi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($verifikator as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->pegawai; ?></td>
                          <td><?php echo $dt->assesor1; ?></td>
                          <td><?php echo $dt->assesor2; ?></td>
                          <td><?php echo $dt->ketuaprodi; ?></td>
                          <td>
                              <?php echo anchor('Verifikator/EditVerifikator/'.$dt->id_verifikator,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('Master/HapusVerifikator/'.$dt->id_verifikator,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
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
