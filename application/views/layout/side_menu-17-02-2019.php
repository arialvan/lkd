            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><u>General</u></h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>Dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-graduation-cap"></i> Data Dosen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Pegawai">View</a></li>
                        <li><a href="<?php echo base_url() ?>Import">Import</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <?php if($this->session->userdata('user_level')==1) { ?>
              <div class="menu_section">
              <h3><u>Pengaturan Data</u></h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>Master/Admin"><i class="fa fa-adn"></i>Admin Fakultas</a></li>
                  <!-- <li><a href="<?php echo base_url() ?>Master/Periode"><i class="fa fa-calendar"></i>Periode</a></li> -->
                  <li><a><i class="fa fa-graduation-cap"></i> Verifikator <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Verifikator">Setting Verifikator</a></li>
                        <li><a href="<?php echo base_url() ?>Verifikator/DataInfo">Data Verifikator</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url() ?>Dosen"><i class="fa fa-user"></i>Profil Dosen</a></li>
                  <li><a><i class="fa fa-calculator"></i> Pengaturan Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Master/Periode">Periode</a></li>
                        <li><a href="<?php echo base_url() ?>MasterBkd">BKD & Sub Kegiatan</a></li>
                        <li><a href="<?php echo base_url() ?>MasterBkd/ProfilDosen">Skema Perhitungan</a></li>
                        <li><a href="<?php echo base_url() ?>MasterBkd/SyaratFile">Syarat Laporan(File)</a></li>
                        <li><a href="<?php echo base_url() ?>MasterBkd/SettingRencana">Fitur (Aktif / Non Aktif)</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
              <h3><u>Rekap Laporan</u></h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-book"></i> Laporan Lengkap <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanAssesor1">Disetuji Assesor 1</a></li>
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanAssesor2">Disetujui Assesor 2</a></li>
                        <li><a href="<?php echo base_url() ?>Laporan/RekapAssesor1dan2">Disetujui Assesor 1 dan 2</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i> Laporan BKD <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanBkdAssesor1">Disetuji Assesor 1</a></li>
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanBkdAssesor2">Disetujui Assesor 2</a></li>
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanBkdAssesor1dan2">Disetujui Assesor 1 dan 2</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-leanpub"></i> Laporan Perubahan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>Laporan/RekapLaporanPerubahan">Keseluruhan</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <?php } ?>

              <?php if($this->session->userdata('user_level')==1 || $this->session->userdata('user_level')==4) { ?>
              <div class="menu_section">
              <h3><u>Periksa Data BKD</u></h3>
                  <ul class="nav side-menu">
                    <li><a href="<?php echo base_url() ?>AdminFakultas"><i class="fa fa-clipboard"></i>Laporan Kinerja Dosen</a></li>
                  </ul>
              </div>

              <div class="menu_section">
                <h3><u>History</u></h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>History/RencanaKerja/2"><i class="fa fa-hourglass"></i>Rencana Kerja</a></li>
                </ul>

                <ul class="nav side-menu">
                  <li><a><i class="fa fa-hourglass-end"></i> Laporan Lengkap <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>History/RekapLaporanAssesor1">Disetuji Assesor 1</a></li>
                        <li><a href="<?php echo base_url() ?>History/RekapLaporanAssesor2">Disetujui Assesor 2</a></li>
                        <li><a href="<?php echo base_url() ?>History/RekapAssesor1dan2">Disetujui Assesor 1 dan 2</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-hourglass-half"></i> Laporan BKD <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url() ?>History/RekapBkdAssesor1">Disetuji Assesor 1</a></li>
                        <li><a href="<?php echo base_url() ?>History/RekapBkdAssesor2">Disetujui Assesor 2</a></li>
                        <li><a href="<?php echo base_url() ?>History/RekapBkdAssesor1dan2">Disetujui Assesor 1 dan 2</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <?php } ?>

              <?php if($this->session->userdata('user_level')==2) { ?>
              <div class="menu_section">
              <h3><u>Data</u></h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>Biodata/FormBio"><i class="fa fa-users"></i>Biodata</a></li>
                  <li><a href="<?php echo base_url() ?>RencanaKerja"><i class="fa fa-file-word-o"></i></i>Rencana Kerja</a></li>
                  <li><a href="<?php echo base_url() ?>RencanaKerja/Laporan"><i class="fa fa-calculator"></i>Laporan</a></li>
                  <li><a href="<?php echo base_url() ?>Laporan"><i class="fa fa-clipboard"></i>Rekap BKD</a></li>
                  <li><a href="<?php echo base_url() ?>Ask"><i class="fa fa-question-circle-o"></i>Lapor Masalah</a></li>
                </ul>
              </div>
              <?php } ?>

              <?php
                foreach ($ketuaprodi as $kp);
                if(@$kp->ketua_prodi == $this->session->userdata('nipp')){
              ?>
                <div class="menu_section">
                <h3><u>Penilaian Ketua Prodi</u></h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-users"></i> Rencana Kerja <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="<?php echo base_url() ?>Verifikator/PeriksaRencana">List Rencana</a></li>
                          <li><a href="<?php echo base_url() ?>Verifikator/PeriksaLaporanProdi">List Laporan</a></li>
                          <li><a href="<?php echo base_url() ?>Verifikator/RekapRencana">Rekap</a></li>
                      </ul>
                    </li>
                </div>
                <?php } ?>

              <?php
                foreach ($filter as $f);
                if(@$f->assesor_1 == $this->session->userdata('nipp') || @$f->assesor_2 == $this->session->userdata('nipp') ){
              ?>
                <div class="menu_section">
                <h3><u>Penilaian Tim Assesor</u></h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-users"></i> Laporan Kerja <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="<?php echo base_url() ?>Verifikator/PeriksaLaporan">List Laporan</a></li>
                            <li><a href="<?php echo base_url() ?>Verifikator/RekapLaporan">Rekap</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              <?php } ?>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url() ?>Login/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <?php echo anchor('Pegawai/PegawaiPassword/'.$this->session->userdata('nipp'),'<span class="glyphicon glyphicon-wrench" title="Detil Data"></span>'); ?>
              </div>
          <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""><?php echo $name; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('Pegawai/PegawaiPassword/'.$this->session->userdata('nipp')) ?>"> <i class="fa fa-key pull-right"></i>Update Password</a></li>
                    <li><a href="<?php echo base_url() ?>Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
