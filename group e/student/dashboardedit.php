<?php
require_once('../function.php');
print_r($_SESSION['student_info']);
$stu_session_data = $_SESSION['student_info'];
if ($stu_session_data['gender'] == 0) {
	$checked_female = 'checked="checked"';
} else {
	$checked_male = 'checked="checked"';
}
//print_r($stu_session_data['id']);

if (isset($_POST['student_data_edit'])) {
  $sanitize_data =sanitize($_POST);
  if (email_verify($sanitize_data['email'])==1) {
    student_update_data("student_user", $sanitize_data);
  }else {
    echo "<div class=error><span>Inalid E-mail Address<span></div>";
  }
}
function student_update_data($type, $data) {
  //$date_of_birth = $data['birthday_year']."-".$data['birthday_month']."-".$data['birthday_day'];
  $student_id = date("Y")."".date("m").++$id['id'];
 	$query = "UPDATE $type SET first_name='".$data['first_name']."', last_name='".$data['last_name']."', email='".$data['email']."', middle_name='".$data['middle_name']."', p_address='".$data['p_address']."', city='".$data['city']."', state='".$data['state']."', zip='".$data['zip']."', county='".$data['county']."',  mobile='".$data['mobile']."',    gender='".$data['gender']."', marital_status='".$data['marital_status']."', ssnumber='".$data['ssnumber']."', education='".$data['education']."' WHERE id='".$data['id']."' ";
 	//echo "$query";
/*  $query=$sql = "UPDATE student_user SET first_name = 'hgff',\n"
    . "last_name = 'hhh',\n"
    . "email = 'kkk',\n"
    . "middle_name = 'lll',\n"
    . "p_address = 'ff',\n"
    . "city = 'ff',\n"
    . "state = '',\n"
    . "zip =222\n"
    . "where id=21";*/
  $update_result = mysql_query($query);

  if($update_result) {
    echo "<div class=error><span>Data update and write successfully.<span></div>";
  } else {
    echo "<div class=error><span>".die(mysql_error())." Something error dashboardedit.<span></div>";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Student Data</title>
<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
<div class="body">
<div class="container">
	<div class="right_part">
		Manu Bar here.
		<a href="logout.php"> Log Out</a>
	</div>
	<div class="left_part" id="main_part">
		<div class="form_bar"></div>
		<div class="student_info_update">
			<div id="main_content">
			<h1 class="formsh1">Student Data Update Form</h1>
			<hr>
				<form action="dashboardedit.php" method="post">
				<div class="folder1">
					<div><label>Name</label></div>
					<div class="">
						<span class="name" style="float:left; margin-bottom:0px;">
							<input type="text" name="first_name" value="<?=$stu_session_data['first_name'] ?>" style="width:98%;margin-bottom:0px; margin-top:0px;">
							<br>
							<label class="labelmic " style="">First</label>
						</span>						
						<span class="name" style="float:left; margin-bottom:0px;">
							<input type="text" name="last_name" value="<?=$stu_session_data['last_name'] ?>" style="width:98%;margin-bottom:0px; margin-top:0px;">
							<br>
							<label class="labelmic " style="">Last</label>
						</span>
						<span class="name" style="float:left; margin-bottom:0px;">
							<input type="text" name="middle_name" value="<?=$stu_session_data['middle_name'] ?>" style="width:98%;margin-bottom:0px; margin-top:0px;">
							<br>
							<label class="labelmic " style="">Middle</label>
						</span>
					</div>
				</div>
				<div class="clearboth"></div>
							<label>Permanent Street Address</label><br>
                            <textarea placeholder="Address" style="max-width: 96% !important;  position: relative;  width: 320px;"><?=$stu_session_data['p_address'] ?></textarea>
							<br>				
			                
			                <label>Current City</label><input type="text" placeholder="City" name="City" value="<?=$stu_session_data['city'] ?>"><br>
							<label>State</label><input type="text" placeholder="State" name="State" value="<?=$stu_session_data['state'] ?>"><br>
							<label>ZIP</label><input type="text" placeholder="ZIP" name="ZIP" value="<?=$stu_session_data['zip'] ?>"><br>
							<label>County</label><input type="text" placeholder="ex: Hamilton" name="County" value="<?=$stu_session_data['county'] ?>"><br>                
			                
			                <label>E-mail Address</label><input type="text" placeholder="E-mail Address" name="email" value="<?=$stu_session_data['email'] ?>"><br>
							<label>Mobile</label><input type="text" placeholder="Phone" name="Mobile" value="<?=$stu_session_data['mobile'] ?>"><br>
							<label>Gender</label><input type="radio" value="1" name="gender"<?php echo $checked_female; ?>>male<input type="radio" value="0" name="gender"<?php echo $checked_male; ?>>female<br>                
			                
							<label>Marital Status</label>
			                            <select name="Marital_Status">
			                                <option value="0">select</option>
			                                <option value="volvo">single</option>
			                                <option value="saab">Married</option>
			                                <option value="mercedes">Divorced</option>
			                            </select> <br>
			                
			                <label>Social Security Number</label><input type="text" placeholder="optional, but recommended)
			(a UC Student I.D. will be provided upon entry" name="SSNumber" value="<?=$stu_session_data['ssnumber'] ?>"><br>
							<label>EDUCATIONAL DATA:</label><br>
							<label>Institution</label><input type="text" placeholder="Institution(s)" name="Institution" value="<?=$stu_session_data[''] ?>"><br>
							<label>Dates (to/from)</label><input type="text" placeholder="Dates (to/from)" name="Dates_to_from" value="<?=$stu_session_data[''] ?>"><br>
							<label>Degree(s)</label><input type="text" placeholder="ex: Hamilton" name="Degree" value="<?=$stu_session_data[''] ?>"><button>Add More</button><br>                
							<input type="hidden" name="id" value="<?=$_SESSION['student_info']['id'] ?>">
							<input name="student_data_edit" type="submit" value="Update">
							<input name="reset" type="reset" value="reset">
				</form>
			</div>
		</div>
	</div>
	<div class="imageload left_part">
		<form action="#">
	  		<input type="file" name="pic" accept="student/image/*">
	  		<input type="submit" name="student_pic">
		</form>
	</div>
</div>
</div>
</body>
</html>