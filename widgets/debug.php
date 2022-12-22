<div id="console-debug">
	
	<?php
	
		$all_vars = get_defined_vars();
	
	?>
	<?php //print_r($all_vars); ?>
	
		
<h1>Path Array</h1>
	
	<pre>			
		<?php 
			$path_clean = [];
			foreach($path as $key => $value) {
				if(is_string($key) && is_string($value)) {
					$key = escape_html($key);
					$value = escape_html($value);
					$path_clean[$key] = $value;
				}
				if(is_string($key) && is_array($value) && !empty($value)) {
					$arr = [];
					foreach($value as $k => $v) {
						if(is_numeric($k)) {
							$v = escape_html($v);
							$arr[$k] = $v;
						} elseif(is_string($k)) {
							$k = escape_html($k);
							$v = escape_html($v);
							$arr[$k] = $v;
						}
					}
					$path_clean[$key] = $arr;
				}
			}
			print_r($path_clean);

		?>
	</pre>
	
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
	
<h1>View Array:</h1>	

	<pre>
		<?php 
			$view_array = sanitize_array($view);
			print_r($view_array);
		?>			
	</pre>				
	
</div>