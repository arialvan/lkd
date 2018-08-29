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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
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
                            if($dt->status_laporan==0){
                                echo"- Belum Buat Laporan";
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
                                if($fl->assesor_1==$this->session->userdata('nipp') && $dt->statusapp==1 && $dt->status_laporan==1){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'4' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                  echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."2",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);
                                  echo wordwrap($dt->komentar, 75, "<br />\n");
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==1 && $dt->status_laporan==1){
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==2 && $dt->status_laporan==2){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'5' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                    echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                    echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);
                                    echo '<br />'.wordwrap($dt->komentar, 75, "<br />\n");

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==3 && $dt->status_laporan==3){
                                  echo '<br />'.$this->pustaka->p_laporan($dt->status_laporan);

                              //TOLAK Assesor
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==4 && $dt->status_laporan==4){
                                  echo '<br />'.$this->pustaka->p_laporan($dt->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt->statusapp==5 && $dt->status_laporan==5){
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."5",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Komentar</th>
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
                            if($dt1->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                $file = $dt1->syarat_file;
                                $file=explode('#',$dt1->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                    //  $string_url = $dt1->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt1->id_subkegiatan,'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td><?php echo wordwrap($dt1->komentar, 75, "<br />\n"); ?></td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Assesor I
                                if($fl->assesor_1==$this->session->userdata('nipp') && $dt1->statusapp==1 && $dt1->status_laporan==1){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'4' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                  echo anchor('Verifikator/LaporanApproved/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."2",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt1->statusapp);
                                  echo wordwrap($dt1->komentar, 75, "<br />\n");
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->statusapp==1 && $dt1->status_laporan==1){
                                  echo '<br />'.$this->pustaka->p_laporan($dt1->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->statusapp==2 && $dt1->status_laporan==2){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt1->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'5' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                    echo anchor('Verifikator/LaporanApproved/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                    echo '<br />'.$this->pustaka->p_laporan($dt1->statusapp);
                                    echo '<br />'.wordwrap($dt1->komentar, 75, "<br />\n");

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->statusapp==3 && $dt1->status_laporan==3){
                                  echo '<br />'.$this->pustaka->p_laporan($dt1->status_laporan);

                              //TOLAK Assesor
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->statusapp==4 && $dt1->status_laporan==4){
                                  echo '<br />'.$this->pustaka->p_laporan($dt1->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt1->statusapp==5 && $dt1->status_laporan==5){
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."5",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt1->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt1->statusapp);

                                }else{
                                  echo $this->pustaka->p_laporan($dt1->statusapp);
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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <tr>
                            <th>#</th>
                            <th>Kegiatan</th>
                            <th>SKS</th>
                            <th>Status</th>
                            <th>Komentar</th>
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
                            if($dt2->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                $file = $dt2->syarat_file;
                                $file=explode('#',$dt2->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                    //  $string_url = $dt2->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt2->id_subkegiatan,'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td><?php echo wordwrap($dt2->komentar, 75, "<br />\n"); ?></td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Assesor I
                                if($fl->assesor_1==$this->session->userdata('nipp') && $dt2->statusapp==1 && $dt2->status_laporan==1){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'4' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                  echo anchor('Verifikator/LaporanApproved/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."2",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt2->statusapp);
                                  echo wordwrap($dt2->komentar, 75, "<br />\n");
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->statusapp==1 && $dt2->status_laporan==1){
                                  echo '<br />'.$this->pustaka->p_laporan($dt2->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->statusapp==2 && $dt2->status_laporan==2){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt2->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'5' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                    echo anchor('Verifikator/LaporanApproved/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                    echo '<br />'.$this->pustaka->p_laporan($dt2->statusapp);
                                    echo '<br />'.wordwrap($dt2->komentar, 75, "<br />\n");

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->statusapp==3 && $dt2->status_laporan==3){
                                  echo '<br />'.$this->pustaka->p_laporan($dt2->status_laporan);

                              //TOLAK Assesor
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->statusapp==4 && $dt2->status_laporan==4){
                                  echo '<br />'.$this->pustaka->p_laporan($dt2->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt2->statusapp==5 && $dt2->status_laporan==5){
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."5",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt2->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt2->statusapp);

                                }else{
                                  echo $this->pustaka->p_laporan($dt2->statusapp);
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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Status</th>
                          <th>Komentar</th>
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
                            if($dt3->status_laporan==0){
                                echo"- Belum Buat Laporan";
                            }else{
                                $file = $dt3->syarat_file;
                                $file=explode('#',$dt3->syarat_file);
                                $atts = array('width'=> 800,'height'=> 600,'scrollbars'=>'yes','status'=>'yes',
                                              'resizable'=>'yes','screenx'=>0,'screeny'=>0,'window_name' =>'_blank');
                                  foreach ($file as $key => $value) {
                                    //  $string_url = $dt3->id_subkegiatan."#".$value;
                                      echo anchor_popup('Verifikator/PeriksaLaporanDetailPDF/'.$dt3->id_subkegiatan,'<span>'.$value.'</span><br />',$atts);
                                  }
                            }
                            ?>
                          </td>
                          <td><?php echo wordwrap($dt3->komentar, 75, "<br />\n"); ?></td>
                          <td>
                              <?php
                              foreach($filter as $fl);
                              //Assesor I
                                if($fl->assesor_1==$this->session->userdata('nipp') && $dt3->statusapp==1 && $dt3->status_laporan==1){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'4' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                  echo anchor('Verifikator/LaporanApproved/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."2",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt3->statusapp);
                                  echo wordwrap($dt3->komentar, 75, "<br />\n");
                              //Assesor II
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->statusapp==1 && $dt3->status_laporan==1){
                                  echo '<br />'.$this->pustaka->p_laporan($dt3->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->statusapp==2 && $dt3->status_laporan==2){ ?>
                                  <a href="javascript:;"
                                      data-id_kegiatan="<?php echo $dt3->id_subkegiatan.'-'.$this->uri->segment(3).'-'.'5' ?>"
                                      data-toggle="modal" data-target="#tolak">
                                      <?php echo '<span class="btn btn-sm btn-danger">Tolak</span>'; ?>
                                  </a>
                              <?php
                                    echo anchor('Verifikator/LaporanApproved/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                    echo '<br />'.$this->pustaka->p_laporan($dt3->statusapp);
                                    echo '<br />'.wordwrap($dt3->komentar, 75, "<br />\n");

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->statusapp==3 && $dt3->status_laporan==3){
                                  echo '<br />'.$this->pustaka->p_laporan($dt3->status_laporan);

                              //TOLAK Assesor
                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->statusapp==4 && $dt3->status_laporan==4){
                                  echo '<br />'.$this->pustaka->p_laporan($dt3->statusapp);

                                }elseif($fl->assesor_2==$this->session->userdata('nipp') && $dt3->statusapp==5 && $dt3->status_laporan==5){
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."5",'<span class="btn btn-sm btn-danger">Tolak</span>');
                                  // echo anchor('Verifikator/LaporanApproved/'.$dt3->id_subkegiatan."-".$this->uri->segment(3)."-"."3",'<span class="btn btn-sm btn-primary">Terima</span>');
                                  echo '<br />'.$this->pustaka->p_laporan($dt3->statusapp);

                                }else{
                                  echo $this->pustaka->p_laporan($dt3->statusapp);
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

   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tolak" class="modal fade">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                   <h4 class="modal-title">Ubah Data</h4>
               </div>
               <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Verifikator/KomentarTolak">
                 <input type="hidden" class="form-control" id="id_kegiatan" name="id_kegiatan" />
                 <div class="modal-body">
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label">Komentar</label>
                             <div class="col-lg-10">
                               <textarea name="komentar_assesor" class="form-control"> </textarea>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-info" type="submit"> Submit&nbsp;</button>
                         <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                     </div>
                   </form>
               </div>
           </div>
       </div>
