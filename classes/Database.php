<?php

class Database
{
	protected $mysqli;
	protected $server;
	protected $databaseName;
	protected $user;
	protected $password;

	public function __construct()
	{
		$server = 'localhost';
		$user = 'root';
		$password = '';
		$databaseName = 'feitesm-website-db';

		$this->mysqli = new mysqli($server,$user,$password,$databaseName);
		mysqli_set_charset($this->mysqli,"utf8");
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

	public function select($what,$from,$where)
	{
		$sql = "
			SELECT {$what}
			FROM {$from}
			WHERE {$where}
		";
		return $this->query($sql);
	}

	public function insert($into,$fields,$values)
	{
		$sql = "
			INSERT INTO {$into} ({$fields})
			VALUES ({$values})
		";
		//echo $sql;
		return $this->query($sql);
	}

	public function delete($from,$where)
	{
		$sql = "
			DELETE FROM {$from}
			WHERE {$where}
		";
		return $this->query($sql);
	}

	public function update($from, $values, $where)
	{
		$sql = "
			UPDATE {$from}
			SET {$values}
			WHERE {$where}
		";
		return $this->query($sql);
	}

	public function getError(){
		return $this->mysqli->error;
	}
}