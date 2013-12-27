<?php ## Blog Manager 

	if (isset($_POST['submitted']) == 1) {

			$date = $_POST['date'];
			if ($date == '') { $date = date('Y-m-d H:i:s'); }
			
			$q = "INSERT INTO blog (id, title, date, body) VALUES ('$_GET[id]', '$_POST[title]', '$date', '$_POST[body]') 
			ON DUPLICATE KEY UPDATE title='$_POST[title]', date='$_POST[date]', body='$_POST[body]'";	
			$r = mysqli_query($dbc, $q);		
	
	}


?>

<h2>Blog Manager</h2>

<div class="col sidebar">

	<ul class="nav_side">
    
    	<li><a href="?page=blog">+ Add Post</a></li>
    
		<?php
        
			$q = "SELECT * FROM blog ORDER BY date ASC";
			$r = mysqli_query($dbc, $q);
			
			if ($r) {
			
				while ($link = mysqli_fetch_assoc($r)) {
					
					echo '<li><a href="?page=blog&id='.$link['id'].'">'.$link['title'].'</a></li>';
					
				}
				
			}
        
        ?>
    
    </ul><!-- END nav_side -->


</div><!-- END col sidebar -->

<div class="col editor">

    <h1>
    
        <?php 
            
            if (isset($_GET['id'])) { 
        
                $q = "SELECT * FROM blog WHERE id = '$_GET[id]' LIMIT 1";
                $r = mysqli_query($dbc, $q);
                
                $opened = mysqli_fetch_assoc($r);
				
				echo 'Editing: '.$opened['title'];	
                
            } else {
                
                echo 'Add a New Blog Post';
				
            }
        
        ?>
    </h1>

        <form action="?page=blog&id=<?php echo $opened['id'] ?>" method="post">
   
			<table class="gen_form">
            

            	<tr>
                	<td class="gen_label"><label>Blog title: </label></td>
                	<td><input class="gen_input" type="text" size="30" name="title" value="<?php echo $opened['title'] ?>"></td>
                </tr>
                
            	<tr>
                	<td class="gen_label"><label>Blog Date: </label></td>
                	<td><input class="gen_input" type="text" size="30" name="name" value="<?php echo $opened['date'] ?>"></td>
                </tr>
                                
                <tr>
                	<td colspan="2"></td>
                </tr>

                <tr>
                	<td class="gen_label" colspan="2"><label>Blog Body: </label></td>
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

	<?php  ?>


</div><!-- END col editor -->