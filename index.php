<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

	require_once('database.php');

	$conn = new mysqlli($hostname, $username, $password, $database);

	if ($conn->connect_errno) {
	  die('ERROR NO DATABSE');
	}

	

	?>

</body>
</html>
