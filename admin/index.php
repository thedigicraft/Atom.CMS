<?php
// Setup document:
include('config/setup.php');

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php //echo $page_title; ?>ATOM - Admin Panel</title>

<link rel="stylesheet" type="text/css" href="css/styles.css"><!-- Main Stylesheet -->

<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script><!-- jQuery Source -->
<link rel="stylesheet" href="css/redactor.css" /><!-- Redactor Stylesheet - NOT included in this repo -->
<script src="js/redactor.js"></script><!-- Redactor Javascript Source - NOT included in this repo -->

	<script type="text/javascript">
		// Initialize Redactor Plugin (not included in the repo)
		$(document).ready(
			function() {
				$('#page_body').redactor();
			}
		);
	</script>

</head>

<body>

    <div class="wrap_overall">
    
        <div class="header">
        	<?php head(); ?>
        </div><!-- END header -->
    
        <div class="nav_main">
        	<?php nav_main(); ?>
        </div><!-- END nav_main -->
    
        <div class="content">
            <?php include('content/'.$pg.'.php'); ?>    
        </div><!-- END content -->
    	
        <div class="clear"></div>
        
        <div class="footer">
        	<?php footer(); ?>
        </div><!-- END footer -->
        
    </div><!-- END wrap_overall -->

</body>
</html>