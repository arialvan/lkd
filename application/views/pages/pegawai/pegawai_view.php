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
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Eselon</th>
                          <th>Golongan-Jabatan</th>
                          <th>Jabatan Struktural</th>
                          <th>JP</th>
                          <th>Unit Organisasi</th>
                          <th>Unit Kerja</th>
                          <th>Satuan Kerja</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pegawai as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nip; ?></td>
                          <td><?php echo $dt->nama_peg; ?></td>
                          <td><?php echo $dt->eselon; ?></td>
                          <td><?php echo $dt->nama_golongan.'<br />'.$dt->nama_jabatan; ?></td>
                          <td><?php echo $dt->jabatan_struktural; ?></td>
                          <td><?php echo $dt->nama_pendidikan; ?></td>
                          <td><?php echo $dt->unit_organisasi; ?></td>
                          <td><?php echo $dt->unit_kerja; ?></td>
                          <td><?php echo $dt->satuan_kerja; ?></td>
                          <td>
                              <?php echo anchor('Pegawai/ProfilPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-arrow-right" title="Detil Data"></span>'); ?>&nbsp;&nbsp;
                              <?php if($level==1){ ?>
                              <?php echo anchor('Pegawai/EditPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?>
                              <?php echo anchor('Pegawai/resetPassword/'.$dt->nip,'<span class="glyphicon glyphicon-refresh" title="Reset Password"></span>'); ?>
                              <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
          </div>
   </div>
