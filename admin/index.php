<?php

# Start the session:
session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}


?>

<?php include('config/setup.php'); ?>

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
			
		<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>

		<h1>Admin Dashboard</h1>
		
		
		<div class="row">
			
			<div class="col-md-3">

				<?php
				
				

				
				
				?>

				<div class="list-group">
					
				<a class="list-group-item" href="index.php">
					<i class="fa fa-plus"></i> New Page
				</a>					
					
					
				<?php 
				
					$q = "SELECT * FROM pages ORDER BY title ASC";
					$r = mysqli_query($dbc, $q);
				
					while($page_list = mysqli_fetch_assoc($r)) { 
					
						$blurb = substr(strip_tags($page_list['body']), 0, 160);
							
					?>

					<a class="list-group-item <?php selected($page_list['id'], $opened['id'], 'active'); ?>" href="index.php?id=<?php echo $page_list['id']; ?>">
						<h4 class="list-group-item-heading"><?php echo $page_list['title']; ?></h4>
						<p class="list-group-item-text"><?php echo $blurb; ?></p>
					</a>
						
						
				<?php } ?>
				
				</div>
				
			</div>
			
			<div class="col-md-9">

				<?php if(isset($message)) { echo $message; } ?>
				
				<form action="index.php?id=<?php echo $opened['id']; ?>" method="post" role="form">
					
					
					<div class="form-group">
						
						<label for="title">Title:</label>
						<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">
						
					</div>

					<div class="form-group">
						
						<label for="user">User:</label>
						<select class="form-control" name="user" id="user">
							
							<option value="0">No user</option>
							
							<?php
							
								$q = "SELECT id FROM users ORDER BY first ASC";
								$r = mysqli_query($dbc, $q);
								
								while($user_list = mysqli_fetch_assoc($r)) { 
								
									$user_data = data_user($dbc, $user_list['id']);
										
								?>
							
									<option value="<?php echo $user_data['id']; ?>" 
										<?php 
											if(isset($_GET['id'])){
												selected($user_data['id'], $opened['user'], 'selected');
											} else {												
												selected($user_data['id'], $user['id'], 'selected');
											}
											
										
										?>><?php echo $user_data['fullname']; ?></option>
							
								<?php } ?>
							
						</select>
						
					</div>

					<div class="form-group">
						
						<label for="slug">Slug:</label>
						<input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Page Slug">
						
					</div>

					<div class="form-group">
						
						<label for="label">Label:</label>
						<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Page Label">
						
					</div>
					
					<div class="form-group">
						
						<label for="header">Header:</label>
						<input class="form-control" type="text" name="header" id="header" value="<?php echo $opened['header']; ?>" placeholder="Page Header">
						
					</div>										

					<div class="form-group">
						
						<label for="body">Body:</label>
						<textarea class="form-control editor" name="body" id="body" rows="8" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
					
				</form>
				
			</div>
			
			
		</div>
		
		

	</div><!-- END wrap -->		

	<?php include(D_TEMPLATE.'/footer.php'); // Page Footer ?>		

	<?php if($debug == 1) { include('widgets/debug.php'); } ?>
	
</body>

</html>