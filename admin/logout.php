<?php

# Start Session:
session_start();

//unset($_SESSION['username']); // Delete the username key

if (!empty($_POST['token'])) {
  if (hash_equals($_SESSION['token'], $_POST['token'])) {
    session_destroy(); // This would delete all of the session keys
    header('Location: login.php'); // Redirect to login.php
  } else {
    exit('Error');
  }
}

?>