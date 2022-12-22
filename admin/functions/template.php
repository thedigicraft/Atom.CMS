<?php

function nav_main($dbc, $pageid) {
	
	$stmt = pdo($dbc, "SELECT * FROM navigation ORDER BY position ASC");

	while($nav = $stmt->fetch()) { ?>	

		<li<?php if($pageid == $nav['id']) { echo ' class="active"'; } ?>><a href="?page=<?php echo escape_html($nav['id']); ?>"><?php echo escape_html($nav['label']); ?></a></li>

	<?php }
	
}

?>