<?php
// Setup document:
include('config/setup.php');

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?> - ATOM.CMS</title>

<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div class="wrap_overall">
    
        <div class="header"><?php head(); ?></div>
    
        <div class="nav_main"><?php nav_main(); ?></div>
    
        <div class="content">
            <?php 
			
				if ($pg == 'blog') { get_blog($dbc); } 
				else { get_page($dbc, $pg); }
				
			?>    
        </div>
    
    	<div class="clear"></div>
    
        <div class="footer"><?php footer(); ?></div>
        
    </div>

</body>
</html>