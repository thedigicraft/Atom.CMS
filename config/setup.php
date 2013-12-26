<?php
## Setup Document

// host(or location of the database), username, password, database name

$dbc = mysqli_connect('localhost', 'yourusername', 'yourpassword', 'yourdatabasename') OR die ('Could not connect to the datebase because: ' . mysqli_connect_error() );


include('functions/sandbox.php');
include('functions/template.php');

if ($_GET['page'] == '') {
	$pg = 'home';
} else {
	$pg = $_GET['page'];
}

$page_title = get_page_title($dbc, $pg);




?>