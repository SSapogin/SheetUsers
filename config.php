<?php
$host = 'localhost';
$database = 'users';
$user = 'root';
$password = '';

try {
  $connect = new PDO("mysql:host=$host; dbname=$database", $user, $password);
}
catch (PDOException $e){
    die("Connection failed!");
}

?>
