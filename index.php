<?php
// Setup document:
include('config/setup.php');

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $page_title; // Title of the Page ?> - ATOM.CMS</title>

<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div class="wrap_overall">
    
        <div class="header"><?php head(); ?></div><!-- END header -->
    
        <div class="nav_main"><?php nav_main(); ?></div><!-- END nav_main -->
    
        <div class="content">
            <?php 
			
				if ($pg == 'blog') { get_blog($dbc); } 
				else { get_page($dbc, $pg); }
				
			?>    
        </div><!-- END content -->
    
    	<div class="clear"></div>
    
        <div class="footer"><?php footer(); ?></div><!-- END footer -->
        
    </div><!-- END wrap_overall -->

</body>
</html>