
<?php if(isset($opened['id'])) { ?>
	<script>
		Dropzone.options.avatarDropzone = {
			init() {
				this.on('success', file => {
					const dropEl = document.querySelector('#dropzone-message');
					dropEl.style.marginTop = '15px';
					dropEl.classList.add('alert','alert-success');
					dropEl.textContent = 'File uploaded!';
					$.ajaxSetup({
						headers : {
							CsrfToken: "<?php echo $_SESSION['token']; ?>"
						}
					});
					$("#avatar").load("ajax/avatar.php" , {
						id: "<?php echo $opened['id']; ?>"
					});
				});
				this.on('error', (file, message) => {
					const dropEl = document.querySelector('#dropzone-message');
					dropEl.style.marginTop = '15px';
					dropEl.classList.add('alert','alert-danger');
					dropEl.textContent = message;
				});
			}
		};
	</script>
<?php } ?>

<h1>User Manager</h1>

<div class="row">
	
	<div class="col-md-3">

		<div class="list-group">
			
		<a class="list-group-item" href="?page=users">
			<i class="fa fa-plus"></i> New User
		</a>					
						
		<?php 
		
			$stmt = pdo($dbc, "SELECT * FROM users ORDER BY last ASC");
		
			while($list = $stmt->fetch()) { 
				$list = data_user($dbc, $list['id']);
				//$blurb = substr(strip_tags($page_list['body']), 0, 160);
					
			?>

			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>" href="index.php?page=users&id=<?php echo escape_html($list['id']); ?>">
				<h4 class="list-group-item-heading"><?php echo escape_html($list['fullname_reverse']); ?></h4>
				<!--<p class="list-group-item-text"><?php //echo $blurb; ?></p>-->
			</a>
				
				
		<?php } ?>
		
		</div>
		
	</div>
	
	<div class="col-md-9">

		<?php if(isset($message)) { echo $message; } ?>
		
		<form action="index.php?page=users&id=<?php echo escape_html($opened['id']); ?>" method="post" role="form">
			
			<div id="avatar">
				<?php if($opened['avatar'] != ''){ ?>
	
					<div class="avatar-container" style="background-image: url('../uploads/<?php echo escape_html($opened['avatar']); ?>')"></div>
	
				<?php } ?>
			</div>
			
			<div class="form-group">
				
				<label for="first">First Name:</label>
				<input class="form-control" type="text" name="first" id="first" value="<?php echo escape_html($opened['first']); ?>" placeholder="First Name" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="last">Last Name:</label>
				<input class="form-control" type="text" name="last" id="last" value="<?php echo escape_html($opened['last']); ?>" placeholder="Last Name" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="email">Email Address:</label>
				<input class="form-control" type="text" name="email" id="email" value="<?php echo escape_html($opened['email']); ?>" placeholder="Email Address" autocomplete="off">
				
			</div>						

			<div class="form-group">
				
				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">
					
					<option value="0" <?php if(isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>>Inactive</option>
					<option value="1" <?php if(isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); } ?>>Active</option>
										
				</select>
				
			</div>

			<div class="form-group">
				
				<label for="password">Password:</label>
				<input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="passwordv">Verify Password:</label>
				<input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Type Password Again" autocomplete="off">
				
			</div>			
			
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo escape_html($opened['id']); ?>">
			<?php } ?>
			<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
		</form>
		
		<?php if(isset($opened['id'])) { ?>
		<p id="dropzone-message"></p>
		<form action="uploads.php" id="avatarDropzone" class="dropzone">
			<input type="file" name="file">
			<input type="hidden" name="id-a" value="<?php echo escape_html($opened['id']); ?>" />
			<input type="hidden" name="token-a" value="<?php echo $_SESSION['token']; ?>" />
		</form>

		<?php } ?>
		
	</div>
		
</div>