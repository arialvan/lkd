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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                      <div class="clearfix"> </div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Set Unit Kerja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pegawai as $dt){
                            if($dt->status_profil==1){$status='<span class="glyphicon glyphicon-ok" title="OK"></span>';}else{$status='<span class="" title="Belum di Set"></span>';}
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td>
                              <?php echo $dt->nip; ?>
                              <input type="hidden" id="nip" name="nip" value="<?php echo $dt->nip; ?>" />
                          </td>
                          <td><?php echo $status.' '.$dt->nama_peg; ?></td>
                          <td>
                              <?php if($dt->status_profil==0){ ?>
                                    <a data-toggle="modal" data-id="<?php echo $dt->nip; ?>" data-toggle="modal" title="Add this item" class="open-AddBookDialog btn btn-danger" href="#addBookDialog">Set Unit</a>
                              <?php }else{ ?>
                                    <a data-toggle="modal"  data-id="<?php echo $dt->nip; ?>"  data-toggle="modal" title="Add this item" class="open-AddBookDialogs btn btn-info" href="#addBookDialogs">Update Unit</a>
                              <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div id="response"></div>
                  </div>
                  <div class="clearfix"></div>

<!-- MODAL INSERT PROFIL DOSEN -->
                  <div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Insert Profil Dosen</h4>
                        </div>
                          <form class="savedosen" method="post" >
                            <input type="hidden" name="user_level" id="user_level" value="2" class="form-control col-md-7 col-xs-12">
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIDN<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="nidn" id="nidn" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan Sarjana (S1)<span class="required">*</span></label>
                                    <div class="col-sm-2">
                                      <select name="s1" id="s1" class="form-control col-sm-3" required>
                                          <option value="S1">Sarjana (S1)</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="ket_s1" class="form-control col-md-7 col-xs-12" placeholder="Nama Universitas dan Jurusan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan Master (S2)<span class="required">*</span></label>
                                    <div class="col-sm-2">
                                      <select name="s2" id="s2" class="form-control col-sm-3" required>
                                          <option value="S2">Magister(S2)</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="ket_s2" class="form-control col-md-7 col-xs-12" placeholder="Nama Universitas dan Jurusan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pendidikan Doctoral (S3)</label>
                                    <div class="col-sm-2">
                                      <select name="s3" id="s3" class="form-control col-sm-3">
                                          <option value="S3">Doctoral(S3)</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="ket_s3" class="form-control col-md-7 col-xs-12" placeholder="Nama Universitas dan Jurusan">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Sertifikat<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="no_sertifikat" class="form-control col-md-7 col-xs-12" placeholder="Wajib isi bagi dosen sertifikasi">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan Fungsional<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jf" id="id_jf" class="form-control col-md-7 col-xs-12" required>
                                            <?php foreach ($fungsional as $fs) { ?>
                                                 <option value="<?php echo $fs->id_jf; ?>"><?php echo $fs->fungsional; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Dosen<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_kat_dosen" id="id_kat_dosen" class="form-control col-md-7 col-xs-12" required>
                                            <?php foreach ($kategori_dosen as $kt) { ?>
                                                 <option value="<?php echo $kt->id_kat_dosen; ?>"><?php echo $kt->kategori_dosen; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rumpun Ilmu</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_ilmu" id="id_ilmu" class="form-control col-md-7 col-xs-12">
                                            <?php foreach ($rumpun_ilmu as $ri) { ?>
                                                 <option value="<?php echo $ri->id_ilmu; ?>"><?php echo $ri->rumpun_ilmu; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor kontak<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="hp" class="form-control col-md-7 col-xs-12" placeholder="+6281388xxx">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" class="form-control col-md-7 col-xs-12" placeholder="example@gmail.com">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eselon<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_eselon" id="id_eselon" class="form-control col-md-7 col-xs-12" required>
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
                                        <select name="id_gol" id="id_gol" class="form-control col-md-7 col-xs-12" required>
                                            <?php foreach ($golongan as $g){ ?>
                                                 <option value="<?php echo $g->id_gol; ?>"><?php echo $g->nama_golongan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br /><br />

<!-- KELOMPOK ORGANISASI -->
                            <div class="line line-block"></div>
                            <div class="form-group">
                                <h4 class="modal-title" id="myModalLabel">Kelompok Organisasi</h4>
                                <hr />
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Organisasi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit" id="id_unit" class="form-control col-md-7 col-xs-12" required>
                                            <option value="">-- Pilih Unit --</option>
                                            <?php foreach ($unit as $u){ ?>
                                                 <option value="<?php echo $u->id_unit; ?>"><?php echo $u->unit_organisasi.' - '.$u->ket_organisasi; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit_kerja" id="id_unit_kerja" class="form-control col-md-7 col-xs-12 types">
                                          <option value="">-- Pilih --</option>
                                          <?php foreach ($unitkerja as $ukr){ ?>
                                               <option value="<?php echo $ukr->id_unit_kerja; ?>"><?php echo $ukr->unit_kerja; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ketua Prodi</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="ketua_prodi" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($nips as $kt){ ?>
                                                 <option value="<?php echo $kt->nip; ?>"><?php echo $kt->nama_peg; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor 1</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="assesor_1" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($nips as $as1){ ?>
                                                 <option value="<?php echo $as1->nip; ?>"><?php echo $as1->nama_peg; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Assesor 2</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="assesor_2" class="form-control col-md-7 col-xs-12 selectpicker" data-live-search="true">
                                          <option value="">-- Pilih --</option>
                                          <?php foreach ($nips as $as2){ ?>
                                               <option value="<?php echo $as2->nip; ?>"><?php echo $as2->nama_peg; ?></option>
                                          <?php } ?>
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

<!-- MODAL UPDATE PROFIL PEGAWAI -->
                  <div class="modal fade" id="addBookDialogs" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Update Profil Pegawai</h4>
                        </div>
                          <form class="contact-forms" method="post" >
                            <?php //foreach($profil as $key); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIP<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="nip" id="bookIds" required="required" class="form-control col-md-7 col-xs-12">
                                        <!-- <input type="text" name="nip" value="<?php //echo $key->nip; ?>" required="required" class="form-control col-md-7 col-xs-12"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eselon<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_eselon" id="id_eselon" class="form-control col-md-7 col-xs-12">
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Level<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="user_level" id="user_level" class="form-control col-md-7 col-xs-12" required>
                                                 <option value="">-- Pilih --</option>
                                                 <option value="2">Dosen</option>
                                                 <option value="3">Pegawai</option>
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
                                        <select name="id_unit" id="id_unit1" class="form-control col-md-7 col-xs-12" onchange="seljabatan1()">
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
                                        <select name="id_jabatan" id="id_jabatan1" class="form-control col-md-7 col-xs-12 types1" onchange="selunitkerja1()">
                                            <option value="">- Pilih Jabatan  - </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_unit_kerja" class="id_unit_kerja1 form-control col-md-7 col-xs-12" onchange="selsatuankerja1()">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit Satuan Kerja<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_satuan_kerja" id="unitkerja1" class="id_unit_kerja unitkerja form-control col-md-7 col-xs-12" onchange="seljfu1()">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="row_dims1" class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">JFU<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="id_jfu1" id="id_jfu1" class="form-control col-md-7 col-xs-12">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <h3 class="alert-info" id="testDIVs"></h3>
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
   </div>
