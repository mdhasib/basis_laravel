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

//data senitization
function sanitize($input) {
	if (is_array($input)) {
		foreach($input as $var=>$val) {
			$output[$var] = sanitize($val);
		}
	} else {
		if (get_magic_quotes_gpc()) {
			$input = stripslashes($input);
		}
			$input  = cleanInput($input);
			$output = mysql_real_escape_string($input);
		}
		return $output;
	}


//data senitization
function cleanInput($input) {

	$search = array(
	'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
	'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
	'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
	'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);

	$output = preg_replace($search, '', $input);
	return $output;
}

//email verification start here
function email_verify($email){
	$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
	if ( preg_match( $regex, $email ) ) { 
		return 1;
	} else { 
		return 0;
	}
}

//function for select data into table
function select_data_all($table) {
	$query = "SELECT * FROM ".$table;
	$result = mysql_query($query);
	$result_data = array();
	while($data = mysql_fetch_assoc($result)) {
		$result_data[] = $data;
	}
	return $result_data;
}

//login function
function do_login($who, $email, $pass) {
	if (email_verify($email)==1) {
		if($who == "student_login") {
			$result = student_login(sanitize($email), sanitize($pass));
			if($result[0] == "success") {
				//echo "Success";
				header('Location: dashboard.php');
			}
			echo $result[0];
		} else {
			$result = admin_login(sanitize($email), sanitize($pass));
			if($result[0] == "success") {
				if($_SESSION['admin_info']['is_super'] == 1) {
					header('Location: dashboard.php');
				} else {
					header('Location: sp_admin.php');
				}
			}
			echo $result[0];
		}
	} else {
		echo "<div class=error><span>Inalid E-mail Address<span></div>";
	}
}

//admin login
function admin_login($email, $pass) {
	if($pass != "") {
		$email = $email;
		$pass = md5($pass); 
		$result = mysql_query("SELECT * FROM admin_user WHERE email='$email' AND password='$pass'");
		$fetch_result = mysql_fetch_assoc ($result);
		if (mysql_num_rows($result) > 0) {
			if($fetch_result['status'] == 0) { 
				return array("<div class=error><span>Your account not active<span></div>");
			} else {
				$_SESSION['is_logged'] = true;
				$_SESSION['admin_info'] = $fetch_result;
				return array("success");
			}           
		} else {
			return array("<div class=error><span>Username and Password doenn't match<span></div>");
		}
	} else {
		return array("<div class=error><span>Password required for login<span></div>");
	}
}

//student login
function student_login($email, $pass) {
	if($pass != "") {
		$email = $email;
		$pass = md5($pass); 
		$result = mysql_query("SELECT * FROM student_user WHERE email='$email' AND password='$pass'");
		$fetch_result = mysql_fetch_assoc ($result);
		if (mysql_num_rows($result) > 0) {
			if($fetch_result['email_verified'] == 0) {
				return array("<div class=error><span>Your email not verified<span></div>");
			} else {
				if($fetch_result['status'] == 0) { 
					return array("<div class=error><span>Your account not active<span></div>");
				} else {
					$_SESSION['is_logged'] = true;
					$_SESSION['student_info'] = $fetch_result;
					return array("success");
				}
			}           
		} else {
			return array("<div class=error><span>Username and Password doenn't match<span></div>");
		}
	} else {
			return array("<div class=error><span>Password required for login<span></div>");
	}
}

//Insert Data into MySql
function insert_data_into_db($tbl_name, $data_array) {
	//print_r($data_array);
	$column = get_table_column($data_array);
	$value = get_column_value($data_array);
	if(isset($_FILES['picture']['name'])) {
		$file_size = check_image_size($_FILES['picture']['name']);
		if($file_size == 1) {
			$status = do_upload_file($_FILES['picture']['name']);
			if($status == 1) {
				$query = "INSERT INTO $tbl_name (id, $column) VALUES (NULL, $value)";
				$query_status = mysql_query($query);
				if($query_status) {
					echo "<div class=error><span>Information successfully stored.but,<br/>Only jpg,jpeg, png, gif image allowed.<span></div>";
				}
			} elseif($status == 2) {
				$query = "INSERT INTO $tbl_name (id, $column) VALUES (NULL, $value)";
				$query_status = mysql_query($query);
				if($query_status) {
					echo "<div class=error><span>Information successfully stored.but,<br/>Image not uploaded for some problem.<span></div>";
				}
			} else {
				$link = UPLOAD_IMG_PATH."".$status;
				$query = "INSERT INTO $tbl_name (id, $column, picture) VALUES (NULL, $value, '".$link."')";
				$query_status = mysql_query($query);
				if($query_status) {
					echo "<div class=success><span>Information successfully stored and image uploaded.<span></div>";
				}
			}
		} else {
			$link = UPLOAD_IMG_PATH."".$status;
			$query = "INSERT INTO $tbl_name (id, $column, picture) VALUES (NULL, $value, '".$link."')";
			$query_status = mysql_query($query);
			if($query_status) {
				echo "<div class=error><span>Information successfully stored.but, <br/>File limit exceed (Limit 5MB)<span></div>";
			}
		}
	} else {
		$query = "INSERT INTO $tbl_name (id, $column) VALUES (NULL, $value)";
		$query_status = mysql_query($query);
		if($query_status) {
			echo "<div class=error><span>Information successfully stored.but, <br/>image not uploaded<span></div>";
		}
	}
}

//get column name
function get_table_column($data_array) {
	$column_name = "";
	$i = 0;
	$len = count($data_array);
	foreach ($data_array as $key => $value) {
		if($key == "add_admin" || $key == "add_user") {
			$column_name;
		} else {
			if ($i == $len - 3) {
				$column_name .= $key;
			} else {
				$column_name .= $key.", ";
			}
		}
		$i++;
	}
	return $column_name;
}

//get column value
function get_column_value($data_array) {
	//print_r($data_array);
	$column_value = "";
	$i = 0;
	$len = count($data_array);
	foreach ($data_array as $key => $value) {
		if($key == "add_admin" || $key == "add_user") {
			$column_value;
		} else {
			if ($i == $len - 1) {
				$column_value .= "'".$value."'" ;
			} else if ($key == "permission") {
				$length = count($value);
				$permission_rearrange = implode(":", $value);
				$permission_rearrange = attach_some($length, $permission_rearrange);
				$column_value .= "'".$permission_rearrange."'";
			} else if ($key == "password") {
				$column_value .= "'".md5($value)."'".", ";
			} else {
				$column_value .= "'".$value."'".", ";
			}
		}
		$i++;
	}
	return $column_value;
}

//concate value
function attach_some($length, $permission_rearrange) {

	if($length < 2) {
		return $permission_rearrange.":0:0:0";
	} else if($length < 3) {
		return $permission_rearrange.":0:0";
	} else if ($length < 4) {
		return $permission_rearrange.":0";
	} else {
		return $permission_rearrange;
	}
}