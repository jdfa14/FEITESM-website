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

	public function checkIfNotEmpty($sql)
	{
		$response = $this->query($sql);
		return $response->num_rows > 0;
	}

	public function getFirstRow($sql)
	{
		$response = $this->query($sql);
		return $response->fetch_assoc();
	}
}