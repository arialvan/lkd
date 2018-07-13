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
                    <h2>Form Input</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Pegawai/InsertPegawai" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nip" id="nip" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Pegawai<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_peg" id="nama_peg" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" class="form-control" name="alamat"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_gol" name="id_gol" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($golongan as $gol){ ?>
                                <option value="<?php echo $gol->id_gol; ?>"><?php echo $gol->nama_golongan; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_agama" name="id_agama" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($agama as $ag){ ?>
                                <option value="<?php echo $ag->id_agama; ?>"><?php echo $ag->agama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mapel<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_mapel" name="id_mapel" class="form-control" required>
                                <option value="">Pilih</option>
                                <?php foreach($mapel as $ma){ ?>
                                <option value="<?php echo $ma->id_mapel; ?>"><?php echo $ma->nama_mapel; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Askes<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="no_askes" id="no_askes" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telephone<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="telp" id="telp" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="tempat_lhr" class="form-control" name="tempat_lhr"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Lahir</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="myDatepicker2">
                            <input type='text' name="tgl_lahir" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="jenis_kel" name="jenis_kel" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Darah<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="gol_darah" name="gol_darah" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Nikah<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status_nikah" name="status_nikah" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                            <option value="3">Duda</option>
                            <option value="4">Janda</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Anak<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="jumlah_anak" id="jumlah_anak" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pegawai<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status_peg" name="status_peg" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">PNS</option>
                            <option value="2">Kontrak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Profesi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status_profesi" name="status_profesi" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="1">JFU</option>
                            <option value="2">Dosen</option>
                            <option value="3">JFT</option>
                            <option value="4">Kontrak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Masa Kerja<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="masa_kerja" id="masa_kerja" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gaji Pokok Rp.<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="gaji_pokok" id="gaji_pokok" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">TMT</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="tmt">
                            <input type='text' name="tmt" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Pensiun</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="tgl_pensiun">
                            <input type='text' name="tgl_pensiun" class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="ket" class="form-control" name="ket"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='file' name="foto" class="form-control" />
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

   