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
                      <ul class="nav nav-tabs tabs-left" id="myTab">
                        <li class="active"><a href="#jabatan" data-toggle="tab">Jabatan Struktural</a></li>
                        <li><a href="#jfu" data-toggle="tab">JFU</a></li>
                        <li><a href="#unit" data-toggle="tab">Unit Organisasi</a></li>
                        <li><a href="#unitkerja" data-toggle="tab">Unit Kerja</a></li>
                        <li><a href="#unitsatuankerja" data-toggle="tab">Unit Satuan Kerja</a></li>
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
                          <div class="col-sm-12">
                              <div class="x_title">
                                  <h2>Form Input<small></small></h2>
                                  <div class="clearfix"></div>
                              </div>
                              <!-- Form -->
                              <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahJabatan" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="nama_jabatan" id="nama_jabatan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ketik Nama Jabatan">
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                      </div>
                                  </div>
                              </form>
                              <br />  <br />

                                <div class="x_title">
                                    <h2>Jabatan Struktural<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($jabatan as $j){
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $j->jabatan_struktural; ?></td>
                                        <td>
                                          <?php echo anchor('Master/EditJabatan/'.$j->id_jabatan,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                          <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                        </td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

<!-- JFU -->
                    <div class="tab-pane" id="jfu">
                        <div class="col-sm-12">
                          <div class="x_title">
                            <h2>Form Input<small></small></h2>
                              <div class="clearfix"></div>
                          </div>
                          <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahJfu" enctype="multipart/form-data">
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="jfu" id="jfu" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama JFU">
                                 </div>
                              </div>
                              <div class="form-group">
                                  <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </div>
                              </div>
                          </form>
                          <br />  <br />
                            <div class="x_title">
                                <h2>Database<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>JFU</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($jfu as $jf){
                                    ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $jf->jfu; ?></td>
                                    <td>
                                      <?php echo anchor('Master/EditJfu/'.$jf->id_jfu,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                      <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                    </td>
                                  </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

<!-- UNIT ORGANISASI -->
                    <div class="tab-pane" id="unit">
                        <div class="col-sm-12">
                          <div class="x_title">
                            <h2>Form Input<small></small></h2>
                              <div class="clearfix"></div>
                          </div>
                          <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahUnit" enctype="multipart/form-data">
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="unit_organisasi" id="unit_organisasi" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Unit Organisasi">
                                 </div>
                              </div>
                              <div class="form-group">
                                  <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </div>
                              </div>
                          </form>
                          <br />  <br />
                            <div class="x_title">
                                <h2>Database<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Unit Organisasi</th>
                                    <th>Ket Unit</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($unit as $u){
                                    ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $u->unit_organisasi; ?></td>
                                    <td><?php echo $u->ket_organisasi; ?></td>
                                    <td>
                                      <?php echo anchor('Master/EditUnit/'.$u->id_unit,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                      <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                    </td>
                                  </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

<!-- UNIT KERJA -->
                    <div class="tab-pane" id="unitkerja">
                        <div class="col-sm-12">
                          <div class="x_title">
                            <h2>Form Input<small></small></h2>
                              <div class="clearfix"></div>
                          </div>
                          <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahUnitKerja" enctype="multipart/form-data">
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="unit_kerja" id="unit_kerja" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Unit Kerja">
                                      <input type="hidden" name="crashunit_kerja" value="#unitkerja">
                                 </div>
                              </div>
                              <div class="form-group">
                                  <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </div>
                              </div>
                          </form>
                          <br />  <br />
                            <div class="x_title">
                                <h2>Database<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Unit Kerja</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($unitkerja as $uk){
                                    ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $uk->unit_kerja; ?></td>
                                    <td>
                                      <?php echo anchor('Master/EditUnitKerja/'.$uk->id_unit_kerja,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                      <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                    </td>
                                  </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

<!-- UNIT SATUAN KERJA -->
                    <div class="tab-pane" id="unitsatuankerja">
                        <div class="col-sm-12">
                          <div class="x_title">
                            <h2>Form Input<small></small></h2>
                              <div class="clearfix"></div>
                          </div>
                          <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahUnitSatuanKerja" enctype="multipart/form-data">
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" name="satuan_kerja" id="satuan_kerja" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Unit Satuan Kerja">
                                      <input type="hidden" name="crashsatuan_kerja" value="#unitsatuankerja">
                                 </div>
                              </div>
                              <div class="form-group">
                                  <div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </div>
                              </div>
                          </form>
                          <br />  <br />
                            <div class="x_title">
                                <h2>Database<small></small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Unit Satuan Kerja</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($satuankerja as $sk){
                                    ?>
                                  <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $sk->satuan_kerja; ?></td>
                                    <td>
                                      <?php echo anchor('Master/EditSatuanKerja/'.$sk->id_satuan_kerja,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                      <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                    </td>
                                  </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!-- GOLONGAN -->
            <div class="tab-pane" id="golongan">
                <div class="col-sm-12">
                <div class="x_title">
                    <h2>Form Input<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                  <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahGolongan" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="nama_golongan" id="nama_golongan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Golongan">
                         </div>
                      </div>
                      <div class="form-group">
                          <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                      </div>
                  </form>
                  <br />  <br />
                    <div class="x_title">
                        <h2>Database<small></small></h2>
                        <div class="clearfix"></div>
                    </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Action</th>
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
                            <td><?php echo $g->nama_jabatan; ?></td>
                            <td>
                              <?php echo anchor('Master/EditGolongan/'.$g->id_gol,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                            </td>
                          </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- AGAMA -->
                        <div class="tab-pane" id="agama">
                          <div class="col-sm-12">
                              <div class="x_title">
                                  <h2>Form Input<small></small></h2>
                                  <div class="clearfix"></div>
                              </div>
                              <!-- Form -->
                              <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahAgama" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="agama" id="agama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Agama">
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                      </div>
                                  </div>
                              </form>
                              <br /><br />
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Agama</th>
                                        <th>Action</th>
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
                                        <td>
                                          <?php echo anchor('Master/EditAgama/'.$p->id_agama,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                          <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                        </td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- PENDIDIKAN -->
                        <div class="tab-pane" id="pendidikan">
                          <div class="col-sm-12">
                              <div class="x_title">
                                  <h2>Form Input<small></small></h2>
                                  <div class="clearfix"></div>
                              </div>
                              <!-- Form -->
                              <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahPendidikan" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="nama_pendidikan" id="nama_pendidikan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Pendidikan">
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                      </div>
                                  </div>
                              </form>
                              <br /><br />
                                <div class="x_title">
                                    <h2>Database<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Pendidikan</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($pendidikan as $pn){
                                        ?>
                                      <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $pn->nama_pendidikan; ?></td>
                                        <td>
                                          <?php echo anchor('Master/EditPendidikan/'.$pn->id_pendidikan,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                                          <?php //echo anchor('Pegawai/HapusPegawai/'.$j->id_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                        </td>
                                      </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- MAPEL -->
                        <div class="tab-pane" id="mapel">
                          <div class="col-sm-12">
                              <div class="x_title">
                                  <h2>Form Input<small></small></h2>
                                  <div class="clearfix"></div>
                              </div>
                              <!-- Form -->
                              <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/TambahMapel" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="nama_mapel" id="nama_mapel" required="required" class="form-control col-md-7 col-xs-12" placeholder="Masukan Nama Mapel">
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                      </div>
                                  </div>
                              </form>
                              <br /><br />
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
