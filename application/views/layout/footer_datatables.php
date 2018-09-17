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
   <!-- Datatables -->
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/editable/js/bootstrap-editable.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.print.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

<script>
$(document).ready(function() {
    $('.myTable').DataTable( {
        "scrollX": true,
        // "dom": 'Bfrtip',
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            'copy', 'excel'
        ]
    } );
} );

//Modal Update Kategori Dosen Controller Dosen
$(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div   = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#nip').attr("value",div.data('nip'));
            modal.find('#kategori').attr("value",div.data('kategori'));
        });
    });

//Modal Update Sub kegiatan dosen
        $(document).ready(function() {
                // Untuk sunting
                $('#tolak').on('show.bs.modal', function (event) {
                    var div   = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#id_kegiatan').attr("value",div.data('id_kegiatan'));
                });
            });

//Modal Update Sub kegiatan dosen
    $(document).ready(function() {
            // Untuk sunting
            $('#edit-pendidikan').on('show.bs.modal', function (event) {
                var div   = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id_kegiatan').attr("value",div.data('id_kegiatan'));
                modal.find('#id_subkegiatan').attr("value",div.data('id_subkegiatan'));
                modal.find('#kegiatan').attr("value",div.data('kegiatan'));
                modal.find('#subkegiatan').attr("value",div.data('subkegiatan'));
                modal.find('#sks').attr("value",div.data('sks'));
            });
        });

        $(document).ready(function() {
                // Untuk sunting
                $('#cek_file').on('show.bs.modal', function (event) {
                    var div   = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#id_subkegiatan').attr("value",div.data('id_subkegiatan'));
                    modal.find('#syarat_file1').attr("value",div.data('syarat_file1'));
                });
            });

//Modal Update Sub kegiatan dosen
            $(document).ready(function() {
                    // Untuk sunting
                    $('#edits').on('show.bs.modal', function (event) {
                        var div   = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                        var modal = $(this)
                        // Isi nilai pada field
                        modal.find('#id_file').attr("value",div.data('id_file'));
                        modal.find('#id_subkegiatan').attr("value",div.data('id_subkegiatan'));
                        modal.find('#nama_file').attr("value",div.data('nama_file'));
                        modal.find('#nama').attr("value",div.data('nama'));
                    });
                });

function ConfirmDelete() {
  return confirm("Anda yakin ingin menghapus data ini?");
}
  //Select Ketua Prodi
              $(document).ready(function(){
                $('.selectpicker').selectpicker({
                  style: 'btn-info',
                  size: 4
                });
              });

  //make status editable
  function subBKD(e,id,title) {
      if(e.keyCode === 13){
        if (confirm('Anda yakin untuk merubah data ini?')) {
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('MasterBkd/Kegiatan')?>",
            data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                    'id': id,
                    'title' :title,
                  },
            success: function(response){
              alert(response);
            }
          });
        }
     }
    }

    function saveData(e,id,title) {
        if(e.keyCode === 13){
          if (confirm('Anda yakin untuk merubah data ini?')) {
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('MasterBkd/EditTable')?>",
              data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                      'id': id,
                      'title' :title,
                    },
              success: function(response){
                alert(response);
              }
            });
          }
       }
      }


      function saveData1(e,id,title) {
          if(e.keyCode === 13){
            if (confirm('Anda yakin untuk merubah data ini?')) {
              e.preventDefault();
              $.ajax({
                type: "POST",
                url: "<?php echo base_url('MasterBkd/EditTable1')?>",
                data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                        'id': id,
                        'title' :title,
                      },
                success: function(response){
                  alert(response);
                }
              });
            }
         }
        }


        function saveData2(e,id,title) {
            if(e.keyCode === 13){
              if (confirm('Anda yakin untuk merubah data ini?')) {
                e.preventDefault();
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('MasterBkd/EditTable2')?>",
                  data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                          'id': id,
                          'title' :title,
                        },
                  success: function(response){
                    alert(response);
                  }
                });
              }
           }
          }


          function saveData3(e,id,title) {
              if(e.keyCode === 13){
                if (confirm('Anda yakin untuk merubah data ini?')) {
                  e.preventDefault();
                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('MasterBkd/EditTable3')?>",
                    data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                            'id': id,
                            'title' :title,
                          },
                    success: function(response){
                      alert(response);
                    }
                  });
                }
             }
            }
