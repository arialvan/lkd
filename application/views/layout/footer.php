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
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

    <script>
        $('#myDatepicker2').datetimepicker({
            format: 'YYYY.MM.DD'
        });
        $('#tmt').datetimepicker({
            format: 'YYYY.MM.DD'
        });
        $('#tgl_pensiun').datetimepicker({
            format: 'YYYY.MM.DD'
        });

        $('#myTab a').click(function(e) {
          e.preventDefault();
          $(this).tab('show');
        });

        // store the currently selected tab in the hash value
        $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
          var id = $(e.target).attr("href").substr(1);
          window.location.hash = id;
        });

        // on load of the page: switch to the currently selected tab
        var hash = window.location.hash;
        $('#myTab a[href="' + hash + '"]').tab('show');

// Add Multiple field Rencana Kerja
$(document).ready(function () {
//@naresh action dynamic childs
var next = 0;
$("#add-more").click(function(e){
e.preventDefault();
var addto = "#field" + next;
var addRemove = "#field" + (next);
next = next + 1;
var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><div class="form-group"> <div class="col-sm-3"><label>BKD<span class="required">*</span></label> <select id="bkd" name="bkd[]" class="form-control bkd" onchange="kegiatan2()" required><option value="">Pilih</option><?php foreach($bkd as $b){ ?><option value="<?php echo $b->id_bkd; ?>"><?php echo $b->ket_bkd; ?></option><?php } ?></select> </div> <div class="col-sm-3"> <label>SUB BKD<span class="required">*</span></label><select name="bkd_kegiatan[]" class="form-control col-md-7 col-xs-12 types bkd_kegiatan"><option value="">- Pilih - </option></select> </div> <div class="col-sm-2"> <label>SKS<span class="required">*</span></label> <input id="sks_subkegiatan" class="form-control" name="sks_subkegiatan[]" /></div> <div class="col-sm-4"><label>Keterangan<span class="required">*</span></label><input id="sub_kegiatan" class="form-control" name="sub_kegiatan[]" /> </div></div></div></div>';
var newInput = $(newIn);
var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
var removeButton = $(removeBtn);
$(addto).after(newInput);
$(addRemove).after(removeButton);
$("#field" + next).attr('data-source',$(addto).attr('data-source'));
$("#count").val(next);
$('.remove-me').click(function(e){
e.preventDefault();
var fieldNum = this.id.charAt(this.id.length-1);
var fieldID = "#field" + fieldNum;
$(this).remove();
$(fieldID).remove();
});
});
});

// Dropdown Insert
function kegiatan()
{
    var state=$('#bkd').val();
    $.post('<?php echo base_url();?>RencanaKerja/ambil_kegiatan/',
    {
      state:state
    },
    function(data)
    {
      $('#bkd_kegiatan').html(data);
      //$('#id_unit_kerja').html(data);
    });
}

function kegiatan2()
{
    var state=$('.bkd').val();
    $.post('<?php echo base_url();?>RencanaKerja/ambil_kegiatan/',
    {
      state:state
    },
    function(data)
    {
      $('.bkd_kegiatan').html(data);
      //$('#id_unit_kerja').html(data);
    });
}
//multiple select
            // $(document).ready(function() {
            //     $('.mdb-select').material_select();
            // });
            //Select Search
            $(document).ready(function(){
              $('.selectpicker').selectpicker({
                  style: 'btn-info',
                  size: 4
              });
            });
    </script>


</body>
</html>
