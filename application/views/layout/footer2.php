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



// Add Multiple field Skema Remunerasi
                        $(document).ready(function () {
                            //@naresh action dynamic childs
                            var next = 0;
                            $("#add-more").click(function(e){
                                e.preventDefault();
                                var addto = "#field" + next;
                                var addRemove = "#field" + (next);
                                next = next + 1;
                                var newIn = '<div id="field'+ next +'" name="field'+ next +'"><div class="form-group"> <div class="col-sm-3"><label>Kategori Dosen</label><select id="id_kat_dosen" name="id_kat_dosen[]" class="form-control"><option value="">Pilih</option><?php foreach($dosen as $b){ ?><option value="<?php echo $b->id_kat_dosen;?>"><?php echo $b->kategori_dosen; ?> </option><?php } ?></select></div><div class="col-sm-2"><label>BKD</label><select id="id_bkd" name="id_bkd[]" class="form-control"><option value="">Pilih</option><?php foreach($bkd as $bks){ ?><option value="<?php echo $bks->id_bkd; ?>"><?php echo $bks->ket_bkd; ?> </option><?php } ?></select></div><div class="col-sm-1"><label>SKS BKD</label><input type="number" id="sks_bkd" class="form-control" name="sks_bkd[]" value="0" size="3"/> </div><div class="col-sm-2"><label>Remunerasi</label><select id="id_remun" name="id_remun[]" class="form-control" required> <option value="">Pilih</option> <?php foreach($remun as $r){ ?> <option value="<?php echo $r->id_remun; ?>"><?php echo $r->ket_remun; ?></option> <?php } ?> </select></div> <div class="col-sm-2"> <label>SKS Remun<span class="required">*</span></label> <input type="number" id="sks_remun" class="form-control" name="sks_remun[]" value="0" size="3" /></div><div class="col-sm-1"><label>Poin<span class="required">*</span></label><input type="text" id="poin_remun" class="form-control" name="poin_remun[]" value="0" size="3" /></div>' ;
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

                        })
    </script>


</body>
</html>
