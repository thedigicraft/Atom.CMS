<?php
## Template Functions

// Display the Page's Header:
function head() {

	echo '<h1>ATOM.CMS</h1>';
	
}

// Display the Page's Main Navigation:
function nav_main() {

	echo '
	
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=gallery">Gallery</a></li>
			<li><a href="index.php?page=blog">Blog</a></li>
			<li><a href="index.php?page=newpage">New Page</a></li>
			<li><a href="index.php?page=contact">Contact Us</a></li>
		</ul>
		
	';	
	
}

// Display the Page's Footer:
function footer() {

	echo '<p>Copyright Dynamic Sites LLC 2012</p>';
	
}

?>