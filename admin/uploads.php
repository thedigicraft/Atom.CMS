<?php

include('../config/connection.php');

$ds = DIRECTORY_SEPARATOR;  //1
$id = $_GET['id'];

$storeFolder = '../uploads';   //2

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100,999);
$name = $newname.$random.'.'.$ext;

$q = "SELECT avatar FROM users WHERE id = $id";
$r = mysqli_query($dbc, $q);
$old = mysqli_fetch_assoc($r);


$q = "UPDATE users SET avatar = '$name' WHERE id = $id";
$r = mysqli_query($dbc, $q);
 
echo $q.'<br>';
echo mysqli_error($dbc);
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;  //5
 
    move_uploaded_file($tempFile,$targetFile); //6    
    
    $deleteFile = $targetPath.$old['avatar'];
	
    if($old['avatar'] != '') {
    	
		if(!is_dir($deleteFile)) {
			
			unlink($deleteFile);
			
		}

    }
  
}
?> 
