<h1>Navigation</h1>

<div class="row">
	
	<div class="col-md-3">
		
		<ul id="sort-nav" class="list-group">
			
			<?php
			
			$q = "SELECT * FROM navigation ORDER BY position ASC";
			$r = mysqli_query($dbc, $q);
			
			while ($list = mysqli_fetch_assoc($r)) { ?>
			
			<li id="list_<?php echo $list['id']; ?>" class="list-group-item"><?php echo $list['label']; ?></li>
			
			<?php } ?>
			
		</ul>

	</div>

	<div class="col-md-9">

		<?php if(isset($message)) { echo $message; } ?>
			
		<?php 
		
			$q = "SELECT * FROM navigation ORDER BY position ASC";
			$r = mysqli_query($dbc, $q);
		
			while($opened = mysqli_fetch_assoc($r)) { ?>

				<form class="form-inline" action="index.php?page=navigation&id=<?php echo $opened['id']; ?>" method="post" role="form">

					<div class="form-group">
						
						<label class="sr-only" for="id">ID:</label>
						<input class="form-control" type="text" name="id" id="id" value="<?php echo $opened['id']; ?>" placeholder="id-name" autocomplete="off">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="label">Label:</label>
						<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Label" autocomplete="off">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="value">Url:</label>
						<input class="form-control" type="text" name="url" id="url" value="<?php echo $opened['url']; ?>" placeholder="Url" autocomplete="off">
						
					</div>	
					
					<div class="form-group">
						
						<label class="sr-only" for="position">Position:</label>
						<input class="form-control" type="text" name="position" id="position" value="<?php echo $opened['position']; ?>" placeholder="" autocomplete="off">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="status">Status:</label>
						<input class="form-control" type="text" name="status" id="status" value="<?php echo $opened['status']; ?>" placeholder="" autocomplete="off">
						
					</div>																
		
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					
					<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>">
					
				</form>

		<?php } ?>

	</div>
		
</div>