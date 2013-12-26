



<?php

	if(isset($_POST)) {
	
		echo '<pre>';
			print_r($_POST);
		echo '</pre>';
		
		
	}
	

?>



<form action="#" method="post">

	<p><label>Page title: </label><input type="text" size="30" name="title" value=""></p>
    <p><label>Page name: </label><input type="text" size="30" name="name" value=""></p>

	<p><input type="submit" name="submit" value="Save Changes"></p>


</form>