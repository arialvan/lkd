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
                          <th>Tgl Lahir</th>
                          <th>Status Pegawai</th>
                          <th>Status Profesi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($pegawai as $dt){
                            if($dt->status_profesi==1){
                                $prof="JFU";
                            }elseif($dt->status_profesi==2){
                                $prof="Dosen";
                            }elseif($dt->status_profesi==3){
                                $prof="JFT";
                            }elseif($dt->status_profesi==4){
                                $prof="Kontrak";
                            }else{
                                $prof="-";
                            }

                            if($dt->status_peg==1){
                                $peg="PNS";
                            }else{
                                $peg="Non PNS";
                            }
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->nip; ?></td>
                          <td class=""><?php echo $dt->nama_peg; ?></td>
                          <td><?php echo $dt->tgl_lahir; ?></td>
                          <td><?php echo $peg; ?></td>
                          <td><?php echo $prof ?></td>
                          <td>
                              <?php echo anchor('Pegawai/ProfilPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-arrow-right" title="Detil Data"></span>'); ?> |
                              <?php if($level==1){ ?>
                              <?php echo anchor('Pegawai/EditPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-pencil" title="Edit Data"></span>'); ?> |
                              <?php echo anchor('Pegawai/HapusPegawai/'.$dt->nip,'<span class="glyphicon glyphicon-remove" title="Hapus Data"></span>'); ?>
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
