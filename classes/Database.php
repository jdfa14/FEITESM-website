<?php

class Database
{
	protected $mysqli;

	public function __construct()
	{
		$this->mysqli = new mysqli('localhost','root','','feitesm-website-db');
	}

	public function query($sql)
	{
		return $this->mysqli->query($sql);
	}
}