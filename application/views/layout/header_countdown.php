<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/ico" />

    <title>E-LKD</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
    body{
font: normal 13px/20px Arial, Helvetica, sans-serif; word-wrap:break-word;
color: #eee;
background: #353535;
}
#countdown{
width: 465px;
height: 200px;
text-align: center;
background: #222;
background-image: -webkit-linear-gradient(top, #222, #333, #333, #222);
background-image:    -moz-linear-gradient(top, #222, #333, #333, #222);
background-image:     -ms-linear-gradient(top, #222, #333, #333, #222);
background-image:      -o-linear-gradient(top, #222, #333, #333, #222);
border: 1px solid #111;
border-radius: 5px;
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.6);
margin: auto;
padding: 40px 0;
position: absolute;
top: 0; bottom: 0; left: 0; right: 0;
}

#countdown:before{
content:"";
width: 8px;
height: 65px;
background: #444;
background-image: -webkit-linear-gradient(top, #555, #444, #444, #555);
background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
border: 1px solid #111;
border-top-left-radius: 6px;
border-bottom-left-radius: 6px;
display: block;
position: absolute;
top: 48px; left: -10px;
}

#countdown:after{
content:"";
width: 8px;
height: 65px;
background: #444;
background-image: -webkit-linear-gradient(top, #555, #444, #444, #555);
background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
border: 1px solid #111;
border-top-right-radius: 6px;
border-bottom-right-radius: 6px;
display: block;
position: absolute;
top: 48px; right: -10px;
}

#countdown #tiles{
position: relative;
z-index: 1;
}

#countdown #tiles > span{
width: 92px;
max-width: 92px;
font: bold 48px 'Droid Sans', Arial, sans-serif;
text-align: center;
color: #111;
background-color: #ddd;
background-image: -webkit-linear-gradient(top, #bbb, #eee);
background-image:    -moz-linear-gradient(top, #bbb, #eee);
background-image:     -ms-linear-gradient(top, #bbb, #eee);
background-image:      -o-linear-gradient(top, #bbb, #eee);
border-top: 1px solid #fff;
border-radius: 3px;
box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.7);
margin: 0 7px;
padding: 18px 0;
display: inline-block;
position: relative;
}

#countdown #tiles > span:before{
content:"";
width: 100%;
height: 13px;
background: #111;
display: block;
padding: 0 3px;
position: absolute;
top: 41%; left: -3px;
z-index: -1;
}

#countdown #tiles > span:after{
content:"";
width: 100%;
height: 1px;
background: #eee;
border-top: 1px solid #333;
display: block;
position: absolute;
top: 48%; left: 0;
}

#countdown .labels{
width: 100%;
height: 25px;
text-align: center;
position: absolute;
bottom: 8px;
}

#countdown .labels li{
width: 102px;
font: bold 15px 'Droid Sans', Arial, sans-serif;
color: #f47321;
text-shadow: 1px 1px 0px #000;
text-align: center;
text-transform: uppercase;
display: inline-block;
}
    </style>
  </head>
    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>Pegawai" class="site_title"><span>UIN Ar-raniry</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name; ?></h2>
                <span>(<?php echo $nipp; ?>)</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
