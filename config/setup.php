<?php
// Setup File:
error_reporting(0);

# Database Connection:
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');
DEFINE('D_VIEW', 'views');

# Functions:
include('functions/sandbox.php');
include('functions/data.php');
include('functions/template.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$path = get_path();

$site_title = 'AtomCMS 2.0';

if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
	
	//$path['call_parts'][0] = 'home'; // Set $path[call_parts][0] to equal the value given in the URL
	header('Location: home');
	
}

# Page Setup:
$page = data_post($dbc, $path['call_parts'][0]);
$view = data_post_type($dbc, $page['type']);




?>