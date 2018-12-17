<?php

$hostname = 'localhost';
$username = 'root';
$password = 'password';
$database = 'todo_db'; 

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn -> connect_errno) {
die('ERROR NO DATABASE');
}
$sqlget = "SELECT TO_DO_NAME, TAG_NAME, TIME_TAKEN FROM tags";
$sqldata = $conn->query($sqlget);

$results_string = ``;

while($row = $sqldata->fetch_assoc()){

	$results_string = $results_string.'</br>'.
	'To Do Name: '.$row['TO_DO_NAME'].'</br>'.
	'Tag: '.$row['TAG_NAME'].'</br>'.
	'Time Taken: '.$row['TIME_TAKEN'].' seconds</br></br>';
}

echo $results_string;

$conn->close();

?>