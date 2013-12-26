<?php
// Template Functions


function head() {

	echo '<h1>ATOM.CMS - Administration Panel</h1>';
	
}

function nav_main() {

	echo '
	
		<ul>
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=pages">Pages</a></li>
			<li><a href="index.php?page=blog">Blog</a></li>
		</ul>
		
	';	

	
}

function footer() {

	echo '<p>Copyright Dynamic Sites LLC 2012</p>';
	
}




?>