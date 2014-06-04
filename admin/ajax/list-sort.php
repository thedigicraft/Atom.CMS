<?php

include('../../config/connection.php');
	
$list = $_GET['list'];	

//print_r($list);

foreach ($list as $position => $id) {
	
	$q = "UPDATE navigation SET position = $position WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	
	echo mysqli_error($dbc);
	
	
}



?>