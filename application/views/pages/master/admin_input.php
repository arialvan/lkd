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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/InsertAdmin">

                        <div class="form-group ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="nip" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                        <option value="">-- Pilih --</option>
                                    <?php foreach ($pegawai as $dt){ ?>
                                        <option value="<?php echo $dt->nip; ?>"><?php echo $dt->nama_peg; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fakultas</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="id_fakultas" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <option value="">-- Pilih --</option>
                                <?php foreach ($fakultas as $dt1){ ?>
                                    <option value="<?php echo $dt1->id_fakultas; ?>"><?php echo $dt1->nama_fakultas; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                       </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                       <div class="ln_solid"></div>

                    </form>
                  </div>
                  <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
   </div>
