<?php
session_start();
//$error="";
error_reporting(0);
include 'connect.php';

if (isset($_POST['change'])) {
	$email = $_POST['email'];
	$password1 = md5($_POST['password']);
	$password2 = md5($_POST['password2']);

	if (!($password1 == $password2)) {
		$error_pass = "Password doesn't match";
	} else {
		$query = oci_parse($conn, " SELECT * FROM USERS WHERE EMAIL='$email' ");
		$num = oci_execute($query);
		oci_fetch_row($query);
		$res = oci_num_rows($query);
		//echo $res;
		if ($res == 1) {
			//$extra="forgot-password.php";
			$stid = oci_parse($conn, " UPDATE USERS SET PASSWORD='$password1' WHERE EMAIL='$email' ");
			$new = oci_execute($stid);

			if ($new)
				echo '<script>alert("PASSWORD RESET!")</script>';
			header('location:customerlogin.php');
			//$_SESSION['errmsg'] = "Password Changed Successfully";
			exit();
		} else {
			$extra = "reset-password.php";

			//	$_SESSION['errmsg'] = "Invalid email id ";
			exit();
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>Reset Password</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/green.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/rateit.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

	<link rel="stylesheet" href="assets/css/config.css">

	<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
	<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
	<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
	<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
	<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">


	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="image/logo_innovative_grocery.png">


</head>

<body class="cnt-home">


	<header class="header-style-1">

		<?php include('user-info.php'); ?>

		<?php include('main-header.php'); ?>

		<?php include('menu-bar.php'); ?>

		<div class="breadcrumb">
			<div class="container">
				<div class="breadcrumb-inner">
					<ul class="list-inline list-unstyled">
						<li><a href="home.html">Home</a></li>
						<li class='active'>Reset Password</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="sign-in-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-6 col-sm-6 sign-in">
							<h4 class="" style="color: blue;">Set New Password</h4>
							<form class="register-form outer-top-xs" action="" name="register" method="post">
								<span style="color:red;">
									<?php
									echo htmlentities($_SESSION['errmsg']);
									?>
									<?php
									echo htmlentities($_SESSION['errmsg'] = "");
									?>
								</span>

								<div class="form-group">
									<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
									<input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
								</div>

								<div class="form-group">
									<label class="info-title" for="password">New Password. <span>*</span></label>
									<input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required>
								</div>

								<div class="form-group">
									<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
									<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="password2" required>
								</div>



								<input type="submit" class="btn-upper btn btn-primary checkout-page-button" name="change" value="Change">
							</form>
						</div>

					</div>
				</div>

			</div>
		</div>
		<!--====FOOTER===-->

		<?php include('footer.php'); ?>

		<!--====FOOTER END===-->
		<script src="assets/js/jquery-1.11.1.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/echo.min.js"></script>
		<script src="assets/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/scripts.js"></script>

		<script src="switchstylesheet/switchstylesheet.js"></script>

		<script>
			$(document).ready(function() {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function() {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});
		</script>

</body>

</html>