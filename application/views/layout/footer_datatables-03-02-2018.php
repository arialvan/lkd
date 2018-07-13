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
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

<script>
//Modal Insert Profil Pegawai
  $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val( myBookId );
       $('#addBookDialog').modal('show');
   });
//Modal Update Profil Pegawai
   $(document).on("click", ".open-AddBookDialogs", function () {
        var myBookId = $(this).data('id');
       $(".modal-body #bookIds").val( myBookId );
       $('#addBookDialogs').modal('show');
   });

//INSERT PEGAWAI
function saveToDB()
    {
        console.log('Saving to the db');
        form = $('.contact-form');
            $.ajax({
                    url: "<?php echo base_url(); ?>Pegawai/InsertProfilPegawai",
                    type: "POST",
                    data: form.serialize(),
                    success: function (response) {
                        $("#testDIV").html(response);
                        document.location.reload();
                    },
            });
    }
    $('.contact-form').submit(function(e) {
            saveToDB();
            e.preventDefault();
    });


//INSERT DOSEN
function saveToDBDosen()
    {
        console.log('Saving to the db');
        form = $('.savedosen');
            $.ajax({
                    url: "<?php echo base_url(); ?>Pegawai/InsertProfilDosen",
                    type: "POST",
                    data: form.serialize(),
                    success: function (response) {
                        $("#testDIV").html(response);
                        document.location.reload();
                    },
            });
    }
    $('.saveToDBDosen').submit(function(e) {
            saveToDB();
            e.preventDefault();
    });

// Dropdown Insert
        function seljabatan()
        {
           var state=$('#id_unit').val();
                $.post('<?php echo base_url();?>Pegawai/ambil_jabatan/',
                {
                    state:state
                },
                    function(data)
                        {
                            $('#id_jabatan').html(data);
                        //$('#id_unit_kerja').html(data);
                        });
        }

        function selunitkerja()
        {
           var state=$('#id_jabatan').val();
                $.post('<?php echo base_url();?>Pegawai/ambil_unitkerja/',
                    {
                        state:state
                    },
                    function(data)
                        {
                            $('.id_unit_kerja').html(data);
                        });
        }

        function selsatuankerja()
        {
           var state=$('.id_unit_kerja').val();
                $.post('<?php echo base_url();?>Pegawai/ambil_satuankerja/',
                    {
                        state:state
                    },
                    function(data)
                        {
                            $('#unitkerja').html(data);
                        });
        }

        function seljfu()
        {
           var state=$('#unitkerja').val();
                $.post('<?php echo base_url();?>Pegawai/ambil_jfu/',
                    {
                        state:state
                    },
                        function(data)
                        {
                            $('#id_jfu').html(data);
                        });
        }

// Dropdown Insert
      function selunit()
      {
         var state=$('#id_unit').val();
              $.post('<?php echo base_url();?>Pegawai/ambil_jabatan/',
              {
                  state:state
              },
                  function(data)
                      {
                          $('#id_jabatan').html(data);
                      //$('#id_unit_kerja').html(data);
                      });
      }

      function selunitkerja()
      {
         var state=$('#id_jabatan').val();
              $.post('<?php echo base_url();?>Pegawai/ambil_unitkerja/',
                  {
                      state:state
                  },
                  function(data)
                      {
                          $('.id_unit_kerja').html(data);
                      });
      }

// Hide-Unhide /Controllers/Pegawai/SetOrganisasi
        $(function() {
            $('#row_dim').hide();
            $('#type').change(function(){
                if($('#type').val() == '5') {
                    $('#row_dim').show();
                } else {
                    $('#row_dim').hide();
                }
            });
        });

// Hide-Unhide /Controllers/Pegawai/InputProfilPegawai
// Insert
        $(function() {
            $('#row_dims').hide();
            $('.types').change(function(){
              var mystr =$('.types').val();
              var myarr = mystr.split('#');
              var myvar = myarr[0];
              //alert(myvar);
                 if(myvar == '5') {
                 //if($('.types').val() == '5') {
                    $('#row_dims').show();
                } else {
                    $('#row_dims').hide();
                }
            });
        });

// Update
        $(function() {
            $('#row_dims1').hide();
            $('.types1').change(function(){
              var mystr =$('.types1').val();
              var myarr = mystr.split('#');
              var myvar = myarr[0];

                if(myvar == '5') {
                    $('#row_dims1').show();
                } else {
                    $('#row_dims1').hide();
                }
            });
        });

// Dropdown Update
        function seljabatan1()
        {
           var state=$('#id_unit1').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_jabatan/',
                {
                        state:state

                        },
                        function(data)
                        {

                        $('#id_jabatan1').html(data);
                        //$('#id_unit_kerja').html(data);
                        });

        }

        function selunitkerja1()
        {
           var state=$('#id_jabatan1').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_unitkerja/',
                {
                        state:state

                        },
                        function(data)
                        {

                        $('.id_unit_kerja1').html(data);
                        });

        }

        function selsatuankerja1()
        {
           var state=$('.id_unit_kerja1').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_satuankerja/',
                {
                        state:state

                        },
                        function(data)
                        {

                        $('#unitkerja1').html(data);
                        });

        }

        function seljfu1()
        {
           var state=$('#unitkerja1').val();
                $.post('<?php echo base_url();?>Pegawai/ambil_jfu/',
                    {
                        state:state
                    },
                        function(data)
                        {
                            $('#id_jfu1').html(data);
                        });
        }

        //Ajax Update
            function saveToDBs()
                {
                        console.log('Saving to the db');
                        form = $('.contact-forms');
                            $.ajax({
                                    url: "<?php echo base_url(); ?>Pegawai/UpdateProfilPegawai",
                                    type: "POST",
                                    data: form.serialize(),
                                    success: function (response) {
                                        $("#testDIVs").html(response);
                                        document.location.reload();
                                    },
                            });
                }
                $('.contact-forms').submit(function(e) {
                            saveToDBs();
                            e.preventDefault();
                });

                $(function() {
                    $('#ms').change(function() {
                        console.log($(this).val());
                    }).multipleSelect({
                        width: '100%'
                    });
                });

  //Select Ketua Prodi
              $(document).ready(function(){
                $('.selectpicker').selectpicker({
                  style: 'btn-info',
                  size: 4
                });
              });
    </script>
  </body>
</html>
