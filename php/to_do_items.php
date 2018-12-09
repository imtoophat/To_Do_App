<?php

class To_Do_Items {

	public $to_do;
	public $to_do_name;
	public $time_taken;
	public $start_time;
	public $end_time;

	public $user_id;
	public $tag_id;

	private $from_map = array(
		'ToDo ID' => 'to_do',
		'ToDo Name' => 'to_do_name',
		'Time Taken' => 'time_taken',
		'Start Time' => 'start_time',
		'End Time' => 'end_time',
		'Users_User ID' => 'user_id',
		'Tags_Tag ID' => 'tag_id'
	);

	private $to_map = array();

}

?>