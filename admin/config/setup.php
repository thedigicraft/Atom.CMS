<?php
## Setup Document

// host(or location of the database), username, password, database name:
$dbc = mysqli_connect('localhost', 'yourusername', 'yourpassword', 'yourdatabasename') OR die ('Could not connect to the datebase because: ' . mysqli_connect_error() );

// Function Files:
include('functions/sandbox.php');
include('functions/template.php');

// IF a page name is not given:
if ($_GET['page'] == '') {
	$pg = 'home'; // Default to the Home Page
} else {
	$pg = $_GET['page']; // Use the page in the URL
}

$page_title = get_page_title($dbc, $pg); // Get the page title.

?>