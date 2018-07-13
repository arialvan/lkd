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
                        foreach($views as $v);
                        //Jenis Kelamin dan Status Pegawai
                        if($key->jenis_kel==1){
                           $jk='Laki-Laki'; $sp='PNS';
                        }else{
                           $jk='Perempuan'; $sp='Pegawai Kontrak';
                        }
                        if($key->status_peg==1){
                           $sp='PNS';
                        }else{
                           $sp='Pegawai Kontrak';
                        }
                        //Status Menikah
                        if($key->status_nikah==1){
                           $sn='Menikah'; 
                        }elseif($key->status_nikah==2){
                           $sn='Belum Menikah';
                        }elseif($key->status_nikah==3){
                           $sn='Duda';
                        }elseif($key->status_nikah==4){
                           $sn='Janda';
                        }else{
                           $sn='N/A';
                        }
                        
                        //Status Profesi
                        if($key->status_profesi==1){
                           $pf='JFU'; 
                        }elseif($key->status_profesi==2){
                           $pf='Dosen';
                        }elseif($key->status_profesi==3){
                           $pf='JFT';
                        }elseif($key->status_profesi==4){
                           $pf='Kontrak';
                        }else{
                           $pf='N/A';
                        }
                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Pegawai/UpdatePegawai" enctype="multipart/form-data">
                       <input type="hidden" name="nip" id="nip" value="<?php echo $key->nip; ?>">
                       <div class="form-group">
                       <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="<?php echo $key->foto; ?>" alt="<?php echo $key->nama_peg; ?>" class="img-thumbnail profile_img" width="200">
                            <div class="col-md-6 ">
                                Ganti Foto<input type='file' name="foto" class="form-control" />
                            </div>
                            </div>
                        </div>
                        </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Pegawai<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_peg" id="nama_peg" class="form-control col-md-7 col-xs-12" value="<?php echo $key->nama_peg; ?>">
                        </div>
                        </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" class="form-control" name="alamat" value="<?php echo $key->nip; ?>"><?php echo $key->alamat; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_gol" name="id_gol" class="form-control" required>
                                <option value="<?php echo $key->id_gol; ?>"><?php echo $v->nama_golongan.' - '.$v->jabatan_struktural; ?></option>
                                <?php foreach($golongan as $gol){ ?>
                                <option value="<?php echo $gol->id_gol; ?>"><?php echo $gol->nama_golongan.' - '.$gol->nama_jabatan; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="id_agama" name="id_agama" class="form-control" required>
                                <option value="<?php echo $key->id_agama; ?>"><?php echo $key->id_agama; ?></option>
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
                                <option value="<?php echo $key->id_mapel; ?>"><?php echo $key->id_mapel; ?></option>
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
                            <input type="number" name="no_askes" id="no_askes" class="form-control col-md-7 col-xs-12" value="<?php echo $key->no_askes; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telephone<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="telp" id="telp" class="form-control col-md-7 col-xs-12" value="<?php echo $key->telp; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="tempat_lhr" class="form-control" name="tempat_lhr" value="<?php echo $key->tempat_lhr; ?>"><?php echo $key->tempat_lhr; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Lahir</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="myDatepicker2">
                            <input type='text' name="tgl_lahir" class="form-control" value="<?php echo $key->tgl_lahir; ?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="jenis_kel" name="jenis_kel" class="form-control" required>
                            <option value="<?php echo $key->jenis_kel; ?>"><?php echo $jk; ?></option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Darah<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="gol_darah" name="gol_darah" class="form-control" required>
                            <option value="<?php echo $key->gol_darah; ?>"><?php echo $key->gol_darah; ?></option>
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
                            <option value="<?php echo $key->status_nikah; ?>"><?php echo $sn; ?></option>
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
                            <input type="number" name="jumlah_anak" id="jumlah_anak" class="form-control col-md-7 col-xs-12" value="<?php echo $key->jumlah_anak; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pegawai<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status_peg" name="status_peg" class="form-control" required>
                            <option value="<?php echo $key->status_peg; ?>"><?php echo $sp; ?></option>
                            <option value="1">PNS</option>
                            <option value="2">Kontrak</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Profesi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="status_profesi" name="status_profesi" class="form-control" required>
                            <option value="<?php echo $key->status_profesi; ?>"><?php echo $pf; ?></option>
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
                            <input type="text" name="masa_kerja" id="masa_kerja" class="form-control col-md-7 col-xs-12" value="<?php echo $key->masa_kerja; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gaji Pokok Rp.<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control col-md-7 col-xs-12" value="<?php echo number_format($key->gaji_pokok); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">TMT</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="tmt">
                            <input type='text' name="tmt" class="form-control" value="<?php echo $key->tmt; ?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl-lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Pensiun</label>
                        <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="tgl_pensiun">
                            <input type='text' name="tgl_pensiun" class="form-control" value="<?php echo $key->tgl_pensiun; ?>"  />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="ket" class="form-control" name="ket"  value="<?php echo $key->ket; ?>"><?php echo $key->ket; ?></textarea>
                        </div>
                      </div>
<!--                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='file' name="foto" class="form-control" />
                        </div>
                      </div>-->
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

   