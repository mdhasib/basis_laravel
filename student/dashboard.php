<?php
require_once('../function.php');
print_r($_SESSION['student_info']);
$stu_session_data = $_SESSION['student_info']
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
			<div class="manu">
				<ul>
					<li><a href="dashboardedit.php">Update</a></li>
					<li><a href="logout.php">Log Out</a></li>
					<li><a href="#">View course</a></li>
					<li><a href="#">View Books</a></li>
					<li><a href="#">Hostel</a></li>
					<li><a href="#">E-Mail this page</a></li>
					<li><a href="#">Download as pdf</a></li>
					<li><a href="#">download as exel</a></li>
					<li><a href="#">email as pdf</a></li>

				</ul>
			</div>
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
								<input type="text" name="First_Name" value="" style="width:98%;margin-bottom:0px; margin-top:0px;">
								<br>
								<label class="labelmic " style="">First</label>
							</span>						
							<span class="name" style="float:left; margin-bottom:0px;">
								<input type="text" name="Last_Name" value="" style="width:98%;margin-bottom:0px; margin-top:0px;">
								<br>
								<label class="labelmic " style="">Last</label>
							</span>
							<span class="name" style="float:left; margin-bottom:0px;">
								<input type="text" name="Middle_Name" value="" style="width:98%;margin-bottom:0px; margin-top:0px;">
								<br>
								<label class="labelmic " style="">Middle</label>
							</span>
						</div>
					</div>
					<div class="clearboth"></div>
								<label>Permanent Street Address</label><br>
	                            <textarea placeholder="Address" style="max-width: 96% !important;  position: relative;  width: 320px;"></textarea>
								<br>				
				                
				                <label>Current City</label><input type="text" placeholder="City" name="City"><br>
								<label>State</label><input type="text" placeholder="State" name="State"><br>
								<label>ZIP</label><input type="text" placeholder="ZIP" name="ZIP"><br>
								<label>County</label><input type="text" placeholder="ex: Hamilton" name="County"><br>                
				                
				                <label>E-mail Address</label><input type="text" placeholder="E-mail Address" name="email"><br>
								<label>Mobile</label><input type="text" placeholder="Phone" name="Mobile"><br>
								<label>Gender</label><input type="radio" value="1" name="Gender">male<input type="radio" value="0" name="Gender">female<br>                
				                
								<label>Marital Status</label>
				                            <select name="Marital_Status">
				                                <option value="volvo">Volvo</option>
				                                <option value="saab">Saab</option>
				                                <option value="mercedes">Mercedes</option>
				                                <option value="audi">Audi</option>
				                            </select> <br>
				                
				                <label>Social Security Number</label><input type="text" placeholder="optional, but recommended)
				(a UC Student I.D. will be provided upon entry" name="SSNumber"><br>
								<label>EDUCATIONAL DATA:</label><br>
								<label>Institution</label><input type="text" placeholder="Institution(s)" name="Institution"><br>
								<label>Dates (to/from)</label><input type="text" placeholder="Dates (to/from)" name="Dates_to_from"><br>
								<label>Degree(s)</label><input type="text" placeholder="ex: Hamilton" name="Degree"><button>Add More</button><br>                
								<input name="student_data" type="submit" value="Update">
								<input name="reset" type="reset" value="reset">
					</form>
				</div>
			</div>
		</div>
		<div class="st_pre_data">
			<table border="1">
				<tbody>
					<tr>
						<td colspan="2">Your Basic Information</td>
					</tr>
					<?php
						//foreach ($stu_session_data as $key => $value) {
						  	//echo "$key=>$value <br>";
							//echo "<tr>";
								//echo "<td>$key</td>";
								//echo "<td>$value</td>";
							//echo "</tr>";
						//} 
						//echo "$stu_session_data"; 

					?>
					<tr>
						<td>Name:</td>
						<td><?=$stu_session_data['first_name'] ." ". $stu_session_data['middle_name'] ." ".  $stu_session_data['last_name'] ?></td>
					</tr>			
					<tr>
						<td>Your ID:</td>
						<td><?=$stu_session_data['student_id'] ?></td>
					</tr>				
					<tr>
						<td>Your E-Mail:</td>
						<td><?=$stu_session_data['email'] ?></td>
					</tr>
					<tr>
						<td>Date Of Birth:</td>
						<td><?=$stu_session_data['date_of_birth'] ?></td>
					</tr>			
				</tbody>
			</table>
		</div>
	</div>
</div>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
    <script type="text/javascript">
  		$(function() {
			var body = $('.body');
			var backgrounds = ['url(../img/1.jpg)', 
								'url(../img/7-Syed-Zakir-Hossain-copy.jpg)', 
								'url(../img/1390305538_lakeview2.jpg)', 
								'url(../img/D4hp5.jpg)', 
								'url(../img/dhaka-ghats_2736635k.jpg)', 
								'url(../img/Sadarghat.jpg)', 
								'url(../img/sundarban copy.jpg)', 
								'url(../img/o-DHAKA-CITY-facebook.jpg)'];
			var current = 0;

			function nextBackground() {
			  body.css(
			   'background',
			    backgrounds[current = ++current % backgrounds.length]
				);

			 setTimeout(nextBackground, 60000);
			}
			 setTimeout(nextBackground, 60000);
			   body.css('background', backgrounds[0]);
	});
  </script>
</body>
</html>