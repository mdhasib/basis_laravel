<?php
require_once("../function.php");
?>
<html>
<head>
<title>welcome group: E</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="body">
		<div class="grad"></div>
		<div class="header">
			<div>Group <span>E</span></div>
		</div>
		<br>

		<div class="login">
		<form action="index.php" method="post">
				<input type="text" placeholder="username" name="email"><br>
				<input type="password" placeholder="password" name="pass"><br><br>
				<input  type="submit" value="SignIn" name="admin_login">
		</form>
		<span><a href="signup.php">If you are not registered.</a></span>
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