<?php

# Database Connection Here...
$host = '127.0.0.1';
$db   = 'atomcms';
$user = 'dev';
$pass = 'thepassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false
      ];

$dbc = new PDO($dsn, $user, $pass, $options);

?>