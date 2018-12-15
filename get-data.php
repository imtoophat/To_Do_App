<?php

$sqlget = "SELECT * FROM tags";
$sqldata = mysqli_query($conn,$sqlget) or die('error getting data');

$results_string = '';

while($row = mysqli_fetch_array($sqldata,MYSQL_ASSOC)){

	$results_string = $results_string.'</br>'.
	'To Do Name: '.$row['to+do+name'].'</br>'.
	'Tag: '.$row['tag_name'].'</br>'.
	'Time Taken: '.$row['time'].' seconds</br></br>';
}

function getData(){
	echo $results_string;
}

?>