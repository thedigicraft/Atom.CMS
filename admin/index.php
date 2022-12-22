<?php 

	include('template/header.php');
	
	$allowedPages = array
	(
		'dashboard', 
		'pages', 
		'users', 
		'navigation', 
		'settings'
	);
	
	$page = escape_html($_GET['page']);    
	if(in_array($page, $allowedPages) 
		&& file_exists('views/'.$page.'.php'))
	{
		include ('views/'.$page.'.php');
	}
	else
	{
		echo 'File not found.';
	} 
	
	include('template/footer.php');

?>