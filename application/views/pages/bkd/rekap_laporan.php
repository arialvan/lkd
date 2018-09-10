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
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <h4>Tampilkan Berdasarkan</h4>
                      <select name="id_asesor" id="id_asesor" class="form-control col-md-7 col-xs-12" onchange="sel_laporan()">
                          <option value="">--Pilih--</option>
                          <option value="asessor1-1">Diterima Assesor 1</option>
                          <option value="asessor2-1">Diterima Assesor 2</option>
                          <option value="1">Diterima Assesor 1 dan Assesor 2</option>
                      </select>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="id_data" class="table table-striped table-bordered myTable display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Assesor</th>
                        </tr>
                        <tbody id="id_data">

                        </tbody>
                      </thead>

                    </table>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
          </div>
   </div>
