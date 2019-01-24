<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php //echo $title; ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h4>Laporan</h4>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form form-horizontal" role="form" method="GET" action="<?php echo base_url(); ?>Laporan/RekapLaporanAssesor1">
                      <div class="form-group">
                          <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Filter<span class="required"></span></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select id="fak" name="fak" class="form-control" required="required">
                                <option value="">Fakultas</option>
                                <?php foreach($fak as $f){ ?>
                                <option value="<?php echo $f->id_fakultas; ?>"><?php echo $f->nama_fakultas; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select id="kat" name="kat" class="form-control">
                                <option value="">Kategori Dosen</option>
                                <?php foreach($profildosen as $b){ ?>
                                <option value="<?php echo $b->id_kat_dosen; ?>"><?php echo $b->kategori_dosen; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-12">
                            <button type="submit" class="btn btn-success">Cari</button>
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                    </form>

                        <table class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                          <thead>
                            <tr>
                              <th rowspan="2">Fakultas</th>
                              <th rowspan="2">NIP</th>
                              <th rowspan="2">Nama</th>
                              <th rowspan="2">Kategori Dosen</th>
                              <th colspan="4">Syarat BKD</th>
                              <th colspan="4">Laporan(Volume/SKS)</th>
                              <th colspan="1">Kesimupulan</th>
                              <th colspan="2">Remunerasi</th>
                                  <tr>
                                    <td>Pendidikan</td>
                                    <td>Penelitian</td>
                                    <td>Pengabdian</td>
                                    <td>Penunjang</td>
                                    <td>Pendidikan</td>
                                    <td>Penelitian</td>
                                    <td>Pengabdian</td>
                                    <td>Penunjang</td>
                                    <td>BKD</td>
                                    <td>P 1</td>
                                    <td>P 2</td>
                                  </tr>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach($datadosen as $dt){
                              $ntotal = array($dt['Pendidikan'],$dt['Penelitian'],$dt['Pengabdian'],$dt['Penunjang']);
                              $sum_bkd = array_sum($ntotal);
                              //Hasil BKD
                              if($dt['Pendidikan'] >= $dt['Syt_Pendidikan'] ){ $hasilbkd="Memenuhi"; }else{ $hasilbkd="Tidak Memenuhi"; }
                              //Syarat P1
                              if($dt['id_kat_dosen']==3 || $dt['id_kat_dosen']==7 || $dt['id_kat_dosen']==9){
                                      $Syarat_BKD = $dt['Syt_Pendidikan']+4;
                                      if($dt['Pendidikan'] >= $Syarat_BKD && $dt['Penelitian'] >= $dt['Syt_Penelitian'] && ($dt['Pengabdian'] >= $dt['Syt_Pengabdian'] && $dt['Penunjang'] >= $dt['Syt_Penunjang']) && $sum_bkd >= 12 ){
                                          $hasil_p1 = "Memenuhi";
                                      }else{
                                          $hasil_p1 = "Belum Memenuhi";
                                      }

                              }elseif($dt['id_kat_dosen']==1 || $dt['id_kat_dosen']==2 || $dt['id_kat_dosen']==4){
                                      $Syarat_BKD = $dt['Syt_Pendidikan']+4;
                                      if($dt['Pendidikan'] >= $Syarat_BKD && $sum_bkd >= 12 ){
                                          $hasil_p1 = "Memenuhi";
                                      }else{
                                          $hasil_p1 = "Belum Memenuhi";
                                      }
                              }elseif($dt['id_kat_dosen']==6 || $dt['id_kat_dosen']==8){
                                      $Syarat_BKD = $dt['Syt_Pendidikan'];
                                      if($dt['Pendidikan'] >= $Syarat_BKD){
                                          $hasil_p1 = "Dibayar Melalui Absensi";
                                      }else{
                                          $hasil_p1 = "Belum Memenuhi";
                                      }
                              }else{ $hasil_p1 = "Belum Memenuhi"; }

                              //HASIL P2
                              if($dt['id_kat_dosen']==6 || $dt['id_kat_dosen']==8){
                                      $Syarat_BKD = $dt['Syt_Pendidikan'];
                                      if($dt['Pendidikan'] >= $Syarat_BKD){
                                          $point = "Memenuhi 30% P2";
                                      }else{
                                          $point = "Belum Memenuhi";
                                      }
                              }else{
                                      if($dt['Points'] >=28){ $point=28; }else{ $point= max($dt['Points'],0); }
                              }
                            ?>
                              <tr>
                                  <th scope="row"><?php echo $dt['nama_fakultas']; ?></th>
                                  <th scope="row"><?php echo $dt['nip']; ?></th>
                                  <td bgcolor="#FFFFF0"><?php echo $dt['nama_peg']; ?></td>
                                  <td scope="row"><?php echo $dt['kategori_dosen']; ?></td>
                                      <td><?php echo $dt['Syt_Pendidikan']; ?></td>
                                      <td><?php echo $dt['Syt_Penelitian']; ?></td>
                                      <td><?php echo $dt['Syt_Pengabdian']; ?></td>
                                      <td><?php echo $dt['Syt_Penunjang']; ?></td>
                                      <td><?php echo $dt['Pendidikan']; ?></td>
                                      <td><?php echo $dt['Penelitian']; ?></td>
                                      <td><?php echo $dt['Pengabdian']; ?></td>
                                      <td><?php echo $dt['Penunjang']; ?></td>
                                      <td><?php echo $hasilbkd; ?></td>
                                      <td><?php echo $hasil_p1; ?></td>
                                      <td><?php echo $point; ?></td>
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
