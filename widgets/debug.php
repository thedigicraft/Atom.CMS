<div id="console-debug">
	
	<?php
	
		$all_vars = get_defined_vars();
	
	?>
	<?php //print_r($all_vars); ?>
	
		
<h1>GET</h1>
	
	<pre>			
<?php print_r($_GET); ?>	
	</pre>
	
<h1>POST</h1>
	
	<pre>			
<?php print_r($_POST); ?>	
	</pre>	

<h1>Page Array:</h1>	

	<pre>
<?php print_r($page); ?>			
	</pre>			
	
</div>