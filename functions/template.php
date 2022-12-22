<?php

function nav_main($dbc, $path) {
	
	$stmt = pdo($dbc, "SELECT * FROM navigation ORDER BY position ASC");
	
	while($nav = $stmt->fetch()) {
		$nav['slug'] = get_slug($dbc, $nav['url']);
		?>	
		<li<?php selected($path['call_parts'][0], $nav['slug'], ' class="active"') ?>><a href="<?php echo escape_html($nav['url']); ?>"><?php echo escape_html($nav['label']); ?></a></li>
	<?php }
	
}
?>