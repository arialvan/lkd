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
                          <th>Action</th>
                          <th>Reset</th>
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
                                if($dt->admin_periksa==1){
                                    echo'<span class="text text-primary" title="Selesai">Selesai Diperiksa</span>';
                                }else{
                                    echo anchor('AdminFakultas/PeriksaLaporanDetail/'.$dt->nip,'<span class="btn btn-sm btn-primary" title="Lihat Data">Lihat Data</span>');
                                }
                              ?>
                          </td>
                          <td>
                              <?php
                              $atts = array('width'=> 900,'height'=> 600,'scrollbars'=> 'yes','status'=> 'yes','resizable'=> 'yes',
                                            'screenx'=> 0,'screeny'=> 0,'window_name' => '_blank'
                                            );
                                if($dt->admin_periksa==1){
                                  echo anchor_popup('AdminFakultas/PeriksaLaporanDetail/'.$dt->nip,'<span class="btn btn-sm btn-warning" title="Update Data">Update</span>', $atts);
                                }else{
                                  echo'-';
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
