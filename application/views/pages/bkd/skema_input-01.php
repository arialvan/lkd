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

                      <h5>Skema BKD dan Remunerasi Dosen</h5>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Kategori Dosen</th>
                            <th colspan="4">BKD</th>
                            <th colspan="4">Remunerasi</th>
                              <tr>
                                  <td>Pendidikan</td>
                                  <td>Penelitian</td>
                                  <td>Pengabdian</td>
                                  <td>Penunjang</td>
                                  <td>Pendidikan</td>
                                  <td>Penelitian</td>
                                  <td>Pengabdian</td>
                                  <td>Penunjang</td>
                                </tr>
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
                                  <input type="hidden" name="id_kat_dosen[]" value="<?php echo $dt->id_kat_dosen; ?>" size="3" />
                                  <?php echo $dt->kategori_dosen; ?>
                                </td>
                                <td>
                                  <input type="hidden" name="id_bkd[]" value="1" size="3" />
                                  <input type="text" name="sks_bkd[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_bkd[]" value="2" size="3" />
                                  <input type="text" name="sks_bkd[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_bkd[]" value="3" size="3" />
                                  <input type="text" name="sks_bkd[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_bkd[]" value="4" size="3" />
                                  <input type="text" name="sks_bkd[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_remun[]" value="1" size="3" />
                                  <input type="text" name="sks_remun[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_remun[]" value="2" size="3" />
                                  <input type="text" name="sks_remun[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_remun[]" value="3" size="3" />
                                  <input type="text" name="sks_remun[]" value="0" size="3" />
                                </td>
                                <td>
                                  <input type="hidden" name="id_remun[]" value="4" size="3" />
                                  <input type="text" name="sks_remun[]" value="0" size="3" />
                                </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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
