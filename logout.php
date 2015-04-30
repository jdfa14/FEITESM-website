<?php
	require_once 'app/init.php';
	$db = new Database;
	$auth = new Google_Auth($db);
	$auth->logout();
	header('Location: index.php');