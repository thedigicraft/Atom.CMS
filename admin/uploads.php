<?php

session_start();

include('functions/dropzone_error.php');

if (!empty($_POST['token-a'])) {
  if (hash_equals($_SESSION['token'], $_POST['token-a'])) {
    include('../config/connection.php');
    include('./functions/pdo.php');
    define('DS', DIRECTORY_SEPARATOR);  //1
    $id = $_POST['id-a'];

    $storeFolder = '../uploads/';   //2

    $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    $system_temp_dir = ((ini_get( 'upload_tmp_dir' ) === '') ? (sys_get_temp_dir()) : (ini_get( 'upload_tmp_dir')));

    $allowed_size = 2000000;
    $random_name = random_int(1, 9999999).'.'.$file_ext;
    $target_path = $system_temp_dir.DS.$random_name;

    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];

    $file_ext = strtolower($file_ext);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = @finfo_file($finfo, $file_tmp_name);
    finfo_close($finfo);

  $stmt = pdo($dbc, "SELECT avatar FROM users WHERE id = :id", [
    'id' => $id
  ]);
  $old = $stmt->fetch();
  
if (!empty($_FILES) && $_FILES['name'] !== '') {
   
  if($file_ext === 'jpg' || $file_ext === 'jpeg' || $file_ext === 'png' || $file_ext === '') {
    if($file_size < $allowed_size) {
      if(($mime === 'image/jpeg' || $mime === 'image/png') && getimagesize($file_tmp_name)) {
        if($mime === 'image/jpeg') {
          $image = imagecreatefromjpeg($file_tmp_name);
          imagejpeg($image, $target_path ,100);
        } else {
          $image = imagecreatefrompng($file_tmp_name);
          imagepng($image, $target_path ,9);
        }
        imagedestroy($image);
        if(rename($target_path, $storeFolder.$random_name)) {
          
          $stmt = pdo($dbc, "UPDATE users SET avatar = :name WHERE id = :id", [
            'name' => $random_name,
            'id' => $id
          ]);

          $old_img = $storeFolder.$old['avatar'];
          if($old['avatar'] != '') {
            if(!is_dir($old_img)) {     
              unlink($old_img);   
            }
          }
        } else {
          dropzone_error('An error occurred while attempting to upload the file.');
        }
        if(file_exists($target_path)) {
          unlink($target_path);
        }
      } else {
        dropzone_error('File type not supported');
      }
    } else {
      dropzone_error('File must be less than 2MB.');
    } 
  } else {
    dropzone_error('Invalid File.');
  }
}
  } else {
    dropzone_error('Error');   
  }
} else {
  dropzone_error('Error'); 
}

?>

