<?php
require_once('../function.php');
$student_info = select_data_all();
$admin_info = $_SESSION['admin_info'];
$permission = explode(":", $admin_info['permission']);
if($permission[1] == 0) {
	$add_disabled = 'disabled="disabled"';
}
if ($permission[2] == 0) {
	$edit_disabled = 'disabled="disabled"';
}
if ($permission[3] == 0) {
	$delete_disabled = 'disabled="disabled"';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
  <style type="text/css">
  span {
  	min-width: 250px;
  	display: inline-block;
  	padding-right: 10px;
  }
  input[type=button] {
  	width: 120px;
  	height: 30px;
  	font-size: 16px;
  }
  a.button_link {text-decoration: none;}
  </style>
</head>
<body>

	<div class="contin">
		<div class="">
		<h2>Student List</h2>
			<a class="button_link"  href="../function.php?what=logout"><input type="button" value="Logout"></a>
			<a class="button_link"  href="add.php"><input type="button" <?php echo $add_disabled; ?> value="Add Student"></a>
			<ol>
				<?php foreach ($student_info as $get_student_info) { ?>
				<li>
					<span><?php echo $get_student_info['first_name']; ?></span><span><?php echo $get_student_info['last_name']; ?></span><span><?php echo $get_student_info['email']; ?></span> 
					<span><a class="button_link" href="edit.php?edit=edit&id=<?php echo $get_student_info['id']; ?>"><input type="button" <?php echo $edit_disabled; ?> value="Edit"></a> | <a class="button_link"  href="delete.php?delete=delete&id=<?php echo $get_student_info['id'];?> "string";"><input type="button" <?php echo $delete_disabled; ?> value="Delete"></a></span>
				</li>
				<?php } ?>
			</ol>
		</div>
	</div>


</body>

</html>