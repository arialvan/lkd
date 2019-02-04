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
                    <?php
                        foreach ($subbkd as $key);
                        if($key->syarat==1){ $s='Hitung'; }else { $s='Tidak Hitung'; }
                        if($key->bkd_hitung==1){ $d='Ya'; }else { $d='Tidak'; }
                        if($key->renum_hitung==1){ $r='Ya'; }else { $r='Tidak'; }
                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>MasterBkd/UpdateSubBkd">
                       <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="<?php echo $key->id_kegiatan; ?>">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kegiatan/Sub BKD<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="kegiatan" id="kegiatan" class="form-control col-md-7 col-xs-12" value="<?php echo $key->kegiatan ; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mengajar ?<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="syarat" name="syarat" class="form-control" required="required">
                                <option value="<?php echo $key->syarat; ?>"><?php echo $s; ?></option>
                                <option value="1">Hitung</option>
                                <option value="0">Tidak Hitung</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">SKS<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="bkd_sks" id="bkd_sks" class="form-control col-md-7 col-xs-12" value="<?php echo $key->bkd_sks; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hitung BKD<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="bkd_hitung" name="bkd_hitung" class="form-control" required="required">
                                <option value="<?php echo $key->bkd_hitung; ?>"><?php echo $d; ?></option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hitung Remunerasi<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="renum_hitung	" name="renum_hitung" class="form-control" required="required">
                                <option value="<?php echo $key->renum_hitung; ?>"><?php echo $r; ?></option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Poin<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="poin" id="poin" required="required" value="<?php echo $key->poin; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Syarat Bukti Fisik(File)<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php
                                    $syarat = explode('#',$key->syarat_file);
                                    $arr_syarat = count($syarat);
                                    
                                    for($i=0;$i<=$arr_syarat;$i++)
                                    {
                                  ?>
                                  <input type="checkbox" class="largerCheckbox" name="syarat_file[]" value="<?php echo @$syarat[$i]; ?>" checked="checked" /><?php echo  @$syarat[$i]; ?> <br />
                                  <?php
                                    }
                                  ?>


                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pilih Syarat untuk Bukti Fisik<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                  <?php foreach($bukti as $dts){ ?>
                                  <input type="checkbox" class="largerCheckbox" name="syarat_file[]" value="<?php echo $dts->id.".".$dts->nama_file; ?>" /><?php echo $dts->nama_file; ?> <br />
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
