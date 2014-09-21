<h1>Site Settings</h1>

<div class="row">
	
	<div class="col-md-12">

		<?php if(isset($message)) { echo $message; } ?>
			
		<?php 
		
			$q = "SELECT * FROM settings ORDER BY id ASC";
			$r = mysqli_query($dbc, $q);
		
			while($opened = mysqli_fetch_assoc($r)) { ?>

				<form class="form-inline" action="index.php?page=settings&id=<?php echo $opened['id']; ?>" method="post" role="form">

					<div class="form-group">
						
						<label class="sr-only" for="id">ID:</label>
						<input class="form-control" data-id="<?php echo $opened['id']; ?>" data-label="Setting ID" data-db="settings-id" type="text" name="id" id="id" value="<?php echo $opened['id']; ?>" placeholder="id-name" autocomplete="off" disabled>
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="label">Label:</label>
						<input class="form-control blur-save" data-id="<?php echo $opened['id']; ?>" data-label="Setting Label" data-db="settings-label" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Label" autocomplete="off">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="value">Value:</label>
						<input class="form-control blur-save" data-id="<?php echo $opened['id']; ?>" data-label="Setting Value" data-db="settings-value" type="text" name="value" id="value" value="<?php echo $opened['value']; ?>" placeholder="Value" autocomplete="off">
						
					</div>						
		
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					
					<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>">
					
				</form>

		<?php } ?>

	</div>
		
</div>