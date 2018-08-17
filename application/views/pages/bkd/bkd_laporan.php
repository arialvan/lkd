<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <a href="<?php echo base_url() ?>RencanaKerja/FormRencanaTambahan" class="btn btn-lg btn-primary"> + Tambah Kegiatan Baru</a>
<!--
=========================
PENDIDIKAN
=========================
-->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENDIDIKAN</b>
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
                          <th>Kegiatan</th>
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>Bukti Fisik</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($rencanakerja as $dt){
                          if($dt->bkd_hitung=='1' && $dt->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt->kegiatan."</span></b>";}
                          if($dt->bkd_hitung=='1' && $dt->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt->kegiatan."</span></b>";}
                          if($dt->bkd_hitung=='0' && $dt->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt->kegiatan."</span></b>";}
                          $total[]=$dt->sks_subkegiatan;
                          $poin[]=$dt->poin_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="#"><?php echo $kegiatans.'<br /><span>- '.$dt->sub_kegiatan.'</span>'; ?></a>
                          </td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td><?php echo $dt->poin_subkegiatan; ?></td>
                          <td>
                            <?php
                                $file = $dt->syarat_file;
                                $file=explode('#',$dt->syarat_file);
                                foreach ($file as $key => $value) {
                                          echo $value."<br />";
                                }
                            ?>
                          </td>
                          <td>
                              <?php
                                //if($dt->status_laporan==0 || $dt->status_laporan==4 || $dt->status_laporan==5){
                                if($dt->status_laporan==4 || $dt->status_laporan==5){
                                  echo anchor('RencanaKerja/EditLaporan/'.$dt->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                }elseif($dt->status_laporan==1){
                                  echo anchor('RencanaKerja/EditLaporan2/'.$dt->id_subkegiatan,'<span>Lihat File</span>');
                                }else{
                                  echo '<span class="text text-danger">'.$this->pustaka->p_laporan($dt->statuslaporan).'</span>';
                                }
                              ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total); ?></th>
                            <th><?php echo @array_sum($poin); ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
              </div>
<!--
  =========================
  PENELTIAN
  =========================
-->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENELITIAN</b>
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
                          <th>Kegiatan</th>
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>Bukti Fisik</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penelitian as $dt1){
                          if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt1->kegiatan."</span></b>";}
                          if($dt1->bkd_hitung=='1' && $dt1->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt1->kegiatan."</span></b>";}
                          if($dt1->bkd_hitung=='0' && $dt1->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt1->kegiatan."</span></b>";}
                          $total1[]=$dt1->sks_subkegiatan;
                          $poin1[]=$dt1->poin_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <?php echo $kegiatans.'<br /><span class="text text-danger">- '.$dt1->sub_kegiatan.'</span>'; ?>
                          </td>
                          <td><?php echo $dt1->sks_subkegiatan; ?></td>
                          <td><?php echo $dt1->poin_subkegiatan; ?></td>
                          <td>
                            <?php
                                $file = $dt1->syarat_file;
                                $file=explode('#',$dt1->syarat_file);
                                foreach ($file as $key => $value) {
                                          echo $value."<br />";
                                }
                                // echo $namafile;
                            ?>
                          </td>
                          <td>
                              <?php
                                //if($dt->status_laporan==0 || $dt->status_laporan==4 || $dt->status_laporan==5){
                                if($dt1->status_laporan==4 || $dt1->status_laporan==5){
                                  echo anchor('RencanaKerja/EditLaporan/'.$dt1->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                }elseif($dt1->status_laporan==1){
                                  echo anchor('RencanaKerja/EditLaporan2/'.$dt1->id_subkegiatan,'<span>Lihat File</span>');
                                }else{
                                  echo '<span class="text text-danger">'.$this->pustaka->p_laporan($dt1->statuslaporan).'</span>';
                                }
                              ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total1); ?></th>
                            <th><?php echo @array_sum($poin1); ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
