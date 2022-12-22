<?php

session_start();

$headers = apache_request_headers();

if (isset($headers['CsrfToken']) && !empty($headers['CsrfToken'])) {
	if (hash_equals($_SESSION['token'], $headers['CsrfToken'])) {
    include('../../config/connection.php');
    include('../functions/pdo.php');
    include('../functions/sanitize_html.php');	

    $id = $_POST['id'];	
    $stmt = pdo($dbc, "SELECT avatar FROM users WHERE id = :id", [
      'id' => $id
    ]);

    $data = $stmt->fetch();

	} else {
			echo 'Error';	 
	}
} else {
	echo 'Error';
}

?>

<div class="avatar-container" style="background-image: url('../uploads/<?php echo escape_html($data['avatar']); ?>')"></div>