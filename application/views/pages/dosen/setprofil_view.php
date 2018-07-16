<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <a href="<?php echo base_url() ?>Dosen/FormDosen" class="btn btn-primary">Set Kategori Dosen</a>
                    <br />
                    <span class="text text-md">Tabel ini hanya menampilkan List Nama-nama Dosen yang sudah di kategorikan</span>
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
                          <th>NAMA</th>
                          <th>KATEGORI DOSEN</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($dosen as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nama_peg; ?></td>
                          <td>
                            <a href="javascript:;"
                                data-nip="<?php echo $dt->nip ?>"
                                data-kategori="<?php echo $dt->kategori_dosen ?>"
                                data-nama="<?php echo $dt->nama_peg ?>"
                                data-toggle="modal" data-target="#edit-data"
                                data-toggle="modal" data-target="#ubah-data" class="text text-success">
                                <?php echo $dt->kategori_dosen; ?>
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <!-- Modal Ubah -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Ubah Data</h4>
                            </div>
                            <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Dosen/UpdateDosen">

                              <div class="modal-body">
                                      <div class="form-group">
                                          <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                                          <div class="col-lg-10">
                                              <input type="text" class="form-control" id="nama" name="nama" disabled>
                                          </div>
                                      </div>

                	                    <div class="form-group">
                	                        <label class="col-lg-2 col-sm-2 control-label">Nip</label>
                	                        <div class="col-lg-10">
                	                            <input type="text" class="form-control" id="nip" name="nip" readonly>
                	                        </div>
                	                    </div>

                	                    <div class="form-group">
                	                        <label class="col-lg-2 col-sm-2 control-label">Status Sekarang</label>
                	                        <div class="col-lg-10">
                	                        	<input type="text" class="form-control" id="kategori" name="kategori" readonly>
                	                        </div>
                	                    </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Ganti Status</label>
                                        <div class="col-lg-10">
                                          <select id="id_kat_dosen" name="id_kat_dosen" class="form-control" required>
                                              <option value="">Pilih</option>
                                              <?php foreach($kategoridosen as $dt1){ ?>
                                              <option value="<?php echo $dt1->id_kat_dosen; ?>"><?php echo $dt1->kategori_dosen; ?></option>
                                              <?php } ?>
                                          </select>
                                        </div>
                                      </div>

                	                </div>
                	                <div class="modal-footer">
                	                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                	                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                	                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<!-- END Modal Ubah -->
              </div>
          </div>
   </div>
