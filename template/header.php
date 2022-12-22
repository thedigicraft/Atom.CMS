<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
	
<head>

	<title><?php echo escape_html($page['title']).' | '.$site_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link
	<link rel="icon" type="image/png" href="images/atom.png">

	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>

</head>
	
<body>
	
	<div id="wrap">		
			
		<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>