<?php
## Sandbox Functions

// Get the Page data:
function get_page ($dbc, $pg) {

	// Query the pages tables and select an individual page from it's id.
	$q = "SELECT * FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r); // Convert results into an array
	
	echo '<div class="entry">';
		echo '<h1>'.$page['title'].'</h1>';
		echo '<div class="content_body">'.$page['body'].'</div>';	
	echo '</div>';
	
}

// Get the Blog data
function get_blog ($dbc) {

	// Query the blog entries.  Set Alias' for the month, day, and year.
	$q = "SELECT *, MONTHNAME(date) AS themonth, DAYOFMONTH(date) AS theday, YEAR(date) AS theyear FROM blog ORDER BY date DESC";
	$r = mysqli_query($dbc, $q);
	
	while ($page = mysqli_fetch_assoc($r)) { // Convert results into an array & loop for each result
	
		echo '<div class="entry blog">';
			echo '<h1 class="nobuffer">'.$page['title'].'</h1>';
			echo '<p class="nobuffer">'.$page['themonth'].' '.$page['theday'].', '.$page['theyear'].'</p>';
			echo '<div class="content_body">'.$page['body'].'</div>';	
		echo '</div>';
	
	}
		
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