<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?php //echo $title; ?></h3>
      </div>
    </div>
    <div class="clearfix"></div>
  <!-- top tiles -->
  <div class="row tile_count">
    <h1>DASHBOARD</h1>
  </div>
  <!-- /top tiles -->
<div class="clearfix"></div>
<?php
  foreach($all as $dt);
  foreach($all_laporan as $dt1);
  foreach($app_assesor1 as $as1);
  foreach($app_assesor2 as $as2);
  foreach($app_kp as $kp);
?>

<div class="row">

  <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel" style="">
          <div class="x_title">
            <h2>KEGIATAN</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="counter col-md-6 col-sm-6 col-xs-12">
                <p class="counter-count-kegiatan"><?php echo number_format($dt->Totals); ?></p>
                <p class="employee-p">Total RBKD</p>
            </div>

            <div class="counter col-md-6 col-sm-6 col-xs-12">
                <p class="counter-count-kegiatan"><?php echo number_format($dt1->All_Laporan); ?></p>
                <p class="employee-p">Total LBKD</p>
            </div>

          </div>
      </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel" style="">
          <div class="x_title">
            <h2>KEGIATAN YANG ANDA LAPOR</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div id="jenisKegiatan" style="height: 400px; max-width: 100%; margin-top: 75px;"></div>
                <div class="clearfix"></div>
            </div>
          </div>
      </div>
  </div>

<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel" style="">
          <div class="x_title">
            <h2>APPROVAL LAPORAN</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="counter col-md-4 col-sm-4 col-xs-12">
                <div id="KetuaProdi" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
            </div>

            <div class="counter col-md-4 col-sm-4 col-xs-12">
                <div id="Assesor1" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
            </div>

            <div class="counter col-md-4 col-sm-4 col-xs-12">
                <div id="Assesor2" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
            </div>

          </div>
        </div>
  </div>
</div>



</div>
</div>
<!-- /page content -->
