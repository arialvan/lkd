<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <div class="col-sm-12 col-md-12 col-xs-12" data-step="1" data-intro="Ini adalah Tab Menu Rencana Kerja yang sudah di kategorikan">
                      <ul class="nav nav-tabs" id="myTab">
                          <li class="active"><a data-toggle="tab" href="#pendidikan_tab" class="bg-primary">DOSEN</a></li>
                          <li><a data-toggle="tab" href="#penelitian_tab" class="bg-primary">PROFIL DOSEN</a></li>
                          <li><a data-toggle="tab" href="#pengabdian_tab" class="bg-primary">ASSESOR/KETUA PRODI</a></li>
                          <li><a data-toggle="tab" href="#penunjang_tab" class="bg-primary">FAKULTAS DOSEN</a></li>
                      </ul>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="tab-content">

                  <div id="pendidikan_tab" class="tab-pane fade in active">
                    <div class="x_panel" style="">
                    <div class="x_title">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/ExcelDataPegawai" enctype="multipart/form-data">

                          <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <a href="<?php echo base_url() ?>uploads/excel/tb_pegawai.xlsx" class="btn btn-primary">Format Tabel Profil Dosen Excel</a>
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
                  </div>
                  </div>

                  <div id="penelitian_tab" class="tab-pane fade">
                      <div class="x_panel" style="">
                      <div class="x_title">
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
                                        <a href="<?php echo base_url() ?>uploads/excel/tb_pegawai.xlsx" class="btn btn-primary">Format Tabel Profil Dosen Excel</a>
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
                    </div>
                  </div>

                  <div id="pengabdian_tab" class="tab-pane fade">
                    <div class="x_panel" style="">
                    <div class="x_title">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                      <div class="x_content">
                        <br />
                        <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/ExcelDataAssesor" enctype="multipart/form-data">

                            <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="<?php echo base_url() ?>uploads/excel/Verifikator.xlsx" class="btn btn-primary">Format Import Assesor</a>
                                    </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Import Baru Data Assesor dan Ketua Prodi</label>
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

                        <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/ExcelUpdateAssesor" enctype="multipart/form-data">
                            <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a href="<?php echo base_url() ?>uploads/excel/Verifikator.xlsx" class="btn btn-primary">Format Update Assesor</a>
                                    </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Update Data Assesor dan Ketua Prodi</label>
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

                  <div id="penunjang_tab" class="tab-pane fade">
                    <div class="x_panel" style="">
                    <div class="x_title">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Import/UpdateFakultasDosen" enctype="multipart/form-data">
                          <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <a href="<?php echo base_url() ?>#" class="btn btn-primary">Format Tabel Update Fakultas Dosen Excel</a>
                                  </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Import Excel Update Fakultas Dosen</label>
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



<!-- PROFIL DOSEN  -->



<!-- IMPORT DATA ASSESOR -->


<!-- UPDATE FAKULTAS DOSEN -->


              </div>
            </div>
            <div class="clearfix"></div>
            <br /><br />
          </div>
   </div>
