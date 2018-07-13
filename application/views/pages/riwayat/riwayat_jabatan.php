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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Riwayat/InsertRiwayatJabatan">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_jabatan" name="id_jabatan" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($jabatan as $dt){ ?>
                                <option value="<?php echo $dt->id_jabatan; ?>"><?php echo $dt->nama_jabatan; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun Lulus<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="tahun" id="tahun" required="required" class="form-control col-md-7 col-xs-12" placeholder="Contoh: 2010">
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
