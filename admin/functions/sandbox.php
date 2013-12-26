<?php
// Sandbox Functions


function get_page ($dbc, $pg) {

	// the database connection, our query
	$q = "SELECT * FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r);
	
	echo '<h1>'.$page['title'].'</h1>';
	echo '<div class="content_body">'.$page['body'].'</div>';	
	
	
}

function get_page_title ($dbc, $pg) {
	
	$q = "SELECT title FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r);
	
	return $page['title'];	
	
}






?>