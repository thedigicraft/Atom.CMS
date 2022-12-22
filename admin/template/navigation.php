<nav class="navbar navbar-default" role="navigation">	
		<ul class="nav navbar-nav">

			<li><a href="?page=dashboard">Dashboard</a></li>
			<li><a href="?page=pages">Pages</a></li>
			<li><a href="?page=users">Users</a></li>
			<li><a href="?page=navigation">Navigation</a></li>
			<li><a href="?page=settings">Settings</a></li>
					
		</ul>
		
		<div class="pull-right">
			<ul class="nav navbar-nav">
	
				<li>
					<?php if($debug == 1) { ?>
						<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
					<?php } ?>				
				</li>	
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo escape_html($user['fullname']); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<form method="POST" action="logout.php">
							<li><button style="display: block; width: 100%;" class="btn btn-default">Logout</button></li>
							<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
						</form>
					</ul>
				</li>

			</ul>
		</div>

	
</nav><!-- END nav -->