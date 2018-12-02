<?php

class Users {

	public $user_id;
	public $first_name;
	public $last_name;
	public $email;
	public $password;

	private $from_map = array(
		'User ID' => 'user_id',
		'First Name' => 'first_name',
		'Last Name' => 'last_name',
		'Email' => 'email',
		'Password' => 'password'
	);

	private $to_map = array();

	function __construct(array $user_array) {

		//i think this loads values from an instance of a user

		foreach($this->from_map as $key => $val){

			$this->to_map[$val] = $key;
		}

		foreach ($user_array as $key => $val) {

			if(property_exists($this, $key)) {
				$this->$key = $val;
			}
		}
	}

	static function fetchAll(mysqli $conn) {
		$users = array();
		$sql = 'SELECT * FROM USERS';
		if($result = $conn->query($sql)){
			while($row = $result->fecth_assoc()){
				$user = new User($row);

				$users[] = $user;
			}
		}

		return $users;
	}

	static function userExists(mysqli $conn,$email) {

		$stmt = $conn->prepare(
			"SELECT Email from Users WHERE Email=?"
		);

		$stmt->bind_param("s", $email);
		$stmt->execute();

		$result->$stmt->get_result();

		if(mysqli_num_rows($result) > 0){
			return true;
		}

		return false;
	}

	static function passwordMatches(mysqli $conn,$email,$pword){

	}

	static function getUserID(mysqli $conn,$email){
		
	}

}

?>