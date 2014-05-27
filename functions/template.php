<?php

function nav_main($dbc, $path) {
	
	$q = "SELECT * FROM navigation ORDER BY position ASC";
	$r = mysqli_query($dbc, $q);
	
	while($nav = mysqli_fetch_assoc($r)) {
		$nav['slug'] = get_slug($dbc, $nav['url']);
		
		?>	

		<li<?php selected($path['call_parts'][0], $nav['slug'], ' class="active"') ?>><a href="<?php echo $nav['url']; ?>"><?php echo $nav['label']; ?></a></li>

	<?php }
	
}



?>