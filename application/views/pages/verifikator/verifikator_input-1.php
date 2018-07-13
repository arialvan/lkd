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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Verifikator/InsertVerifikator">
                      
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Dosen</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="nip" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <option value="">-- Pilih --</option>
                                <?php foreach ($dosen as $kt){ ?>
                                    <option value="<?php echo $kt->nip; ?>"><?php echo $kt->nama_peg; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                       </div>
                       
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Periode</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="nip" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <option value="">-- Pilih --</option>
                                <?php foreach ($periode as $pr){ ?>
                                    <option value="<?php echo $pr->id_periode; ?>"><?php echo $pr->periode; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                       </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor I</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="assesor1" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <option value="">-- Pilih --</option>
                                <?php foreach ($assesor1 as $as1){ ?>
                                    <option value="<?php echo $as1->nip; ?>"><?php echo $as1->nama_peg; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                       </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor II</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="assesor2" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <option value="">-- Pilih --</option>
                                <?php foreach ($assesor2 as $as2){ ?>
                                    <option value="<?php echo $as2->nip; ?>"><?php echo $as2->nama_peg; ?></option>
                                <?php } ?>
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

   