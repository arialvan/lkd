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
                <a href="<?php echo base_url() ?>RencanaKerja/Laporan" class="btn btn-primary">Kembali</a>
                  <div class="x_panel" style="">
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
                          <th>Nama File</th>
                          <th>File</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($subkegiatan as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nama_file; ?></td>
                          <td><?php echo $dt->file; ?></td>
                          <td>
                            <a href="javascript:;"
                                data-id_file="<?php echo $dt->id ?>"
                                data-id_subkegiatan="<?php echo $dt->id_subkegiatan ?>"
                                data-nama_file="<?php echo $dt->file ?>"
                                data-toggle="modal" data-target="#edits">
                                <span class="text text-danger">Edit</span>
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edits" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title">Ubah Data</h4>
                        </div>
                        <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>RencanaKerja/UpdateFile" enctype="multipart/form-data">
                          <input type="hidden" class="form-control" id="id_file" name="id_file" />
                          <input type="hidden" class="form-control" id="id_subkegiatan" name="id_subkegiatan" />
                          <input type="hidden" class="form-control" id="nama_file" name="nama_file" />
                          <div class="modal-body">
                                  <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Upload File</label>
                                      <div class="col-lg-10">
                                          <input type="file" name="files" id="files" class="form-control" required/>
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
   </div>
