<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3> <a href="<?php echo base_url() ?>RencanaKerja/FormRencana" class="btn btn-primary"> + Form Pengisian BKD</a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>App Ketua Prodi</th>
                          <th>App Assesor 1</th>
                          <th>App Assesor 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($laporan as $dt){
                          $total[]=$dt->sks_subkegiatan;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                            <a data-toggle="modal" data-id="<?php echo $dt->id_subkegiatan; ?>" data-toggle="modal" title="Add this item" class="open-AddBookDialog" href="#addBookDialog"><?php echo $dt->sub_kegiatan; ?></a>
                          </td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td><?php echo $dt->app_ketuaprodi; ?></td>
                          <td><?php echo $dt->app_assesor1; ?></td>
                          <td><?php echo $dt->app_assesor2; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total:</th>
                            <th><?php echo @array_sum($total); ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
<!-- MODAL UPLOAD FILE LAPORAN    -->
                <div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Insert Profil Pegawai</h4>
                      </div>
                        <form class="contact-form" method="post" >

                          <input type="hidden" name="user_level" id="user_level" value="3" class="form-control col-md-7 col-xs-12">
                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="nip" id="bookId" disabled="disabled" class="form-control col-md-7 col-xs-12">
                                      <input type="hidden" name="nip" id="bookId" class="form-control col-md-7 col-xs-12">
                                  </div>
                              </div>
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan Terakhir<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_pendidikan" id="id_pendidikan" class="form-control col-md-7 col-xs-12">
                                          <?php foreach ($pendidikan as $p){ ?>
                                               <option value="<?php echo $p->id_pendidikan; ?>"><?php echo $p->nama_pendidikan; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eselon<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_eselon" class="form-control col-md-7 col-xs-12">
                                          <?php foreach ($eselon as $s){ ?>
                                               <option value="<?php echo $s->id_eselon; ?>"><?php echo $s->eselon; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Golongan<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_gol" id="id_gol" class="form-control col-md-7 col-xs-12">
                                          <?php foreach ($golongan as $g){ ?>
                                               <option value="<?php echo $g->id_gol; ?>"><?php echo $g->nama_golongan; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <br /><br />
                          <div class="line line-block"></div>
                          <div class="form-group">
                              <h4 class="modal-title" id="myModalLabel">Kelompok Organisasi</h4>
                              <hr />
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Organisasi<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_unit" id="id_unit" class="form-control col-md-7 col-xs-12" onchange="seljabatan()">
                                          <option value="">-- Pilih Unit --</option>
                                          <?php foreach ($unit as $u){ ?>
                                               <option value="<?php echo $u->id_unit; ?>"><?php echo $u->unit_organisasi; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_jabatan" id="id_jabatan" class="form-control col-md-7 col-xs-12 types" onchange="selunitkerja()">
                                          <option value="">- Pilih Jabatan  - </option>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Kerja<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_unit_kerja" class="id_unit_kerja form-control col-md-7 col-xs-12" onchange="selsatuankerja()">

                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Satuan Kerja<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_satuan_kerja" id="unitkerja" class="id_unit_kerja unitkerja form-control col-md-7 col-xs-12" onchange="seljfu()">

                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div id="row_dims" class="modal-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">JFU<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_jfu" id="id_jfu" class="form-control col-md-7 col-xs-12">

                                      </select>
                                  </div>
                              </div>
                          </div>

                          <br />
                          <h3 class="alert-success" id="testDIV"></h3>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save" />
                          </div>
                      </form>
                      <div class="form-status-holder"></div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
   </div>
