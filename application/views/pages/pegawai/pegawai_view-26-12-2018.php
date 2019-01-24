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
                    <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Kategori Dosen</th>
                          <th>Fakultas</th>
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
                          <td><?php echo $dt->kategori_dosen; ?></td>
                          <td><?php echo $dt->nama_fakultas; ?></td>
                          <td>
                              <?php //echo anchor('Pegawai/ProfilPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-arrow-right" title="Detil Data"></span>'); ?>&nbsp;&nbsp;
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
