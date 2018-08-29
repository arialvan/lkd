<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php //echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                    <h3>Upload File PDF (Max 2Mb)</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php foreach ($subkegiatan as $key); ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/InsertLaporan" enctype="multipart/form-data">
                       <input type="hidden" name="id_subkegiatan" id="id_subkegiatan" value="<?php echo $key->id_subkegiatan; ?>">

                       <?php
                           $file = $key->syarat_file;
                           $file=explode('#',$key->syarat_file);
                           foreach ($file as $keys => $value) {
                             $no=1;
                      ?>
                               <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo $value; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="hidden" name="nama_file[]" id="nama_file[]" value="<?php echo $value; ?>" class="form-control col-md-7 col-xs-12">
                                       <input type="file" name="files[]" class="form-control col-md-7 col-xs-12" required="required">
                                   </div>
                               </div>
                      <?php } ?>

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
