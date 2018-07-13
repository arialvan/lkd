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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>MasterBkd/InsertSkema">
                      <?php foreach($periode as $x); ?>
                      <input type="hidden" id="id_periode" class="form-control" name="id_periode" value="<?php echo $x->id_periode; ?>" size="3" />
                      <div id="field">
                      <div id="field0">

                      <div class="form-group">
                        <div class="col-sm-3">
                          <label>Kategori Dosen<span class="required">*</span></label>
                            <select id="id_kat_dosen" name="id_kat_dosen[]" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($dosen as $b){ ?>
                                <option value="<?php echo $b->id_kat_dosen; ?>"><?php echo $b->kategori_dosen; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2">
                          <label>BKD<span class="required">*</span></label>
                            <select id="id_bkd" name="id_bkd[]" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($bkd as $bk){ ?>
                                <option value="<?php echo $bk->id_bkd; ?>"><?php echo $bk->ket_bkd; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-1">
                        <label>SKS BKD<span class="required">*</span></label>
                          <input type="number" id="sks_bkd" class="form-control" name="sks_bkd[]" value="0" size="3" />
                        </div>

                        <div class="col-sm-2">
                          <label>Remunerasi<span class="required">*</span></label>
                            <select id="id_remun" name="id_remun[]" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($remun as $r){ ?>
                                <option value="<?php echo $r->id_remun; ?>"><?php echo $r->ket_remun; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2">
                        <label>SKS Remun<span class="required">*</span></label>
                          <input type="number" id="sks_remun" class="form-control" name="sks_remun[]" value="0" size="3" />
                        </div>
                        <div class="col-sm-1">
                        <label>Poin<span class="required">*</span></label>
                          <input type="text" id="poin_remun" class="form-control" name="poin_remun[]" value="0" size="3" />
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
