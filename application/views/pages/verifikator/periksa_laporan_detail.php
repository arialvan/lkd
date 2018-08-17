<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pendidikan as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="#">
                                <?php echo $dt->kegiatan.'<br /><span class="text text-danger">('.$dt->sub_kegiatan.')</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt->status); ?></u><br />
                            <?php
                            if($dt->statusapp==0){
                                echo"-";
                            }else{
                                $file = $dt->syarat_file;
                                $file=explode('#',$dt->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                    //  $string_url = $dt->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt->id_subkegiatan,'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Assesor I
                                if($fl->assesor_1==$this->session->userdata('nipp') && $dt->statusapp==1){
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."4",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."2",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==2){
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."5",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==3){
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."6",'<span class="btn btn-sm btn-danger">Perbaiki</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);
                                }else{
                                  echo $this->pustaka->p_laporan($dt->statusapp);
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penelitian as $dt1){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt1->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt1->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt1->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt1->sub_kegiatan ?>"
                                data-sks="<?php echo $dt1->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $dt1->kegiatan.'<br /><span class="text text-danger">('.$dt1->sub_kegiatan.')</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt1->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt1->status); ?></u><br />
                            <?php
                            if($dt1->status==0){
                                echo"-";
                            }else{
                                $file = $dt1->syarat_file;
                                $file=explode('#',$dt1->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                    //  $string_url = $dt->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt1->id_subkegiatan,'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                                if($dt1->status_laporan==0){
                                  echo "-";
                                }elseif($dt1->status_laporan==1){
                                  echo anchor('Verifikator/PeriksaApproved/'.$dt1->id_subkegiatan,'<span class="btn btn-primary">Approve</span>');
                                }else{
                                  echo '<span class="btn btn-primary">OK</span>';
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <tr>
                            <th>#</th>
                            <th>Kegiatan</th>
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Laporan</th>
                          </tr>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pengabdian as $dt2){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt2->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt2->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt2->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt2->sub_kegiatan ?>"
                                data-sks="<?php echo $dt2->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $dt2->kegiatan.'<br /><span class="text text-danger">('.$dt2->sub_kegiatan.')</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt2->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt2->status); ?></u><br />
                            <?php
                            if($dt2->status==0){
                                echo"-";
                            }else{
                                $file = $dt2->syarat_file;
                                $file=explode('#',$dt2->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $values) {
                                    //  $string_url = $dt->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt2->id_subkegiatan,'<span>'.$values.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                                if($dt2->status_laporan==0){
                                  echo "-";
                                }elseif($dt2->status_laporan==1){
                                  echo anchor('Verifikator/PeriksaApproved/'.$dt2->id_subkegiatan,'<span class="btn btn-primary">Approve</span>');
                                }else{
                                  echo '<span class="btn btn-primary">OK</span>';
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($penunjang as $dt3){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a href="javascript:;"
                                data-id_kegiatan="<?php echo $dt3->id_kegiatan ?>"
                                data-id_subkegiatan="<?php echo $dt3->id_subkegiatan ?>"
                                data-kegiatan="<?php echo $dt3->kegiatan ?>"
                                data-subkegiatan="<?php echo $dt3->sub_kegiatan ?>"
                                data-sks="<?php echo $dt3->sks_subkegiatan ?>"
                                data-toggle="modal" data-target="#edit-pendidikan">
                                <?php echo $dt3->kegiatan.'<br /><span class="text text-danger">('.$dt3->sub_kegiatan.')</span>'; ?>
                            </a>
                          </td>
                          <td><?php echo $dt3->sks_subkegiatan; ?></td>
                          <td>
                            <u><?php echo $this->pustaka->status($dt3->status); ?></u><br />
                            <?php
                            if($dt3->status==0){
                                echo"-";
                            }else{
                                $file = $dt3->syarat_file;
                                $file=explode('#',$dt3->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $valuess) {
                                    //  $string_url = $dt->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt3->id_subkegiatan,'<span>'.$valuess.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td>
                              <?php
                                if($dt3->status_laporan==0){
                                  echo "-";
                                }elseif($dt3->status_laporan==1){
                                  echo anchor('Verifikator/PeriksaApproved/'.$dt3->id_subkegiatan,'<span class="btn btn-primary">Approve</span>');
                                }else{
                                  echo '<span class="btn btn-primary">OK</span>';
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
