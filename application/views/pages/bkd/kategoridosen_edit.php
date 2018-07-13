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
                    <?php foreach ($dosen as $key); ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>MasterBkd/UpdateKatDosen" enctype="multipart/form-data">
                       <input type="hidden" name="id_kat_dosen" id="id_kat_dosen" value="<?php echo $key->id_kat_dosen; ?>">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kategori Dosen<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="kategori_dosen" id="kategori_dosen" class="form-control col-md-7 col-xs-12" value="<?php echo $key->kategori_dosen; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Singkatan<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="singkatan" id="singkatan" class="form-control col-md-7 col-xs-12" value="<?php echo $key->singkatan; ?>">
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
