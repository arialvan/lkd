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
                      <h5><?php echo $title; ?></h5>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/InsertPeriode">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Periode LKD<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="periode" id="periode" required="required" class="form-control col-md-7 col-xs-12" placeholder="2018">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="ket_periode" name="ket_periode" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status" name="status" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                          </select>
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
