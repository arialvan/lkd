<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <?php foreach($periode as $p); ?>
                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url() ?>MasterBkd/UpdateStatusRencanaAll/<?php echo $p->id_periode.'/'. 0; ?>" class="btn btn-md btn-danger" title="Tutup Pengisian Rencana Kerja Dosen" onclick="return confirm('Apakah Anda Ingin Menonaktifkan Seluruh Pengisian Rencana Kerja?')"><i class="fa fa-eye-slash"></i> >> Nonaktfikan Semua Pengisian Rencana Kerja</a>
                    <br />
                    <a href="<?php echo base_url() ?>MasterBkd/UpdateStatusRencanaAll/<?php echo $p->id_periode.'/'. 1; ?>" class="btn btn-md btn-primary" title="Tutup Pengisian Rencana Kerja Dosen" onclick="return confirm('Apakah Anda Ingin Mengaktifkan Seluruh Pengisian Rencana Kerja?')"><i class="fa fa-eye"></i> >> Aktifkan Semua Pengisian Rencana Kerja</a>
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
                          <th>NIP</th>
                          <th>NAMA</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($dosen as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nip; ?></td>
                          <td><?php echo $dt->nama_peg; ?></td>
                          <td>
                            <?php if($dt->rk_dosen==1){ ?>
                              <a href="<?php echo base_url() ?>MasterBkd/UpdateStatusRencana/<?php echo $dt->id_verifikator.'/'. 0; ?> " class="btn btn-primary" title="Status Saat Ini Aktif" onclick="return confirm('Apakah Anda Ingin Menonaktifkan Periode Ini ?')">Aktif</a>
                            <?php }else{ ?>
                              <a href="<?php echo base_url() ?>MasterBkd/UpdateStatusRencana/<?php echo $dt->id_verifikator.'/'. 1; ?> " class="btn btn-danger" title="Status Saat Ini Tidak Aktif" onclick="return confirm('Apakah Anda Ingin Aktifkan Periode Ini ?')">Non Aktif</a>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <!-- Modal Ubah -->
                </div>
<!-- END Modal Ubah -->
              </div>
          </div>
   </div>
