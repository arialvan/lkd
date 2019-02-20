<!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; <a href="http://www.uin.ar-raniry.ac.id/">UIN AR-Raniry</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Bar Chart -->
    <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.canvasjs.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
    <script>
    $('.counter-count').each(function () {
       $(this).prop('Counter',0).animate({
           Counter: $(this).text()
       }, {
           duration: 1000,
           easing: 'swing',
           step: function (now) {
               $(this).text(Math.ceil(now));
           }
       });
    });

       //Bar Chart CanvasJS
       window.onload = function () {
         var d = new Date();

         $.getJSON("<?php echo base_url(); ?>Dashboard/BarChart", function (result) {
       		var chart = new CanvasJS.Chart("chartContainer", {
       			animationEnabled: true,
       			title: {
       				text: "Kategori Dosen"
       			},
       			axisX: {
       				interval: 1
       			},
       			axisY: {
       				title: "Tahun <?php echo date('Y'); ?>",
       				scaleBreaks: {
       					type: "wavy",
       					customBreaks: [{
       						startValue: 80,
       						endValue: 210
       						},
       						{
       							startValue: 230,
       							endValue: 600
       						}
       				]}
       			},
             			data: [{
             				type: "bar",
             				//toolTipContent: "<img src='https://canvasjs.com/wp-content/uploads/images/gallery/javascript-column-bar-charts/'{url}' style='width:40px; height:20px;'> <b>{label}</b><br>Budget: ${y}bn<br>{gdp}% of GDP",
             				dataPoints: result
             			}]
         		   });
       		   chart.render();
            });

//BAR JENIS kegiatan
            $.getJSON("<?php echo base_url(); ?>Dashboard/BarKegiatan", function (result) {
             var chart = new CanvasJS.Chart("jenisKegiatan", {
               animationEnabled: true,
               title: {
                 text: ""
               },
               axisX: {
                 interval: 1
               },
               axisY: {
                 title: "Tahun <?php echo date('Y'); ?>",
                 scaleBreaks: {
                   type: "wavy",
                   customBreaks: [{
                     startValue: 80,
                     endValue: 210
                     },
                     {
                       startValue: 230,
                       endValue: 600
                     }
                 ]}
               },
                     data: [{
                       type: "bar",
                       dataPoints: result
                     }]
                  });
                chart.render();
               });

//PIE APPROVALKETUA Prodi
$.getJSON("<?php echo base_url(); ?>Dashboard/PieKetuaProdi", function (result) {
  var chart = new CanvasJS.Chart("KetuaProdi", {
    animationEnabled: true,
    exportEnabled: true,
    title: {
      text: "KETUA PRODI",
      horizontalAlign: "center"
    },
    data: [{
      type: "pie",
      startAngle: 100,
      // yValueFormatString: "##0.00'%'",
      indexLabel: "{label} {y}",
      dataPoints: result
    }]
  });
  chart.render();
});


//PIE APPROVAL Assesor1
$.getJSON("<?php echo base_url(); ?>Dashboard/PieAssesor1", function (result) {
  var chart = new CanvasJS.Chart("Assesor1", {
    animationEnabled: true,
    exportEnabled: true,
    title: {
      text: "ASSESOR 1",
      horizontalAlign: "center"
    },
    data: [{
      type: "pie",
      startAngle: 100,
      // yValueFormatString: "##0.00'%'",
      indexLabel: "{label} {y}",
      dataPoints: result
    }]
  });
  chart.render();
});

//PIE APPROVAL Assesor2
$.getJSON("<?php echo base_url(); ?>Dashboard/PieAssesor2", function (result) {
  var chart = new CanvasJS.Chart("Assesor2", {
    animationEnabled: true,
    exportEnabled: true,
    title: {
      text: "ASSESOR 2",
      horizontalAlign: "center"
    },
    data: [{
      type: "pie",
      startAngle: 100,
      // yValueFormatString: "##0.00'%'",
      indexLabel: "{label} {y}",
      dataPoints: result
    }]
  });
  chart.render();
});


//BAR CHART
          $.getJSON("<?php echo base_url(); ?>Dashboard/PieS", function (result) {
            var chart = new CanvasJS.Chart("setuju", {
            	animationEnabled: true,
              exportEnabled: true,
            	title: {
            		text: "Laporan Di Setujui",
                horizontalAlign: "left"
            	},
            	data: [{
            		type: "pie",
            		startAngle: 158,
            		// yValueFormatString: "##0.00'%'",
            		indexLabel: "{label} {y}",
            		dataPoints: result
            	}]
            });
            chart.render();
          });


          $.getJSON("<?php echo base_url(); ?>Dashboard/PieTS", function (results) {
            var chart = new CanvasJS.Chart("tidaksetuju", {
            	animationEnabled: true,
              exportEnabled: true,
            	title:{
            		text: "Laporan Di Tolak",
            		horizontalAlign: "left"
            	},
            	data: [{
            		type: "pie",
            		// startAngle: 120,
            		// //innerRadius: 60,
            		// indexLabelFontSize: 12,
            		// indexLabel: "{label} - #percent%",
            		// dataPoints: results
                startAngle: 240,
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
            		indexLabel: "{label} {y}",
            		dataPoints: results
            	}]
            });
              chart.render();
          });


//BAR CHART
  $.getJSON("<?php echo base_url(); ?>Dashboard/PieBP", function (resultss) {
    var chart = new CanvasJS.Chart("belumperiksa", {
      animationEnabled: true,
      exportEnabled: true,
      title:{
        text: "Laporan Belum Di Periksa",
        horizontalAlign: "left"
      },
      data: [{
        type: "doughnut",
        // startAngle: 120,
        // //innerRadius: 60,
        // indexLabelFontSize: 12,
        // indexLabel: "{label} - #percent%",
        // dataPoints: results
        startAngle: 120,
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        indexLabel: "{label} {y}",
        dataPoints: resultss
      }]
    });
      chart.render();
  });


  $.getJSON("<?php echo base_url(); ?>Dashboard/PieUP", function (resultsss) {
    var chart = new CanvasJS.Chart("uploadlaporan", {
      animationEnabled: true,
      exportEnabled: true,
      title:{
        text: "Upload Laporan",
        horizontalAlign: "left"
      },
      data: [{
        type: "doughnut",
        // startAngle: 120,
        // //innerRadius: 60,
        // indexLabelFontSize: 12,
        // indexLabel: "{label} - #percent%",
        // dataPoints: results
        startAngle: 85,
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        indexLabel: "{label} {y}",
        dataPoints: resultsss
      }]
    });
      chart.render();
  });


  }

  </script>

</body>
</html>
