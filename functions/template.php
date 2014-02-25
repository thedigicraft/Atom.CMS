<?php

function nav_main($dbc, $pageid) {
	
	$q = "SELECT * FROM pages";
	$r = mysqli_query($dbc, $q);
	
	while($nav = mysqli_fetch_assoc($r)) { ?>	

		<li<?php if($pageid == $nav['slug']) { echo ' class="active"'; } ?>><a href="<?php echo $nav['slug']; ?>"><?php echo $nav['label']; ?></a></li>

	<?php }
	
}



?>