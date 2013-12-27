<?php
## Template Functions

// Display the Page's Header:
function head() {

	echo '<h1>ATOM.CMS - Administration Panel</h1>';
	
}

// Display the Page's Main Navigation:
function nav_main() {

	echo '
	
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=pages">Pages</a></li>
			<li><a href="index.php?page=blog">Blog</a></li>
		</ul>
		
	';	

}

// Display the Page's Footer:
function footer() {

	echo '<p>Copyright Dynamic Sites LLC 2012</p>';
	
}

?>