<?php
	require_once 'app/init.php';
	$auth = new Google_Auth();
	$auth->logout();
	header('Location: index.php');