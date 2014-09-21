<?php

function data_setting_value($dbc, $id){
	
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);
	
	return $data['value'];	
	
}

function data_user($dbc, $id) {
		
	if(is_numeric($id)) {
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	
	$q = "SELECT * FROM users $cond";	
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);	
	
	$data['fullname'] = $data['first'].' '.$data['last'];
	$data['fullname_reverse'] = $data['last'].', '.$data['first'];
	
	
	return $data;
	
	
}

function data_post($dbc, $id) {
	
	$q = "SELECT * FROM posts WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);	
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if($data['body'] == $data['body_nohtml']) {
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
		
	} else {
		
		$data['body_formatted'] = $data['body'];
		
	}
	
	
	
	return $data;
	
}


?>