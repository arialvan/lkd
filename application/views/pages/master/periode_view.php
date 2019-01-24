<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <h4>Catatan :</h4>
                  <p>
                    Sebelum meng-copy data dari periode sebelumnya, ada beberapa langkah yang harus di lakukan : <br />
                    <ol type="1">
                      <li>Silahkan tambah periode baru yang akan di aktifkan dengan menekan tombol
                          <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Tambah Periode</a> di bawah.
                      </li>
                      <li>Nonaktifkan status Periode Aktif saat ini.</li>
                      <li>Proses copy data, pilih setiap item keterangan dan lakukan proses copy dari periode sebelumnya ke periode aktif saat ini.</li>
                    </ol>


                  </p>
              </div>
           </div>
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
                        foreach($periode as $dt){
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

              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <a class="btn btn-md btn-danger">Silahkan Klik Keterangan di bawah untuk Copy Data ke Periode Aktif</a>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <?php
                      foreach($periode_aktif as $row);
                    ?>
                    <div class="x_content">
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="javascript:;"
                              data-id="subkegiatan"
                              data-toggle="modal" data-target="#copy-bkd">
                              <h4>Sub Kegiatan</h4>
                          </a>
                          <?php if($row->copy_subkegiatan==1){
                                echo '<span class="text text-sm text-success">'.$row->periode.'-'.$row->ket_periode.' copy-success </span><i class="fa fa-check"></i>'; ?> <br /><br />
                                <a href="<?php echo base_url() ?>Master/Reset/<?php echo $row->id_periode.'/'."subkegiatan"; ?> " class="btn btn-danger btn-sm" title="Reset" onclick="return confirm('Apakah Anda Ingin Reset Pengaturan ini ?')">Reset</a>
                          <?php } ?>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="javascript:;"
                              data-id="verifikator"
                              data-toggle="modal" data-target="#copy-bkd">
                              <h4>Verifikator dan Ketua Prodi</h4>
                          </a>
                          <?php if($row->copy_verifikator==1){
                                echo '<span class="text text-sm text-success">'.$row->periode.'-'.$row->ket_periode.' copy-success </span><i class="fa fa-check"></i>'; ?><br /><br />
                                <a href="<?php echo base_url() ?>Master/Reset/<?php echo $row->id_periode.'/'."verifikator"; ?> " class="btn btn-danger btn-sm" title="Reset" onclick="return confirm('Apakah Anda Ingin Reset Pengaturan ini ?')">Reset</a>
                          <?php } ?>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="javascript:;"
                              data-id="skema"
                              data-toggle="modal" data-target="#copy-bkd">
                              <h4>Skema Perhitungan BKD</h4>
                          </a>
                          <?php if($row->copy_skema==1){
                                echo '<span class="text text-sm text-success">'.$row->periode.'-'.$row->ket_periode.' copy-success </span><i class="fa fa-check"></i>'; ?><br /><br />
                                <a href="<?php echo base_url() ?>Master/Reset/<?php echo $row->id_periode.'/'."skema"; ?> " class="btn btn-danger btn-sm" title="Reset" onclick="return confirm('Apakah Anda Ingin Reset Pengaturan ini ?')">Reset</a>
                          <?php } ?>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>

          </div>
   </div>

<!-- MODAL SUB KEGIATAN  -->
   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="copy-bkd" class="modal fade">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                   <h4 class="modal-title">Copy Data</h4>
               </div>
               <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/CopyData">
                 <input type="hidden" class="form-control" id="id" name="id" />
                 <div class="modal-body">
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label"></label>
                             <div class="col-lg-10">
                                Pilih dari periode yang lalu :
                             </div>
                         </div>
                         <div class="form-group">
                             <!-- <label class="col-lg-2 col-sm-2 control-label">Pilih Periode</label> -->
                             <div class="col-lg-10">
                               <select id="periode_lama" name="periode_lama" class="form-control" required>
                                   <option value="">Pilih</option>
                                   <?php $no=1; foreach($periode_nonaktif as $dt){ if($dt->status==1){$st="Aktif"; }else{$st="N/A";} ?>
                                   <option value="<?php echo $dt->id_periode; ?>"><?php echo $no++.' .'. $dt->periode.'-'.$dt->ket_periode.' ('.$st.')'; ?></option>
                                   <?php } ?>
                               </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label"></label>
                             <div class="col-lg-10">
                                Pilih periode sekarang :
                             </div>
                         </div>
                         <div class="form-group">
                             <!-- <label class="col-lg-2 col-sm-2 control-label">Pilih Periode</label> -->
                             <div class="col-lg-10">
                               <select id="periode_baru" name="periode_baru" class="form-control" required>
                                   <option value="">Pilih</option>
                                   <?php $no=1; foreach($periode_aktif as $dt){ if($dt->status==1){$st="Aktif"; }else{$st="N/A";} ?>
                                   <option value="<?php echo $dt->id_periode; ?>"><?php echo $no++.' .'. $dt->periode.'-'.$dt->ket_periode.' ('.$st.')'; ?></option>
                                   <?php } ?>
                               </select>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-info" type="submit"> Proses&nbsp;</button>
                         <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                     </div>
                   </form>
               </div>
           </div>
       </div>
