<?php 

# Database Connection:
include('../config/connection.php');

?>

<!DOCTYPE html>
<html>
	
<head>

	<title><?php echo $page['title'].' | '.$site_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>

</head>
	
<body>
	
	<div id="wrap">		
			
		<?php //include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>

		<div class="container">
	
			<h1>Login</h1>
			
			<form role="form">
				
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			  </div>
			  
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  
			  <!--
			  <div class="checkbox">
			    <label>
			      <input type="checkbox"> Check me out
			    </label>
			  </div>
			  -->
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			  
			</form>		
			
		</div>

	</div><!-- END wrap -->		

	<?php //include(D_TEMPLATE.'/footer.php'); // Page Footer ?>		

	<?php //if($debug == 1) { include('widgets/debug.php'); } ?>
	
</body>

</html>