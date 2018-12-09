<?php

class Tags {

	public $tag_id;
	public $tag_name;
	public $aggr_time_to_do;

	private $from_map = array(
		'Tag ID' => 'tag_id',
		'Tag Name' => 'tag_name',
		'Aggregate Time-To_Date' => 'aggr_time_to_do'
	);

	private $to_map = array();
}

?>