//==================================================
            function bkdpendidikan(e,id,title) {
                if(e.keyCode === 13){
                  if (confirm('Anda yakin untuk merubah data ini?')) {
                    e.preventDefault();
                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('MasterBkd/Skema1')?>",
                      data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                              'id': id,
                              'title' :title,
                            },
                      success: function(response){
                        alert(response);
                      }
                    });
                  }
               }
              }

              function bkdpenelitian(e,id,title) {
                  if(e.keyCode === 13){
                    if (confirm('Anda yakin untuk merubah data ini?')) {
                      e.preventDefault();
                      $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('MasterBkd/Skema2')?>",
                        data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                'id': id,
                                'title' :title,
                              },
                        success: function(response){
                          alert(response);
                        }
                      });
                    }
                 }
                }

                function bkdpengabdian(e,id,title) {
                    if(e.keyCode === 13){
                      if (confirm('Anda yakin untuk merubah data ini?')) {
                        e.preventDefault();
                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url('MasterBkd/Skema3')?>",
                          data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                  'id': id,
                                  'title' :title,
                                },
                          success: function(response){
                            alert(response);
                          }
                        });
                      }
                   }
                  }

                  function bkdpenunjang(e,id,title) {
                      if(e.keyCode === 13){
                        if (confirm('Anda yakin untuk merubah data ini?')) {
                          e.preventDefault();
                          $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('MasterBkd/Skema4')?>",
                            data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                    'id': id,
                                    'title' :title,
                                  },
                            success: function(response){
                              alert(response);
                            }
                          });
                        }
                     }
                    }

                    function bkdpendidikans(e,id,title) {
                        if(e.keyCode === 13){
                          if (confirm('Anda yakin untuk merubah data ini?')) {
                            e.preventDefault();
                            $.ajax({
                              type: "POST",
                              url: "<?php echo base_url('MasterBkd/Skema5')?>",
                              data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                      'id': id,
                                      'title' :title,
                                    },
                              success: function(response){
                                alert(response);
                              }
                            });
                          }
                       }
                      }

                      function bkdpenelitians(e,id,title) {
                          if(e.keyCode === 13){
                            if (confirm('Anda yakin untuk merubah data ini?')) {
                              e.preventDefault();
                              $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('MasterBkd/Skema6')?>",
                                data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                        'id': id,
                                        'title' :title,
                                      },
                                success: function(response){
                                  alert(response);
                                }
                              });
                            }
                         }
                        }

                        function bkdpengabdians(e,id,title) {
                            if(e.keyCode === 13){
                              if (confirm('Anda yakin untuk merubah data ini?')) {
                                e.preventDefault();
                                $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url('MasterBkd/Skema7')?>",
                                  data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                          'id': id,
                                          'title' :title,
                                        },
                                  success: function(response){
                                    alert(response);
                                  }
                                });
                              }
                           }
                          }

                          function bkdpenunjangs(e,id,title) {
                              if(e.keyCode === 13){
                                if (confirm('Anda yakin untuk merubah data ini?')) {
                                  e.preventDefault();
                                  $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('MasterBkd/Skema8')?>",
                                    data: {  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                            'id': id,
                                            'title' :title,
                                          },
                                    success: function(response){
                                      alert(response);
                                    }
                                  });
                                }
                             }
                            }

  /* ============================================================== */
$('input[type="submit"]').prop("disabled", true);
var a=0;
//binds to onchange event of your input field
$('.pdfs').bind('change', function() {
if ($('input:submit').attr('disabled',false)){
	$('input:submit').attr('disabled',true);
	}
var ext = $('.pdfs').val().split('.').pop().toLowerCase();
// if ($.inArray(ext, ['pdf','png','jpg','jpeg']) == -1){
if ($.inArray(ext, ['pdf']) == -1){
    	$('.error1').slideDown("slow");
    	$('.error2').slideUp("slow");
      $('.simpan').slideUp("slow");
    	a=0;
	}else{
    	var picsize = (this.files[0].size);
      	if (picsize > 5000000){
          	$('.error2').slideDown("slow");
            $('.simpan').slideUp("slow");
          	a=0;
      	}else{
          	a=1;
          	$('.error2').slideUp("slow");
            $('.simpan').slideDown("slow");
    	 }
    	      $('.error1').slideUp("slow");
              // $('.simpan').slideDown("slow");
    	if (a==1){
    		$('input:submit').attr('disabled',false);
    		}
}
});

function selfakultas()
{
   var state=$('#id_fakultas').val();
        $.post('<?php echo base_url();?>Laporan/ambil_fakultas/',
        {
            state:state
        },
        function(data)
        {
          $('#id_prodi').html(data);
        });
}

function sel_laporan()
{
   var state=$('#id_asesor').val();
        $.post('<?php echo base_url();?>Laporan/ambil_data_asessor/',
        {
            state:state
        },
        function(data)
        {
          $('#id_data').html(data);
        });
}

function saveToDB()
    {
        console.log('Saving to the db');
        form = $('.contact-form');
            $.ajax({
                    url: "<?php echo base_url(); ?>Biodata/UpdateBiodata",
                    type: "POST",
                    data: form.serialize(),
                    success: function (response) {
                        $("#testDIV").html(response);
                          setTimeout(function(){
                             window.location.reload(1);
                          }, 1000);
                    },
            });
    }
    $('.contact-form').submit(function(e) {
            saveToDB();
            e.preventDefault();
    });
    </script>
  </body>
</html>
