<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Input Data Master</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Insert Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#jabatan" data-toggle="tab">Jabatan</a></li>
                        <li><a href="#pangkat" data-toggle="tab">Pangkat</a></li>
                        <li><a href="#golongan" data-toggle="tab">Golongan</a></li>
                        <li><a href="#agama" data-toggle="tab">Agama</a></li>
                        <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                        <li><a href="#mapel" data-toggle="tab">Mapel</a></li>
                      </ul>
                    </div>
                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
            <!-- JABATAN -->              
                        <div class="tab-pane active" id="jabatan">
                            <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahJabatan" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama_jabatan" id="nama_jabatan" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Jabatan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($jabatan as $j){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $j->nama_jabatan; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- PANGKAT --> 
                        <div class="tab-pane" id="pangkat">
                                <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahPangkat" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pangkat <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama_pangkat" id="nama_pangkat" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Pangkat</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($pangkat as $p){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $p->nama_pangkat; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
            <!-- GOLONGAN --> 
                        <div class="tab-pane" id="golongan">
                                <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahGolongan" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Golongan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama_golongan" id="nama_golongan" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Golongan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($golongan as $g){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $g->nama_golongan; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            
            <!-- AGAMA --> 
                        <div class="tab-pane" id="agama">
                                <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahAgama" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agama <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="agama" id="agama" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Agama</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($agama as $p){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $p->agama; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- PENDIDIKAN --> 
                        <div class="tab-pane" id="pendidikan">
                                <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahPendidikan" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama_pendidikan" id="nama_pendidikan" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Pendidikan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($pendidikan as $p){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $p->nama_pendidikan; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- MAPEL --> 
                        <div class="tab-pane" id="mapel">
                                <div class="col-sm-8">
                                <div class="x_title">
                                    <h2>Form Input<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- Form -->
                                <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahMapel" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mapel <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama_mapel" id="nama_mapel" required="required" class="form-control col-md-7 col-xs-12">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                    
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Mapel</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($mapel as $p){ 
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $p->nama_mapel; ?></td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>
            <div class="clearfix"></div>
          </div>
   </div>
