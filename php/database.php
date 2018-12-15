<?php

//default configs for connecting to the database

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'todo_db'; //enter name of the table to work with

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_errno) {
  die('ERROR NO DATABSE');
}

?>
