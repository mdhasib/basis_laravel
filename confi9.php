<?php
error_reporting(0);

define("HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DATABASE", "basis_student");
$communucation = mysql_connect(HOST, DB_USER, DB_PASS);
if(!$communucation) {
  die("Can't communicate. ".mysql_error());
}
$select_db = mysql_select_db(DATABASE, $communucation);
if (!$select_db) {
  die("Can't select database. ".mysql_error());
}