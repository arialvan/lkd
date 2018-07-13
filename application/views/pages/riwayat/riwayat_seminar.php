<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Riwayat/InsertRiwayatSeminar">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pegawai<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="nip" name="nip" class="form-control" required>
                                  <option value="">Pilih</option>
                                  <?php foreach($pegawai as $dt){ ?>
                                  <option value="<?php echo $dt->nip; ?>"><?php echo $dt->nama_peg; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Seminar<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_seminar" id="nama_seminar" required="required" class="form-control col-md-7 col-xs-12" />
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Peranan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="peranan" id="peranan" required="required" class="form-control col-md-7 col-xs-12" />
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Seminar</label>
                                <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="myDatepicker2">
                                    <input type='text' name="tgl_seminar" id="tgl_seminar" class="form-control" />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Penyelenggara<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="penyelenggara" id="penyelenggara" required="required" class="form-control col-md-7 col-xs-12" />
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Seminar</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="tempat" id="tempat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
   </div>
