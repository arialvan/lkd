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
                        foreach($pegawai as $key);
                        //foreach($views as $v);
                        if($key->jenis_kel==1){
                           $jk='Laki-Laki'; $sp='PNS';
                        }else{
                           $jk='Perempuan'; $sp='Pegawai Kontrak';
                        }
                        if($key->status_nikah==1){
                           $sn='Menikah';
                        }elseif($key->status_nikah==2){
                           $sn='Belum Menikah';
                        }elseif($key->status_nikah==3){
                           $sn='Duda';
                        }else{
                           $sn='Janda';
                        }
                    ?>
                    <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo $key->foto; ?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $key->nama_peg; ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-neuter user-profile-icon"></i> <?php echo $key->nip; ?></li>

                        <li>
                          <i class="fa fa-map-marker user-profile-icon"></i> <?php echo $key->alamat; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i> <?php echo $key->telp; ?>
                        </li>
                      </ul>

                      <a href="<?php echo base_url() ?>Pegawai/EditPegawai/<?php echo $key->nip; ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      <!-- start skills -->
                      <h4><u>Data Diri</u></h4>
                      <ul class="list-unstyled user_data">
                        <li>Tgl Lahir :<?php echo $key->tgl_lahir; ?></li>
                        <li>
                          Tempat Lahir :<?php echo $key->tempat_lhr; ?>
                        </li>
                        <li>
                          Kelamin :<?php echo $jk; ?>
                        </li>
                        <li>
                          Gol Darah :<?php echo $key->gol_darah; ?>
                        </li>
                        <li>
                          Jumlah Anak :<?php echo $key->jumlah_anak; ?>
                        </li>
                        <li class="m-top-xs">
                          Status Pernikahan : <?php echo $sn; ?>
                        </li>

                      </ul>
                      <!-- end of skills -->
                      <br />

                      <!-- start masa kerja -->
                      <h4><u>Status Pekerjaan</u></h4>
                      <ul class="list-unstyled user_data">
                        <li>Status Pegawai :<?php echo $sp; ?></li>
                        <li>Status Profesi :<?php echo $key->status_profesi; ?></li>
                        <li>Masa Kerja :<?php echo $key->masa_kerja; ?></li>
                        <li>Gaji Pokok :<?php echo number_format($key->gaji_pokok); ?></li>
                        <li>TMT :<?php echo $key->tmt; ?></li>
                        <li>Pensiun :<?php echo $key->tgl_pensiun; ?></li>
                      </ul>
                      <!-- end of masa kerja -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_jabatan" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Riwayat Jabatan</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_pendidikan" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Riwayat Pendidikan</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_diklat" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Riwayat Diklat</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_seminar" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Riwayat Seminar</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_jabatan" aria-labelledby="home-tab">
                              <div class="x_content">
                                <table id="" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Jabatan</th>
                                      <th>Tahun</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($riw_jabatan as $dt){
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $no++; ?></th>
                                      <td><?php echo $dt->jabatan_struktural; ?></td>
                                      <td><?php echo $dt->Tahun; ?></td>
                                      <td>
                                          <?php echo anchor('Pegawai/HapusPegawai/'.$dt->id_riwayat_jabatan,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_pendidikan" aria-labelledby="profile-tab">
                              <div class="x_content">
                                <table id="" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Pendidikan</th>
                                      <th>Nama Sekolah</th>
                                      <th>No STTB</th>
                                      <th>Jurusan</th>
                                      <th>Tahun Lulus</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($riw_pendidikan as $dt){
                                    ?>
                                    <tr>
                                      <th scope="row"><?php echo $no++; ?></th>
                                      <td><?php echo $dt->nama_pendidikan; ?></td>
                                      <td><?php echo $dt->nama_sekolah; ?></td>
                                       <td><?php echo $dt->no_sttb; ?></td>
                                      <td><?php echo $dt->jurusan; ?></td>
                                       <td><?php echo $dt->tahun_lulus; ?></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_diklat" aria-labelledby="profile-tab">
                              <div class="x_content">
                                <table id="" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Diklat</th>
                                      <th>Penyelenggara</th>
                                      <th>Tgl Diklat</th>
                                      <th>Lama Diklat</th>
                                      <th>Tempat Diklat</th>
                                      <th>Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($riw_diklat as $dt){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $dt->nama_diklat; ?></td>
                                        <td><?php echo $dt->penyelenggara; ?></td>
                                        <td><?php echo $dt->tgl_diklat; ?></td>
                                        <td><?php echo $dt->lama_diklat; ?></td>
                                        <td><?php echo $dt->tempat_diklat; ?></td>
                                        <td><?php echo $dt->keterangan; ?></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_seminar" aria-labelledby="profile-tab">
                              <div class="x_content">
                                <table id="" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Seminar</th>
                                      <th>Peranan</th>
                                      <th>Tgl Seminar</th>
                                      <th>Penyelenggara</th>
                                      <th>Tempat</th>
                                      <th>Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($riw_seminar as $dt){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo $dt->nama_seminar; ?></td>
                                        <td><?php echo $dt->peranan; ?></td>
                                        <td><?php echo $dt->tgl_seminar; ?></td>
                                        <td><?php echo $dt->penyelenggara; ?></td>
                                        <td><?php echo $dt->tempat; ?></td>
                                        <td><?php echo $dt->keterangan; ?></td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
   </div>
