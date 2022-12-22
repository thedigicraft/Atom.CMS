<nav class="navbar navbar-default" role="navigation">
	
	<?php if($debug == 1) { ?>
		<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
	<?php } ?>
	
	<div class="container">	
		
		<ul class="nav navbar-nav">	
			<?php nav_main($dbc, $path); ?>
		</ul>
		
		<div class="pull-right">
		<ul class="nav navbar-nav">
		<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">All Posts <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php

							$stmt = pdo($dbc, "SELECT * FROM posts WHERE id > 2");
							while($post = $stmt->fetch()) { ?>
								<li><a href="<?php echo SITE_DOMAIN.escape_html($post['slug']); ?>"><?php echo escape_html($post['label']); ?></a></li>
						 <?php } ?>
						
					</ul>
				</li>
		</ul>
		</div>

	</div>
	
</nav><!-- END nav -->