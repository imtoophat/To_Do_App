<?php

//default configs for connecting to the database

$hostname = 'ENTER IP';
$username = 'root';
$password = 'snake477';
$database = 'organizations'; //enter name of the table to work with

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_errno) {
  die('ERROR NO DATABSE');
}

//test to see if index can reach this file
//echo "HELLO";

?>