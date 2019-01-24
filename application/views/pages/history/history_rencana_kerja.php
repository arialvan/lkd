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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form form-horizontal" role="form" method="GET" action="<?php echo base_url(); ?>History/RencanaKerja">
                      <div class="form-group">
                          <label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Filter <span class="required"></span></label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select id="id" name="id" class="form-control" required="required">
                                <option value="">Periode</option>
                                <?php foreach($periode as $f){ ?>
                                <option value="<?php echo $f->id_periode; ?>"><?php echo $f->periode.'-'.$f->ket_periode; ?></option>
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
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
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
                          <td>
                              <?php echo $dt->nama_peg; ?>
                          </td>
                          <td>
                              <?php
                                echo anchor('History/Cek_RencanaKerja/'.$dt->nip.'/'.$dt->id_periode,'<span class="btn btn-sm btn-primary" title="Lihat Data">Lihat Data</span>');
                              ?>
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
