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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/InsertRencana">

                      <div id="field">
                      <div id="field0">

                      <div class="form-group">
                        <div class="col-sm-3">
                          <label>BKD<span class="required">*</span></label>
                            <select id="bkd" name="bkd[]" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($bkd as $b){ ?>
                                <option value="<?php echo $b->id_bkd; ?>"><?php echo $b->ket_bkd; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-3">
                          <label>SUB BKD<span class="required">*</span></label>
                            <select id="bkd_kegiatan" name="bkd_kegiatan[]" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($bkdkegiatan as $bk){ ?>
                                <option value="<?php echo $bk->id_kegiatan; ?>"><?php echo $bk->kegiatan; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2">
                        <label>Volume/SKS<span class="required">*</span></label>
                          <input id="sks_subkegiatan" class="form-control" name="sks_subkegiatan[]" />
                        </div>

                        <div class="col-sm-4">
                        <label>Keterangan<span class="required">*</span></label>
                          <input id="sub_kegiatan" class="form-control" name="sub_kegiatan[]" />
                        </div>
                      </div>

                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-4">
                        <button id="add-more" name="add-more" class="btn btn-primary">+ Tambah Form</button>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-danger" type="reset">Reset</button>
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
