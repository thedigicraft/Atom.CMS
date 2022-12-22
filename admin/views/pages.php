<h1>Page Manager</h1>


<div class="row">
	
	<div class="col-md-3">

		<div class="list-group">
			
		<a class="list-group-item" href="?page=pages">
			<i class="fa fa-plus"></i> New Page
		</a>					
						
		<?php 
		
			$stmt = pdo($dbc, "SELECT * FROM posts WHERE type = :type ORDER BY title ASC", [
				'type' => 1
			]);
		
			while($list = $stmt->fetch()) { 
				$blurb = substr(strip_tags(escape_html($list['body'])), 0, 160);
			?>

			<div id="page_<?php echo escape_html($list['id']); ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
				<h4 class="list-group-item-heading"><?php echo escape_html($list['title']); ?>
				<span class="pull-right">
					<a href="#" id="del_<?php echo escape_html($list['id']); ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
					<a href="index.php?page=pages&id=<?php echo escape_html($list['id']); ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
				</span>
				
				</h4>
				<p class="list-group-item-text"><?php echo $blurb; ?></p>
			</div>
				
				
		<?php } ?>
		
		</div>
		
	</div>
	
	<div class="col-md-9">

		<?php if(isset($message)) { echo $message; } ?>
		
		<form action="index.php?page=pages&id=<?php echo escape_html($opened['id']); ?>" method="post" role="form">
			
			
			<div class="form-group">
				
				<label for="title">Title:</label>
				<input class="form-control" type="text" name="title" id="title" value="<?php echo escape_html($opened['title']); ?>" placeholder="Page Title">
				
			</div>

			<div class="form-group">
				
				<label for="user">User:</label>
				<select class="form-control" name="user" id="user">
					
					<option value="0">No user</option>
					
					<?php
					
						$stmt = pdo($dbc, "SELECT id FROM users ORDER BY first ASC");
						
						while($user_list = $stmt->fetch()) { 
							$user_data = data_user($dbc, $user_list['id']);
						?>
					
							<option value="<?php echo escape_html($user_data['id']); ?>" 
								<?php 
									if(isset($_GET['id'])){
										selected($user_data['id'], $opened['user'], 'selected');
									} else {												
										selected($user_data['id'], $user['id'], 'selected');
									}
									
								
								?>><?php echo escape_html($user_data['fullname']); ?></option>
					
						<?php } ?>
					
				</select>
				
			</div>

			<div class="form-group">
				
				<label for="slug">Slug:</label>
				<input class="form-control" type="text" name="slug" id="slug" value="<?php echo escape_html($opened['slug']); ?>" placeholder="Page Slug">
				
			</div>

			<div class="form-group">
				
				<label for="label">Label:</label>
				<input class="form-control" type="text" name="label" id="label" value="<?php echo escape_html($opened['label']); ?>" placeholder="Page Label">
				
			</div>
			
			<div class="form-group">
				
				<label for="header">Header:</label>
				<input class="form-control" type="text" name="header" id="header" value="<?php echo escape_html($opened['header']); ?>" placeholder="Page Header">
				
			</div>										

			<div class="form-group">
				
				<label for="body">Body:</label>
				<textarea class="form-control editor" name="body" id="body" rows="8" placeholder="Page Body"><?php echo escape_html($opened['body']); ?></textarea>
				
			</div>
			
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo escape_html($opened['id']); ?>">
			<?php } ?>
			<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
		</form>
		
	</div>
		
</div>