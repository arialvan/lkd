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
                      <div class="clearfix"> </div>
                  </div>
                  <div class="x_content">
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Pegawai/InsertSetOrganisasi" >  
                            <div class="line line-block"></div>
                            <div class="form-group">
                                <h4 class="modal-title" id="myModalLabel">Setting Organisasi</h4>
                                <hr />
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Organisasi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit" id="id_unit" class="form-control col-md-7 col-xs-12" required="required">
                                            <option value="">-- Pilih Unit --</option>
                                            <?php foreach ($unit as $u){ ?>
                                                 <option value="<?php echo $u->id_unit; ?>"><?php echo $u->unit_organisasi; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                              
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jabatan" id="type" class="form-control col-md-7 col-xs-12">
                                            <?php foreach ($jabatan as $j){ ?>
                                                 <option name="<?php echo $j->id_jabatan; ?>" value="<?php echo $j->id_jabatan; ?>"><?php echo $j->jabatan_struktural; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                                        
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit_kerja" id="id_unit_kerja" class="form-control col-md-7 col-xs-12">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($unitkerja as $uk){ ?>
                                                 <option value="<?php echo $uk->id_unit_kerja; ?>"><?php echo $uk->unit_kerja; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Satuan Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_satuan_kerja" id="id_satuan_kerja" class="form-control col-md-7 col-xs-12">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($satuankerja as $sk){ ?>
                                                 <option value="<?php echo $sk->id_satuan_kerja; ?>"><?php echo $sk->satuan_kerja; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="row_dim">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">JFU<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jfu" id="id_jfu" class="form-control col-md-7 col-xs-12">
                                            <option value="0">--Pilih--</option>
                                            <?php foreach ($jfu as $jf){ ?>
                                                 <option value="<?php echo $jf->id_jfu; ?>"><?php echo $jf->jfu; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Atasan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_atasan" class="form-control col-md-7 col-xs-12">
                                            <option value="0">-- Pilih --</option>
                                            <?php foreach ($jabatan as $j){ ?>
                                                 <option name="<?php echo $j->id_jabatan; ?>" value="<?php echo $j->id_jabatan; ?>"><?php echo $j->jabatan_struktural; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <br />
                            <h3 class="alert-success" id="testDIV"></h3>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-primary" value="Save" />
                            </div>
                        </form>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                      <div class="clearfix"> </div>
                  </div>
                  <div class="x_content">
                    <div class="line line-block"></div>
                            <div class="form-group">
                                <h4 class="modal-title" id="myModalLabel">List Kelompok Organisasi</h4>
                                <hr />
                            </div>
                    
                    <div class="x_content">
                    <table id="datatable-buttons" class="table table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unit Organisasi</th>
                          <th>Jabatan</th>
                          <th>Unit Kerja</th>
                          <th>Unit Satuan Kerja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no = 1;
                            foreach($organisasi as $dt){ 
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->unit_organisasi; ?></td>
                          <td><?php echo $dt->jabatan_struktural; ?></td>
                          <td><?php echo $dt->unit_kerja; ?></td>
                          <td><?php echo $dt->satuan_kerja; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
          </div>
   </div>

