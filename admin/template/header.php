<?php

# Start the session:
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}


?>

<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
	
<head>

	<title>Admin | <?php echo $site_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="<?php echo $_SESSION['token']; ?>">
	<link rel="icon" type="image/png" href="images/atom.png">

	<?php include('config/css.php'); ?>
	<?php include('config/js.php'); ?>
</head>
	
<body>
	
	<div id="wrap">		
			
		<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>