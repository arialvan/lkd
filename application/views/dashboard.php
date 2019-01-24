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
      <span class="count_top"><i class="fa fa-calendar-plus-o"></i> Total Rencana Kerja</span>
      <?php foreach($all as $dt); ?>
      <div class="count"><?php echo number_format($dt->Totals); ?></div>
      <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Jumlah Assesor 1</span>
      <?php foreach($assesor_1 as $dt1); ?>
      <div class="count"><?php echo number_format($dt1->Assesor1); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Jumlah Assesor 2</span>
      <?php foreach($assesor_2 as $dt2); ?>
      <div class="count"><?php echo number_format($dt2->Assesor2); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Jumlah Ketua Prodi</span>
      <?php foreach($kp as $dt3); ?>
      <div class="count"><?php echo number_format($dt3->KetuaProdi); ?></div>
      <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-universal-access"></i> Jumlah Dosen</span>
      <?php foreach($dosen as $dt4); ?>
      <div class="count"><?php echo $dt4->Dosen; ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
  </div>
  <!-- /top tiles -->
<div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div id="chartContainer" style="height: 400px; max-width: 100%; margin-top: 75px;"></div>
            <div class="clearfix"></div>
        </div>
        <br />

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div id="setuju" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
              <div class="clearfix"></div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-6">
            <div id="tidaksetuju" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
              <div class="clearfix"></div>
          </div>
        </div>
        <br /><br />

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div id="belumperiksa" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
              <div class="clearfix"></div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-6">
            <div id="uploadlaporan" style="height: 300px; max-width: 100%; margin-top: 50px;"></div>
              <div class="clearfix"></div>
          </div>
        </div>

</div>
</div>
<!-- /page content -->
