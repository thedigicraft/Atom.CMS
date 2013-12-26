<?php
// Sandbox Functions


function get_page ($dbc, $pg) {

	// the database connection, our query
	$q = "SELECT * FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r);
	
	echo '<div class="entry">';
		echo '<h1>'.$page['title'].'</h1>';
		echo '<div class="content_body">'.$page['body'].'</div>';	
	echo '</div>';
	
}

function get_blog ($dbc) {

	// the database connection, our query
	$q = "SELECT *, MONTHNAME(date) AS themonth, DAYOFMONTH(date) AS theday, YEAR(date) AS theyear FROM blog ORDER BY date DESC";
	$r = mysqli_query($dbc, $q);
	
	while ($page = mysqli_fetch_assoc($r)) {
	
		echo '<div class="entry blog">';
			echo '<h1 class="nobuffer">'.$page['title'].'</h1>';
			echo '<p class="nobuffer">'.$page['themonth'].' '.$page['theday'].', '.$page['theyear'].'</p>';
			echo '<div class="content_body">'.$page['body'].'</div>';	
		echo '</div>';
	
	}
	
	
}

function get_page_title ($dbc, $pg) {
	
	$q = "SELECT title FROM pages WHERE name = '$pg' AND status = 1 LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$page = mysqli_fetch_assoc($r);
	
	return $page['title'];	
	
}






?>