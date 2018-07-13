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
                    <?php 
                        foreach($periode as $key); 
                        if($key->status==1){$status="Aktif";}else {$status="Tidak Aktif";}
                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/UpdatePeriode">
                       <input type="hidden" name="id_periode" id="id_periode" value="<?php echo $key->id_periode; ?>">
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Periode<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="periode" id="periode" class="form-control col-md-7 col-xs-12" value="<?php echo $key->periode; ?>">
                        </div>
                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_gol" name="status" class="form-control" required>
                                <option value="<?php echo $key->status; ?>"><?php echo $status; ?></option>
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                      </div>
                                           
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
   </div>

   