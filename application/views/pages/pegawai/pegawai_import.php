<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                  <h3><?php echo $title; ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/ExcelDataAdd" enctype="multipart/form-data">

                        <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url() ?>uploads/excel/tb_pegawai.xlsx" class="btn btn-primary">Format Tabel Dosen Excel</a>
                                </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Import Excel Data Dosen</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type='file' name="userfile" class="form-control" />
                                </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

<!-- IMPORT DATA ASSESOR -->
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/ExcelDataAssesor" enctype="multipart/form-data">

                        <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url() ?>uploads/excel/Verifikator.xlsx" class="btn btn-primary">Format Tabel Assesor</a>
                                </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Import Excel Data Assesor dan Ketua Prodi</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type='file' name="userfile" class="form-control" />
                                </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <br /><br />

	<!-- <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                    <h3>Import Profil Pegawai</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>ImportProfil/ExcelDataAdd" enctype="multipart/form-data">

                        <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url() ?>uploads/excel/tb_pegawai_profil.xlsx" class="btn btn-primary">Format Tabel Jabatan Excel</a>
                                </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Import Excel Data Pegawai</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type='file' name="userfile" class="form-control" />
                                </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
   </div>
