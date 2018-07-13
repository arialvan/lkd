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
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Total Pegawai</span>
      <?php foreach($all as $dt); ?>
      <div class="count"><?php echo number_format($dt->totals); ?></div>
      <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> PNS</span>
      <?php foreach($pns as $dt1); ?>
      <div class="count"><?php echo number_format($dt1->PNS); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Dosen</span>
      <?php foreach($dosen as $dt2); ?>
      <div class="count"><?php echo number_format($dt2->Dosen); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tenaga Kontrak</span>
      <?php foreach($kontrak as $dt3); ?>
      <div class="count"><?php echo number_format($dt3->Kontrak); ?></div>
      <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-institution"></i> Unit Organisasi</span>
      <?php foreach($unitorg as $dt4); ?>
      <div class="count"><?php echo $dt4->Unit; ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-building"></i> Unit Kerja</span>
      <?php foreach($unitkerja as $dt5); ?>
      <div class="count"><?php echo $dt5->UnitKerja; ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
  </div>
  <!-- /top tiles -->
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><a href="#" ><i class="fa fa-caret-square-o-right"></i></a></div>
              <div class="count"><a href="#" >LKD</a></div>
              <h3>&nbsp;</h3>
              <p>Aplikasi Laporan Kerja Dosen</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><a href="#" ><i class="fa fa-caret-square-o-right"></i></a></div>
              <div class="count"><a href="#" >SKP</a></div>
              <h3>&nbsp;</h3>
              <p>Sistem Kinerja Pegawai</p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
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
                <div id="chartContainer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
      </div>
  </div>
</div>
<!-- /page content -->
