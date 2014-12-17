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
    $write_content = array($student_id , $data['first_name'] , $data['last_name'] , md5($data['pass']) , $data['email'] , $date_of_birth , $data['gender']);
    $insert_result = mysql_query($query);
    if($insert_result) {
      write_csv($write_content);
      $time = date("Y-m-d")."_".time("H:i:s");
      $attachment_link = TXT_PATH."Student-".$data['first_name']." ".$data['last_name']."-".$time.".txt";
      $myfilepointer = fopen($attachment_link, "w") or die();
      $data = "Name: ".$name."\r\nAppointment Date: ".$date."\r\nMobile No: ".$mobile."\r\nAddress: ".$addres."\r\nCity, State, Zip: ".$zip;
      fwrite($myfilepointer, $data);
      fclose($myfilepointer);
      mail_attachment($myfilepointer, $attachment_link, $data['email'],"Procedure PHP Assignment","Mohakal","no_reply@yahoo.com","email verification","Please verify your email address.<br/>");
      echo "<div class=error><span>Data insert and write successfully.<span></div>";
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
      echo "<div class=error><span>Something errror.<span></div>";
    }
  }
  //function for delete data into table
  function delete_data($type, $id) {
    $query = "DELETE FROM $type WHERE id='$id'";
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
    $file_name = $_SERVER['DOCUMENT_ROOT']."/basis_assignment/file/csv/student.csv";
    $fp = fopen($file_name , 'w') or die ("Could not open file.");
    fputcsv($fp, $data);
    fclose($fp);
  }
  //send mail with attachment
  function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
      $file = $path.$filename;
      $file_size = filesize($file);
      $handle = fopen($file, "r");
      $content = fread($handle, $file_size);
      fclose($handle);
      $content = chunk_split(base64_encode($content));
      $uid = md5(uniqid(time()));
      $name = basename($file);
      $header = "From: ".$from_name." <".$from_mail.">\r\n";
      $header .= "Reply-To: ".$replyto."\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
      $header .= "This is a multi-part message in MIME format.\r\n";
      $header .= "--".$uid."\r\n";
      $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
      $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
      $header .= $message."\r\n\r\n";
      $header .= "--".$uid."\r\n";
      $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
      $header .= "Content-Transfer-Encoding: base64\r\n";
      $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
      $header .= $content."\r\n\r\n";
      $header .= "--".$uid."--";
      $mail_body = "";
      if (mail($mailto, $subject, $mail_body, $header)) {
          echo "mail send ... OK"; // or use booleans here
      } else {
          echo "mail send ... ERROR!";
      }
  }

  function mail_body() {
    $verification = random_string(15);
    mysql_query("INSERT INTO student_user verification_code VALUES($verification)");
    $username = $data['first_name']." ".$data['last_name'];
    $str = <<<"EOF"
    <html>
      <body>
        <h3>Welcome $username</h3>
        <p>Your account information successfully added in our syste.<br/>
        Please verify your email address using link given below.
        </p>
        <label><a href\="http://localhost/basis_assignment/student/verify.php?verification=$verification">Verify your email address...</a></label>
      </body>
    </html>
    EOF;
    return $str;
  }

  