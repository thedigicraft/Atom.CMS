<div id="console-debug">
	
	<?php
	
		$all_vars = get_defined_vars();
	
	?>
	<?php //print_r($all_vars); ?>
	
		
<h1>GET</h1>
	
	<pre>			
	<?php  
			$get_array = sanitize_array($_GET);
			print_r($get_array);
		?>		
	</pre>
	
<h1>POST</h1>
	
	<pre>			
	<?php 
			$post_array = sanitize_array($_POST);
			print_r($post_array);
		?>	
	</pre>	

<h1>Page Array:</h1>	

	<pre>
	<?php 
			$page_array = sanitize_array($page);
			print_r($page_array);
		?>			
	</pre>			
	
</div>