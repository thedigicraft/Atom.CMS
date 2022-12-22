<?php
// Setup File:

error_reporting(0);

# Database Connection:
include('../config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Functions:
include('functions/pdo.php');
include('functions/sanitize_html.php');
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');
include('htmlpurifier-4.15.0/library/HTMLPurifier.auto.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'AtomCMS 2.1';

if(isset($_GET['page'])) {
	
	$page = $_GET['page']; // Set $pageid to equal the value given in the URL
	
} else {
	
	$page = 'dashboard'; // Set $pageid equal to 1 or the Home Page.
	
}

# Page Setup:
include('config/queries.php');

# User Setup:
$user = data_user($dbc, $_SESSION['username']);

?>