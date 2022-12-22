<?php

session_start();

$headers = apache_request_headers();

if (isset($headers['CsrfToken']) && !empty($headers['CsrfToken'])) {
	if (hash_equals($_SESSION['token'], $headers['CsrfToken'])) {
		include('../../config/connection.php');
		include('../functions/pdo.php');	
		$id = $_POST['id'];	
		$stmt = pdo($dbc, "DELETE FROM posts WHERE id = :id", [
			'id' => $id
		]);	
		if($stmt) {
			echo 'Page Deleted';
		}
	} else {
			echo 'Error';	 
	}
} else {
	echo 'Error';
}

?>