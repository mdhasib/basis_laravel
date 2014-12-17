<?php
require_once('../lib/confi9.php');
require_once('../lib/check.php');
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

//retrive admin permission
function retrive_admin_permission($data) {
	$permission = explode(":", $data);
	return $permission;
}
//get permission value
function get_permission_value($data) {
	if($data == 0) {
		return "No.";
	} else {
		return "Yes.";
	}
}