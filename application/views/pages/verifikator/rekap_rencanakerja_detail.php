<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
              <?php //echo $this->uri->segment(3); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
<!--
=========================
PENDIDIKAN
=========================
-->
                <div class="x_panel">
                  <div class="x_title">
                    <b>REKAP DATA</b>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kegiatan</th>
                          <th>SKS</th>
                          <th>Poin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($rekap as $dt){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $no++; ?></th>
                          <td><?php echo $dt->kegiatan.'<br /><span class="text text-danger">('.$dt->sub_kegiatan.')</span>'; ?></td>
                          <td><?php echo $dt->sks_subkegiatan; ?></td>
                          <td><?php echo $dt->poin_subkegiatan; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

              </div>
          </div>

        </div>
   </div>
