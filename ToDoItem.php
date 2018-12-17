<?php

$hostname = 'localhost';
$username = 'root';
$password = 'password';
$database = 'todo_db'; 

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn -> connect_errno) {
die('ERROR NO DATABASE');
}

	$name = $_POST['name'];

	
	$tag = $_POST['tag'];


	$time = $_POST['time'];

	echo $name;
	echo $tag;
	echo $time;


	// function saveToDoItem(mysqli $conn){
	// 	$stmt = $conn->prepare("INSERT INTO tags
	// 						TO_DO_NAME, TAG_NAME, TIME_TAKEN
	// 						VALUES (?,?,?)");

	// 	$stmt->bind_param("ssd",$name,$tag,$time);
	// 	$stmt->execute();
	// 	return $stmt->affected_rows;
	// }


	$sql = "INSERT INTO tags (`ID`, `TO_DO_NAME`, `TAG_NAME`, `TIME_TAKEN`) VALUES (NULL,'$name','$tag','$time')";
	if ($conn->query($sql) === TRUE) {
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>
