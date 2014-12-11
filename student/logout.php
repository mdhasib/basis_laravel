<?php 

include_once("../confi9.php");


session_start();

session_unset();

session_destroy();

header("Location: index.php"); 