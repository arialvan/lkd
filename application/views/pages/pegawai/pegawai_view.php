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
                          <th>Kategori Dosen</th>
                          <th>Fakultas</th>
                          <th>Action</th>
                          <th>Login As</th>
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
                          <td><?php echo $dt->nama_peg; ?></td>
                          <td><?php echo $dt->kategori_dosen; ?></td>
                          <td><?php echo $dt->nama_fakultas; ?></td>
                          <td>
                              <?php if($level==1){ ?>
                                <a href="javascript:;"
                                    data-id="kategoridosen"
                                    data-nip="<?php echo $dt->nip; ?>"
                                    data-nips="<?php echo $dt->nip; ?>"
                                    data-nama="<?php echo $dt->nama_peg; ?>"
                                    data-katdosen="<?php echo $dt->kategori_dosen; ?>"
                                    data-fak="<?php echo $dt->nama_fakultas; ?>"
                                    data-toggle="modal" data-target="#edit-pegawai">
                                    <span class="glyphicon glyphicon-pencil" title="Edit Data"></span>
                                </a>

                                <a href="javascript:;"
                                    data-id="<?php echo $dt->nip; ?>"
                                    data-nips="<?php echo $dt->nip; ?>"
                                    data-nama="<?php echo $dt->nama_peg; ?>"
                                    data-toggle="modal" data-target="#edit-password">
                                    <span class="glyphicon glyphicon-refresh" title="Reset Password"></span>
                                </a>
                              <?php } ?>
                          </td>
                          <td>
                            <?php
                            if($level==1){
                              $attr = array('target'=>'_blank');
                              echo anchor('Pegawai/LoginAs/'.$dt->nip,'<span class="glyphicon glyphicon-log-in" title="Login Sebagai" ></span>',$attr);
                            }else{
                              echo "-";
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

   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-pegawai" class="modal fade">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                   <h4 class="modal-title">Ubah Data</h4>
               </div>
               <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Pegawai/UpdateKatDosen">
                 <input type="hidden" class="form-control" id="id" name="id" />
                 <input type="hidden" class="form-control" id="nip" name="nip" />
                 <div class="modal-body">
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label">Nip</label>
                             <div class="col-lg-10">
                                 <input type="text" class="form-control" id="nips" name="nips" disabled />
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                             <div class="col-lg-10">
                                 <input type="text" class="form-control" id="nama" name="nama" disabled />
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-2 col-sm-2 control-label">Kategori Dosen</label>
                             <div class="col-lg-10">
                               <input type="text" class="form-control" id="katdosen" name="katdosen" disabled />
                               <select id="kategori_dosen" name="kategori_dosen" class="form-control" required>
                                   <option value="">Ubah Kategori Dosen</option>
                                   <?php $no=1; foreach($katdosen as $dt){ ?>
                                   <option value="<?php echo $dt->id_kat_dosen; ?>"><?php echo $dt->kategori_dosen; ?></option>
                                   <?php } ?>
                               </select>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-info" type="submit"> Update&nbsp;</button>
                         <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                     </div>
                   </form>
               </div>
           </div>
       </div>


       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-password" class="modal fade">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                       <h4 class="modal-title">Ubah Data</h4>
                   </div>
                   <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Pegawai/RubahPassword">
                     <input type="text" class="form-control" id="id" name="id" />
                     <div class="modal-body">
                             <div class="form-group">
                                 <label class="col-lg-2 col-sm-2 control-label">Nip</label>
                                 <div class="col-lg-10">
                                     <input type="text" class="form-control" id="nips" name="nips" disabled />
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                 <div class="col-lg-10">
                                     <input type="text" class="form-control" id="nama" name="nama" disabled />
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-lg-2 col-sm-2 control-label">Masukan Password Baru</label>
                                 <div class="col-lg-10">
                                   <input type="text" class="form-control" id="password" name="password" />
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button class="btn btn-info" type="submit"> Update&nbsp;</button>
                             <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                         </div>
                       </form>
                   </div>
               </div>
           </div>
