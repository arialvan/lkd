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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                          <td><?php echo $dt->pegawai.'<br /><span class="text text-danger">('.$dt->nip.')</span>'; ?></td>
                          <td><?php echo $dt->assesor1.'<br /><span class="text text-danger">('.$dt->assesor_1.')</span>'; ?></td>
                          <td><?php echo $dt->assesor2.'<br /><span class="text text-danger">('.$dt->assesor_2.')</span>'; ?></td>
                          <td><?php echo $dt->ketuaprodi.'<br /><span class="text text-danger">('.$dt->ketua_prodi.')</span>'; ?></td>
                          <td>
                              <?php echo anchor('Verifikator/EditVerifikator/'.$dt->id_verifikator,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('Verifikator/HapusVerifikator/'.$dt->id_verifikator,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
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
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                        foreach($verifikator_noset as $dt1){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt1->nama_peg.'<br /><span class="text text-danger">('.$dt1->nip.')</span>'; ?></td>
                          <td><?php echo '<span class="text text-danger">('.$dt1->assesor_1.')</span>'; ?></td>
                          <td><?php echo '<span class="text text-danger">('.$dt1->assesor_2.')</span>'; ?></td>
                          <td><?php echo '<span class="text text-danger">('.$dt1->ketua_prodi.')</span>'; ?></td>
                          <td>
                              <?php echo anchor('Verifikator/EditVerifikator/'.$dt1->id_verifikator,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('Verifikator/HapusVerifikator/'.$dt1->id_verifikator,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
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
