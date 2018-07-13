<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel" style="">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                        foreach($pendidikan as $key);

                    ?>
                    <form class="form form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>Master/UpdatePendidikan" enctype="multipart/form-data">
                       <div class="form-group">
                       <div class="profile clearfix">
                            <div class="col-md-12 ">
                                <input type='hidden' name="id_pendidikan" class="form-control" value="<?php echo $key->id_pendidikan ?>" />
                                <input type='text' name="nama_pendidikan" class="form-control" value="<?php echo $key->nama_pendidikan ?>" />
                            </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="javascript:window.history.go(-1);" class="btn btn-danger">Back</a>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
   </div>
