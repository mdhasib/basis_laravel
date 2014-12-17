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

if (isset($_POST['admin_login'])) {
    do_login("admin_login", $_POST['email'], trim($_POST['pass']));
}

if (isset($_POST['student_login'])) {
    do_login("student_login", $_POST['email'], trim($_POST['pass']));
}

if (isset($_POST['add_user'])) {
	$sanitize_data = sanitize($_POST);
    if (email_verify($sanitize_data['email'])==1) {
    	if($sanitize_data['add_admin'] == "c_admin") {
    		insert_data_into_db("admin_user", $sanitize_data);
        } else {

        }
    } else {
      echo "<div class=error><span>Inalid E-mail Address<span></div>";
    }
}

if(isset($_GET['getPass'])) {
    echo generateStrongPassword(rand(6,15), false, "luds");
}

//Generate Password
function generateStrongPassword($length, $add_dashes, $available_sets) {
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '0123456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';
		$all = '';
		$password = '';
		foreach($sets as $set) {
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];
			$password = str_shuffle($password);
		if(!$add_dashes)
			return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len) {
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
	$dash_str .= $password;
	echo $dash_str;
	//return $dash_str;
}