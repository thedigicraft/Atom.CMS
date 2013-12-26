<?php
// Template Functions


function head() {

	echo '<h1>ATOM.CMS</h1>';
	
}

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

function footer() {

	echo '<p>Copyright Dynamic Sites LLC 2012</p>';
	
}




?>