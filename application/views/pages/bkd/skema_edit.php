<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                    <?php foreach($kategori_dosen as $dt1); ?>
                    <h3><?php echo $dt1->kategori_dosen; ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>MasterBkd/UpdateSkema">

                       <?php foreach($dosen as $dt){ ?>
                         <input type="hidden" name="id[]" value="<?php echo $dt->id ; ?>" size="3" />
                          <div class="form-group">

                            <div class="col-sm-3">
                            <label><?php echo 'SKS '.$dt->ket_bkd; ?></label>
                              <input type="number" id="sks_bkd" class="form-control" name="sks_bkd[]" value="<?php echo $dt->sks_bkd; ?>" size="3" />
                            </div>

                            <div class="col-sm-3">
                            <label><?php echo 'SKS '.$dt->ket_bkd; ?></label>
                              <input type="number" id="sks_remun" class="form-control" name="sks_remun[]" value="<?php echo $dt->sks_remun; ?>" size="3" />
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
