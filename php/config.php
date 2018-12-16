<?php
require_once('/php/database.php');


echo 'Database is connected!';
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn -> connect_errno) {
die('ERROR NO DATABASE');
}

?>
