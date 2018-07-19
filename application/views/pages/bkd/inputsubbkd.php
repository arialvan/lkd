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

                  <?php
                    if($this->session->flashdata('success'))
                    {
                        echo $this->session->flashdata('success');
                    }else{
                        echo $this->session->flashdata('error');
                    }
                  ?>

                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>MasterBkd/InsertSubBkd">

                      <?php foreach($periode as $pr);?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periode Aktif<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="id_periode" id="id_periode" value="<?php echo $pr->id_periode; ?>">
                            <input type="text" value="<?php echo $pr->periode.' '.$pr->ket_periode; ?>" readonly class="form-control col-md-7 col-xs-12"  placeholder="Contoh : Mengajar S1">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan BKD<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="id_bkd" name="id_bkd" class="form-control" required>
                              <option value="">Pilih</option>
                              <?php foreach($bkd as $dt){ ?>
                              <option value="<?php echo $dt->id_bkd; ?>"><?php echo $dt->ket_bkd; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kegiatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="kegiatan" id="kegiatan" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Contoh : Mengajar S1">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Syarat BKD<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="checkbox" class="largerCheckbox" name="syarat" id="syarat" value="1">Ya &nbsp; &nbsp;
                            <input type="checkbox" class="largerCheckbox" name="syarat" id="syarat" value="0">Tidak
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Satuan SKS<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="bkd_sks" id="bkd_sks" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hitung BKD<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="bkd_hitung" name="bkd_hitung" class="form-control" required>
                              <option value="">Pilih</option>
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hitung Remunerasi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="renum_hitung" name="renum_hitung" class="form-control" required>
                              <option value="">Pilih</option>
                              <option value="1">Ya</option>
                              <option value="0">Tidak</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Satuan Poin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="poin" id="poin" required="required" value="0"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pilih Syarat untuk Bukti Fisik<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php foreach($bukti as $dts){ ?>
                                <input type="checkbox" class="largerCheckbox" name="syarat_file[]" value="<?php echo $dts->id; ?>" /><?php echo $dts->nama_file; ?> <br />
                                <?php } ?>
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
