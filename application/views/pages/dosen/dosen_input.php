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
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Dosen/InsertDosen">
                        <div class="form-group ">
                            <label class="control-label col-md-2 col-xs-12 " for="first-name">Pilih Kategori Dosen</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_kat_dosen" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                    <?php foreach ($katdosen as $pr){ ?>
                                        <option value="<?php echo $pr->id_kat_dosen; ?>"><?php echo $pr->kategori_dosen; ?></option>
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
                        <br />
                        <div class="row">
                        <table id="datatable-buttons" class="table">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Dosen</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              foreach($dosen as $dt){
                              ?>
                              <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="nip[]" value="<?php echo $dt->nip; ?>"> <span class="label-text"><?php echo $dt->nama_peg; ?></span>
                                    </div>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                        </table>
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
