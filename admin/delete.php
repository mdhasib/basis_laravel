<?php
require_once("../function.php");      
//echo $_GET['id']; die();

if(isset($_GET['delete']) && $_GET['delete'] === 'delete') {
      //$student_info = specific_data_all(sanitize($_GET['id']));
      $id = sanitize($_GET['id']);
      $sql = "DELETE FROM student_user WHERE id = $id";
     //echo $sql;
      $result=mysql_query($sql);
      if ($result) {
            echo "One data has been deleted.";
            $link_dashboard = "dashboard.php";
            echo "<div><a href=".$link_dashboard.">Dashboard</a></div>";
      }
      
/*      $new_student_info = array();
      foreach ($student_info as $result) {
            $new_student_info = $result;
      }
      if($new_student_info['gender'] == 0) {
            $checked_female = 'checked="checked"';
      } else {
            $checked_male = 'checked="checked"';
      }*/
}
?>
<html>
<head>
<title>Student Data Delete</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
</head>
<body>
            <div><a href="dashboard.php"></a></div>
</body>
</html>