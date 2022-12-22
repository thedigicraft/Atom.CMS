<?php

session_start();

$headers = apache_request_headers();

if (isset($headers['CsrfToken']) && !empty($headers['CsrfToken'])) {
	if (hash_equals($_SESSION['token'], $headers['CsrfToken'])) {
		include('../../config/connection.php');
		include('../functions/pdo.php');
		
		$nums = [];
		$list = $_POST['list'];
		
		for($i = 0; $i < strlen($list); $i++) {
			if($list[$i] === '0') {
				$nums[] = (int) $list[$i];
			} else {
				if(intval($list[$i]) !== 0) {
					$nums[] = intval($list[$i]);
				}
			}
		}
		
		foreach ($nums as $position => $id) {
			
			$stmt = pdo($dbc, "UPDATE navigation SET position = :position WHERE id = :id", [
				'position' => $position,
				'id' => $id
			]);	
		}
	} else {
			 exit('Error');
	}
} else {
	exit('Error');
}

?>