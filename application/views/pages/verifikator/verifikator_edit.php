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
                        foreach($verifikator as $key);
                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Verifikator/UpdateVerifikators">
                       <input type="hidden" name="id_verifikator" id="id_verifikator" value="<?php echo $key->id_verifikator; ?>">

                       <div class="form-group ">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Dosen</label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $key->pegawai; ?>" disabled/>
                               </div>
                       </div>

                       <div class="form-group ">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor I</label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select name="assesor_1" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                       <option value="<?php echo $key->assesor_1; ?>"><?php echo $key->assesor1; ?></option>
                                   <?php foreach ($pegawai as $as1){ ?>
                                       <option value="<?php echo $as1->nip; ?>"><?php echo $as1->nama_peg; ?></option>
                                   <?php } ?>
                                   </select>
                               </div>
                       </div>

                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor II</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="assesor_2" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                   <option value="<?php echo $key->assesor_2; ?>"><?php echo $key->assesor2; ?></option>
                               <?php foreach ($pegawai as $as2){ ?>
                                   <option value="<?php echo $as2->nip; ?>"><?php echo $as2->nama_peg; ?></option>
                               <?php } ?>
                               </select>
                           </div>
                      </div>

                       <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ketua Prodi</label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="ketua_prodi" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                   <option value="<?php echo $key->ketua_prodi; ?>"><?php echo $key->ketuaprodi; ?></option>
                               <?php foreach ($pegawai as $kp){ ?>
                                   <option value="<?php echo $kp->nip; ?>"><?php echo $kp->nama_peg; ?></option>
                               <?php } ?>
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
