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
       //Bar Chart
       $(document).ready(function () {
       $.getJSON("<?php echo base_url(); ?>Dashboard/BarChart", function (result) {
           var chart = new CanvasJS.Chart("chartContainer", {
               data: [
                       {
                           type: "bar",
                           showInLegend: true,
                           legendText: "Data Grafik",
                           color: "rgba(79, 82, 186, 0.9)",
                           dataPoints: result
                       }
                     ]
                   });
                   chart.render();
               });
           });

       //Pie Chart
       window.onload = function () {
           $.getJSON("#", function (result) {
               var chart = new CanvasJS.Chart("pieChart",
               {
                       title:{
                               text: "Data Grafik"
                       },
                       legend: {
                               maxWidth: 350,
                               itemWidth: 120
                       },
                       data: [
                       {
                               type: "pie",
                               showInLegend: true,
                               legendText: "{indexLabel}",
                               dataPoints: result
                       }
                       ]
               });
               chart.render();
           });
       }
   </script>

</body>
</html>
