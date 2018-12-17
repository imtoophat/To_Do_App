<?php



	if(isset($_POST['name'])){
		$name = $_POST['name'];

		echo "name is set.";

		echo 'Name: '.$name;
	}

	if(isset($_POST['tag'])){
		$tag = $_POST['tag'];

		echo "tag is set.";

		echo 'Tag: '.$tag;
	}

	if(isset($_POST['time'])){
		$time = $_POST['time'];

		echo "time is set.";

		echo 'Time: '.$time;
	}

	function saveToDoItem(mysqli $conn){
		$stmt = $conn->prepare("INSERT INTO tags
							TO_DO_NAME, TAG_NAME, TIME_TAKEN
							VALUES (?,?,?)");

		$stmt->bind_param("ssd",$name,$tag,$time);
		$stmt->execute();
		return $stmt->affected_rows;
	}




?>
