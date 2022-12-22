<?php 

# Start Session:
session_start();

if(empty($_SESSION['token'])) {
	$_SESSION['token'] = bin2hex(random_bytes(32));
}

# Database Connection:
include('../config/connection.php');
include('functions/pdo.php');

if($_SERVER["REQUEST_METHOD"] === 'POST') {

	if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
			$stmt = pdo($dbc, "SELECT * FROM users WHERE email = :email", [
				'email' => $_POST['email'],
			]);
				
			$user = $stmt->fetch();
			if(password_verify($_POST['password'], $user['password'])) {
				$_SESSION['username'] = $_POST['email'];

				// Renewing the token for preventing session fixation attack
				$_SESSION['token'] = bin2hex(random_bytes(32));

				header('Location: index.php?page=dashboard');	
			}
    } 
}
}
?>

<!DOCTYPE html>
<html>
	
<head>

	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/atom.png" />

	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>

</head>
	
<body>
	
	<div id="wrap">		
			
		<?php //include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>

		<div class="container">

			<div class="row">

				<div class="col-md-4 col-md-offset-4">
				
					<div class="panel panel-info">
					
						<div class="panel-heading">
							<strong>Login</strong>
						</div><!-- END panel-heading -->
						
						<div class="panel-body">
						
							<form action="login.php" method="post" role="form">
								
							  <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
							  </div>
							  
							  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  </div>
							  
							  <!--
							  <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div>
							  -->

								<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
							  <button type="submit" class="btn btn-default">Submit</button>
							  
							</form>
						
						</div><!-- END panel-body -->
					
					</div><!-- END panel -->				
					
				</div><!-- END col -->
				
								
			</div><!-- END row -->
			
		
			
		</div><!-- END container -->

	</div><!-- END wrap -->		

	<?php //include(D_TEMPLATE.'/footer.php'); // Page Footer ?>		

	<?php //if($debug == 1) { include('widgets/debug.php'); } ?>
	
</body>

</html>
