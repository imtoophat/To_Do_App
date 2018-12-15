<?php
require_once('database.php');

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn -> connect_errno) {
die('ERROR NO DATABASE');
}

$conn -> close();
?>
