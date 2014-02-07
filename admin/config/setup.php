<?php
// Setup File:

# Database Connection:
include('../config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Functions:
include('functions/data.php');
include('functions/template.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'AtomCMS 2.0';

if(isset($_GET['page'])) {
	
	$pageid = $_GET['page']; // Set $pageid to equal the value given in the URL
	
} else {
	
	$pageid = 1; // Set $pageid equal to 1 or the Home Page.
	
}

# Page Setup:
$page = data_page($dbc, $pageid);





?>