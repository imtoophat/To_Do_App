<?php
require_once('/php/database.php');


echo $hostname;
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn -> connect_errno) {
die('ERROR NO DATABASE');
}

?>
