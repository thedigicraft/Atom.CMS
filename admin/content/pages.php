<?php ## Page Manager ?>

<?php

	if (isset($_POST['submitted']) == 1) {

			
			$q = "INSERT INTO pages (id, title, name, body) VALUES ('$_GET[id]', '$_POST[title]', '$_POST[name]', '$_POST[body]') 
			ON DUPLICATE KEY UPDATE title='$_POST[title]', name='$_POST[name]', body='$_POST[body]'";	
			$r = mysqli_query($dbc, $q);		
	
	}


?>

<h2>Page Manager</h2>

<div class="col sidebar">

	<ul class="nav_side">
    
    	<li><a href="?page=pages">+ Add New Page</a></li>
        
		<?php
        
			$q = "SELECT * FROM pages ORDER BY name ASC";
			$r = mysqli_query($dbc, $q);
			
			if ($r) {
			
				while ($link = mysqli_fetch_assoc($r)) {
					
					echo '<li><a href="?page=pages&id='.$link['id'].'">'.$link['name'].'</a></li>';
					
				}
				
			}
        
        ?>
    
    </ul><!-- END nav_side -->


</div><!-- END col sidebar -->

<div class="col editor">

	<h1>

		<?php 
            
            if (isset($_GET['id'])) { 
        
                $q = "SELECT * FROM pages WHERE id = '$_GET[id]' LIMIT 1";
                $r = mysqli_query($dbc, $q);
                
                $opened = mysqli_fetch_assoc($r);
				
				echo 'Editing: '.$opened['title'];	
                
            } else {
                
                echo 'Add a New Page';
				
            }
        
        ?>
        
	</h1>
    
    <form action="?page=pages&id=<?php echo $opened['id'] ?>" method="post">

        <table class="gen_form">
        

            <tr>
                <td class="gen_label"><label>Page title: </label></td>
                <td><input class="gen_input" type="text" size="30" name="title" value="<?php echo $opened['title'] ?>"></td>
            </tr>
            
            <tr>
                <td class="gen_label"><label>Page Name: </label></td>
                <td><input class="gen_input" type="text" size="30" name="name" value="<?php echo $opened['name'] ?>"></td>
            </tr>
                            
            <tr>
                <td colspan="2"></td>
            </tr>

            <tr>
                <td class="gen_label" colspan="2"><label>Page Body: </label></td>
            </tr>
            
            <tr>
                <td colspan="2"><textarea id="page_body" name="body" cols="30" rows="8"><?php echo $opened['body'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input class="gen_submit" type="submit" name="submit" value="Save Changes"></td>
            </tr>
                                           
            <input type="hidden" name="submitted" value="1">
            <input type="hidden" name="id" value="<?php echo $opened['id'] ?>">
        </table>
        
    </form><!-- END form -->

</div><!-- END col editor -->