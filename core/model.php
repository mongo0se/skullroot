<?php

class Model {	
	protected $db;	
	public function __construct() {
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		// $this->db = new PDO("mssql:host=".DB_HOST.";dbname=".DB_NAME.", ".DB_USER.", ".DB_NAME."");
		/* Driver Issues, so just used mysqli */
	}	
}
