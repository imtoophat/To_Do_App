<?php

$sqlget = "SELECT * FROM tags";
$sqldata = mysqli_query($conn,$sqlget) or die('error getting data');

$results_string = '';

while($row = mysqli_fetch_array($sqldata,MYSQL_ASSOC)){

	$results_string = $results_string.'</br>'.
	'To Do Name: '.$row['TO_DO_NAME'].'</br>'.
	'Tag: '.$row['TAG_NAME'].'</br>'.
	'Time Taken: '.$row['TIME_TAKEN'].' seconds</br></br>';
}

function getData(){
	echo $results_string;
}

?>