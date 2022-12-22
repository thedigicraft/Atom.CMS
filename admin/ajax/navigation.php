<?php

session_start();

$headers = apache_request_headers();

if (isset($headers['CsrfToken']) && !empty($headers['CsrfToken'])) {
	if (hash_equals($_SESSION['token'], $headers['CsrfToken'])) {
		
		include('../../config/connection.php');
		include('../functions/pdo.php');	
		$stmt = pdo($dbc, "UPDATE navigation SET id = :id, label = :label, url = :url, status = :status WHERE id = :openedid", [
			'id' => $_POST['id'],
			'label' => $_POST['label'],
			'url' => $_POST['url'],
			'status' => $_POST['status'],
			'openedid' => $_POST['openedid']
		]);	
		
		if($stmt){
			echo 'Saved<br>';
		} 

	} else {
			echo 'Error';	 
	}
} else {
	echo 'Error';
}

?>