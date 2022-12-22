<?php

function data_setting_value($dbc, $id){
	
	$stmt = pdo($dbc, "SELECT * FROM settings WHERE id = :id", [
		'id' => $id
	]);
	$data = $stmt->fetch();
	return $data['value'];	
}

function data_user($dbc, $id) {
		
	if(is_numeric($id)) {
		$stmt = pdo($dbc, "SELECT * FROM users WHERE id = :id", [
			'id' => $id
		]);	
	} else {
		$stmt = pdo($dbc, "SELECT * FROM users WHERE email = :email", [
			'email' => $id
		]);	
	}
		
	$data = $stmt->fetch();
	
	$data['fullname'] = $data['first'].' '.$data['last'];
	$data['fullname_reverse'] = $data['last'].', '.$data['first'];
	
	return $data;
}

function data_post($dbc, $id) {
	
	$stmt = pdo($dbc, "SELECT * FROM posts WHERE id = :id", [
		'id' => $id
	]);
	
	$data = $stmt->fetch();
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if($data['body'] == $data['body_nohtml']) {
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
	} else {
		$data['body_formatted'] = $data['body'];	
	}
	return $data;
}


?>