<!-- PENGABDIAN  -->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENGABDIAN</b>
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
                          <th>Kegiatan</th>
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>Bukti Fisik</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pengabdian as $dt2){
                          if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt2->kegiatan."</span></b>";}
                          if($dt2->bkd_hitung=='1' && $dt2->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt2->kegiatan."</span></b>";}
                          if($dt2->bkd_hitung=='0' && $dt2->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt2->kegiatan."</span></b>";}
                          $total2[]=$dt2->sks_subkegiatan;
                          $poin2[]=$dt2->poin_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="#">
                                <?php echo $kegiatans.'<br /><span>- '.$dt2->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt2->sks_subkegiatan; ?></td>
                          <td><?php echo $dt2->poin_subkegiatan; ?></td>
                          <td>
                            <?php
                                $file = $dt2->syarat_file;
                                $file=explode('#',$dt2->syarat_file);
                                foreach ($file as $key => $value) {
                                          echo $value."<br />";
                                }
                                // echo $namafile;
                            ?>
                          </td>
                          <td>
                              <?php
                                //if($dt->status_laporan==0 || $dt->status_laporan==4 || $dt->status_laporan==5){
                                if($dt2->status_laporan==4 || $dt2->status_laporan==5){
                                  echo anchor('RencanaKerja/EditLaporan/'.$dt2->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                }elseif($dt2->status_laporan==1){
                                  echo anchor('RencanaKerja/EditLaporan2/'.$dt2->id_subkegiatan,'<span>Lihat File</span>');
                                }else{
                                  echo '<span class="text text-danger">'.$this->pustaka->p_laporan($dt2->statuslaporan).'</span>';
                                }
                              ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total2); ?></th>
                            <th><?php echo @array_sum($poin2); ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

<!-- PENUNJANG  -->
                <div class="x_panel">
                  <div class="x_title">
                    <b>PENUNJANG</b>
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
                          <th>Kegiatan</th>
                          <th>BKD SKS</th>
                          <th>Poin Remunerasi</th>
                          <th>Bukti Fisik</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penunjang as $dt3){
                          if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-success'>".$dt3->kegiatan."</span></b>";}
                          if($dt3->bkd_hitung=='1' && $dt3->renum_hitung=='0'){ $kegiatans="<b><span class='text text-warning'>".$dt3->kegiatan."</span></b>";}
                          if($dt3->bkd_hitung=='0' && $dt3->renum_hitung=='1'){ $kegiatans="<b><span class='text text-danger'>".$dt3->kegiatan."</span></b>";}
                          $total3[]=$dt3->sks_subkegiatan;
                          $poin3[]=$dt3->poin_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="#">
                                <?php echo $kegiatans.'<br /><span class="text text-danger">- '.$dt3->sub_kegiatan.'</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt3->sks_subkegiatan; ?></td>
                          <td><?php echo $dt3->poin_subkegiatan; ?></td>
                          <td>
                            <?php
                                $file = $dt3->syarat_file;
                                $file=explode('#',$dt3->syarat_file);
                                foreach ($file as $key => $value) {
                                          echo $value."<br />";
                                }
                                // echo $namafile;
                            ?>
                          </td>
                          <td>
                              <?php
                                //if($dt->status_laporan==0 || $dt->status_laporan==4 || $dt->status_laporan==5){
                                if($dt3->status_laporan==4 || $dt3->status_laporan==5){
                                  echo anchor('RencanaKerja/EditLaporan/'.$dt3->id_subkegiatan,'<span class="btn btn-sm btn-primary">Upload File</span>');
                                }elseif($dt3->status_laporan==1){
                                  echo anchor('RencanaKerja/EditLaporan2/'.$dt3->id_subkegiatan,'<span>Lihat File</span>');
                                }else{
                                  echo '<span class="text text-danger">'.$this->pustaka->p_laporan($dt3->statuslaporan).'</span>';
                                }
                              ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total3); ?></th>
                            <th><?php echo @array_sum($poin3); ?></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
          </div>
        </div>
   </div>
