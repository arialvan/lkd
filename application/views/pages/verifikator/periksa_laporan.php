<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php //echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <fieldset>
                        <legend></legend>
                          <span><strong>HALAMAN ASSESOR</strong></span>
                      </fieldset>
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
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Status Laporan</th>
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
                                            if($dt->p_assesor1==1 && $dt->p_assesor2==1){
                                                echo '<span class="text text-danger"><b>Disetujui Assesor 1</b></span> <br />
                                                      <span class="text text-danger"><b>Disetujui Assesor 2</b></span>';
                                            }elseif($dt->p_assesor1==2 && $dt->p_assesor2==2){
                                                echo '<span class="text text-danger"><b>Ditolak Assesor 1</b></span><br />';
                                                echo '<span class="text text-danger"><b>Ditolak Assesor 2</b></span>';
                                            }elseif($dt->p_assesor1==1 && ($dt->p_assesor2==2 || $dt->p_assesor2==0)){
                                                echo '<span class="text text-danger"><b>Disetujui Assesor 1</b></span><br />
                                                      <span class="text text-danger"><b>Proses Assesor 2</b></span>';
                                            }elseif($dt->p_assesor2==1 && ($dt->p_assesor1==2 || $dt->p_assesor1==0)){
                                              echo '<span class="text text-danger"><b>Disetujui Assesor 2</b></span><br />
                                                    <span class="text text-danger"><b>Proses Assesor 1</b></span>';
                                            }elseif($dt->statuslaporan==1){
                                                echo '<span class="text text-danger"><b>Sudah Upload Laporan</b></span>';
                                            }else{
                                                echo '<span><b>Sedang Proses Upload Berkas</b></span>';
                                            }
                            ?>
                          </td>
                          <td>
                            <?php
                                  if($dt->p_assesor1==1){echo 'Assesor I <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor I <span class="glyphicon glyphicon-remove"></span><br />';}
                                  if($dt->p_assesor2==1){echo 'Assesor II <span class="glyphicon glyphicon-ok"></span><br />';}else{echo 'Assesor II <span class="glyphicon glyphicon-remove"></span><br />';}
                            ?>
                          </td>
                          <td>
                            <?php
                              if($dt->statuslaporan==1){
                                echo anchor('Verifikator/PeriksaLaporanDetailAssesor/'.$dt->nip,'<span class="btn btn-sm btn-primary" title="Lihat Data">Lihat Data</span>');
                              }else{
                                echo '-';
                              }
                            ?>
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
