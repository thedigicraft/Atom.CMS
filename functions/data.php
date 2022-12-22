<?php

function data_setting_value($dbc, $id){
	
	$stmt = pdo($dbc, "SELECT * FROM settings WHERE id = :id", [
		'id' => $id
	]);
	$data = $stmt->fetch();
	return $data['value'];	
}

function data_post_type($dbc, $id) {
	
	$stmt = pdo($dbc, "SELECT * FROM post_types WHERE id = :id", [
		'id' => $id
	]);	
	$data = $stmt->fetch();
	return $data;
}

function data_post($dbc, $id) {
	
	if(is_numeric($id)) {
		$stmt = pdo($dbc, "SELECT * FROM posts WHERE id = :id", [
			'id' => $id
		]);	
	} else {
		$stmt = pdo($dbc, "SELECT * FROM posts WHERE slug = :slug", [
			'slug' => $id
		]);	
	}
	
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