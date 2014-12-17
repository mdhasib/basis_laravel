<?php
require_once('../lib/confi9.php');
$access = <<<"Access"
<html>
	<head>
		<title>Access Forbidden</title>
		<meta http-equiv="refresh" content="3; url=http://localhost/basis_assignment/" />
		<link href="assets/css/main.css" rel="stylesheet">
		<style type="text/css">
			body {
				background-color: #b0e0e6;
			}
			.container {
				margin-left: auto;
			    margin-right: auto;
			    background-color: #b0e0e6;
			    text-align: center;
			    margin-top: 20%;
		  	}
		</style>
	</head>
	<body>
		<div class="container text-center">
			<div class="logo-404">
				<div class="companyinfo">
					<a href="../index.php"><h2 style="margin-top: -40px !important;">group-<span>e</span></h2></a>
					<h4 style="margin: 0 auto; color:red;">No direct script access allowed</h4>
				</div>
			</div>
			<h2><a href="../index.php">Bring me back Home</a></h2>
		</div>
	</body>
</html>
Access;
if (!isset($_SERVER['HTTP_REFERER'])){
	die($access);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Group-E Project Page</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +88 017 11 266 873</a></li>
								<li><a href="#browsing"><i class="fa fa-globe"></i> Start Browsing</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2 style="margin-top: -40px !important;">group-<span>e</span></h2>
						</div>
					</div>
					<div class="search_box pull-right">
						<input type="text" placeholder="Search"/>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->