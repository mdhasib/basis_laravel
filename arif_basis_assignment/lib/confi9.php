<?php
	ini_set('display_errors', TRUE);
	ini_set('log_errors',     TRUE);
	define('DEBUG',1);
	if(DEBUG == 0) {
	    ini_set('display_errors', 'Off');
	    error_reporting(0);
	}else{
	    ini_set('display_errors', 'On');
	    error_reporting(1);
	}
	//define root PATH
	define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
	//define website PATH
	define('WEB_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/");
	//define csv file PATH
	define('CSV_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/file/csv/");
	//define pdf file PATH
	define('PDF_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/file/pdf/");
	//define txt file PATH
	define('TXT_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/file/txt/");
	//define xml file PATH
	define('XML_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/file/xml/");
	//define image file PATH
	define('IMG_PATH', "assets/");
	//define upload image file PATH
	define('UPLOAD_IMG_PATH', $_SERVER['DOCUMENT_ROOT']."/basis_assignment/uploads/");

	//define server and database connection
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
	session_start();