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
                    <h2>UPDATE BIODATA</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <br />
                    <?php
                        foreach($pegawai as $key);
                        foreach($profildosen as $profil);
                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Laporan/InsertLaporan" enctype="multipart/form-data">

                       <input type="hidden" name="nip" id="nip" value="<?php echo $key->nip; ?>">
                       <div class="form-group">
                       <div class="profile clearfix">
                            <div class="profile_pic">
                              <?php if(empty($key->foto)){ ?>
                                <img src="<?php echo base_url() ?>./photo/foto.png" alt="" class="img-thumbnail profile_img" width="200">
                              <?php }else{  ?>
                                <img src="<?php echo $key->foto; ?>" alt="<?php echo $key->nip; ?>" class="img-thumbnail profile_img" width="200">
                              <?php } ?>
                            <div class="col-md-6 ">
                                Ganti Foto<input type='file' name="foto" class="form-control" />
                            </div>
                            </div>
                        </div>
                        </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="nip" id="nip" class="form-control col-md-7 col-xs-12" value="<?php echo $key->nip; ?>" />
                            <input type="text" name="nip" id="nip" class="form-control col-md-7 col-xs-12" value="<?php echo $key->nip; ?>" disabled />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="nama_peg" id="nama_peg" class="form-control col-md-7 col-xs-12" value="<?php echo $key->nama_peg; ?>" />
                          <input type="text" name="nama_peg" id="nama_peg" class="form-control col-md-7 col-xs-12" value="<?php echo $key->nama_peg; ?>" disabled />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Sertifikat<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control col-md-7 col-xs-12" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="status" id="status" class="form-control col-md-7 col-xs-12" value="<?php echo $profil->kategori_dosen; ?>" disabled />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat PT<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="pt" id="pt" class="form-control col-md-7 col-xs-12" value="BANDA ACEH" disabled />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fakultas<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_fakultas" id="id_fakultas" class="form-control col-md-7 col-xs-12" onchange="selfakultas()">
                              <option value="">-- Pilih Fakultas --</option>
                              <?php foreach ($fakultas as $u){ ?>
                                   <option value="<?php echo $u->id_fakultas; ?>"><?php echo $u->nama_fakultas; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prodi<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_prodi" id="id_prodi" class="form-control col-md-7 col-xs-12 types" onchange="selprodi()">
                              <option value="">- Pilih Prodi  - </option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jabatan Fungsional/Golongan<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_jabatan" id="id_jabatan" class="form-control col-md-7 col-xs-12">
                              <option value="0">-- Belum Ada --</option>
                              <?php foreach ($jabatan as $j){ ?>
                                   <option value="<?php echo $j->id_jabatan; ?>"><?php echo $j->nm_jabatan; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tempat/Tgl Lahir<span class="required"></span></label>

                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control col-md-5 col-xs-6" />
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <input type="text" name="thn" id="thn" class="form-control col-md-5 col-xs-6" placeholder="Thn" />
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <?php
                              $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                              $transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
                              $last8 = array_reverse(array_slice($transposed, -8, 12, true), true);
                          ?>
                          <select name="bln" id="bln" class="form-control col-md-7 col-xs-12 types" onchange="selprodi()">
                              <option value="">bln</option>
                                <?php
                                    foreach ($months as $num => $name) {
                                        printf('<option value="%u">%s</option>', $num, $name);
                                    }
                                ?>
                          </select>
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <select name="tgl" id="tgl" class="form-control col-md-7 col-xs-12 types" onchange="selprodi()">
                              <option value="">tgl</option>
                              <?php
                                for ($i=01; $i <=12 ; $i++) {
                                    $value = $i;
                                    if ($i < 10) {
                                        $value = str_pad($i, 2, "0", STR_PAD_LEFT);
                                    }
                                    echo '<option value='.$value.'>'.$value.'</option>';
                                }
                              ?>
                          </select>
                        </div>
                        
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Rumpun Ilmu<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="rumpun_ilmu" id="rumpun_ilmu" class="form-control col-md-7 col-xs-12" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. HP<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no_hp" id="no_hp" class="form-control col-md-7 col-xs-12" />
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
