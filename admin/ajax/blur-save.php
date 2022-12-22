<?php
	
	session_start();

	$headers = apache_request_headers();
	
	
	if (isset($headers['CsrfToken']) && !empty($headers['CsrfToken'])) {
    if (hash_equals($_SESSION['token'], $headers['CsrfToken'])) {
         	// Database Connection:
	include('../../config/connection.php');
	include('../functions/pdo.php');
	
	// Turn off those pesky Index notices.
	//error_reporting(E_ALL & ~E_NOTICE); 
	
	// Breakup the POST values into easy variables:
	$id = $_POST['id']; // Unique identifier for the record we wish to UPDATE
	$value = $_POST['value']; // New Value
	
	# Break up database info:
	$db = explode('-', $_POST['db']); // Explode the table and feild name from string.

	$table = $db[0]; // Store the table name.
	$field = $db[1]; // Store the field name.

	// Since we are accepting dynamic tables and columns, I wrote a whitelist for this kind of functionality. Add tables and columns based on the example below.
	
	switch($table) {
		case 'settings':
			$table = 'settings';
			switch($field) {
				case 'id':
					$field = 'id';
				break;

				case 'label':
					$field = 'label';
				break;

				case 'value':
					$field = 'value';
				break;

				default:
					$field = false;
			}

		break;
		default:
			$table = false;
	}
	
	if($table !== false && $field !== false ) {

		# Run a query to get the current value of the field:
		$stmt = pdo($dbc, "SELECT $field FROM $table WHERE id = :id", [
			'id' => $id
		]);
		
		if($stmt) {

		// Store the result:
		$check = $stmt->fetch();
     
		if($check) {

		# Check the new value with the current value:
		if($check[$field] != $value) {
        
	        # Make the update:
					$stmt = pdo($dbc, "UPDATE $table SET $field = :value WHERE id = :id", [
						'value' => $value,
						'id' => $id
					]);

			# If there is a result
	        if($stmt){
	        	
				// Send successful update status back:
	        	echo 1;
				
			}         
      	}else{
        
			// Send no update status back:
        	echo 3;
        
      	} // END if $check
			} else {
				exit('Error');
			}
		} else {
			exit('Error');
		}
			} else {
				exit('Error');
			}
    } else {
        exit('Error');
    }
}


?>