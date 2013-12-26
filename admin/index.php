<?php
// Setup document:
include('config/setup.php');

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php //echo $page_title; ?>ATOM - Admin Panel</title>

<link rel="stylesheet" type="text/css" href="css/styles.css">

<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" href="css/redactor.css" />
<script src="js/redactor.js"></script>


	<script type="text/javascript">
		$(document).ready(
			function() {
				$('#page_body').redactor();
			}
		);
	</script>

</head>

<body>

    <div class="wrap_overall">
    
        <div class="header"><?php head(); ?></div>
    
        <div class="nav_main"><?php nav_main(); ?></div>
    
        <div class="content">
            <?php include('content/'.$pg.'.php'); ?>    
        </div>
    	
        <div class="clear"></div>
        
        <div class="footer"><?php footer(); ?></div>
        
    </div>

</body>
</html>