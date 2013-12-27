<?php
## Sandbox Functions

// Get the Page data:
function get_page ($dbc, $pg) {

	// Query the pages tables and select an individual page from it's id.
	$q = "SELECT * FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r); // Convert results into an array
	
	echo '<h1>'.$page['title'].'</h1>';
	echo '<div class="content_body">'.$page['body'].'</div>';	
	
	
}

// Get the Page's title:
function get_page_title ($dbc, $pg) {
	
	// Query the pages table and pull the correct page title from it's id.
	$q = "SELECT title FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r); // Convert results into an array
	
	return $page['title'];	
	
}

?>