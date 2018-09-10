<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php //echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h4>Laporan Yang Disetujui Oleh Asessor 1 dan Asessor 2 </h4>
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
                          <th>Assesor</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pegawai as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nip; ?></td>
                          <td>
                              <?php echo $dt->pegawai; ?>
                              <?php echo '<br /><span class="text text-danger">'.$dt->kategori_dosen.'</span>'; ?>
                          </td>
                          <td>
                            <?php
                              echo '<span class="text">1.'.$dt->assesor1.'</span><br />';
                              echo '<span class="text">2.'.$dt->assesor2.'</span>';
                            ?>
                          </td>
                          <td>
                              <?php echo anchor('Verifikator/PeriksaLaporanDetail/'.$dt->nip,'<span class="btn btn-sm btn-primary" title="Lihat Data">Cetak Data</span>'); ?>
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
