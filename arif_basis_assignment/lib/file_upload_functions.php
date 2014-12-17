<?php 
//image convert basex64
function convert_image_to_basex64($file_path, $file) {
	$path= 'images/404/404.png';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . '; base64, ' . base64_encode($data);
	return $base64;
}

//image type check 
function check_image_type($file_name) {
	$supported_image = array('gif','jpg','jpeg','png');
	$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
	if (in_array($ext, $supported_image)) {
	    return 1;
	} else {
	    return 0;
	}
}

//image size check 
function check_image_size($file_size) {
	$image_size = $file_size;
	$allowed_size = 500000;
	if($image_size <= $allowed_size) {
		return 1;
	} else {
		return 0;
	}
}

//image rename 
function rename_image_name($file_name) {
	$random = rand(125999, 9999999);
	return date("Y.d.m.D").mktime().$random.$file_name;
}

//get file extension
function get_file_extension($file_name) {
	$file_name = strtolower($file_name);
	$extension = split("[/\\.]", $file_name);
	$length = count($extension) - 1;
	$extension = $extension[$length];
	return $extension; 
}

//upload file
function do_upload_file($file_name) {
	$is_type = check_image_type($file_name);
	if($is_type == 1) {
		$file_name = rename_image_name($file_name);
		$extension = get_file_extension($file_name);
		$new_file_name = md5($file_name).".".$extension;
		if(move_uploaded_file($_FILES['picture']['tmp_name'], UPLOAD_IMG_PATH."".$new_file_name)) {
			return $new_file_name; //file uploaded
		} else {
			return 2; //file not uploade
		}
	}else {
		return 1; //file type not match
	}
	return $file_size;
}