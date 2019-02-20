<!DOCTYPE html>
<html lang="en">
<head>
	<title>BKD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/loginpage/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginpage/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="size1 bg0 where1-parent">
		<!-- Coutdown -->
		<div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('<?php echo base_url(); ?>assets/loginpage/images/bg01.jpg');">
			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">
				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<a href="http://uin.ar-raniry.ac.id/index.php/id"><span class="l2-txt1">Web</span></a>
					<span class="s2-txt4"></span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
          <a href="http://e-skp.ar-raniry.ac.id/"><span class="l2-txt1">E-SKP</span></a>
					<span class="s2-txt4"></span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
          <a href="http://e-skp.ar-raniry.ac.id/"><span class="l2-txt1">SIAKAD</span></a>
					<span class="s2-txt4"></span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<a href="http://uin.ar-raniry.ac.id/index.php/id/video"><span class="l2-txt1">VIDEO</span></a>
					<span class="s2-txt4"></span>
				</div>
			</div>
		</div>

		<!-- Form -->
		<div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
			<div class="wrap-pic1">
				<img src="<?php echo base_url(); ?>assets/loginpage/images/icons/logouin.png" alt="LOGO" width="180" height="200">
			</div>

			<div class="p-t-50 p-b-60">
				<p class="m1-txt1 p-b-36">
					SISTEM INFORMASI <span class="m1-txt2">BKD</span> <br />
          UIN AR-RANIRY BANDA ACEH
				</p>

				<form action="<?php echo base_url()?>Login/login_auth" method="post" >
					<div class="wrap-input100 m-b-10 validate-input">
						<input class="s2-txt1 placeholder0 input100" type="text" name="username" placeholder="NIP" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-20 validate-input">
						<input class="s2-txt1 placeholder0 input100" type="password" name="password" placeholder="PASSWORD" required>
						<span class="focus-input100"></span>
					</div>

					<div class="w-full">
						<button class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
							LOGIN
						</button>
					</div>
				</form>

				<p class="s2-txt3 p-t-18">
					<!-- And don’t worry, we hate spam too! You can unsubcribe at anytime. -->
				</p>
			</div>

			<div class="flex-w">
				<a href="https://www.facebook.com/UINArraniry/" class="flex-c-m size5 bg3 how1 trans-04 m-r-5" target="_blank">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="https://www.instagram.com/uinarraniry/" class="flex-c-m size5 bg4 how1 trans-04 m-r-5" target="_blank">
					<i class="fa fa-instagram"></i>
				</a>

				<a href="https://www.youtube.com/channel/UCAQQ3UuUqbXKB_GnigY_JVg" class="flex-c-m size5 bg5 how1 trans-04 m-r-5" target="_blank">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/countdowntime/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: ""
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginpage/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
