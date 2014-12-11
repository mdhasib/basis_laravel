<?php
require_once('confi9.php');
session_start();
if(isset($_GET['what']) && $_GET['what'] === 'logout') {
  session_destroy();
  header('Location: index.html');
}
if (isset($_POST['admin_login'])) {
  do_login_admin($_POST['email'], trim($_POST['pass']));
}
if (isset($_POST['student_login'])) {
  do_login_student($_POST['email'], trim($_POST['pass']));
}
if (isset($_POST['signup'])) {
  $sanitize_data = sanitize($_POST);
  if (email_verify($sanitize_data['email'])==1) {
      insert_data("student_user", $sanitize_data);
  } else {
    echo "<div class=error><span>Inalid E-mail Address<span></div>";
  }
}
if (isset($_POST['edit_student'])) {
  $sanitize_data = sanitize($_POST);
  if (email_verify($sanitize_data['email'])==1) {
      update_data("student_user", $sanitize_data);
  } else {
    echo "<div class=error><span>Inalid E-mail Address<span></div>";
  }
}

//data senitization
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
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
    } 
    else { 
        return 0;
  }
}
//Admin user login here
function do_login_admin($email, $pass){

    if (email_verify($email)==1) {
      if($pass != "") {
        $email = $email;
        $pass = md5($pass); 
        $result = mysql_query("SELECT * FROM admin_user WHERE email='$email' AND password='$pass'");
        $fetch_result = mysql_fetch_assoc ($result);
        if (mysql_num_rows($result) > 0) {
          if($fetch_result['status'] == 0) { 
            echo "<div class=error><span>Your account not active<span></div>";
          } else {
            $_SESSION['admin_info'] = $fetch_result;
            header('Location: dashboard.php');
          }           
        } else {
          echo "<div class=error><span>Username and Password doenn't match<span></div>";
        }
      } else {
        echo "<div class=error><span>Password required for login<span></div>";
      }          
    } else {
      echo "<div class=error><span>Inalid E-mail Address<span></div>";
    }
}

//Student user login here
function do_login_student($email, $pass){

    if (email_verify($email)==1) {
      if($pass != "") {
        $email = $email;
        $pass = md5($pass); 
        $result = mysql_query("SELECT * FROM student_user WHERE email='$email' AND password='$pass'");
        $fetch_result = mysql_fetch_assoc ($result);
        if (mysql_num_rows($result) > 0) {
          if($fetch_result['email_verified'] == 0) {
            echo "<div class=error><span>Your email not verified<span></div>";
          } else {
            if($fetch_result['status'] == 0) { 
              echo "<div class=error><span>Your account not active<span></div>";
            } else {
              $_SESSION['student_info'] = $fetch_result;
              header('Location: dashboard.php');
            }
          }           
        } else {
          echo "<div class=error><span>Username and Password doenn't match<span></div>";
        }
      } else {
        echo "<div class=error><span>Password required for login<span></div>";
      }          
    } else {
      echo "Inalid E-mail Address<span></div>";
    }
}     
//generate random value
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
} 
//function for insert data into table
function insert_data($type, $data) {
  $id_query = "SELECT * FROM $type ORDER BY id DESC LIMIT 1";
  $result = mysql_query($id_query);
  $id = mysql_fetch_assoc($result);
  $date_of_birth = $data['birthday_year']."-".$data['birthday_month']."-".$data['birthday_day'];
  $student_id = date("Y")."".date("m").++$id['id'];
  $query = "INSERT INTO $type (id, student_id, first_name, last_name, password, email, date_of_birth, gender) VALUES (NULL,'".$student_id."' , '".$data['first_name']."' , '".$data['last_name']."' , '".md5($data['pass'])."' , '".$data['email']."' , '".$date_of_birth."' , '".$data['gender']."')";
  $insert_result = mysql_query($query);
  if($insert_result) {
    write_csv($write_content);
    echo "<div class=error><span>Data insert and write successfully.<span></div>";
    echo "<a>asdasd</a>";
  } else {
    echo "<div class=error><span>Something errror.<span></div>";
  }
}
//function for update data into table
function update_data($type, $data) {
  $date_of_birth = $data['birthday_year']."-".$data['birthday_month']."-".$data['birthday_day'];
  $student_id = date("Y")."".date("m").++$id['id'];
  $query = "UPDATE $type SET first_name='".$data['first_name']."', last_name='".$data['last_name']."', email='".$data['email']."', password='".$data['pass']."', gender='".$data['gender']."', date_of_birth='".$date_of_birth."' WHERE id=".$data['id']."";
  $update_result = mysql_query($query);
  if($update_result) {
    echo "<div class=error><span>Data update and write successfully.<span></div>";
  } else {
    echo "<div class=error><span>Something error.<span></div>";
  }
}
//function for delete data into table
function delete_data($type, $id) {
  //$query = "DELETE FROM $type WHERE id='$id'";
}
//function for select data into table
function select_data_all() {
  $query = "SELECT * FROM student_user";
  $result = mysql_query($query);
  $format_data = array();
  while($data = mysql_fetch_array($result)) {
    $format_data[] = $data;
  }
  return $format_data;
}
//function for select data into table for specific user
function specific_data_all($id) {
  $query = "SELECT * FROM student_user WHERE id=$id";
  $result = mysql_query($query);
  $format_data = array();
  while($data = mysql_fetch_assoc($result)) {
    $format_data[] = $data;
  }
  return $format_data;
}
//function for write csv file  
function write_csv($data) {
  $link_dashboard = "dashboard.php";
  echo "Called me<br/>";
  echo "<div><a href=".$link_dashboard.">Dashboard</a></div>";

  $file_name = "student.csv";
  vchmod("./".$file_name, 0777);
  $fp = fopen($file_name , 'w') or die ("Could not open file.");
  fputcsv($fp, $data);
  fclose($fp);
}

/*  DELETE FROM `student_user` WHERE `id` =3;
  $sql = "DELETE FROM `student_user` WHERE `id`=$id";*/