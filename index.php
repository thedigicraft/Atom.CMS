<?php include('template/header.php'); // Page Header ?>
<?php
  if(file_exists('views/'.$view['name'].'.php')) {
    include('views/'.$view['name'].'.php'); // View Type 
  } else {
    header('Location: home');
  }
  ?> 
<?php include('template/footer.php'); // Page Footer ?>	